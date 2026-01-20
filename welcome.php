<?php include 'config/config.php'; ?>
<?php
if(!isset($_GET['id'])){
    header("Location: login.php");
    exit();
}
$data['id'] = $_GET['id'];
$response = fetchVendorById($data);
// print_r($response);
if($response['password_set'] == 1 ){
    // echo "Password already set";
    header("Location: login.php");
    exit();
}else{
//    echo "Password not set";
    header("Location: set-password.php?id=".$_GET['id']);
    exit();
}
?>