<?php
include '../config/config.php';
include '../helper/globalHelper.php';
if (isset($_COOKIE['vendor'])) {
    $userData = json_decode($_COOKIE['vendor'], true);
} else {
    $userData = [];
}




if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $data = [
        "email" => $_POST['email'],
        "user_name" => $_POST['user_name'],
        "password" => $_POST['new_password'],
        "dot_number" => $_POST['dot_number'],
        "mc_number" => $_POST['mc_number'],
        "state" => $_POST['state'],
        "street" => $_POST['street'],
        "vnd_type" => $_POST['vnd_type'],
        "phone" => $_POST['contact_number'],
        "city" => $_POST['city'],
        "zip" => $_POST['zip'],
    
       
    ];

    $result = updateVendor($data);

    $cacheData = [
        "id" => $userData['id'],
        "name" => $_POST['user_name'],
        "email" => $_POST['email'],
        "profile_status" => $result['data']['profile_status'],
        "dot_number" => $_POST['dot_number'],
        "mc_number" => $_POST['mc_number'],
        "vnd_type" => $_POST['vnd_type'],
        "phone" => $_POST['contact_number'],
        "city" => $_POST['city'],
        "state" => $_POST['state'],
        "zip" => $_POST['zip'],
        "street" => $_POST['street'],
        "tier_status" => $userData['tier_status']
    ];
    // print_r($cacheData);
     
    if($result['status'] == 'success'){
        // echo json_encode($result);
        // file_put_contents('store.json', json_encode($result['data']));
        setcookie("vendor", json_encode($cacheData), time() + (86400 * 30), "/");
        header('Location: ../profile.php?status=success');
        exit;
        

    } else{
    //    echo json_encode($result);
       header('Location: ../profile.php?status=error');
       exit;
    }

    
}
