<?php
include '../config/config.php';
$data = [
    "email" => $_POST['email'],
    "password" => $_POST['password']
];
function login($data){
    $data["method"] = "vendorLogin";
    $response = curlRequest($data);
    if($response['status'] == "success"){
        $cookieData = json_encode($response['data']);
        $cookieSet = setcookie(
            "vendor", 
            $cookieData, 
            [
                'expires' => time() + (86400),
                'path' => '/',
                'domain' => '', // current domain
                'secure' => false, // set to true if using HTTPS
                'httponly' => true,
                'samesite' => 'Lax'
            ]
        );
    }
    return $response;
}


print_r(json_encode(login($data)));
