<?php include 'config/config.php'; ?>

<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class=" px-6 pb-10 mx-auto">
            <div class="flex justify-between items-center">

            <h1 class="text-3xl font-bold my-6 tracking-tight neon-red-header">
              Vehicles
            </h1>
            <a href="addVehicle.php" class="bgBlue text-white py-2 px-4 rounded">
            Add Vehicle
            </a>
            
          </div>
            
            
            <?php


if (isset($_COOKIE["vendor"])) {
    $userData = json_decode($_COOKIE["vendor"], true);
} else {
    $userData = [];
}

          
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
