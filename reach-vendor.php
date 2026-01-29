<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Vendor Invitation | Stretch XL Freight</title>

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

    .logo img {
      max-width: 240px;
      margin-bottom: 20px;
    }

    h2 {
      margin-bottom: 10px;
      color: #333;
    }

    p {
      font-size: 14px;
      color: #666;
    }

    input {
      width: 93%;
      padding: 14px;
      font-size: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin: 20px 0;
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
      margin-top: 10px;
    }

    button.secondary {
      background: #333;
    }

    .vendor-info {
      display: none;
      background: #f7f7f7;
      padding: 15px;
      border-radius: 8px;
      margin-top: 20px;
      text-align: left;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="card">

  <div class="logo">
    <img src="https://stretchxlfreight.com/wp-content/uploads/2025/05/logo-main2.png#69.webp">
  </div>

  <h2>Vendor Lookup</h2>
  <p>Enter vendor email to fetch details</p>

  <input type="email" id="email" placeholder="vendor@email.com">

  <button onclick="lookupVendor()">Check Vendor</button>

  <!-- Vendor Info -->
  <div id="vendorInfo" class="vendor-info">
    <strong>Name:</strong> <span id="vName"></span><br>
    <strong>Company:</strong> <span id="vCompany"></span><br>
    <strong>Email:</strong> <span id="vEmail"></span>
  </div>

  <button id="trialBtn" class="secondary" style="display:none;" onclick="sendTrial()">
    Send 7-Day Trial Email
  </button>

</div>

<script>
  let vendorEmail = '';

  async function lookupVendor() {
    const email = document.getElementById('email').value;
    if (!email) {
      Swal.fire('Missing Email', 'Please enter an email address', 'warning');
      return;
    }

    vendorEmail = email;

    try {
      const formData = new FormData();
      formData.append('email', email);
      formData.append('method', 'lookupVendor');

      const res = await fetch(
        'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem',
        { method: 'POST', body: formData }
      );

      const data = await res.json();

      if (!data.success) {
        Swal.fire('Not Found', 'No vendor found for this email', 'error');
        return;
      }

      document.getElementById('vName').textContent = data.data.name;
      document.getElementById('vCompany').textContent = data.data.company;
      document.getElementById('vEmail').textContent = data.data.email;

      document.getElementById('vendorInfo').style.display = 'block';
      document.getElementById('trialBtn').style.display = 'block';

      Swal.fire('Vendor Found', 'You can now send a trial invite', 'success');

    } catch (e) {
      Swal.fire('Error', 'Failed to fetch vendor data', 'error');
    }
  }

  async function sendTrial() {
    try {
      const formData = new FormData();
      formData.append('email', vendorEmail);
      formData.append('method', 'sendTrialMail');

      const res = await fetch(
        'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem',
        { method: 'POST', body: formData }
      );

      const data = await res.json();

      if (!data.success) {
        Swal.fire('Failed', 'Trial email could not be sent', 'error');
        return;
      }

      Swal.fire('Success', '7-day trial email sent successfully', 'success');

    } catch (e) {
      Swal.fire('Error', 'Something went wrong', 'error');
    }
  }
</script>

</body>
</html>
