<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Vendor Invitation | Stretch XL Freight</title>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #e45fa4, #7b4bb7);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      background: #ffffff;
      width: 100%;
      max-width: 420px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .logo {
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 240px;
    }

    h2 {
      margin: 0 0 10px;
      color: #333;
      font-size: 22px;
    }

    p {
      font-size: 14px;
      color: #666;
      margin-bottom: 25px;
    }

    input[type="email"] {
      width: 93%;
      padding: 14px;
      font-size: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      margin-bottom: 20px;
      transition: border-color 0.3s;
    }

    input[type="email"]:focus {
      border-color: #e45fa4;
    }

    button {
      width: 100%;
      padding: 14px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      color: #ffffff;
      background: linear-gradient(135deg, #e45fa4, #7b4bb7);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    button:hover {
      transform: translateY(-1px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    button:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="logo">
      <img src="https://stretchxlfreight.com/wp-content/uploads/2025/05/logo-main2.png#69.webp" alt="Stretch XL Freight">
    </div>

    <h2>Invite a Vendor</h2>
    <p>Enter the vendor’s email address to send an account invitation.</p>

    <input type="email" id="email" placeholder="vendor@email.com" required>

    <button id="submitBtn" onclick="sendInvite()">Send Invitation</button>
  </div>

  <script>
    async function sendInvite() {
      const emailInput = document.getElementById('email');
      const button = document.getElementById('submitBtn');

      if (!emailInput.value) {
        Swal.fire({
          icon: 'warning',
          title: 'Email Required',
          text: 'Please enter a valid email address.'
        });
        return;
      }

      button.disabled = true;

      try {
        const formData = new FormData();
        formData.append('email', emailInput.value);
        formData.append('method', 'vendorInviteMail');

        const response = await fetch(
          'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem',
          {
            method: 'POST',
            body: formData
          }
        );

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        Swal.fire({
          icon: 'success',
          title: 'Invitation Sent',
          text: 'The vendor invitation email has been sent successfully.'
        });

        emailInput.value = '';

      } catch (error) {
        Swal.fire({
          icon: 'error',
          title: 'Something went wrong',
          text: 'Unable to send the invitation. Please try again.'
        });
      } finally {
        button.disabled = false;
      }
    }
  </script>

</body>
</html>
