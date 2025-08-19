  

  <?php include 'config/config.php'; ?>

  <?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
    <?php
    
    if (isset($_COOKIE['vendor'])) {
      $userData = json_decode($_COOKIE['vendor'], true);
    } else {
      $userData = [];
    }

    $data['id'] = $userData['id'];
    $response = fetchAllVendorLeads($data);
    ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto">
          <div class=" px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-white"
            >
              Carrier Dashboard
            </h2>
           
            <!-- Cards -->
            <div class="grid gap-4 mb-5 md:grid-cols-4 w-full">
            
            <?php
 
                 
 
                   // print_r($response);
 
                   $stats = [
                     [
                       'title' => 'Total Shipments',
                       'value' => count($response),
                       'icon' => 'boxes-stacked',
                       'color' => 'orange'
                     ],
                     [
                       'title' => 'In Progress Shipments',
                       'value' => array_reduce($response, function ($carry, $item) {
                         return $carry + (in_array(strtolower($item['status_c']), ['assigned', 'quoted', '', 'inprocess']) ? 1 : 0);
                       }, 0),
                       'icon' => 'hourglass-start',
                       'color' => 'blue'
                     ],
                   
                     [
                       'title' => 'Completed Shipments',
                       'value' => array_reduce($response, function ($carry, $item) {
                         return $carry + (strtolower($item['status_c']) === 'converted' ? 1 : 0);
                       }, 0),
                       'icon' => 'check',
                       'color' => 'green'
                     ],
                     [
                       'title' => 'Cancelled Shipments',
                       'value' => array_reduce($response, function ($carry, $item) {
                         return $carry + (in_array(strtolower($item['status_c']), ['cancelled', 'dead', 'deleted']) ? 1 : 0);
                       }, 0),
                       'icon' => 'xmark',
                       'color' => 'red'
                     ]
                     
                     
                   ];
 
                   foreach ($stats as $stat) {
                     include 'components/cards/stats.php';
                   }
             ?>
            
           </div>
             <div class="flex gap-5 mb-5">
            
            <div class="w-1/2">

            <?php include 'components/cards/chart.php'; ?>
            </div>
            <div class="w-1/2">
            <?php include 'components/cards/chartMain.php'; ?>
            </div>
          </div>
         
            <!-- Card -->
            <?php

            foreach ($response as $key => $value) {
              $shipments[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'quantity' => $value['freight_pallet_count_c'],
                'type' => $value['freight_type_c'],
                'tracking_number' => $value['truckerpath_ref_id_c'] ?? 'N/A',
                'pickup' => $value['pickup_address_c'],
                'dropoff' => $value['dropoff_address_c'],
                'amount' => '$' . $value['platform_price_c'] ?? '0.00',
                'status' => $value['status_c'] ?? 'Pending',
                'weight' => $value['freight_weight_c'] . 'lbs',
                'created_at' => $value['date_entered'],
                'vendor_status' => $value['vendor_status_c'] ?? '0',
              ];
            }

            ?>

           <?php include 'components/table/shipment.php'; ?>

           
          </div>
        </main>
      </div>
    </div>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
      echo '<script>Swal.fire({
        title: "Shipment deleted successfully!",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
      });</script>';
    } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
      echo '<script>Swal.fire({
        title: "Failed to delete shipment!",
        icon: "error",
        showConfirmButton: false,
        timer: 1500
      });</script>';
    }
    ?>
  </body>
</html>
