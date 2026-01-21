<?php 
// session_start();
include 'config/config.php';
if (isset($_COOKIE["vendor"])) {
  $userData = json_decode($_COOKIE["vendor"], true);
} else {
  $userData = [];
}
$trial = isset($_GET['trial'])  ? $_GET['trial'] : false;


// print_r($userData);

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
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment - Stretch XL Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card-front, .card-back {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            color: white;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            margin: 0 auto 2rem;
            transition: all 0.3s ease;
        }
        .card-back {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            margin-top: 1rem;
        }
        .card-logo {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .card-number {
            font-size: 1.25rem;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
        }
        .card-details {
            display: flex;
            justify-content: space-between;
        }
        .card-cvv {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-align: right;
            font-family: monospace;
            letter-spacing: 1px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4b5563;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        .form-input.invalid {
            border-color: #ef4444;
        }
        .form-input.valid {
            border-color: #10b981;
        }
        .input-group {
            display: flex;
            gap: 1rem;
        }
        .input-group > div {
            flex: 1;
        }
        .btn-submit {
            background: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
            width: 100%;
        }
        .btn-submit:hover {
            background: #4338ca;
        }
        .card-type {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 25px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .card-type.visible {
            opacity: 1;
        }
        .input-wrapper {
            position: relative;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 ">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Payment Information</h1>
        <p class="text-center text-gray-600 mb-8">Please enter your payment information to activate your tier.</p>
        <div class="flex justify-center max-w-5xl mx-auto items-center">
        <!-- Credit Card Preview -->
        <div class="card-preview mb-8 w-full">
            <div class="card-front">
                <div class="card-logo">
                    <i class="far fa-credit-card"></i>
                </div>
                <div id="cardNumberPreview" class="card-number">•••• •••• •••• ••••</div>
                <div class="card-details">
                    <div>
                        <div class="text-xs text-gray-200">CARD HOLDER</div>
                        <div id="cardNamePreview">FULL NAME</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-200">EXPIRES</div>
                        <div id="cardExpiryPreview">••/••</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <form id="paymentForm" class="max-w-lg w-full mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="form-group">
                <label class="form-label">Select Plan</label>
                <div class="flex  gap-10">
                    <?php if($trial){ ?>
                    <div class="flex items-center justify-center cursor-pointer">
                        <input type="radio" id="monthly" name="plan" value="0" checked class="mr-2">
                        <label for="monthly" class="text-[#4b5563] font-medium mb-0">Free Trial</label>
                    </div>
                    <?php }else{ ?>
                    <div class="flex items-center justify-center cursor-pointer">
                        <input type="radio" id="monthly" name="plan" value="35" checked class="mr-2">
                        <label for="monthly" class="text-[#4b5563] font-medium mb-0">$35 per month</label>
                    </div>
                    <div class="flex items-center justify-center cursor-pointer">
                        <input type="radio" id="yearly" name="plan" value="350" class="mr-2">
                        <label for="yearly" class="text-[#4b5563] font-medium mb-0">$350 per year</label>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="cardType" class="form-label">Card Type</label>
                <div class="input-wrapper">
                   <select id="cardType" class="form-input">
                        <option value="">Select Card Type</option>
                        <option value="VISA">Visa</option>
                        <option value="MASTERCARD">Mastercard</option>
                        <option value="AMEX">American Express</option>
                        <option value="DISCOVER">Discover</option>
                   </select>
                </div>
                <div id="cardTypeError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid card type</div>
            </div>
            <div class="form-group">
                <label for="cardNumber" class="form-label">Card Number</label>
                <div class="input-wrapper">
                    <input type="text" id="cardNumber" class="form-input" placeholder="1234 5678 9012 3456" maxlength="19" />
                    <div id="cardType" class="card-type"></div>
                </div>
                <div id="cardNumberError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid card number</div>
            </div>

            <div class="form-group">
                <label for="cardName" class="form-label">Name on Card</label>
                <input type="text" id="cardName" class="form-input" placeholder="John Doe" />
                <div id="cardNameError" class="text-red-500 text-sm mt-1 hidden">Please enter the name on card</div>
            </div>

            <div class="input-group">
                <div class="form-group">
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                    <input type="text" id="expiryDate" class="form-input" placeholder="MM/YY" maxlength="5" />
                    <div id="expiryDateError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid expiry date</div>
                </div>
                <div class="form-group">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" id="cvv" class="form-input" placeholder="•••" maxlength="4" />
                    <div id="cvvError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid CVV</div>
                </div>
            </div>

            <button type="submit" class="btn-submit mt-2">
                <span id="buttonText">Pay Now</span>
                <div id="buttonLoader" class="hidden animate-spin rounded-full h-5 w-5 border-b-2 border-white mx-auto"></div>
            </button>
        </form>
        <div>
            
        
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('paymentForm');
            const cardNumber = document.getElementById('cardNumber');
            const cardName = document.getElementById('cardName');
            const expiryDate = document.getElementById('expiryDate');
            const cvv = document.getElementById('cvv');
            const cardType = document.getElementById('cardType');
            // Get the selected plan value
            function getSelectedPlan() {
                const selectedPlan = document.querySelector('input[name="plan"]:checked');
                return selectedPlan ? selectedPlan.value : null;
            }
            
            // Example: Log the selected plan value

            // Card preview elements
            const cardNumberPreview = document.getElementById('cardNumberPreview');
            const cardNamePreview = document.getElementById('cardNamePreview');
            const cardExpiryPreview = document.getElementById('cardExpiryPreview');

            // Card type patterns
            const cardPatterns = {
                visa: /^4/,
                mastercard: /^5[1-5]/,
                amex: /^3[47]/,
                discover: /^6(?:011|5)/,
                jcb: /^35/,
                diners: /^3(?:0[0-5]|[68][0-9])/,
                maestro: /^(5018|5020|5038|6304|6759|676[1-3])/
            };

            // Format card number with spaces
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.replace(/(\d{4})(?=\d)/g, '$1 ').trim();
                e.target.value = value;
                
                // Update preview
                cardNumberPreview.textContent = value || '•••• •••• •••• ••••';
                
              
                
                // Validate
                validateCardNumber(value);
            });

            // Format expiry date
            expiryDate.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                e.target.value = value;
                
                // Update preview
                cardExpiryPreview.textContent = value || '••/••';
                
                // Validate
                validateExpiryDate(value);
            });

            // Update card name preview
            cardName.addEventListener('input', function(e) {
                const value = e.target.value.toUpperCase() || 'FULL NAME';
                cardNamePreview.textContent = value;
                
                // Validate
                validateCardName(value);
            });

            // Format CVV
            cvv.addEventListener('input', function(e) {
                const value = e.target.value.replace(/\D/g, '');
                e.target.value = value;
                
                // Validate using the element reference
                validateCVV(cvv);
            });
            cardType.addEventListener('change', function(e) {

               validateCardType(cardType.value);
               
                
            });

            

            // Validation functions
            // Luhn algorithm for card number validation
            function luhnCheck(cardNumber) {
                let sum = 0;
                let shouldDouble = false;
                
                for (let i = cardNumber.length - 1; i >= 0; i--) {
                    let digit = parseInt(cardNumber.charAt(i));
                    
                    if (shouldDouble) {
                        digit *= 2;
                        if (digit > 9) {
                            digit = (digit % 10) + 1;
                        }
                    }
                    
                    sum += digit;
                    shouldDouble = !shouldDouble;
                }
                
                return sum % 10 === 0;
            }

            function validateCVV(cvvElement) {
                const errorElement = document.getElementById('cvvError');
                const isAmex = cardType && cardType.style.backgroundImage && cardType.style.backgroundImage.includes('amex');
                const value = cvvElement.value || '';
                const isValid = isAmex ? /^\d{4}$/.test(value) : /^\d{3}$/.test(value);
                
                if (!cvvElement) return false;
                
                if (value && !isValid) {
                    cvvElement.classList.add('invalid');
                    cvvElement.classList.remove('valid');
                    if (errorElement) {
                        errorElement.classList.remove('hidden');
                        errorElement.textContent = isAmex ? 'Please enter a 4-digit CVV' : 'Please enter a 3-digit CVV';
                    }
                    return false;
                } else if (value) {
                    cvvElement.classList.remove('invalid');
                    cvvElement.classList.add('valid');
                    if (errorElement) errorElement.classList.add('hidden');
                    return true;
                } else {
                    cvvElement.classList.remove('invalid', 'valid');
                    if (errorElement) errorElement.classList.remove('hidden');
                    return false;
                }
            }

            function validateCardNumber(number) {
                const errorElement = document.getElementById('cardNumberError');
                const cleanedNumber = number.replace(/\s/g, '');
                
                // Basic validation - check if it's all numbers and has correct length (13-19 digits)
                const isValid = /^\d{13,19}$/.test(cleanedNumber) && luhnCheck(cleanedNumber);
                
                if (number && !isValid) {
                    cardNumber.classList.add('invalid');
                    cardNumber.classList.remove('valid');
                    cardNumberError.classList.remove('hidden');
                    console.log('Invalid card number 1');
                    return false;
                } else if (number) {
                    cardNumber.classList.remove('invalid');
                    cardNumber.classList.add('valid');
                    cardNumberError.classList.add('hidden');
                    console.log('Valid card number');
                    return true;
                } else {
                    cardNumber.classList.remove('invalid', 'valid');
                    cardNumberError.classList.remove('hidden');
                    console.log('Invalid card number');
                    return false;
                }
            }

            function validateCardName(name) {
                const errorElement = document.getElementById('cardNameError');
                const isValid = name.trim().length >= 3 && /^[a-zA-Z\s]+$/.test(name);
                
                if (name && !isValid) {
                    cardName.classList.add('invalid');
                    cardName.classList.remove('valid');
                    errorElement.classList.remove('hidden');
                    return false;
                } else if (name) {
                    cardName.classList.remove('invalid');
                    cardName.classList.add('valid');
                    errorElement.classList.add('hidden');
                    return true;
                } else {
                    cardName.classList.remove('invalid', 'valid');
                    errorElement.classList.remove('hidden');
                    return false;
                }
            }

            function validateExpiryDate(date) {
                const errorElement = document.getElementById('expiryDateError');
                const [month, year] = date.split('/').map(Number);
                const currentDate = new Date();
                const currentYear = currentDate.getFullYear() % 100;
                const currentMonth = currentDate.getMonth() + 1;
                
                // Check if the date is in MM/YY format and is a valid date
                const isValid = /^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(date) && 
                              (year > currentYear || (year === currentYear && month >= currentMonth));
                
                if (date && !isValid) {
                    expiryDate.classList.add('invalid');
                    expiryDate.classList.remove('valid');
                    errorElement.classList.remove('hidden');
                    return false;
                } else if (date) {
                    expiryDate.classList.remove('invalid');
                    expiryDate.classList.add('valid');
                    errorElement.classList.add('hidden');
                    return true;
                } else {
                    expiryDate.classList.remove('invalid', 'valid');
                    errorElement.classList.remove('hidden');
                    return false;
                }
            }
            function validateCardType(type) {
               
               if(type == '' || type == null){
                   cardTypeError.classList.remove('hidden');
                   return false;
               }
               else{
                   cardTypeError.classList.add('hidden');
                   return true;
               }
              
            }
          

        

        
                   

            // Form submission
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                            // console.log('Selected Plan:', getSelectedPlan());

                            // return;
                
                
                // Validate all fields
                const isCardNumberValid = validateCardNumber(cardNumber.value);
                const isCardNameValid = validateCardName(cardName.value);
                const isExpiryDateValid = validateExpiryDate(expiryDate.value);
                const isCVVValid = validateCVV(cvv);
                const isCardTypeValid = validateCardType(cardType.value);
                
                if (isCardNumberValid && isCardNameValid && isExpiryDateValid && isCVVValid && isCardTypeValid) {
                    // Show loading state
                    const buttonText = document.getElementById('buttonText');
                    const buttonLoader = document.getElementById('buttonLoader');
                    const submitButton = form.querySelector('button[type="submit"]');
                    
                    buttonText.textContent = 'Processing...';
                    buttonLoader.classList.remove('hidden');
                    submitButton.disabled = true;

                    // Get user ID from cookie
                    

                    const formData = new FormData();
                    formData.append('cardNumber', cardNumber.value.replace(/\s+/g, ''));
                    formData.append('cardName', cardName.value.trim());
                    formData.append('expiryDate', expiryDate.value);
                    formData.append('cvv', cvv.value);
                    formData.append('cardType', cardType.value);
                    formData.append('amount', getSelectedPlan());
                    formData.append('trial', '<?php echo $trial; ?>');
                    formData.append('vendor_id', '<?php echo $user['id']; ?>');

                    formData.append('method', 'vendorTierPayment');

                    try {
                        const response = await fetch('https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem', {
                            method: 'POST',
                            body: formData,
                        });


                        const result = await response.json();
                        console.log('API Response:', result);

                        if (result.status === 'success') {
                            // Handle successful payment
                          
                            Swal.fire({
                                icon: 'success',
                                title: 'Payment Successful!',
                                text: result.message || 'Your payment has been processed successfully.',
                                confirmButtonColor: '#4f46e5',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            }).then(() => {
                                fetch('./helper/updateCookie.php')
                                        .then(() => {
                                            setTimeout(() => {
                                           
                                            window.location.href = 'profile.php';
                                            }, 1000);
                                        });
                            });
                        } else {
                            throw new Error(result.message || 'Payment failed. Please try again.');
                        }
                    } catch (error) {
                        console.error('Payment error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Payment Error',
                            text: error.message || 'An error occurred while processing your payment. Please try again.',
                            confirmButtonColor: '#4f46e5'
                        });
                    } finally {
                        // Reset button state
                        buttonText.textContent = 'Pay Now';
                        buttonLoader.classList.add('hidden');
                        submitButton.disabled = false;
                    }

                    
                    
                   
                } else {
                    console.log('Validation failed');
                    console.log(isCardNumberValid, isCardNameValid, isExpiryDateValid, isCVVValid);
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please fill in all required fields correctly.',
                        confirmButtonColor: '#4f46e5'
                    });
                }
            });
        });

        // Function to get cookie value by name
       
    </script>
</body>
</html>