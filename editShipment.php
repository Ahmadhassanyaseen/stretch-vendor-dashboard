<?php include 'config/config.php'; ?>


<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>

    <?php
    if (isset($_COOKIE["vendor"])) {
      $userData = json_decode($_COOKIE["vendor"], true);
    } else {
      $userData = [];
    }
    $data['id'] = $_GET['id'];
    $data['vendor_id'] = $userData['id'];
    $shipment = fetchShipmentById($data);
    // print_r($shipment);
    ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class="container px-6 pb-10 mx-auto grid">
            <div class="flex justify-between items-center">

              <h2
              class="my-6 text-2xl font-semibold text-gray-700 "
              >
              Edit Shipment
            </h2>
            
            <?php
            $shipment['status'] = strtolower($shipment['status']);
            if ($shipment['status'] == 'quoted') {
              echo '<div class="shadow-md px-4 py-2 bg-blue-600 text-white rounded-full border border-gray-200">Shipment is Quoted</div>';
            } else if ($shipment['status'] == 'pending') {
              echo '<div class="shadow-md px-4 py-2 bg-yellow-600 text-white rounded-full border border-gray-200">Shipment is Pending</div>';
            } else if ($shipment['status'] == 'accepted') {
              echo '<div class="shadow-md px-4 py-2 bg-green-600 text-white rounded-full border border-gray-200">Shipment is Accepted</div>';
            }else if ($shipment['status'] == 'rejected') {
              echo '<div class="shadow-md px-4 py-2 bg-red-600 text-white rounded-full border border-gray-200">Shipment is Rejected</div>';
            }
            ?>
            
            
          </div>
          <div class="flex justify-center">
          <div class="mapouter">
                                            <?php

                                            $first_city = $shipment['pickup_address'];
                                            $second_city = $shipment['dropoff_address'];
                                            // echo $first_city;
                                            // Split the string by comma and space
                                            $words = explode(', ', $first_city);
                                            $words2 = explode(', ', $second_city);

                                            // Extract the first word
                                            $first_word = $words[0] . ',' . $words[1] . ',' . $words[2];
                                            $second_word = $words2[0] . ',' . $words2[1] . ',' . $words2[2];
                                            $distanceVal = explode(' ', $shipment['distance']);

                                            $zoomLevel = 10;
                                            if (intval($distanceVal[0]) < 500) {
                                              $zoomLevel = 5;
                                            } elseif (intval($distanceVal[0]) < 1000) {
                                              $zoomLevel = 4;
                                            } elseif (intval($distanceVal[0]) < 1500) {
                                              $zoomLevel = 3;
                                            }

                                            // echo $first_word;

                                            ?>


                                        <div class="gmap_canvas"><iframe width="100%" height="340" id="gmap_canvas" src="<?php echo 'https://maps.google.com/maps?q=' . $first_word . 'to=' . $second_word . '&t=&z=' . $zoomLevel . '&ie=UTF8&iwloc=&output=embed'; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.analarmclock.com/"></a><br><a href="https://www.onclock.net/"></a><br>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    height: 90%;
                                                    width: 100%;
                                                    border-radius: 10px;
                                                    max-height: 400px;
                                                }
                                            </style>

                                            <style>
                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    height: 100%;
                                                    width: 100%;
                                                    border-radius: 10px;
                                                }
                                            </style>
                                        </div>
                                    </div>
          </div>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md ">
              <div class="grid gap-6 mb-8 md:grid-cols-2">
                <!-- Shipment Details Card -->
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
                  <h4 class="mb-4 font-semibold text-gray-800 ">
                    Shipment Details
                  </h4>
                  <div class="space-y-4">
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Type:</span>
                      <span class="font-medium text-gray-700 "><?php echo ucfirst($shipment['type']); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Description:</span>
                      <span class="font-medium text-gray-700 w-1/2 text-right"><?php echo $shipment['description']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Vehicle Type:</span>
                      <span class="font-medium text-gray-700 "><?php echo ucfirst($shipment['carrier_vehicle_type']); ?></span>
                    </div>
                    <!-- <div class="flex justify-between">
                      <span class="text-gray-600 ">Rate:</span>
                      <span class="font-medium text-gray-700 ">$<?php //echo number_format($shipment['rate'], 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Mileage:</span>
                      <span class="font-medium text-gray-700 "><?php //echo number_format($shipment['mileage'], 2); ?></span>
                    </div> -->
                   
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Distance:</span>
                      <span class="font-medium text-gray-700 "><?php echo $shipment['distance']; ?> miles</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Duration:</span>
                      <span class="font-medium text-gray-700 "><?php echo $shipment['duration']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Total Price:</span>
                      <span class="text-lg font-bold text-blue-600 ">$<?php echo $shipment['platform_price']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Fuel Cost:</span>
                      <span class="font-medium text-red-600 ">- $<?php echo $shipment['fuel']; ?></span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-gray-600 ">Profit:</span>
                      <span class="text-lg font-medium text-green-600 ">$<?php echo (floatval(str_replace(',', '', $shipment['platform_price'])) - floatval(str_replace(',', '', $shipment['fuel']))); ?></span>
                    </div>
                  </div>
                </div>

                <!-- Pickup & Dropoff Card -->
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
                  <h4 class="mb-4 font-semibold text-gray-800 ">
                    Pickup & Dropoff
                  </h4>
                  <div class="space-y-6">
                    <div class="space-y-2">
                      <h5 class="font-medium text-gray-700 ">Pickup</h5>
                      <div class="pl-4 border-l-2 border-blue-200 ">
                        <p class="font-medium"><?php echo $shipment['pickup_address']; ?></p>
                        <p class="text-sm text-gray-600 ">
                          <?php echo date('M d, Y', strtotime($shipment['pickup_date'])); ?> at <?php echo $shipment['pickup_time']; ?>
                        </p>
                      </div>
                    </div>
                    <div class="space-y-2">
                      <h5 class="font-medium text-gray-700 ">Dropoff</h5>
                      <div class="pl-4 border-l-2 border-blue-200 ">
                        <p class="font-medium"><?php echo $shipment['dropoff_address']; ?></p>
                        <p class="text-sm text-gray-600 ">
                          <?php echo date('M d, Y', strtotime($shipment['dropoff_date'])); ?> at <?php echo $shipment['dropoff_time']; ?>
                        </p>
                      </div>
                    </div>
                    
                    <!-- Shipper Information -->
                    <div class="pb-4 mt-4 border-t border-gray-200 ">
                      <h5 class="mb-2 mt-4 font-semibold text-gray-700 ">Shipper Information</h5>
                      <div class="space-y-1 ">
                        <p><?php echo $shipment['shipper_name']; ?></p>
                        <p class="text-gray-600 "><?php echo $shipment['shipper_phone']; ?></p>
                        <p class="text-gray-600 "><?php echo $shipment['shipper_email']; ?></p>
                        <p class="text-gray-600 "><?php echo $shipment['shipper_address']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-white p-4 rounded-lg shadow">
                                
                                <h4 class="font-semibold text-xl text-gray-700 mb-2">Vendor Quotes</h4>
                                <div class="space-y-2 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <?php
                                    // Check if any quote is accepted
                                    $hasAcceptedQuote = false;
                                    foreach ($shipment['vendor_quotes'] as $quote) {
                                      if (isset($quote['status']) && $quote['status'] === 'accepted') {
                                        $hasAcceptedQuote = true;
                                        break;
                                      }
                                    }

                                    foreach ($shipment['vendor_quotes'] as $quote) {
                                      ?>
                                    <div class="space-y-2 m-0 text-sm shadow border border-gray-200 p-2 rounded-lg <?= $quote['status'] == 'accepted' ? 'bg-green-100' : ($quote['status'] == 'rejected' ? 'bg-red-100' : '') ?>">
                                    <p class="grid grid-cols-3 text-sm"><span class="font-medium">Name:</span> <span class="col-span-2"><?= htmlspecialchars($quote['name'] ?? 'N/A') ?></span></p>
                                    <p class="grid grid-cols-3 text-sm"><span class="font-medium">Email:</span> <span class="col-span-2"><?= htmlspecialchars($quote['email'] ?? 'N/A') ?></span></p>
                                    <p class="grid grid-cols-3 text-sm"><span class="font-medium">Phone:</span> <span class="col-span-2"><?= htmlspecialchars($quote['phone'] ?? 'N/A') ?></span></p>
                                    <p class="grid grid-cols-3 text-sm"><span class="font-medium">Quoted Price: </span><span class="col-span-2">$<?= htmlspecialchars($quote['price'] ?? 'N/A') ?></span></p>
                                    <p class="grid grid-cols-3 text-sm"><span class="font-medium">Status:</span><span class="col-span-2"><?= htmlspecialchars($quote['status'] ?? 'N/A') ?></span></p>
                                    
                                    </div>
                        
                                 
                                   <?php
                                    }
                                    ?>
                                   
                                </div>
                            </div>

              <!-- Action Buttons -->
               <div id="custom-price-container" class="hidden ">
                <div class="flex justify-end items-end mt-6 space-x-4 w-full">
                <div class="w-full">

                  <label for="custom_price" class="block text-sm font-medium text-gray-700 mb-2">Custom Price</label>
                  <input type="number" name="custom_price" id="custom_price_value" class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter amount" min="0" step="0.01">
                </div>
                <div class="w-[150px]">
                  <button type="button"  class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 hover:bg-green-700 border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-green " id="custom-price-quote">Custom Price</button>
                </div>
                </div>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                <button type="button" id="reject-shipment" <?php if ($shipment['vendor_status'] == '1') { echo 'disabled'; } ?> class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150  border border-transparent rounded-lg focus:outline-none focus:shadow-outline-red <?php if ($shipment['vendor_status'] == '1') { echo 'bg-gray-600 hover:bg-gray-400'; } else { echo 'bg-red-600 hover:bg-red-700'; } ?>">
                  Reject
                </button>
                <button type="button" id="accept-shipment" <?php if ($shipment['vendor_status'] == '1' || $shipment['vendor_status'] == '-1') { echo 'disabled'; } ?> class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150  border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-green <?php if ($shipment['vendor_status'] == '-1' || $shipment['vendor_status'] == '1') { echo 'bg-gray-600 hover:bg-gray-400'; } else { echo 'bg-green-600 hover:bg-green-700'; } ?>">
                  Accept
                </button>
                <button type="button" id="custom-price" <?php if ($shipment['vendor_status'] == '-1') { echo 'disabled'; } ?> class="px-6 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150  border border-transparent rounded-lg  focus:outline-none focus:shadow-outline-green <?php if ($shipment['vendor_status'] == '-1') { echo 'bg-gray-600 hover:bg-gray-400'; } else { echo 'bg-green-600 hover:bg-green-700'; } ?>">
                  Custom Price
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
            $('#custom-price').click(function() {
              $('#custom-price-container').toggle();
            });
            $('#custom-price-quote').click(function() {
              var custom_price = $('#custom_price_value').val();
              var vendor_id = '<?php echo $shipment['vendor_id']; ?>';
              var shipment_id = '<?php echo $shipment['id']; ?>';
              Swal.fire(
                {
                  title: "Are you sure?",
                  text: "You want to quote this shipment?",
                  icon: "question",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, quote!"
                }
              ).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: 'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem',
                    type: 'POST',
                    data: {
                      method: 'updateShipmentCustomPrice',
                      price: custom_price,
                      vendor_id: vendor_id,
                      shipment_id: shipment_id
                    },
                    success: function(response) {
                      console.log(response);
                      Swal.fire({
                        title: "Success!",
                        text: "Shipment has been quoted successfully.",
                        icon: "success"
                      }).then(() => {
                        // Redirect after showing success message
                        window.location.reload();
                      });
                    },
                    error: function(xhr, status, error) {
                      console.log(error);
                      Swal.fire({
                        title: "Error!",
                        text: error.message || "An error occurred while processing your request.",
                        icon: "error"
                      });
                    }
                  });
                  
                }
              })
            });
            
            
        });
    </script>
  </body>
</html>
