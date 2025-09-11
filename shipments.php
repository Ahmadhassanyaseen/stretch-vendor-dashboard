


<?php include 'config/config.php'; ?>
<?php 
if (isset($_COOKIE["vendor"])) {
  $userData = json_decode($_COOKIE["vendor"], true);
} else {
  $userData = [];
}
?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class=" px-6 pb-10 mx-auto grid">
          <h1 class="text-3xl font-bold my-6 tracking-tight neon-red-header">
              Shipments
            </h1>
           
            
            
            <?php
       

$data['id'] = $userData['id'];
$response = fetchAllVendorLeadsConverted($data);

foreach($response as $key => $value){
  $shipments[] = [
    'id' => $value['id'],
    'name' => $value['name'],
    'quantity' =>$value['freight_box_count_c'],
    'type' => $value['freight_type_c'],
    'tracking_number' => $value['truckerpath_ref_id_c'] ?? 'N/A',
    'pickup' => $value['pickup_address_c'],
    'dropoff' => $value['dropoff_address_c'],
    'amount' => '$' . $value['total_price_c'] ?? '0.00',
    'status' => $value['status_c'] ?? 'Pending',
    'weight' => $value['freight_weight_c'].'lbs',
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
  </body>
</html>
