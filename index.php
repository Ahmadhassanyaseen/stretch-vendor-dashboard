  

  <?php include 'config/config.php'; ?>

  <?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto">
          <div class=" px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-white"
            >
              Vendor Dashboard
            </h2>
           
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
             <?php

if (isset($_COOKIE['vendor'])) {
  $userData = json_decode($_COOKIE['vendor'], true);
} else {
  $userData = [];
}

$data['id'] = $userData['id'];
$response = fetchAllVendorLeads($data);

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
      return $carry + (in_array(strtolower($item['status_c']), ['assigned', 'in progress', 'in_progress', 'inprocess']) ? 1 : 0);
    }, 0),
    'icon' => 'clock',
    'color' => 'blue'
  ],
  [
    'title' => 'Completed Shipments',
    'value' => array_reduce($response, function ($carry, $item) {
      return $carry + (strtolower($item['status_c']) === 'completed' ? 1 : 0);
    }, 0),
    'icon' => 'check',
    'color' => 'green'
  ],
  [
    'title' => 'Cancelled/Dead Shipments',
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
            <?php

            foreach ($response as $key => $value) {
              $shipments[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'quantity' => $value['freight_box_count_c'],
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
