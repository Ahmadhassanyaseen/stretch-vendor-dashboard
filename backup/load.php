
<style>
    .loader{
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid blue;
        border-bottom: 8px solid blue;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        margin: auto;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .mapouter {
        position: relative;
        text-align: right;
        height: 90%;
        width: 100%;
        border-radius: 10px;
        max-height: 400px;
    }
    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 100%;
        width: 100%;
        border-radius: 10px;
    }
    .toggle-details {
        cursor: pointer;
        transition: transform 0.2s;
    }
    .toggle-details.rotate-45 {
        transform: rotate(45deg);
    }
    table.dataTable thead>tr>th.sorting:before,table.dataTable thead>tr>th.sorting:after{
        display: none;
    }
    #quoteModal{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;

    }
    #quoteModal .modal-content{
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    #quoteModal .close{
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: red;
        color: white;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        cursor: pointer;
    }
    .badge-container{
        display: flex;
        gap: 5px;
    }
    .badge{
        padding: 2px 5px;
        border-radius: 5px;
        background-color: #D74559;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
    }
    #shipmentsTable{
        padding: 1rem;

    }
    #shipmentsTable tbody tr:nth-child(odd) {
        background-color:#f27474;
        color: #fff;
    }
        
</style>
<div class="w-full overflow-hidden rounded-lg shadow-xs bg-white dark:bg-gray-800 text-gray-700 dark:text-white">
    <div class="w-full overflow-x-auto">
<table id="shipmentsTable" class="w-full display dataTable no-footer bg-white text-gray-700 dark:bg-gray-800 dark:text-white">
    <thead class="text-white">
        <tr>
            <th class="bg-blue-500 rounded-tl-xl "></th> 
            <th class="bg-blue-500">Age</th>
            <th class="bg-blue-500 truncate">Pickup Date</th>
            <th class="truncate bg-blue-500">Pickup</th>
            <th class="bg-blue-500">Deadhead</th>
            <th class="bg-blue-500">Dropoff</th>
            <th class="bg-blue-500 truncate">Requested Price</th>
            <th class="bg-blue-500 truncate">Avg Mrkt Price</th>
            <th class="bg-blue-500">Type</th>
            <th class="bg-blue-500">Weight</th>
            <th class="bg-blue-500">Broker</th>
            <th class="bg-blue-500 rounded-tr-xl ">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($shipments as $shipment): ?>
        <tr data-details='<?php echo htmlspecialchars(json_encode($shipment), ENT_QUOTES, 'UTF-8'); ?>' class="cursor-pointer hover:bg-gray-50 dark:bg-gray-700 bg-white">
            <td class="flex items-center toggle-details ">
                <svg class=" mr-2" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4  Maui 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </td>
            <td class="toggle-details truncate"><?= htmlspecialchars($shipment['created_at']) ?></td>
            <td class="toggle-details truncate"><?= htmlspecialchars(htmlspecialchars_decode($shipment['pickup_date'])) ?></td>
            <td class="toggle-details truncate"><?= htmlspecialchars($shipment['pickup']) ?></td>
            <td class="toggle-details"><?= htmlspecialchars($shipment['deadhead']) ?></td>
            <td class="toggle-details truncate"><?= htmlspecialchars($shipment['dropoff']) ?></td>
            <td class="toggle-details "><?= htmlspecialchars($shipment['price']) ?></td>
            <td class="toggle-details"><?= htmlspecialchars($shipment['avg_price']) ?></td>
            <td class="toggle-details">
                <div class="badge-container"><?php 
               $equipment = explode(',', $shipment['equipment']);
               foreach($equipment as $eq){
                echo "<span class='badge'>".$eq."</span> ";
               }
                ?></div></td>
            <td class="toggle-details"><?= htmlspecialchars($shipment['weight']) ?></td>
            <td class="toggle-details truncate"><?= htmlspecialchars($shipment['broker']) ?></td>
            <td class="toggle-details">
                <button class="bg-blue-500 p-2 rounded text-white quoteBtn" onclick="quoteLoad()"  data-id="<?= htmlspecialchars($shipment['id']) ?>">Quote</button>
        </td>

            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<div>
    <div id="quoteModal" >
        <div class="modal-content">
            <h2 class="text-lg font-semibold mb-4">Quote</h2>
            <form id="quoteForm">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="quotePrice" name="price" class="mt-1 p-2 border border-gray-300 rounded w-full">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="quoteDescription" name="description" class="mt-1 p-2 border border-gray-300 rounded w-full"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 p-2 rounded text-white">Submit</button>
            </form>
        </div>
    </div>  
</div>

<script>
    let shipmentData;

// Function to convert time string to sortable value
function timeStringToSortableValue(timeStr) {
    if (!timeStr) return 0;
    
    // Handle 'now' case
    if (timeStr === 'now') return 0;
    
    // Handle seconds (e.g., '30s')
    if (timeStr.endsWith('s')) {
        return parseInt(timeStr) / 60; // Convert to minutes for sorting
    }
    
    // Handle minutes (e.g., '30m')
    if (timeStr.endsWith('m')) {
        return parseInt(timeStr);
    }
    
    // Handle hours (e.g., '2h')
    if (timeStr.endsWith('h')) {
        return parseInt(timeStr) * 60; // Convert to minutes
    }
    
    // Handle days (e.g., '3d' or '3d 4h')
    if (timeStr.includes('d')) {
        const parts = timeStr.split(' ');
        let totalMinutes = 0;
        
        // Handle days part
        const daysMatch = timeStr.match(/(\d+)d/);
        if (daysMatch) {
            totalMinutes += parseInt(daysMatch[1]) * 24 * 60; // Convert days to minutes
        }
        
        // Handle hours part if exists (e.g., '3d 4h')
        const hoursMatch = timeStr.match(/(\d+)h/);
        if (hoursMatch) {
            totalMinutes += parseInt(hoursMatch[1]) * 60; // Convert hours to minutes
        }
        
        // Handle minutes part if exists (e.g., '3d 4h 30m')
        const minutesMatch = timeStr.match(/(\d+)m/);
        if (minutesMatch) {
            totalMinutes += parseInt(minutesMatch[1]);
        }
        
        return totalMinutes;
    }
    
    // Handle months (e.g., '2mo')
    if (timeStr.endsWith('mo')) {
        return parseInt(timeStr) * 30 * 24 * 60; // Approximate month to minutes
    }
    
    // Handle years (e.g., '1y')
    if (timeStr.endsWith('y')) {
        return parseInt(timeStr) * 365 * 24 * 60; // Approximate year to minutes
    }
    
    return 0;
}

$(document).ready(function() {
    const table = $('#shipmentsTable').DataTable({
        searching: false,
        lengthChange: false,
        pageLength: 50,
        columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                        <svg class="toggle-details mr-2" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>`;
                }
            },
            { 
                data: 'created_at',
                type: 'num',
                render: function(data, type, row) {
                    // For display, return the original string
                    if (type === 'display') {
                        return data;
                    }
                    // For sorting, return the sortable value
                    return timeStringToSortableValue(data);
                }
            },
            { data: 'pickup_date' },
            { data: 'pickup' },
            { data: 'deadhead' },
            { data: 'dropoff' },
            { data: 'price' },
            { data: 'avg_price' },
            { data: 'equipment' },
            { data: 'weight' },
            { data: 'broker' },
            { data: 'action' }
        ],
        order: [[1, 'asc']], // Sort by Age column (index 1)
        createdRow: function(row, data, dataIndex) {
            // Store the data-details JSON for the row
            const details = $(row).data('details');
            $(row).data('details-json', details);
        }

    });

    // Loading template for row details
    const loadingTemplate = `
        <div class="p-4 text-center bg-white text-gray-700 dark:bg-gray-800 dark:text-white">
            <div class="animate-spin loader "></div>
            <p class="mt-2 text-gray-600 dark:white">Loading details...</p>
        </div>
    `;

    // Toggle click handler for details
    $('#shipmentsTable tbody').on('click', 'td.toggle-details', async function() {
        const tr = $(this).closest('tr');
        const row = table.row(tr);
        const toggleIcon = $(this).find('svg');

        if (row.child.isShown()) {
            row.child.hide();
            toggleIcon.removeClass('rotate-90');
        } else {
            toggleIcon.addClass('rotate-90');
            
            try {
                const details = tr.data('details-json');
                const content = await formatDetails(details);
                row.child(content).show();
            } catch (error) {
                console.error('Error loading details:', error);
                row.child(`
                    <div class="p-4 text-center text-red-600 dark:text-red-400">
                        <p>Failed to load details. Please try again.</p>
                    </div>
                `).show();
            }
        }
    });
});
// Function to format the details row content
async function formatDetails(data) {
    shipmentData = data;
  
    const details = typeof data === 'string' ? JSON.parse(data) : data;
    
    // Generate map URL immediately
    const pickup = details.pickup.split(', ').slice(0, 3).join(',');
    const dropoff = details.dropoff.split(', ').slice(0, 3).join(',');
    const mapUrl = `https://maps.google.com/maps?q=${pickup}to=${dropoff}&t=&z=7&ie=UTF8&iwloc=&output=embed`;
    
    // Generate a unique ID for this loading container
    const loadingContainerId = 'loading-container-' + Date.now();
    
    // Return the map immediately with a loading state for other details
    const initialContent = `
        <div class="flex gap-4 details-row">
            <div class="bg-white text-gray-700 p-4 rounded-lg shadow dark:bg-gray-700 dark:text-white w-full">
                <h4 class="font-semibold text-xl text-gray-700 dark:text-white mb-2">Route Information</h4>
                <div class="space-y-2 text-sm">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="340" src="${mapUrl}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div id="${loadingContainerId}" class="bg-white text-gray-700 p-4 rounded-lg shadow dark:bg-gray-700 dark:text-white w-full flex items-center justify-center loading-container">
                <div class="text-center">
                    <div class="animate-spin loader mx-auto"></div>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Loading shipment details...</p>
                </div>
            </div>
        </div>
    `;
    
    // Start loading other details in the background
    loadAdditionalDetails(details).then(updatedContent => {
        // Find the loading container by its unique ID and replace it with the updated content
        const loadingContainer = document.getElementById(loadingContainerId);
        if (loadingContainer) {
            loadingContainer.outerHTML = updatedContent;
        }
    });

    // Return the initial content with the map and loading state
    return initialContent;
}

async function loadAdditionalDetails(details) {
    try {
        const fuelAndTollCost = await getfuelAndTollCost(
            details.pickup_lat, 
            details.pickup_lng, 
            details.dropoff_lat, 
            details.dropoff_lng, 
            details.distance_total
        );
        console.log(fuelAndTollCost);
        
        return `
            <div class="bg-white text-gray-700 p-4 rounded-lg shadow dark:bg-gray-700 dark:text-white w-full">
                <h4 class="font-semibold text-xl text-gray-700 dark:text-white mb-2">Shipment Information</h4>
                <div class="space-y-2 text-md">
                    <p class="grid grid-cols-2"><span class="font-medium">Distance:</span> <span>${details.distance_total} miles</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Fuel Cost:</span> <span>$${fuelAndTollCost.fuel_cost}</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Toll Cost:</span> <span>$${fuelAndTollCost.toll_cost.total_toll_cost}</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Requested Price:</span> <span>$${details.price}</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Average Market Price:</span> <span>$${details.avg_price}</span></p>
                </div>
            </div>`;
    } catch (error) {
        console.error('Error loading details:', error);
        return `
            <div class="bg-white text-gray-700 p-4 rounded-lg shadow dark:bg-gray-700 dark:text-white w-full flex items-center justify-center">
                <div class="text-center text-red-600 dark:text-red-400">
                    <p>Failed to load shipment details. Please try again.</p>
                </div>
            </div>`;
    }
}



async function getfuelAndTollCost(pickup_lat, pickup_long, dropoff_lat, dropoff_long, distance){
    const formData = new FormData();
    formData.append('pickup_lat', pickup_lat);
    formData.append('pickup_long', pickup_long);
    formData.append('dropoff_lat', dropoff_lat);
    formData.append('dropoff_long', dropoff_long);
    formData.append('distance', distance);
    formData.append('freight_type', "general");
    formData.append('method', "get_fuel_and_toll_cost_vendor");
    
    const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
        method: 'POST',
        body: formData
    });
    const data = await response.json();
    console.log(data);
    return data;
}

function quoteLoad(){
    // const shipmentId = $(this).data('id');
    // console.log(shipmentId);
    $('#quoteModal').css('display', 'flex');
}

function closeModal(){
    $('#quoteModal').css('display', 'none');
}

$('#quoteForm').submit(async function(e) {
    e.preventDefault();
    
    // Try to get vendor data from cookie or localStorage
    let vendorData = <?php echo $_COOKIE['vendor']; ?>;
    console.log(vendorData);
    // let cookie = getCookie('vendor');
    // console.log('Raw cookie value:', cookie);
    
    // If no cookie found, try to get from URL parameters (for testing)
    // if (!cookie) {
    //     const urlParams = new URLSearchParams(window.location.search);
    //     const vendorParam = urlParams.get('vendor');
    //     if (vendorParam) {
    //         try {
    //             const decoded = decodeURIComponent(vendorParam);
    //             console.log('Found vendor data in URL parameters');
    //             cookie = decoded;
    //             // Optionally save to localStorage for future use
    //             try {
    //                 localStorage.setItem('cookie_vendor', decoded);
    //             } catch (e) {
    //                 console.warn('Could not save to localStorage:', e);
    //             }
    //         } catch (e) {
    //             console.error('Error decoding URL parameter:', e);
    //         }
    //     }
    // }
    
    // if (cookie) {
    //     try {
    //         // Clean the cookie value if it's URL encoded
    //         let cleanCookie = cookie.trim();
    //         // Remove any surrounding quotes if present
    //         cleanCookie = cleanCookie.replace(/^"|"$/g, '');
            
    //         console.log('Cleaned cookie value:', cleanCookie);
            
    //         // Try to parse the JSON
    //         vendorData = JSON.parse(cleanCookie);
    //         console.log('Parsed vendor data:', vendorData);
            
    //         // Verify required fields
    //         if (!vendorData || !vendorData.id) {
    //             throw new Error('Invalid vendor data format');
    //         }
    //     } catch (error) {
    //         console.error('Error parsing vendor cookie:', error);
    //         console.error('Cookie content that failed to parse:', cookie);
    //         Swal.fire({
    //             title: 'Session Error',
    //             text: 'There was an issue with your session. Please log in again.',
    //             icon: 'error',
    //             confirmButtonText: 'OK'
    //         });
    //         // Redirect to login or refresh the page
    //         setTimeout(() => {
    //             window.location.href = 'login.php';
    //         }, 2000);
    //         return false;
    //     }
    // } else {
    //     console.log('No vendor cookie found');
    //     Swal.fire({
    //         title: 'Not Logged In',
    //         text: 'Please log in to submit a quote.',
    //         icon: 'warning',
    //         confirmButtonText: 'OK'
    //     });
    //     return false;
    // }
    
    // Show loading state
    Swal.fire({
        title: 'Please wait...',
        text: 'Submitting quote...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    let quotePrice = $("#quotePrice").val();
    let quoteDescription = $("#quoteDescription").val();
    
    if (!quotePrice) {
        Swal.fire({
            title: 'Error!',
            text: 'Please enter a price for your quote.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return false;
    }
    
    // Add loading state to submit button
    const submitBtn = $(this).find('button[type="submit"]');
    submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
// let formattedBrokerAddress = brokerAddress.street + ', ' + brokerAddress.city + ', ' + brokerAddress.state + ', USA';
let formData = new FormData();
formData.append('method', 'quoteLoad');
formData.append('quote_price', quotePrice);
formData.append('quote_description', quoteDescription);
formData.append('vendor_data', JSON.stringify(vendorData));
formData.append('shipment_data', JSON.stringify(shipmentData));

    
    $.ajax({
        url: 'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            Swal.fire({
                title: 'Success!',
                text: 'Quote submitted successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            $('#quoteModal').hide();
        },
        error: function(xhr, status, error) {
            console.error('Error submitting quote:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to submit quote. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});


// async function getBrokerData(brokerDot){
//     try {
//         const formData = new FormData();
//         formData.append('method', 'getBrokerData');
//         formData.append('dot', brokerDot);
//         const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
//             method: 'POST',
//             body: formData
//         });
//         const data = await response.json();
//         console.log(data);
//         return data;
//     } catch (error) {
//         console.error('Error loading details:', error);
//         return null;
//     }
    


// }
// async function getBrokerData(brokerDot) {
//     try {
//         const formData = new FormData();
//         formData.append('method', 'getBrokerData');
//         formData.append('dot', brokerDot);
        
//         const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
//             method: 'POST',
//             body: formData
//         });
        
//         if (!response.ok) {
//             throw new Error(`HTTP error! status: ${response.status}`);
//         }
        
//         return await response.json();
//     } catch (error) {
//         console.error('Error in getBrokerData:', error);
//         return null; // or handle the error as needed
//     }
// }
// function getCookie(name) {
//     // First try to get from document.cookie
//     const value = `; ${document.cookie}`;
//     const parts = value.split(`; ${name}=`);
    
//     if (parts.length === 2) {
//         const cookieValue = parts.pop().split(';').shift();
//         console.log('Found cookie in document.cookie:', {name, value: cookieValue});
//         return cookieValue;
//     }
    
//     // If not found in document.cookie, try localStorage as fallback
//     try {
//         const storedValue = localStorage.getItem(`cookie_${name}`);
//         if (storedValue) {
//             console.log('Found cookie in localStorage:', {name, value: storedValue});
//             return storedValue;
//         }
//     } catch (e) {
//         console.warn('Error accessing localStorage:', e);
//     }
    
//     console.log('Cookie not found in document.cookie or localStorage:', name);
//     return null;
// }




</script>

