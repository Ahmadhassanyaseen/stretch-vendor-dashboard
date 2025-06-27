<?php 
// session_start();
include 'config/config.php';
include 'helper/globalHelper.php';

$statusMsg = '';
if(isset($_GET['status']) && $_GET['status'] == 'success'){
    $statusMsg = 'Profile updated successfully';
}else if(isset($_GET['status']) && $_GET['status'] == 'error'){
    $statusMsg = 'Some Error Occurred';
}

// Check if user is logged in
if (!isset($userData)) {
    header('Location: login.php');
    exit();
}

$user = $userData;


// Handle form submission

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile - Stretch XL Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.css" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="./assets/css/variable.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->

    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         function logout(){
        Swal.fire({
          title: "Are you sure?",
          text: "You want to logout?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, logout!"
        }).then((result) => {
          if (result.isConfirmed) {
            // Clear PHP session via AJAX
            fetch('./helper/logout.php')
              .then(() => {
                Swal.fire({
                  title: "Logout!",
                  text: "You have been logged out.",
                  icon: "success"
                });
                setTimeout(() => {
                  localStorage.removeItem('vendor');
                  window.location.href = 'login.php';
                }, 1000);
              });
          }
        });
      }
    </script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
      <?php include 'components/layout/sidebar.php'; ?>
      <div class="flex flex-col flex-1 w-full">
        <?php include 'components/layout/topbar.php'; ?>
        <main class="h-full overflow-y-auto">
          <div class=" px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Profile
            </h2>

           

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <form method="POST" class="space-y-6" action="helper/update.php" id="profileForm">
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Email
                      </label>
                      <input
                        type="email"
                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        disabled
                      />
                      <input
                        type="hidden"
                        name="email"
                        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                        
                      />
                      <p class="mt-1 text-xs text-gray-500">Email cannot be changed</p>
                    </div>

                    <div class="w-full">
                      <label for="user_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Username
                      </label>
                      <input
                        type="text"
                        id="user_name"
                        name="user_name"
                        value="<?= htmlspecialchars($user['name'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                          New Password
                        </label>
                        <input
                          type="password"
                          id="new_password"
                          name="new_password"
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter new password"
                        />
                        <span id="new_password_error" class="text-xs text-red-600 dark:text-red-400 mt-1 hidden"></span>
                        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters with uppercase, lowercase, number & special character</p>
                      </div>

                      <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                          Confirm New Password
                        </label>
                        <input
                          type="password"
                          id="confirm_password"
                          name="confirm_password"
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Confirm new password"
                        />
                        <span id="confirm_password_error" class="text-xs text-red-600 dark:text-red-400 mt-1 hidden"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mt-4 mb-4 w-full h-[1px] bg-gray-200 dark:bg-gray-700"/>
                <div  class="flex xeno-gap">
                  <div class="space-y-4 w-full">
                    <div class="w-full">
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        DOT Number
                      </label>
                      <input
                        type="text"
                        value="<?= htmlspecialchars($user['dot_number'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        name="dot_number"
                      />
                      
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="mc_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                      MC Number
                      </label>
                      <input
                        type="text"
                        id="mc_number"
                        name="mc_number"
                        value="<?= htmlspecialchars($user['mc_number'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                          Contact Number
                        </label>
                        <input
                          type="text"
                          id="contact_number"
                          name="contact_number"
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter contact number"
                          value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                        />
                        <!-- <span id="contact_number_error" class="text-xs text-red-600 dark:text-red-400 mt-1 hidden"></span> -->
                        <!-- <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters with uppercase, lowercase, number & special character</p> -->
                      </div>

                      <div>
                        <label for="vnd_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Type
                        </label>
                      <select name="vnd_type" id="vnd_type" class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300">
                          <option value="">Select Type</option>
                          <option value="Interstate" <?= $user['vnd_type'] == 'Interstate' ? 'selected' : '' ?>>Interstate</option>
                          <option value="Intrastate" <?= $user['vnd_type'] == 'Intrastate' ? 'selected' : '' ?>>Intrastate</option>
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
                        Street
                      </label>
                      <input
                        type="text"
                        value="<?= htmlspecialchars($user['street'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        name="street"
                      
                      />
                      <!-- <p class="mt-1 text-xs text-gray-500">DOT Number cannot be changed</p> -->
                    </div>

                    <div class="w-full">
                      <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                      City
                      </label>
                      <input
                        type="text"
                        id="city"
                        name="city"
                        value="<?= htmlspecialchars($user['city'] ?? '') ?>"
                        class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                        required
                      />
                    </div>
                  </div>

                  <div class="w-full">
                    <!-- <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 mt-4">Change Password</h3> -->
                    
                    <div class="space-y-4">
                      

                      <div>
                        <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                         State
                        </label>
                        <input
                          type="text"
                          id="state"
                          name="state"
                          value="<?= htmlspecialchars($user['state'] ?? '') ?>"
                          class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                          placeholder="Enter state"
                        />
                      </div>

                      <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Zip Code
                        </label>
                      <input type="text" id="zip" name="zip" value="<?= htmlspecialchars($user['zip'] ?? '') ?>" class="w-full px-3 py-2 mt-2 border rounded-md dark:bg-gray-700 dark:text-gray-300" placeholder="Enter zip code" />
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
      // Validation patterns
      const patterns = {
          password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
      };

      // Error messages
      const errorMessages = {
          current_password: {
              required: 'Current password is required'
          },
          new_password: {
              required: 'Password is required',
              invalid: 'Must include uppercase, lowercase, number & special character'
          },
          confirm_password: {
              required: 'Please confirm your password',
              invalid: 'Passwords do not match'
          }
      };

      // Validate field on input
      function validateField(field, value, compareValue = null) {
          const input = document.getElementById(field);
          const errorElement = document.getElementById(`${field}_error`);
          let isValid = true;
          let message = '';

          // Reset styles
          if (input) input.classList.remove('border-red-500', 'border-green-500');
          if (errorElement) errorElement.classList.add('hidden');

          // Skip validation if field is empty (handled on blur or submit)
          if (value === '') {
              return true;
          }

          // Field-specific validation
          switch(field) {
              case 'new_password':
                  isValid = patterns.password.test(value);
                  message = isValid ? '' : errorMessages.new_password.invalid;
                  break;
              case 'confirm_password':
                  const newPassword = document.getElementById('new_password')?.value;
                  isValid = value === newPassword;
                  message = isValid ? '' : errorMessages.confirm_password.invalid;
                  break;
          }

          // Update UI
          if (!isValid && value && input && errorElement) {
              input.classList.add('border-red-500');
              errorElement.textContent = message;
              errorElement.classList.remove('hidden');
          } else if (isValid && value && input) {
              input.classList.add('border-green-500');
          }

          return isValid;
      }

      // Validate on blur
      function validateOnBlur(field) {
          const input = document.getElementById(field);
          if (!input) return true;
          
          const value = input.value.trim();
          
          if (field === 'confirm_password') {
              const newPassword = document.getElementById('new_password')?.value;
              return validateField(field, value, newPassword);
          }
          return validateField(field, value);
      }

      // Show error message
      function showError(field, message) {
          const input = document.getElementById(field);
          const errorElement = document.getElementById(`${field}_error`);
          
          if (input) input.classList.add('border-red-500');
          if (errorElement) {
              errorElement.textContent = message;
              errorElement.classList.remove('hidden');
          }
      }

      

      // Add event listeners for real-time validation
      document.addEventListener('DOMContentLoaded', function() {
          const fields = ['new_password', 'confirm_password'];
          fields.forEach(field => {
              const element = document.getElementById(field);
              if (element) {
                  element.addEventListener('input', (e) => {
                      if (field === 'confirm_password') {
                          const newPassword = document.getElementById('new_password')?.value;
                          validateField(field, e.target.value, newPassword);
                      } else {
                          validateField(field, e.target.value);
                      }
                  });
                  
                  element.addEventListener('blur', () => validateOnBlur(field));
              }
          });
      });
    </script>
    <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
    <script>
        Swal.fire({
            title: "Success!",
            text: "<?= $statusMsg ?>",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
    <?php }elseif(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
    <script>
        Swal.fire({
            title: "Error!",
            text: "<?= $statusMsg ?>",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
    <?php } ?>
  </body>
</html>