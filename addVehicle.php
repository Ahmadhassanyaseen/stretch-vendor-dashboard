<?php include 'helper/globalHelper.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>

    
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class="container px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
               Add Vehicle
            </h2>
           
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <form action="helper/vehicle/add.php"  method="POST" class="space-y-6">
              <input type="hidden" name="vendor_id" value="<?php echo $userData['id']; ?>">
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                       Name
                      </label>
                      <input
                        type="text"
                        name="name"
                       
                        required
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                       
                      />
                      
                    </div>

                    <div class="w-full">
                      <label for="capacity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Capacity
                      </label>
                      <input
                        type="number"
                        id="capacity"
                        name="capacity"
                        
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                          Quantity
                        </label>
                        <input
                          type="number"
                          id="quantity"
                          name="quantity"
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter quantity"
                        />
                      </div>

                      <div>
                        <label for="hourly_rate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                         Hourly Rate
                        </label>
                        <input
                          type="number"
                          id="hourly_rate"
                          name="hourly_rate"
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter hourly rate"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mt-4 mb-4 w-full h-[1px] bg-gray-200 dark:bg-gray-700"/>
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Fuel Percentage
                      </label>
                      <input
                        type="number"
                        id="fuel_percentage"
                        name="fuel_percentage"
                       
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        placeholder="Enter fuel percentage"
                      />
                      
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="gratuity_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                      Gratuity Percentage
                      </label>
                      <input
                        type="number"
                        id="gratuity_percentage"
                        name="gratuity_percentage"
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        placeholder="Enter gratuity percentage"
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="mileage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                          Mileage
                        </label>
                        <input
                          type="number"
                          id="mileage"
                          name="mileage"
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter mileage"

                        />
                        <!-- <span id="contact_number_error" class="text-xs text-red-600 dark:text-red-400 mt-1 hidden"></span> -->
                        <!-- <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters with uppercase, lowercase, number & special character</p> -->
                      </div>

                      <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Status
                        </label>
                      <select name="status" id="status" class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300">
                          <option value="">Select Status</option>
                          <option value="Yes" >Active</option>
                          <option value="No" >Inactive</option>
                        </select>
                        <!-- <span id="confirm_password_error" class="text-xs text-red-600 dark:text-red-400 mt-1 hidden"></span> -->
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mt-4 mb-4 w-full h-[1px] bg-gray-200 dark:bg-gray-700"/>
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Pick Up Address
                      </label>
                      <input
                        type="text"
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        name="pickup_address"
                      
                      />
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="pickup_city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                      Pick Up City
                      </label>
                      <input
                        type="text"
                        id="pickup_city"
                        name="pickup_city"
                        
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="pickup_state" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                         Pick Up State
                        </label>
                        <input
                          type="text"
                          id="pickup_state"
                          name="pickup_state"
                          
                          
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter state"
                        />
                      </div>

                      <div>
                        <label for="availability" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Availability
                        </label>
                     
                       <select name="availability" id="availability" class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300">
                          <option value="">Select Availability</option>
                          <option value="every_day">Every Day</option>
                          <option value="every_weekend">Every Weekend</option>
                          <option value="every_month">Every Month</option>
                          <option value="fix_date">Fix Date</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
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
    </script>
  </body>
</html>
