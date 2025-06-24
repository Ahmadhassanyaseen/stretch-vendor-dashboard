<?php
require_once 'config/config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
   $token = $_GET['token'];
   $email = $_GET['email'];
   $result = verifyToken(['token' => $token , 'email' => $email]);

   if($result['status'] == 'success')
   {
    if(isset($_GET['redirect']) && $_GET['redirect'] == 'new-password')
    {
       header("Location: ./new-password.php?token=" . $token . "&email=" . $email);
    }
    else
    {
       header("Location: ./login.php");
    }
   }
   else
   {
      echo '<script>alert("Invalid token");window.location.href="./login.php";</script>';
   }
}

