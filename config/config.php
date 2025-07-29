<?php
// session_start();

// Include logger
require_once __DIR__ . '/../includes/logger.php';
function curlRequest($data) {
    $api_url = 'https://stretchxlfreight.com/logistx/index.php?entryPoint=VendorSystem';
    
    // Log the request data
    log_message("Sending to API: " . print_r($data, true));
    
    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Only for debugging, remove in production
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // Only for debugging, remove in production
    
    $response = curl_exec($curl);
    
    // Log any cURL errors
    if (curl_errno($curl)) {
        $curlError = curl_error($curl);
        log_message("cURL Error: " . $curlError, 'ERROR');
    }
    
    // Log the raw response
    log_message("API Response: " . $response);
    
    curl_close($curl);
    
    $decoded = json_decode($response, true);
    
    // Log if JSON decode failed
    if (json_last_error() !== JSON_ERROR_NONE) {
        $jsonError = json_last_error_msg();
        log_message("JSON Decode Error: " . $jsonError, 'ERROR');
    }
    
    return $decoded;
}

function verifyTokenVendor($data){
    $data["method"] = "verifyTokenVendor";
    return curlRequest($data);
}
function fetchAllVendorLeads($data){
    $data["method"] = "fetchAllVendorLeads";
    return curlRequest($data);
}
function fetchAllVendorVehicles($data){
    $data["method"] = "fetchAllVendorVehicles";
    return curlRequest($data);
}
function updateVendor($data){
    $data["method"] = "updateVendor";
    return curlRequest($data);
}
function updateVehicle($data){
    $data["method"] = "updateVehicle";
    return curlRequest($data);
}

function fetchVehicleById($data){
    $data["method"] = "fetchVehicleById";
    return curlRequest($data);
}
function addVehicle($data){
    $data["method"] = "addVehicle";
    return curlRequest($data);
}
function deleteVehicle($data){
    $data["method"] = "deleteVehicle";
    return curlRequest($data);
}

function updateShipmentStatus($data){
    $data["method"] = "updateShipmentStatus";
    return curlRequest($data);
}

function fetchShipmentById($data){
    $data["method"] = "fetchShipmentById";
    return curlRequest($data);
}
function updateShipment($data){
    $data["method"] = "updateShipment";
    return curlRequest($data);
}
function getReferralData($data){
    $data["method"] = "getReferralData";
    return curlRequest($data);
}
function fetchAllUserCards($data){
    $data["method"] = "fetchAllUserCards";
    return curlRequest($data);
}
function getLoadsFromTP($data){
    $data["method"] = "getLoadsFromTP";
    return curlRequest($data);
}

