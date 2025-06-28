<?php
include '../../config/config.php';
include '../../helper/imageUploader.php';

$images = uploadVehicleImages($_FILES['images'], $_POST['vendor_id']);

// print_r($images);

if(isset($images['files']) && is_array($images['files'])){
    if(is_array($_POST['existing_images']) && count($_POST['existing_images']) > 0){
        $images = array_merge($_POST['existing_images'], $images['files']);
        $images = implode('|', $images);
    }else{

        $images = implode('|', $images['files']);
    }
}
else if(is_array($_POST['existing_images']) && count($_POST['existing_images']) > 0){
    $images = implode('|', $_POST['existing_images']);
}
else{
    $images = '';
}



$data = [
    'id' => $_POST['id'],
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
    'images' => $images,
];

// print_r($data);

$response = updateVehicle($data);

if($response['status'] == 'success'){
   header("Location: ../../editVehicle.php?id=" . $data['id'] . "&success=1");
   exit;
}
else{
    header("Location: ../../editVehicle.php?id=" . $data['id'] . "&error=1");
    exit;
}