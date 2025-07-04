
<?php
if(!isset($_COOKIE['vendor'])){
    // echo "Not set";
   echo "<script> window.location.href = 'login.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stretch XL Freight Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="./assets/css/tailwind.css" /> -->
    <!-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/variable.css" />
    <link rel="stylesheet" href="./assets/css/jquery.dataTables.css" />
    <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
   
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
                  setcookie("vendor", "", time() - 3600, "/");
                  window.location.href = 'login.php';
                }, 1000);
              });
          }
        });
      }
      // Initialize user session if not already set
      
    </script>
    <script>
      // Wait for DOM to be fully loaded
      document.addEventListener('DOMContentLoaded', function() {
        if (isset($_COOKIE["vendor"])) {
          $userData = json_decode($_COOKIE["vendor"], true);
        } else {
          $userData = [];
        }
       
        if(userData && userData.profile_status === 'incomplete'){
          Swal.fire({
            title: "Profile Incomplete!",
            text: "Please complete your profile.",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'profile.php';
            }
          });
        }
      });
    </script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 "
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >