<?php include 'config/config.php'; ?>
<?php include 'helper/globalHelper.php'; ?>
<?php include 'components/layout/header.php'; ?>
    <?php include 'components/layout/sidebar.php'; ?>

    <?php
    $data['id'] = $_GET['id'];
    $response = fetchVehicleById($data);
    // print_r($response);

    ?>
     
      <div class="flex flex-col flex-1 w-full">
       <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto pb-10">
          <div class="container px-6 pb-10 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
               Edit Vehicle
            </h2>
           
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <form action="helper/vehicle/update.php" enctype="multipart/form-data" method="POST" class="space-y-6">
              <input type="hidden" name="vendor_id" value="<?php echo $userData['id']; ?>">
              <input type="hidden" name="id" value="<?= $response['id'] ?>">
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                       Name
                      </label>
                      <input
                        type="text"
                        name="name"
                        value="<?= $response['name'] ?>"
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
                        value="<?= $response['capacity'] ?>"
                        
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
                          value="<?= $response['quantity'] ?>"
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
                          value="<?= $response['hourly_rate'] ?>"
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
                        value="<?= $response['fuel_percentage'] ?>"
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
                        value="<?= $response['gratuity_percentage'] ?>"
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
                          value="<?= $response['mileage'] ?>"
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
                          <option value="Yes" <?= $response['status'] == 'Yes' ? 'selected' : '' ?> >Active</option>
                          <option value="No" <?= $response['status'] == 'No' ? 'selected' : '' ?> >Inactive</option>
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
                        value="<?= $response['pickup_address'] ?>"
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
                        value="<?= $response['pickup_city'] ?>"
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
                          value="<?= $response['pickup_state'] ?>"
                          
                          
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
                          <option value="every_day" <?= $response['availability'] == 'every_day' ? 'selected' : '' ?>>Every Day</option>
                          <option value="every_weekend" <?= $response['availability'] == 'every_weekend' ? 'selected' : '' ?>>Every Weekend</option>
                          <option value="every_month" <?= $response['availability'] == 'every_month' ? 'selected' : '' ?>>Every Month</option>
                          <option value="fix_date" <?= $response['availability'] == 'fix_date' ? 'selected' : '' ?>>Fix Date</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="w-full mt-4">
                  <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Images
                  </label>
                  <input type="file" name="images[]" id="images" max="3"   class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300" multiple>
                </div>
                
              <div id="imagePreview" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
                  <?php 
                  if (!empty($response['images'])) {
                      $images = explode('|', $response['images']);
                      foreach ($images as $image) {
                          if (!empty($image)) {
                              $imagePath = 'vehicles/' . $userData['id'] . '/' . $image;
                              echo '<div class="preview-container" style="position: relative; display: inline-block; margin: 5px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">';
                              echo '<img src="' . $imagePath . '" style="width: 100%; height: 100%; object-fit: contain; border-radius: 5px;">';
                              echo '<span class="remove-existing-image" data-image="' . $image . '" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; cursor: pointer; font-size: 16px; font-weight: bold;">×</span>';
                              echo '<input type="hidden" name="existing_images[]" value="' . $image . '">';
                              echo '</div>';
                          }
                      }
                  }
                  ?>
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

        // $(document).ready(function() {
        //   // Handle image preview with remove functionality
        //   $('#images').on('change', function() {
        //     var files = this.files;
        //     var imagePreview = $('#imagePreview');
        //     imagePreview.empty();
            
        //     for (var i = 0; i < files.length; i++) {
        //       (function(file) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //           var previewContainer = $('<div class="preview-container">').css({
        //             'position': 'relative',
        //             'display': 'inline-block',
        //             'margin': '5px',
        //             // 'width': '150px',
        //             // 'height': '150px',
        //             'border': '1px solid #ddd',
        //             'border-radius': '5px',
        //             'overflow': 'hidden'
        //           });
                  
        //           var img = $('<img>').attr('src', e.target.result).css({
        //             'width': '100%',
        //             'height': '100%',
        //             'object-fit': 'contain',
        //             'border-radius': '5px'
        //           });
                  
        //           var removeBtn = $('<span class="remove-image">×</span>').css({
        //             'position': 'absolute',
        //             'top': '5px',
        //             'right': '5px',
        //             'background': 'red',
        //             'color': 'white',
        //             'border-radius': '50%',
        //             'width': '20px',
        //             'height': '20px',
        //             'text-align': 'center',
        //             'line-height': '20px',
        //             'cursor': 'pointer',
        //             'font-size': '16px',
        //             'font-weight': 'bold'
        //           });
                  
        //           removeBtn.on('click', function(e) {
        //             e.stopPropagation();
        //             previewContainer.remove();
        //             updateFileInput();
        //           });
                  
        //           previewContainer.append(img).append(removeBtn);
        //           imagePreview.append(previewContainer);
        //         };
        //         reader.readAsDataURL(file);
        //       })(files[i]);
        //     }
        //   });
          
        //   // Function to update the file input after removing a preview
        //   function updateFileInput() {
        //     var input = $('#images');
        //     var files = input[0].files;
        //     var newFiles = new DataTransfer();
        //     var previews = $('.preview-container');
            
        //     // Map existing previews to their files
        //     previews.each(function(index) {
              
        //       newFiles.items.add(files[index]);
        //     });
            
          
        //   }
        //   // Add this inside your $(document).ready() function
        //     // Handle click on remove button for existing images
        //     $(document).on('click', '.remove-existing-image', function() {
        //         if (confirm('Are you sure you want to remove this image?')) {
        //             var imageToRemove = $(this).data('image');
        //             $('<input>').attr({
        //                 type: 'hidden',
        //                 name: 'removed_images[]',
        //                 value: imageToRemove
        //             }).appendTo('form');
        //             $(this).parent().remove();
        //         }
        //     });

        //     // Update the updateFileInput function to handle both new and existing files
        //         function updateFileInput() {
        //             var input = $('#images');
        //             var files = input[0].files;
        //             var newFiles = new DataTransfer();
        //             var previews = $('.preview-container:has(img[src^="data:"])');
                    
        //             previews.each(function(index) {
        //                 newFiles.items.add(files[index]);
        //             });
                    
        //             // Update the file input with the new files
        //             input[0].files = newFiles.files;
        //         }
        // });
    
        $(document).ready(function() {
    // Handle image preview with remove functionality
    $('#images').on('change', function() {
        var files = this.files;
        var imagePreview = $('#imagePreview');
        
        // Don't empty the container, we want to keep existing images
        // imagePreview.empty();
        
        for (var i = 0; i < files.length; i++) {
            (function(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewContainer = $('<div class="preview-container new-image">').css({
                        'position': 'relative',
                        'display': 'inline-block',
                        'margin': '5px',
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
                    
                    var removeBtn = $('<span class="remove-new-image">×</span>').css({
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
    
    // Handle click on remove button for existing images
    $(document).on('click', '.remove-existing-image', function() {
        if (confirm('Are you sure you want to remove this image?')) {
            var imageToRemove = $(this).data('image');
            $('<input>').attr({
                type: 'hidden',
                name: 'removed_images[]',
                value: imageToRemove
            }).appendTo('form');
            $(this).parent().remove();
        }
    });

    // Handle click on remove button for new images
    $(document).on('click', '.remove-new-image', function() {
        $(this).parent().remove();
        updateFileInput();
    });

    // Function to update the file input after removing a preview
    function updateFileInput() {
        var input = $('#images');
        var newFiles = new DataTransfer();
        var newPreviews = $('.preview-container.new-image');
        
        // Update the file input with remaining files
        newPreviews.each(function(index) {
            newFiles.items.add(input[0].files[index]);
        });
        
        input[0].files = newFiles.files;
    }
});
    </script>
  </body>
</html>
