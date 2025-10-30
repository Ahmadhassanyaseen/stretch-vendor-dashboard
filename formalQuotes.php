  

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
    $response = fetchAllVendorLeadsFormal($data);
    ?>
    
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class=" px-6 pb-10 mx-auto grid">
        <h1 class="text-3xl font-bold my-6 tracking-tight neon-red-header">
            Formal Quotes
          </h1>
         
          <!-- Cards -->
          
          

          <?php

            foreach ($response as $key => $value) {
              $shipments[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'price' => $value['platform_price_c'],
                'avg_price' => $value['platform_price_c'],
                'quantity' => $value['freight_pallet_count_c'],
                'type' => $value['freight_type_c'],
                'tracking_number' => $value['opertunity_id_c'] ?? 'N/A',
                'pickup' => $value['pickup_address_c'],
                'pickup_date' => $value['pickup_date_c'] ?? 'N/A',
                'dropoff' => $value['dropoff_address_c'],
                'dropoff_date' => $value['dropoff_date_c'] ?? 'N/A',
                'amount' => '$' . $value['platform_price_c'] ?? '0.00',
                'status' => $value['status_c'] ?? 'Pending',
                'weight' => $value['freight_weight_c'] . 'lbs',
                'created_at' => $value['date_entered'],
                'vendor_status' => $value['vendor_status_c'] ?? '0',
                'deadhead' => $value['deadhead_distance_c'] ?? '0',
                'broker' => $value['name'] ?? '0',
                'equipment' => $value['carrier_vehicle_type_c'] ?? '0',

                'signed_agreement_link' => $value['signed_agreement_link_c'] ?? '#',
              ];
            }

            ?>

           <?php include 'components/table/loads.php'; ?>

         
        </div>
      </main>
    </div>
  </div>
  
</body>
</html>
