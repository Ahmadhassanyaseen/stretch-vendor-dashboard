<?php

include '../config/config.php';
include '../helper/globalHelper.php';
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
        "tier_status" => '1'
    ];


     setcookie("vendor", json_encode($cacheData), time() + (86400 * 30), "/");


     header('Content-Type: application/json');
    echo json_encode(['status' => 'success']);