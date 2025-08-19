  

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
    $response = fetchAllVendorLeadsConverted($data);
    ?>
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class=" px-6 pb-10 mx-auto grid">
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-white"
          >
            Formal Quotes
          </h2>
         
          <!-- Cards -->
          
          

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
                'signed_agreement_link' => $value['signed_agreement_link_c'] ?? '#',
              ];
            }

            ?>

           <?php include 'components/table/quotes.php'; ?>

         
        </div>
      </main>
    </div>
  </div>
  
</body>
</html>
