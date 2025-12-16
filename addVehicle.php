
<?php include 'config/config.php'; ?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; 
    
    if (isset($_COOKIE["vendor"])) {
      $userData = json_decode($_COOKIE["vendor"], true);
  } else {
      $userData = [];
  }
    ?>

    
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class="container px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-white"
            >
               Add Vehicle
            </h2>
           
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 text-gray-700 dark:text-white">
              <form action="helper/vehicle/add.php"  method="POST" class="space-y-6" enctype="multipart/form-data">
              <input type="hidden" name="vendor_id" value="<?php echo $userData['id']; ?>">
                <div  class="flex gap-4">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                       Name
                      </label>
                      <input
                        type="text"
                        name="name"
                        required
                        class="w-full px-3 py-2 mt-2 border rounded-md"
                      />
                      
                      <div class="mt-4">
                        <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                          Vehicle Type
                        </label>
                        <select
                          id="vehicle_type"
                          name="vehicle_type"
                
                          class="w-full px-3 py-2 mt-2 border rounded-md"
                        >
                          <option value="" class="text-gray-700">Select Vehicle Type</option>
                          <option value="aircraft_LD3_ULD" class="text-gray-700">Aircraft - LD3 ULD (3,500lb Max)</option>
                          <option value="aircraft_LD7_pallet" class="text-gray-700">Aircraft - LD7 Pallet (13,000lb Max)</option>
                          <option value="aircraft_freighter" class="text-gray-700">Aircraft - Freighter (100-140ton Max)</option>
                          <option value="auto_carrier_trailer" class="text-gray-700">Auto Carrier Trailer - Open Carrier (20-30,000lb Max)</option>
                          <option value="auto_carrier_trailer2" class="text-gray-700">Auto Carrier Trailer - Enclosed Carrier (10-20,000lb Max)</option>
                          <option value="barge_inland" class="text-gray-700">Inland Barge (1,500–3,000 tons)</option>
                          <option value="barge_costal" class="text-gray-700">Coastal Barge (5,000–10,000 tons)</option>
                          <option value="bulk_carrier_ship" class="text-gray-700">Bulk Carrier Ship - Handy Size (20,000–40,000 DWT)</option>
                          <option value="bulk_carrier_ship2" class="text-gray-700">Bulk Carrier Ship - Panamax (60,000–80,000 DWT)</option>
                          <option value="container_ship_20" class="text-gray-700">Container Ship - 20' TEU (20'L x 8'W x 8.5'H, 33.2 m³, ~48,000 lbs Max)</option>
                          <option value="container_ship_40" class="text-gray-700">Container Ship - 40' Standard (40'L x 8'W x 8.5'H, 67.7 m³, ~67,000 lbs Max)</option>
                          <option value="container_ship_HC" class="text-gray-700">Container Ship - 40' High-Cube (40'L x 8'W x 9.5'H, 76.3 m³, ~67,000 lbs Max)</option>
                          <option value="container_ship_45HC" class="text-gray-700">Container Ship - 45' High-Cube (45'L x 8'W x 9.5'H, 86 m³, ~67,000 lbs Max)</option>
                          <option value="day_cab_4x2" class="text-gray-700">Day Cab Tractor - 4x2 (18-22'L x 8'W x 10-12'H, 45,000 lbs Max)</option>
                          <option value="day_cab_6x4" class="text-gray-700">Day Cab Tractor - 6x4 (18-22'L x 8'W x 10-12'H, 45,000-48,000 lbs Max)</option>
                          <option value="day_cab_10x6" class="text-gray-700">Day Cab Tractor - 10x6 (18-22'L x 8'W x 10-12'H, 80,000+ lbs Max with Permits)</option>
                          <option value="double_drop_trailer" class="text-gray-700">Double Drop Trailer - RGN Deck (48–53'L x 8.5'W x 3–3.5'H, ~40,000–80,000 lbs)</option>
                          <option value="double_drop_trailer2" class="text-gray-700">Double Drop Trailer - RGN Well (26–29'L, height up to 11.5–12'H)</option>
                          <option value="drayage_4x2" class="text-gray-700">Drayage Tractor - 4x2 (18-22'L x 8'W x 10-12'H, 48,000 lbs Max)</option>
                          <option value="drayage_6x4" class="text-gray-700">Drayage Tractor - 6x4 (18-22'L x 8'W x 10-12'H, 48,000-67,000 lbs Max)</option>
                          <option value="drayage_10x6" class="text-gray-700">Drayage Tractor - 10x6 (18-22'L x 8'W x 10-12'H, 80,000+ lbs Max with Permits)</option>
                          <option value="dry_van_trailer_48" class="text-gray-700">Dry Van Trailer - 48' Trailer (48'L x 8.5'W x 8.5'H, ~3,400 ft³, ~45,000 lbs Max)</option>
                          <option value="dry_van_trailer_53" class="text-gray-700">Dry Van Trailer - 53' Trailer (53'L x 8.5'W x 8.5'H, ~3,800 ft³, ~45,000 lbs Max)</option>
                          <option value="flatbed_trailer_48" class="text-gray-700">Flat Bed Trailer - 48' Trailer (48'L x 8.5'W x 5'H, ~48,000 lbs Max)</option>
                          <option value="flatbed_trailer_53" class="text-gray-700">Flat Bed Trailer - 53' Trailer (53'L x 8.5'W x 5'H, ~48,000 lbs Max)</option>
                          <option value="freight_train_boxcar" class="text-gray-700">Freight Train - Boxcar (50–60'L x 9.5'W x 10–13'H, ~4,500–6,000 ft³, 100–150 tons)</option>
                          <option value="freight_train_flatcar" class="text-gray-700">Freight Train - Flatcar Container (60–89'L x 9.5'W, carries 2x20' or 1x40'/53' containers, ~100–150 tons)</option>
                          <option value="freight_train_tankcar" class="text-gray-700">Freight Train - Tankcar (40–60'L, 10,000–30,000 gallons, ~80–120 tons)</option>
                        </select>
                      </div>
                      
                    </div>

                    <div class="w-full">
                      <label for="capacity" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                        Capacity
                      </label>
                      <input
                        type="number"
                        id="capacity"
                        name="capacity"
                        
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md  "
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                   
                    <div class="space-y-4">
                      

                      <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                          Quantity
                        </label>
                        <input
                          type="number"
                          id="quantity"
                          name="quantity"
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md "
                          placeholder="Enter quantity"
                        />
                      </div>

                      <div>
                        <label for="hourly_rate" class="block text-sm font-medium text-gray-700 dark:text-white">
                         Hourly Rate
                        </label>
                        <input
                          type="number"
                          id="hourly_rate"
                          name="hourly_rate"
                          step="0.01"
                          min="0"
                          inputmode="decimal"
                          lang="en" 
                          class="w-full px-3 py-2 mt-2 border rounded-md "
                          placeholder="Enter hourly rate"
                        />
                      </div>
                    </div>
                  </div>
                  
                </div>
                <hr class="mt-4 mb-4 w-full h-[1px] bg-gray-400 border-none"/>
                <div  class="flex gap-4">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-white">
                        Fuel Percentage
                      </label>
                      <input
                        type="number"
                        id="fuel_percentage"
                        name="fuel_percentage"
                       
                        class="w-full px-3 py-2 mt-2 border rounded-md"
                        placeholder="Enter fuel percentage"
                      />
                      
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="gratuity_percentage" class="block text-sm font-medium text-gray-700 dark:text-white">
                      Gratuity Percentage
                      </label>
                      <input
                        type="number"
                        id="gratuity_percentage"
                        name="gratuity_percentage"
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md  "
                        placeholder="Enter gratuity percentage"
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="mileage" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                          Mileage
                        </label>
                       <input
                          type="number"
                          id="mileage"
                          name="mileage"
                          step="0.01"
                          min="0"
                          inputmode="decimal"
                          lang="en" 
                          class="w-full px-3 py-2 mt-2 border rounded-md"
                          placeholder="0.00"
                        />
                     </div>

                      <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                        Status
                        </label>
                      <select name="status" id="status" class="w-full px-3 py-2 mt-2 border rounded-md  ">
                          <option value="" class="text-gray-700">Select Status</option>
                          <option value="Yes" class="text-gray-700" selected>Active</option>
                          <option value="No" class="text-gray-700">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mt-4 mb-4 w-full h-[1px] bg-gray-400 border-none "/>
                <div  class="flex gap-4">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                        Pick Up Address
                      </label>
                      <input
                        type="text"
                        required
                        class="w-full px-3 py-2 mt-2 border rounded-md  "
                        name="pickup_address"
                      
                      />
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="pickup_city" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                      Pick Up City
                      </label>
                      <input
                        type="text"
                        id="pickup_city"
                        name="pickup_city"
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md  "
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="pickup_state" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                         Pick Up State
                        </label>
                        <input
                          type="text"
                          id="pickup_state"
                          name="pickup_state"
                          required
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md  "
                          placeholder="Enter state"
                        />
                      </div>

                      <div>
                        <label for="availability" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                        Availability
                        </label>
                     
                       <select name="availability" id="availability" class="w-full px-3 py-2 mt-2 border rounded-md  " required>
                          <option value="" class="text-gray-700">Select Availability</option>
                          <option value="every_day" class="text-gray-700">Every Day</option>
                          <option value="every_weekend" class="text-gray-700">Every Weekend</option>
                          <option value="every_month" class="text-gray-700">Every Month</option>
                          <option value="fix_date" class="text-gray-700">Fix Date</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="w-full mt-4">
                  <label for="images" class="block text-sm font-medium text-gray-700 dark:text-white mb-1">
                  Images
                  </label>
                  <input type="file" name="images[]" id="images" max="3"   class="w-full px-3 py-2 mt-2 border rounded-md  " multiple>
                </div>
                <div id="imagePreview" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">

                </div>
                
                
             
                
                
                <div class="flex  mt-4">
                  <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-primary-color rounded-md hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color"
                  >
                    Save Changes
                  </button>
                </div>
              </form>
            </div>
            
            
            

           
          </div>
        </main>
      </div>
    </div>
<script>
  const mileageEl = document.getElementById('mileage');
  if (mileageEl) {
    mileageEl.addEventListener('blur', () => {
      const v = mileageEl.value;
      if (v !== '' && !isNaN(v)) {
        mileageEl.value = parseFloat(v).toFixed(2);
      }
    });
  }
  const hourly_rate = document.getElementById('hourly_rate');
  if (hourly_rate) {
    hourly_rate.addEventListener('blur', () => {
      const v = hourly_rate.value;
      if (v !== '' && !isNaN(v)) {
        hourly_rate.value = parseFloat(v).toFixed(2);
      }
    });
  }
</script>
    <script>
        <?php if(isset($_GET['success']) && $_GET['success'] == 1){ ?>
            Swal.fire({
                icon: 'success',
                title: 'Vehicle updated successfully',
                showConfirmButton: false,
                timer: 1500
            });
        
        <?php } ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Vehicle update failed',
                showConfirmButton: false,
                timer: 1500
            });
        
        <?php } ?>


        $(document).ready(function() {
          // Handle image preview with remove functionality
          $('#images').on('change', function() {
            var files = this.files;
            var imagePreview = $('#imagePreview');
            imagePreview.empty();
            
            for (var i = 0; i < files.length; i++) {
              (function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  var previewContainer = $('<div class="preview-container">').css({
                    'position': 'relative',
                    'display': 'inline-block',
                    'margin': '5px',
                    // 'width': '150px',
                    // 'height': '150px',
                    'border': '1px solid #ddd',
                    'border-radius': '5px',
                    'overflow': 'hidden'
                  });
                  
                  var img = $('<img>').attr('src', e.target.result).css({
                    'width': '100%',
                    'height': '100%',
                    'object-fit': 'contain',
                    'border-radius': '5px'
                  });
                  
                  var removeBtn = $('<span class="remove-image">×</span>').css({
                    'position': 'absolute',
                    'top': '5px',
                    'right': '5px',
                    'background': 'red',
                    'color': 'white',
                    'border-radius': '50%',
                    'width': '20px',
                    'height': '20px',
                    'text-align': 'center',
                    'line-height': '20px',
                    'cursor': 'pointer',
                    'font-size': '16px',
                    'font-weight': 'bold'
                  });
                  
                  removeBtn.on('click', function(e) {
                    e.stopPropagation();
                    previewContainer.remove();
                    updateFileInput();
                  });
                  
                  previewContainer.append(img).append(removeBtn);
                  imagePreview.append(previewContainer);
                };
                reader.readAsDataURL(file);
              })(files[i]);
            }
          });
          
          // Function to update the file input after removing a preview
          function updateFileInput() {
            var input = $('#images');
            var files = input[0].files;
            var newFiles = new DataTransfer();
            var previews = $('.preview-container');
            
            // Map existing previews to their files
            previews.each(function(index) {
              // We're just keeping track of the remaining files
              // Note: This is a simplified approach and works for display
              // For a complete solution, you might need to use File API to reconstruct the FileList
              newFiles.items.add(files[index]);
            });
            
            // Note: Directly modifying the files property isn't possible for security reasons
            // This is a common limitation with file inputs
            // The preview will be removed, but the actual file input won't be modified
            // For a complete solution, you might need to use a hidden input or a different approach
          }
        });
    </script>
  </body>
</html>
