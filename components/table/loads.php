

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
            <td class="toggle-details font-bold"><?= htmlspecialchars($shipment['price']) ?></td>
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
                <button class="bg-blue-500 p-2 rounded text-white quoteBtn"  data-id="<?= htmlspecialchars($shipment['id']) ?>"><i class="fa-solid fa-quote-left" style="margin-right: 5px;"></i>Quote</button>
        </td>

            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<!-- <div id="quoteModal" class="quote-modal">
    <div class="modal-content">
        <form id="quoteForm">
            <button type="button" class="close" id="closeModalBtn" aria-label="Close">&times;</button>
            <h2>Create Quote</h2>
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" id="quotePrice" name="price" step="0.01" min="0" placeholder="Enter amount" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="quoteDescription" name="description" placeholder="Enter quote details" required></textarea>
            </div>
            <button type="submit" class="submit-btn">
                <span>Submit Quote</span>
            </button>
        </form>
    </div>
</div> -->
<div id="quoteModal" class="quote-modal">
                        <div class="modal-content">
                            <div class="text-center mb-6">
                                <h2 class="text-2xl font-bold neon-red-header">Submit Your Quote</h2>
                                <p class="text-gray-600 mt-2">Provide your pricing for this load</p>
                            </div>
                            <div class="quoteModalDetails">

                            
                            <!-- Shipment Info Preview -->
                            <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-200">
                                <h3 class="font-semibold text-gray-700 text-xl mb-4 text-center">Load Details</h3>
                                <div class="grid grid-cols-3 gap-6 text-sm">
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Pickup Location</span>
                                        <p id="modalPickup" class="text-gray-800 font-semibold">Otay Mesa, CA</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Delivery Location</span>
                                        <p id="modalDropoff" class="text-gray-800 font-semibold">Denver, CO</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Pickup Date</span>
                                        <p id="modalPickupDate" class="text-gray-800 font-semibold">2025-09-04</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Total Distance</span>
                                        <p id="modalDistance" class="text-gray-800 font-semibold">1084 miles</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Weight</span>
                                        <p id="modalWeight" class="text-gray-800 font-semibold">22,700 lbs</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Equipment Type</span>
                                        <p id="modalEquipment" class="text-gray-800 font-semibold">F</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Broker</span>
                                        <p id="modalBroker" class="text-gray-800 font-semibold">King of Freight LLC</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-1">Deadhead Miles</span>
                                        <p id="modalDeadhead" class="text-gray-800 font-semibold">N/A</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Information Section -->
                            <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                <h3 class="font-semibold text-gray-700 text-xl mb-4 text-center">Pricing Information</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-2">Requested Rate</span>
                                        <p id="modalPrice" class="text-green-600 font-bold text-2xl mb-4">$2,800</p>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-medium text-gray-600 block mb-2">Average Market Rate</span>
                                        <p id="modalAvgPrice" class="text-blue-600 font-bold text-xl">$2,800</p>
                                        <p class="text-xs text-gray-500 mt-1">Industry standard pricing for similar loads</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <form id="quoteForm" class="bgBlue rounded-xl px-2 py-4">
                                <div class="mb-6">
                                    <label for="quotePrice" class="block text-sm font-semibold text-white mb-3 text-center">
                                        <i class="fas fa-dollar-sign mr-2 text-green-600"></i>Your Quote Price
                                    </label>
                                    <input type="number" id="quotePrice" name="price" class="w-full p-4 text-lg text-center border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-gray-50" placeholder="0.00" step="0.01" min="0" required="">
                                </div>
                                
                                <div class="mb-8">
                                    <label for="quoteDescription" class="block text-sm font-semibold text-white mb-3 text-center">
                                        <i class="fas fa-comment mr-2 text-blue-600"></i>Additional Notes (Optional)
                                    </label>
                                    <textarea id="quoteDescription" name="description" rows="4" class="w-full p-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-gray-50" placeholder="Add any additional details about your quote..."></textarea>
                                </div>
                                
                                <div class="flex gap-4">
                                    <button type="button" onclick="closeQuoteModal()" class="flex-1 py-4 px-6 bgRed text-white font-semibold rounded-xl transition-all duration-300 text-lg">
                                        Cancel
                                    </button>
                                    <button type="submit" class="flex-1 py-4 px-6 font-semibold rounded-xl transition-all duration-300 text-lg shadow-lg quoteFormSubmit" >
                                        <i class="fas fa-paper-plane mr-2"></i>Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

<script>
// Function to close the modal
function closeQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (!modal) return;
    
    modal.classList.remove('show');
    
    // Remove event listeners when closing
    const closeButton = document.getElementById('closeModalBtn');
    if (closeButton) {
        closeButton.removeEventListener('click', closeQuoteModal);
    }
    
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

// Function to open the modal with the load ID
// function openQuoteModal(loadId) {
//     const modal = document.getElementById('quoteModal');
//     modal.style.display = 'flex';
    
//     // Store the load ID in the form
//     const form = document.getElementById('quoteForm');
//     form.dataset.loadId = loadId;
    
//     // Reset and focus the form
//     form.reset();
//     document.getElementById('quotePrice').focus();
    
//     // Trigger the animation
//     setTimeout(() => {
//         modal.classList.add('show');
//     }, 10);
// }

$(document).on('click', '.quoteBtn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log('DIRECT EVENT LISTENER FIRED!');
        openQuoteModal(this);
});

function openQuoteModal(buttonElement) {
    console.log('Quote button clicked:', buttonElement);
    
    const modal = document.getElementById('quoteModal');
    const row = buttonElement.closest('tr');
    const shipmentDataString = row?.getAttribute('data-details');
    const rowId = row?.getAttribute('id');
    
    if (!shipmentDataString || !modal) {
        console.error('Missing modal or shipment data');
        return;
    }

    try {
        shipmentData = JSON.parse(shipmentDataString);
        
        // Populate modal
        document.getElementById('modalPickup').textContent = shipmentData.pickup || 'N/A';
        document.getElementById('modalDropoff').textContent = shipmentData.dropoff || 'N/A';
        document.getElementById('modalPickupDate').textContent = shipmentData.pickup_date || 'N/A';
        document.getElementById('modalDistance').textContent = shipmentData.distance_total ? shipmentData.distance_total + ' miles' : 'N/A';
        document.getElementById('modalWeight').textContent = shipmentData.weight ? new Intl.NumberFormat().format(shipmentData.weight) + ' lbs' : 'N/A';
        document.getElementById('modalEquipment').textContent = shipmentData.equipment || 'N/A';
        document.getElementById('modalBroker').textContent = shipmentData.broker || 'N/A';
        document.getElementById('modalDeadhead').textContent = shipmentData.deadhead ? shipmentData.deadhead + ' mi' : 'N/A';
        document.getElementById('modalPrice').textContent = shipmentData.price ? '$' + new Intl.NumberFormat().format(shipmentData.price) : 'N/A';
        document.getElementById('modalAvgPrice').textContent = shipmentData.avg_price ? '$' + new Intl.NumberFormat().format(shipmentData.avg_price) : 'N/A';

        // Clear form
        document.getElementById('quotePrice').value = '';
        document.getElementById('quoteDescription').value = '';

        // ANCHOR LINK - Jump to row first
        if (rowId) {
            console.log('Jumping to anchor:', rowId);
            window.location.hash = rowId;
        }

        // Show modal
        modal.style.display = 'flex';
        modal.classList.add('show');

    } catch (error) {
        console.error('Error opening modal:', error);
    }
}

// Close modal when clicking outside the content or pressing Escape key
function handleModalClose(event) {
    const modal = document.getElementById('quoteModal');
    if (event.type === 'keydown' && event.key === 'Escape') {
        closeModal();
        return;
    }
    
    // Check if click is outside the modal content
    const modalContent = document.querySelector('#quoteModal .modal-content');
    if (modal && modalContent && !modalContent.contains(event.target) && event.target === modal) {
        closeModal();
    }
}

// Add event listeners when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Close button event listener
    const closeButton = document.getElementById('closeModalBtn');
    if (closeButton) {
        closeButton.addEventListener('click', closeModal);
    }
    
    // Close on outside click
    document.addEventListener('click', handleModalClose);
    // Close on Escape key
    document.addEventListener('keydown', handleModalClose);
    
    // Clean up event listeners when the page is unloaded
    window.addEventListener('beforeunload', function() {
        document.removeEventListener('click', handleModalClose);
        document.removeEventListener('keydown', handleModalClose);
        if (closeButton) {
            closeButton.removeEventListener('click', closeModal);
        }
    });
});

// Handle form submission
document.getElementById('quoteForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const loadId = form.dataset.loadId;
    const price = document.getElementById('quotePrice').value;
    const description = document.getElementById('quoteDescription').value;
    
    // Here you can add your AJAX call to submit the quote
    console.log('Submitting quote for load ID:', loadId);
    console.log('Price:', price);
    console.log('Description:', description);
    
    // Example AJAX call (uncomment and modify as needed)
    /*
    fetch('/submit-quote.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            loadId: loadId,
            price: price,
            description: description
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Quote submitted successfully!');
            closeModal();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while submitting the quote.');
    });
    */
    
    // For now, just close the modal
    closeModal();
});
</script>

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
    console.log(details);
    try {
        const fuelAndTollCost = await getfuelAndTollCost(
            details.pickup, 
            details.dropoff, 
        );
        console.log(fuelAndTollCost);
        
        return `
            <div class="bg-white text-gray-700 p-4 rounded-lg shadow dark:bg-gray-700 dark:text-white w-full">
                <h4 class="font-semibold text-xl text-gray-700 dark:text-white mb-2">Shipment Information</h4>
                <div class="space-y-2 text-md">
                    <p class="grid grid-cols-2"><span class="font-medium">Distance:</span> <span>${details.distance_total} miles</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Fuel Cost:</span> <span>$${fuelAndTollCost.data.fuelCost.toFixed(2)}</span></p>
                    <p class="grid grid-cols-2"><span class="font-medium">Toll Cost:</span> <span>$${fuelAndTollCost.data.tollCosts.toFixed(2)}</span></p>
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



async function getfuelAndTollCost(pickup_address,  dropoff_address){
    const formData = new FormData();
    formData.append('pickup_address', pickup_address);
    formData.append('dropoff_address', dropoff_address);
    
    const response = await fetch('https://stretchxlfreight.com/xion/lane-rate.php', {
        method: 'POST',
        body: formData
    });
    const data = await response.json();
    console.log(data);
    return data;
}
// async function getfuelAndTollCost(pickup_lat, pickup_long, dropoff_lat, dropoff_long, distance){
//     const formData = new FormData();
//     formData.append('pickup_lat', pickup_lat);
//     formData.append('pickup_long', pickup_long);
//     formData.append('dropoff_lat', dropoff_lat);
//     formData.append('dropoff_long', dropoff_long);
//     formData.append('distance', distance);
//     formData.append('freight_type', "general");
//     formData.append('method', "get_fuel_and_toll_cost_vendor");
    
//     const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
//         method: 'POST',
//         body: formData
//     });
//     const data = await response.json();
//     console.log(data);
//     return data;
// }

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

