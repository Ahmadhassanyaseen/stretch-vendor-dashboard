<?php
include '../config/config.php';
include '../helper/globalHelper.php';




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
     
    if($result['status'] == 'success'){
        echo json_encode($result);
        file_put_contents('store.json', json_encode($result['data']));
        header('Location: ../profile.php?status=success');
        exit;
        

    } else{
       echo json_encode($result);
       header('Location: ../profile.php?status=error');
       exit;
    }

    
}
