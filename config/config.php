<?php
session_start();
function curlRequest($data ){
$api_url = 'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem';
$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($curl);
curl_close($curl);
// print_r($response);
return json_decode($response, true);
}

function verifyTokenVendor($data){
    $data["method"] = "verifyTokenVendor";
    return curlRequest($data);
}
function fetchAllShipperLeads($data){
    $data["method"] = "fetchAllShipperLeads";
    return curlRequest($data);
}
function updateVendor($data){
    $data["method"] = "updateVendor";
    return curlRequest($data);
}
