<?php
include '../../config/config.php';
include '../../helper/imageUploader.php';

$images = uploadVehicleImages($_FILES['images'], $_POST['vendor_id']);

if(isset($images['files']) && is_array($images['files'])){
    $images = implode('|', $images['files']);
}



$data = [
    'vendor_id' => $_POST['vendor_id'],
    'name' => $_POST['name'],
    'capacity' => (int)$_POST['capacity'],
    'quantity' => (int)$_POST['quantity'],
    'hourly_rate' => (float)$_POST['hourly_rate'],
    'fuel_percentage' => isset($_POST['fuel_percentage']) ? (float)$_POST['fuel_percentage'] : 0,
    'gratuity_percentage' => isset($_POST['gratuity_percentage']) ? (float)$_POST['gratuity_percentage'] : 0,
    'mileage' => isset($_POST['mileage']) ? (int)$_POST['mileage'] : 0,
    'status' => $_POST['status'] ?? 'Yes',
    'pickup_address' => $_POST['pickup_address'] ?? '',
    'pickup_city' => $_POST['pickup_city'],
    'pickup_state' => $_POST['pickup_state'],
    'availability' => $_POST['availability'],
    'vehicle_type' => $_POST['vehicle_type'],
    'images' => $images,
];


if (isset($_COOKIE['vendor'])) {
    $userData = json_decode($_COOKIE['vendor'], true);
} else {
    $userData = [];
}


$cacheData = [
        "id" => $userData['id'],
        "name" => $userData['name'],
        "email" => $userData['email'],
        "profile_status" => $userData['profile_status'],
        "dot_number" => $userData['dot_number'],
        "mc_number" => $userData['mc_number'],
        "vnd_type" => $userData['vnd_type'],
        "phone" => $userData['phone'],
        "city" => $userData['city'],
        "state" => $userData['state'],
        "zip" => $userData['zip'],
        "street" => $userData['street'],
        "tier_status" => $userData['tier_status'],
        "has_vehicle" => '1'
    ];
        setcookie("vendor", json_encode($cacheData), time() + (86400 * 30), "/");

// print_r($data);

$response = addVehicle($data);

if($response['status'] == 'success'){
   header("Location: ../../vehicles.php?success=1");
   exit;
}
else{
    header("Location: ../../vehicles.php?error=1");
    exit;
}