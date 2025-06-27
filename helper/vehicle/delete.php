<?php
include '../../config/config.php';

$data = [
    'id' => $_POST['id'],
];

$response = deleteVehicle($data);

if($response['status'] == 'success'){
   header("Location: ../../vehicles.php?success=1");
   exit;
}
else{
    header("Location: ../../vehicles.php?error=1");
    exit;
}
