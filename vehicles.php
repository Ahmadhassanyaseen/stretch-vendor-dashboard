<?php include 'config/config.php'; ?>
<?php include 'helper/globalHelper.php'; ?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class=" px-6 pb-10 mx-auto">
            <div class="flex justify-between items-center">

              <h2
              class="my-6 text-2xl font-semibold text-gray-700 "
              >
              Vehicles
            </h2>
            <a href="addVehicle.php" class="bg-blue-600 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Add Vehicle
            </a>
            
          </div>
            
            
            <?php
            
          
                  $data['id'] = $userData['id'];
                  $response = fetchAllVendorVehicles($data);

                  foreach($response as $key => $value){
                    $vehicles[] = [
                      'id' => $value['id'],
                      'name' => $value['name'],
                      'quantity' =>$value['vehicle_quantity'],
                      'capacity' => $value['vehicle_capacity'],
                      'hourly_rate' => $value['base_hourly_rate'] ?? 'N/A',
                      'pickup_address' => $value['pickup_address_c'] ?? 'Pending',
                      'availability' =>ucfirst(str_replace('_', ' ', $value['availability_type_c'])),
                      'fuel_percentage' => $value['fuel_surcharge_percentage'],
                      'gratuity_percentage' => $value['driver_gratuity_percentage'],
                      'created_at' => $value['date_entered'],
                      'status' => $value['published_c'] ?? 'Pending',
                    
                    ];
                  }

            ?>

           <?php include 'components/table/vehicle.php'; ?>

           
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
