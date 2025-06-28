<?php include 'config/config.php'; ?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>

    <?php
    $data['id'] = $_GET['id'];
    $shipment = fetchShipmentById($data);
    // print_r($shipment);
    ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class="container px-6 pb-10 mx-auto grid">
            <div class="flex justify-between items-center">

              <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
              >
              Edit Shipment
            </h2>
            
            <?php
            if($shipment['vendor_status'] == '-1') {
              echo '<div class="shadow-md px-4 py-2 bg-red-600 text-white rounded-full border border-gray-200">Shipment is Rejected</div>';
            } else if($shipment['vendor_status'] == '0') {
              echo '<div class="shadow-md px-4 py-2 bg-yellow-600 text-white rounded-full border border-gray-200">Shipment is Pending</div>';
            } else if($shipment['vendor_status'] == '1') {
              echo '<div class="shadow-md px-4 py-2 bg-success text-white rounded-full border border-gray-200">Shipment is Accepted</div>';
            }
            ?>
            
            
          </div>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <div class="grid gap-6 mb-8 md:grid-cols-2">
                <!-- Shipment Details Card -->
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Shipment Details
                  </h4>
                  <div class="space-y-4">
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Type:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo ucfirst($shipment['type']); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Description:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo $shipment['description']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Vehicle Type:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo ucfirst($shipment['carrier_vehicle_type']); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Rate:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300">$<?php echo number_format($shipment['rate'], 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Mileage:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo number_format($shipment['mileage'], 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Fuel Surcharge:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300">$<?php echo number_format($shipment['fuel'], 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Distance:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo $shipment['distance']; ?> miles</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Duration:</span>
                      <span class="font-medium text-gray-700 dark:text-gray-300"><?php echo $shipment['duration']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 dark:text-gray-400">Total Price:</span>
                      <span class="text-lg font-bold text-blue-600 dark:text-blue-400">$<?php echo $shipment['total_price']; ?></span>
                    </div>
                  </div>
                </div>

                <!-- Pickup & Dropoff Card -->
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Pickup & Dropoff
                  </h4>
                  <div class="space-y-6">
                    <div class="space-y-2">
                      <h5 class="font-medium text-gray-700 dark:text-gray-300">Pickup</h5>
                      <div class="pl-4 border-l-2 border-blue-200 dark:border-blue-800">
                        <p class="font-medium"><?php echo $shipment['pickup_address']; ?></p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                          <?php echo date('M d, Y', strtotime($shipment['pickup_date'])); ?> at <?php echo $shipment['pickup_time']; ?>
                        </p>
                      </div>
                    </div>
                    <div class="space-y-2">
                      <h5 class="font-medium text-gray-700 dark:text-gray-300">Dropoff</h5>
                      <div class="pl-4 border-l-2 border-blue-200 dark:border-blue-800">
                        <p class="font-medium"><?php echo $shipment['dropoff_address']; ?></p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                          <?php echo date('M d, Y', strtotime($shipment['dropoff_date'])); ?> at <?php echo $shipment['dropoff_time']; ?>
                        </p>
                      </div>
                    </div>
                    
                    <!-- Shipper Information -->
                    <div class="pb-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                      <h5 class="mb-2 mt-4 font-semibold text-gray-700 dark:text-gray-300">Shipper Information</h5>
                      <div class="space-y-1 ">
                        <p><?php echo $shipment['shipper_name']; ?></p>
                        <p class="text-gray-600 dark:text-gray-400"><?php echo $shipment['shipper_phone']; ?></p>
                        <p class="text-gray-600 dark:text-gray-400"><?php echo $shipment['shipper_email']; ?></p>
                        <p class="text-gray-600 dark:text-gray-400"><?php echo $shipment['shipper_address']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="flex justify-end mt-6 space-x-4">
                <button type="button" id="reject-shipment" <?php if($shipment['vendor_status'] != '0') { echo 'disabled'; } ?> class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:shadow-outline-red <?php if($shipment['vendor_status'] != '0') { echo 'bg-disabled'; } ?>">
                  Reject
                </button>
                <button type="button" id="accept-shipment" <?php if($shipment['vendor_status'] != '0') { echo 'disabled'; } ?> class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-success border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:shadow-outline-green <?php if($shipment['vendor_status'] != '0') { echo 'bg-disabled'; } ?>">
                  Accept
                </button>
              </div>
            </div>
            
            
            

           
          </div>
        </main>
      </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#reject-shipment').click(function() {
                Swal.fire({
                title: "Are you sure?",
                text: "You want to reject this shipment?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, reject!"
                }).then((result) => {
                if (result.isConfirmed) {
                    // Clear PHP session via AJAX
                    // Show loading state
                    Swal.showLoading();
                    
                    // Make the API call
                    fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `method=updateShipmentStatus&id=<?php echo $shipment['id']; ?>&status=-1`
                    })
                    .then(response => {
                    // First check if response is OK
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    // Try to parse as JSON, fallback to text if it fails
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        return response.text().then(text => ({
                        success: true,
                        message: text || 'Action completed successfully'
                        }));
                    }
                    })
                    .then(data => {
                    console.log('Success:', data);
                    Swal.fire({
                        title: "Success!",
                        text: "Shipment has been rejected successfully.",
                        icon: "success"
                    }).then(() => {
                        // Redirect after showing success message
                        window.location.href = 'shipments.php';
                    });
                    })
                    .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: error.message || "An error occurred while processing your request.",
                        icon: "error"
                    });
                    });
                }
                });
                
            });
            $('#accept-shipment').click(function() {
                Swal.fire({
                title: "Are you sure?",
                text: "You want to accept this shipment?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, accept!"
                }).then((result) => {
                if (result.isConfirmed) {
                    // Clear PHP session via AJAX
                    // Show loading state
                    Swal.showLoading();
                    
                    // Make the API call
                    fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `method=updateShipmentStatus&id=<?php echo $shipment['id']; ?>&status=1`
                    })
                    .then(response => {
                    // First check if response is OK
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    // Try to parse as JSON, fallback to text if it fails
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        return response.text().then(text => ({
                        success: true,
                        message: text || 'Action completed successfully'
                        }));
                    }
                    })
                    .then(data => {
                    console.log('Success:', data);
                    Swal.fire({
                        title: "Success!",
                        text: "Shipment has been accepted successfully.",
                        icon: "success"
                    }).then(() => {
                        // Redirect after showing success message
                        window.location.href = 'shipments.php';
                    });
                    })
                    .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: error.message || "An error occurred while processing your request.",
                        icon: "error"
                    });
                    });
                }
                });
                
            });
            
            
        });
    </script>
  </body>
</html>
