<?php
// Get email and username from URL parameters
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
if($username == ''){
    $username = explode('@', $email)[0];
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complete Your Registration - StretchXL Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="./assets/css/variable.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      .error {
        color: #e53e3e;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: none;
      }
      .error.show {
        display: block;
      }
      .form-input.error-border {
        border-color: #e53e3e;
      }
      .form-input.success-border {
        border-color: #38a169;
      }
      .account-info {
        background-color: #f3f4f6;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1.5rem;
      }
      .account-info p {
        margin: 0.25rem 0;
      }
    </style>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="./assets/img/forgot-password-office.jpeg"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="./assets/img/forgot-password-office-dark.jpeg"
              alt="Office"
            />
          </div>
          <form method="POST" id="signup-form" class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Complete Your Registration
              </h1>
              
              <div class="account-info mb-6">
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Username:</strong> <?php echo $username; ?></p>
              </div>

              <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
              <input type="hidden" id="user_name" name="user_name" value="<?php echo $username; ?>">

              <div class="mb-4">
                <label class="block text-sm text-gray-700 dark:text-gray-400 mb-1" for="password">
                  Create Password
                </label>
                <input
                  class="w-full px-3 py-2 text-sm border rounded-lg focus:border-primary-color focus:outline-none focus:ring-1 focus:ring-primary-color"
                  id="password"
                  name="password"
                  type="password"
                  placeholder="Enter your password"
                  required
                  minlength="8"
                />
                <div id="password-error" class="error">Password must be at least 8 characters long and include numbers and special characters</div>
              </div>

              <div class="mb-6">
                <label class="block text-sm text-gray-700 dark:text-gray-400 mb-1" for="confirm_password">
                  Confirm Password
                </label>
                <input
                  class="w-full px-3 py-2 text-sm border rounded-lg focus:border-primary-color focus:outline-none focus:ring-1 focus:ring-primary-color"
                  id="confirm_password"
                  name="confirm_password"
                  type="password"
                  placeholder="Confirm your password"
                  required
                />
                <div id="confirm-password-error" class="error">Passwords do not match</div>
              </div>

              <button
                class="w-full px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-primary-color border border-transparent rounded-lg hover:bg-primary-color-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-color"
                type="submit"
              >
                Complete Registration
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('signup-form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirm-password-error');

        // Password validation pattern
        const passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

        function validatePassword() {
          const isValid = passwordPattern.test(password.value);
          if (!isValid) {
            password.classList.add('error-border');
            password.classList.remove('success-border');
            passwordError.classList.add('show');
            return false;
          } else {
            password.classList.remove('error-border');
            password.classList.add('success-border');
            passwordError.classList.remove('show');
            return true;
          }
        }

        function validateConfirmPassword() {
          const passwordsMatch = password.value === confirmPassword.value;
          if (!passwordsMatch) {
            confirmPassword.classList.add('error-border');
            confirmPassword.classList.remove('success-border');
            confirmPasswordError.classList.add('show');
            return false;
          } else {
            confirmPassword.classList.remove('error-border');
            confirmPassword.classList.add('success-border');
            confirmPasswordError.classList.remove('show');
            return true;
          }
        }

        // Real-time validation
        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validateConfirmPassword);

        // Form submission
        form.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          const isPasswordValid = validatePassword();
          const isConfirmPasswordValid = validateConfirmPassword();

          if (!isPasswordValid || !isConfirmPasswordValid) {
            return;
          }

          try {
            // Show loading state
            Swal.fire({
              title: 'Please wait...',
              text: 'Creating your account...',
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading();
              }
            });

            const formData = new FormData(form);
            formData.append('method', 'updateVendor');

            const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
              method: 'POST',
              body: formData,
            });

            if (!response.ok) {
              throw new Error('Network response was not ok');
            }

            const result = await response.json();
            console.log('API Response:', result);

            if (result.status === 'success') {
              await Swal.fire({
                title: 'Success!',
                text: 'Your account has been created successfully. Please check your email to verify your account.',
                icon: 'success',
                confirmButtonText: 'OK'
              });
              window.location.href = 'login.php';
            } else {
              throw new Error(result.message || 'Failed to create account');
            }
          } catch (error) {
            console.error('Error:', error);
            Swal.fire({
              title: 'Error!',
              text: error.message || 'An error occurred while creating your account. Please try again later.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      });
    </script>
  </body>
</html>