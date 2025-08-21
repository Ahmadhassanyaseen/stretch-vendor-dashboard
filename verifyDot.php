<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify DOT/MC Number</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> -->
    <!-- <link rel="stylesheet" href="./assets/css/variable.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Alpine JS -->
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 ">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
           
            <img
              aria-hidden="true"
              class=" object-cover w-full h-full "
              src="./assets/img/signup.jpg"
              alt="Office"
            />
          </div>
          <form id="verify-dot-form" method="post" class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 "
              >
               Verify Dot/MC Number
              </h1>
              <label class="block text-sm">
                
                    
              <span class="text-gray-700">
                DOT/MC Number
                </span>
            
                <input
                  type="number"
                  id="dot_mc_number"
                  name="dot_mc_number"
                  class="block w-full mt-1 px-2 py-2 text-sm border  border-gray-400 rounded focus:border-[#D74559] focus:outline-none focus:shadow-outline-[#D74559] form-input"
                  placeholder="Enter DOT/MC Number"
                 
                />
                <span id="dot_mc_number_error" class="text-xs text-red-600 mt-1 hidden"></span>
              </label>
              <div class="my-4">
                <span class="block text-sm font-medium text-gray-700 mb-2">Verification Type</span>
                <div class="flex items-center space-x-6">
                  <label class="inline-flex items-center">
                    <input
                      type="radio"
                      name="verification_type"
                      value="dot"
                      class="form-radio text-[#D74559] focus:ring-[#D74559]"
                      checked
                    >
                    <span class="ml-2 text-gray-700">DOT Number</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input
                      type="radio"
                      name="verification_type"
                      value="mc"
                      class="form-radio text-[#D74559] focus:ring-[#D74559]"
                    >
                    <span class="ml-2 text-gray-700">MC Number</span>
                  </label>
                </div>
                <span id="verification_type_error" class="mt-1 text-xs text-red-600 hidden"></span>
              </div>
              
             

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button
                class="block cursor-pointer w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-[#D74559] border border-transparent rounded-lg active:bg-[#D74559] hover:bg-[#D74559] focus:outline-none focus:shadow-outline-[#D74559]"
                type="submit"
              >
                Verify
              </button>

              <hr class="my-8" />

             

              <p class="mt-4">
                <a
                  class="text-sm font-medium text-[#D74559]  hover:underline"
                  href="./login.php"
                >
                  Already have an account? Login
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
        document.getElementById('verify-dot-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm()) {
                // Get form values
                const data = {
                    dot_mc_number: document.getElementById('dot_mc_number').value.trim(),
                    verification_type: document.querySelector('input[name="verification_type"]:checked').value.trim()
                };
                

                console.log('Form data:', data);
                verifyDotMC(data);
                
                
            }
        });
        
        function validateForm() {
            let isValid = true;
            const dot_mc_number = document.getElementById('dot_mc_number').value.trim();
            

            // Validate all fields
            if (!dot_mc_number) {
                showError('dot_mc_number', 'DOT/MC Number is required');
                isValid = false;
            } 

        
            return isValid;
        }
        
        function showError(field, message) {
            const input = document.getElementById(field);
            const errorElement = document.getElementById(`${field}_error`);
            
            input.classList.add('border-red-500');
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
            
            // Scroll to the first error
            if (!document.querySelector('.border-red-500:first-of-type')) {
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        let dot_mc_number = document.getElementById('dot_mc_number');
        dot_mc_number.addEventListener('input', function() {
            // Remove any non-digit characters
            this.value = this.value.replace(/\D/g, '');
            
            // Limit to 8 digits
            if (this.value.length > 8) {
                this.value = this.value.slice(0, 8);
                showError('dot_mc_number', 'DOT/MC Number must be exactly 8 digits');
            } else if (this.value.length < 6) {
                showError('dot_mc_number', 'DOT/MC Number must be at least 6 digits long');
            } else {
                // Clear error if validation passes
                document.getElementById('dot_mc_number_error').classList.add('hidden');
            }
        });

        async function verifyDotMC(data){
            try {
        Swal.fire({
            title: 'Please wait...',
            text: 'Verifying DOT/MC number...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        const formData = new FormData();
       
        formData.append('dot_mc_number', document.getElementById('dot_mc_number').value);
        formData.append('verification_type', document.querySelector('input[name="verification_type"]:checked').value);
        formData.append('method', 'verifyDotMC');
        
        const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
            method: 'POST',
            body: formData,
        });
        
        const result = await response.json();
        console.log('Form data:', data);
        console.log('Server response:', result);
        // console.log('DOT Status:', result.data.CarrierDetails.dotNumber['@status']);  // "ACTIVE"
        // console.log('DOT Number:', result.data.CarrierDetails.dotNumber['#text']);    // "2941667"
        
        if (!result.data.valid) {
            Swal.fire({
                title: 'Error!',
                text:'DOT/MC Number is not active',
                icon: 'error',
                confirmButtonColor: '#D74559',
                confirmButtonText: 'Continue'
            });
            return; // Stop execution if there's an error
        }
        
        // Only show success if there was no error
        await Swal.fire({
            title: 'Success!',
            text: 'DOT/MC number verified successfully!',
            icon: 'success',
            confirmButtonColor: '#D74559',
            confirmButtonText: 'Continue'
        });
        let token = new Date().getTime();
        
        // Redirect after successful submission
        window.location.href = 'create-account.php?token=' + token;
            
    } catch (error) {
        console.error('Error creating account:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Failed to verify DOT/MC number. Please try again.',
            icon: 'error',
            confirmButtonColor: '#D74559',
            confirmButtonText: 'Continue'
        });
    }             
        }
      
    </script>
  </body>
</html>
