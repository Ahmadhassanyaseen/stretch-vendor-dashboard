<?php 
require_once 'modules/Configurator/Configurator.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == 'lead_charges') {
        echo json_encode(leadCharges());
        exit; 
    }
    if (isset($_POST['method']) && $_POST['method'] == 'save_lead') {
        echo json_encode(save_lead($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'save_international_freight') {
        echo json_encode(save_international_freight($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchQuotesFromTP') {
        echo json_encode(fetchQuotesFromTP($_POST['shipment_id']));
        exit;
    } 
    if (isset($_POST['method']) && $_POST['method'] == 'send_shipmentDetails_vendor') {
        echo json_encode(send_shipmentDetails_vendor($_POST['id']));
        exit;
    } 
    if (isset($_POST['method']) && $_POST['method'] == 'send_shipmentDetails_shipper') {
        echo json_encode(send_shipmentDetails_shipper($_POST['id']));
        exit;
    } 
    if (isset($_POST['method']) && $_POST['method'] == 'acceptQuoteOnTP') {
        echo json_encode(acceptQuoteOnTP($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchVendorTopLocations') {
        echo json_encode(fetchVendorTopLocations($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'saveTopLocationsVendor') {
        echo json_encode(saveTopLocationsVendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'postLoadTS') {
        echo json_encode(postLoadTSBoard($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchVendorById') {
        echo json_encode(fetchVendorById($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'stopRenew') {
        echo json_encode(stopRenew($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'deleteVendor') {
        echo json_encode(deleteVendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'get_fuel_and_toll_cost') {
        echo json_encode(get_fuel_and_toll_cost($_POST['pickup_address'], $_POST['dropoff_address'], $_POST['freight_type']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'get_fuel_and_toll_cost_vendor') {
        echo json_encode(get_fuel_and_toll_cost_vendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getBrokerData') {
        echo json_encode(getBrokerData($_POST['dot']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getLoadTSapi') {
        echo json_encode(getLoadTSapi($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'addQuoteInTP') {
        echo json_encode(addQuoteInTP($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'createShipper') {
        echo json_encode(createShipper($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'checkShipperAccount') {
        echo json_encode(checkShipperAccount($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateShipper') {
        echo json_encode(updateShipper($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'deleteShipment') {
        echo json_encode(deleteShipment($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'shipperLogin') {
        echo json_encode(shipperLogin($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'forgetPassword') {
        echo json_encode(forgetPassword($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'agreementPayment') {
        echo json_encode(agreementPayment($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'verifyToken') {
        echo json_encode(verifyToken($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'resetPassword') {
        echo json_encode(resetPassword($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'setPassword') {
        echo json_encode(setPassword($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllShipperLeads') {
        echo json_encode(fetchAllShipperLeads($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllShipperLeadsConverted') {
        echo json_encode(fetchAllShipperLeadsConverted($_POST));
        exit;
    }

    // Vendor Api

    if (isset($_POST['method']) && $_POST['method'] == 'createVendor') {
        echo json_encode(createVendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'vendorLogin') {
        echo json_encode(vendorLogin($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'forgetPasswordVendor') {
        echo json_encode(forgetPasswordVendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'verifyTokenVendor') {
        echo json_encode(verifyTokenVendor($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'resetPasswordVendor') {
        echo json_encode(resetPasswordVendor($_POST));
        exit;
    }

    if (isset($_POST['method']) && $_POST['method'] == 'updateVendor') {
        echo json_encode(updateVendor($_POST));
        exit;
    }

    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllVendorLeads') {
        echo json_encode(fetchAllVendorLeads($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllVendorLeadsConverted') {
        echo json_encode(fetchAllVendorLeadsConverted($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllVendorLeadsFormal') {
        echo json_encode(fetchAllVendorLeadsFormal($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllVendorVehicles') {
        echo json_encode(fetchAllVendorVehicles($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchVehicleById') {
        echo json_encode(fetchVehicleById($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchShipperDataById') {
        echo json_encode(fetchShipperDataById($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateVehicle') {
        echo json_encode(updateVehicle($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'addVehicle') {
        echo json_encode(addVehicle($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'deleteVehicle') {
        echo json_encode(deleteVehicle($_POST));
        exit;
    }

    // Shipment Api
    if (isset($_POST['method']) && $_POST['method'] == 'updateShipmentStatus') {
        echo json_encode(updateShipmentStatus($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchShipmentById') {
        echo json_encode(fetchShipmentById($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateShipment') {
        echo json_encode(updateShipment($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateQuote') {
        echo json_encode(updateQuote($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateShipmentCustomPrice') {
        echo json_encode(updateShipmentCustomPrice($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'addLoad') {
        echo json_encode(addLoad($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateLoad') {
        echo json_encode(updateLoad($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'vendorTierPayment') {
        echo json_encode(vendorTierPayment($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'verifyDotMC') {
        echo json_encode(verifyDotMCNew($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getReferralData') {
        echo json_encode(getReferralData($_POST));
        exit;
    }

    // Handle get card details request
    if (isset($_POST['method']) && $_POST['method'] == 'quoteLoad') {
        echo json_encode(quoteLoad($_POST));
        exit;
    }
    // Handle get card details request
    if (isset($_POST['method']) && $_POST['method'] == 'getCardDetails') {
        echo json_encode(getCardDetails($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'postLoad123') {
        echo json_encode(postLoad123($_POST));
        exit;
    }

    // Handle update card request
    if (isset($_POST['method']) && $_POST['method'] == 'updateCard') {
        echo json_encode(updateCard($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'addCard') {
        echo json_encode(addCard($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fortisCheck') {
        echo json_encode(fortisCheck($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'fetchAllUserCards') {
        echo json_encode(fetchAllUserCards($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'deleteCard') {
        echo json_encode(deleteCard($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getLoadsFromTP') {
        echo json_encode(getLoadsFromTP($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'searchLoadsTS') {
        echo json_encode(searchLoadsTS());
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getLoadFrom123') {
        echo json_encode(getLoadFrom123($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'checkShipmentRef') {
        echo json_encode(checkShipmentRef($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'threeDayCarrierReminder') {
        echo json_encode(threeDayCarrierReminder($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'BOLSigned') {
        echo json_encode(BOLSigned($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'threeDayShipperReminder') {
        echo json_encode(threeDayShipperReminder());
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'postLoadCron') {
        echo json_encode(postLoadCron());
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'deleteLoadTSXeno') {
        echo json_encode(deleteLoadTSXeno($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'postLoadOnline') {
        echo json_encode(postLoadOnline($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'updateReminderForShipper') {
        echo json_encode(updateReminderForShipper($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'vendorLoadsInfoMail') {
        echo json_encode(vendorLoadsInfoMail($_POST['id']));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'createContact') {
        echo json_encode(createContact($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'createTransaction') {
        echo json_encode(createTransaction($_POST));
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'vendorLoadsInfoCron') {
        echo json_encode(vendorLoadsInfoCron());
        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'test') {
        //    echo json_encode(update_load_truckerpath($_POST['id']));
        //    echo json_encode(checkShipper($_POST['email'] , 'ahmad'));
        //    echo json_encode(select_vendor_for_lead('7018b181-3d56-8d7c-b63c-6849734f98c4'));
        //    echo json_encode(get_fuel_and_toll_cost($_POST['pickup_address'] , $_POST['dropoff_address'] , $_POST['freight_type']));
        // echo json_encode(get_pricing($_POST['pickup_address'], $_POST['dropoff_address']));
        // echo json_encode(createVendorForQuote($_POST));
        // echo json_encode(sendVendorWelcomeMail($_POST));
        echo json_encode(sendQuoteMailNew($_POST));
        //    echo json_encode(get_lat_long($_POST['address']));
        //    echo json_encode(getTollCost(39.1599241,-76.5999039,40.7121799,-74.00549));
        //    echo json_encode(calculateFuelCost(1000 , 'general'));
        //    echo json_encode(getFuelPriceFromEIA());
        //    echo json_encode(uberRates($_POST['pickup'] , $_POST['dropoff'] , $_POST['pickup_date']));
        //    echo json_encode(post_load('6adad6e2-bd7e-7c31-f7cb-68500e6e7b1d'));
        //    echo json_encode(get_address_data($_POST['pickup_address']));
        //    echo json_encode(select_vendor_for_lead($_POST['pickup_lat'] , $_POST['pickup_lng'] , $_POST['state']));
        //    echo json_encode(send_lead_mail('df567ca9-58cb-e129-0764-684aa4d72bf0' , '8c187af7-a713-c17f-9640-6867aae982df' , 'ahmadhassan795294@gmail.com'));

        exit;
    }
    if (isset($_POST['method']) && $_POST['method'] == 'getRouteAverages') {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    echo json_encode(getRouteAverages($_POST));
    exit;
}
    
} else {
    echo 'Invalid Request';
}
function save_lead($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead saved: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    // return true;
    $result = get_pricing($data['pickup_address'], $data['dropoff_address']);
    $tracking = 0;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Tracking: ' . json_encode($data['freight_tracking']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $tracking = ($data['freight_tracking'] == 1 || $data['freight_tracking'] === '1') ? 1 : 0;

    // return $result;
    $rate_c = number_format($result['rates'][1]['avgRate'], 2);
    $lead_Charges = leadCharges();
    if (!$rate_c || $rate_c == 'Null' || $rate_c == '0') {
        $rate_c = 2;
    }
    $distance = floatval(str_replace(',', '', $result['distance']));
    $mileage_cost = $rate_c * $distance;
    $pickup_address_data = get_address_data($data['pickup_address']);
    $dropoff_address_data = get_address_data($data['dropoff_address']);
    $addons = '';
    foreach ($data['addons'] as $addon) {
        $addons .= $addon . ',';
    }
    
    $log_message = '[' . date('Y-m-d H:i:s') . '] Tracking: ' . json_encode($tracking) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $freight = BeanFactory::newBean('freight_xl');
    $freight->name = $data['name'];
    $freight->tracking_c = $tracking;
    $freight->pickup_address_c = $data['pickup_address'];
    $freight->pickup_lat_c = $result['pickup_lat'];
    $freight->pickup_lng_c = $result['pickup_long'];
    $freight->dropoff_address_c = $data['dropoff_address'];
    $freight->dropoff_lat_c = $result['dropoff_lat'];
    $freight->dropoff_lng_c = $result['dropoff_long'];
    $freight->distance_c = number_format($distance, 2);
    $freight->duration_c = $result['duration'];
    $freight->rate_c = $rate_c;
    $freight->addons_c = $addons;
    $freight->addons_total_c = $data['addons_total'];
    $freight->fuel_c = $data['fuel_cost'];
    $freight->mileage_c = $data['mileage_cost'];
    $freight->toll_c = $data['toll_cost'];
    $freight->pickup_state_c = $pickup_address_data['state'];
    $freight->pickup_city_c = $pickup_address_data['city'];
    $freight->pickup_zip_c = $pickup_address_data['zip'];
    $freight->dropoff_state_c = $dropoff_address_data['state'];
    $freight->dropoff_city_c = $dropoff_address_data['city'];
    $freight->dropoff_zip_c = $dropoff_address_data['zip'];
    $freight->opertunity_id_c = generate_opertunity_id();
    $freight->freight_description_c = $data['freight_description'];
    $freight->carrier_vehicle_type_c = $data['carrier_vehicle_type'];
    $freight->freight_weight_c = $data['freight_weight'];
    $freight->freight_length_c = $data['freight_length'];
    $freight->freight_width_c = $data['freight_width'];
    $freight->freight_height_c = $data['freight_height'];
    $freight->freight_pallet_count_c = $data['freight_pallet_count'];
    $freight->freight_box_count_c = $data['freight_box_count'];
    $freight->number_of_stops_c = $data['number_of_stops'];
    $freight->client_notes_c = $data['notes'];
    $freight->freight_type_c = $data['freight_type'];
    $freight->pickup_time_c = $data['pickup_time'];
    $freight->pickup_time_new_c = date("h:i A", strtotime($data['pickup_time']));
    $freight->pickup_date_c = $data['pickup_date'];
    $freight->dropoff_time_c = $data['dropoff_time'];
    $freight->dropoff_time_new_c = date("h:i A", strtotime($data['dropoff_time']));
    $freight->dropoff_date_c = $data['dropoff_date'];
    $freight->freight_shipper_name_c = $data['name'];
    $freight->assigned_user_id = '8cf8b27d-5a29-984b-b3c3-5693eede3156';
    $freight->status_c = 'Assigned';
    $freight->source_c = '.com';
    $freight->freight_shipper_address_c = $data['freight_shipper_address'];
    $freight->freight_shipper_phone_c = $data['freight_shipper_phone'];
    $freight->freight_shipper_email_c = $data['freight_shipper_email'];
    $freight->email1 = $data['freight_shipper_email'];
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead lat: ' . json_encode($result['pickup_lat']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead lng: ' . json_encode($result['pickup_long']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead state: ' . json_encode($pickup_address_data['state']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vendorData = select_vendor_for_lead($result['pickup_lat'], $result['pickup_long'], $pickup_address_data['state']);
    $deadhead_distance = floatval(str_replace(',', '', $vendorData['distance']));
    $deadhead_price = $deadhead_distance * $rate_c;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor selected: ' . json_encode($vendorData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $freight->vendor_id_c = $vendorData['id'];
    $freight->deadhead_distance_c = $deadhead_distance;
    $freight->deadhead_price_c = number_format($deadhead_price, 2);
    $total_market_price = floatval($deadhead_price) + floatval($data['mileage_cost']) + floatval($data['toll_cost']) + floatval($data['fuel_cost']);
    $total_price_c = floatval($deadhead_price) + floatval($data['addons_total']) + floatval($data['mileage_cost']) + floatval($data['toll_cost']) + floatval($data['fuel_cost']);
    $freight->market_price_c = number_format($total_market_price, 2);
    $profit = (floatval($total_price_c) * (floatval($lead_Charges['Client_Markup']) / 100));
    $total_cost = floatval($total_price_c) + floatval($profit);
    $freight->profit_c = number_format($profit, 2);
    $freight->total_price_c = number_format($total_cost, 2);

    $log_message = '[' . date('Y-m-d H:i:s') . '] rate price: ' . json_encode($rate_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] deadhead price: ' . json_encode($freight->deadhead_price_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] mARKET price: ' . json_encode($freight->market_price_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] porfit: ' . json_encode($freight->profit_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] total price: ' . json_encode($freight->total_price_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $vendor = BeanFactory::getBean('VND_Vendors', $vendorData['id']);
    $freight->vendor_name_c = $vendor->name;
    $freight->vendor_email_c = $vendor->email1;
    $freight->save();

    $log_message = '[' . date('Y-m-d H:i:s') . '] Tracking after save: ' . json_encode($freight->tracking_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $shipperData = checkShipper($data['freight_shipper_email'], $data['name'], $freight->id);
    // send_lead_mail($freight->id, '8c187af7-a713-c17f-9640-6867aae982df' ,  $data['freight_shipper_email']);
    send_lead_mail($freight->id, '59c99e53-24ba-c30a-a262-6891ba01c57f', $data['freight_shipper_email']);

   

    $freight->save();
    return [
        'status' => 'success',
        'message' => 'Lead saved successfully',
        'id' => $freight->id,
        'redirect' => $shipperData['link']
    ];
}
function createShipper($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead saved: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    global $db;

    // $sql = "SELECT * FROM shipper_xl_cstm WHERE email_c = '" . $data['email'] . "'";
     $sql = 'SELECT s.*, s_c.* 
        FROM shipper_xl s
        INNER JOIN shipper_xl_cstm s_c ON s.id = s_c.id_c
        WHERE s_c.email_c = "' . $data['email'] . '" AND s.deleted = 0';
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'error',
            'message' => 'Email already exists'
        ];
    }

    $shipper = BeanFactory::newBean('shipper_xl');
    $shipper->name = $data['user_name'];
    $shipper->email1 = $data['email'];
    $shipper->email_c = $data['email'];
    $shipper->status_c = 'Disabled';
    $shipper->password_c = encrypt($data['password']);
    $shipper->save();

    $token = encrypt($shipper->id);
    $shipper->token_c = $token;
    $shipper->save();
    sendShipperAccountMail($shipper->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'login');

    return [
        'status' => 'success',
        'message' => 'Account created successfully'
    ];
}
function checkShipperAccount($data)
{
   

    global $db;

    // $sql = "SELECT * FROM shipper_xl_cstm WHERE email_c = '" . $data['email'] . "'";
     $sql = 'SELECT s.*, s_c.* 
        FROM shipper_xl s
        INNER JOIN shipper_xl_cstm s_c ON s.id = s_c.id_c
        WHERE s_c.email_c = "' . $data['email'] . '" AND s.deleted = 0';
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'success',
            'message' => 'Email already exists'
        ];
    }else{
        return [
            'status' => 'error',
            'message' => 'Account not found'
        ];
    }

    
}
function shipperLogin($data)
{
    global $db;

    // $sql = 'SELECT * FROM shipper_xl_cstm WHERE email_c = "' . $data['email'] . '"';
    $sql = 'SELECT s.*, s_c.* 
        FROM shipper_xl s
        INNER JOIN shipper_xl_cstm s_c ON s.id = s_c.id_c
        WHERE s_c.email_c = "' . $data['email'] . '" AND s.deleted = 0';
    $result = $db->query($sql);
    if ($result->num_rows == 0) {
        return [
            'status' => 'error',
            'message' => 'Invalid email'
        ];
    }

    // return $result->fetch_assoc();

    while ($row = $result->fetch_assoc()) {
        // return $row;

        if ($row['deleted'] == '1' || $row['deleted'] == 1) {
            return [
                'status' => 'error',
                'message' => 'Account is deleted by admin. Kindly contact admin'
            ];
        }
        if ($row['status_c'] == 'Blocked') {
            return [
                'status' => 'error',
                'message' => 'Account is blocked. Kindly contact admin'
            ];
        }
        if ($row['status_c'] == 'Disabled') {
            return [
                'status' => 'error',
                'message' => 'Please click the email link we sent you to verify your account!'
            ];
        }
        if (decrypt($row['password_c']) == $data['password']) {
            $shipper = BeanFactory::getBean('shipper_xl', $row['id_c']);

            return [
                'status' => 'success',
                'message' => 'Login successful',
                'data' => [
                    'id' => $shipper->id,
                    'name' => $shipper->name,
                    'email' => $shipper->email_c,
                ]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Invalid password'
            ];
        }
    }
    return [
        'status' => 'error',
        'message' => 'No Account Found for this email'
    ];
}
function forgetPassword($data)
{
    global $db;
    // $sql = 'SELECT * FROM shipper_xl_cstm WHERE email_c = "' . $data['email'] . '"';
    $sql = 'SELECT c.* FROM shipper_xl_cstm AS c JOIN shipper_xl AS s ON s.id = c.id_c WHERE c.email_c = "' . $data['email'] . '" AND s.deleted = 0';
   
    $result = $db->query($sql);
    if ($result->num_rows == 0) {
        return [
            'status' => 'error',
            'message' => 'Invalid email or password'
        ];
    }
    while ($row = $result->fetch_assoc()) {
        $shipper = BeanFactory::getBean('shipper_xl', $row['id_c']);
        $token = encrypt($shipper->id);
        $shipper->token_c = $token;
        $shipper->save();
        sendShipperAccountMail($shipper->id, '28b5fec5-4b7f-0327-c60a-5693eccca2b8', $token, 'new-password');
        return [
            'status' => 'success',
            'message' => 'Password reset link sent to your email'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Invalid email or password'
    ];
}
function sendShipperAccountMail($id, $email_temp, $token, $redirect)
{
    $result = array();
    $log_file = 'vendorLogs.log';

    try {
        // Get shipper details
        $shipper = BeanFactory::getBean('shipper_xl', $id);
        if (!$shipper) {
            throw new Exception('Shipper not found');
        }

        $link = 'https://stretchxlfreight.com/dashboard/verify.php?token=' . urlencode($token) . '&email=' . urlencode($shipper->email_c) . '&redirect=' . urlencode($redirect);

        // Log the action
        $log_message = '[' . date('Y-m-d H:i:s') . '] Password reset mail sent to shipper ID: ' . $id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($email_temp);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

        // Replace template variables
        $emailTemp->body_html = str_replace('$shipper_name', $shipper->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$link', $link, $emailTemp->body_html);

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($shipper->email_c);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $shipper->email_c;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'shipper_xl';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($id)) {
                $shipper = BeanFactory::getBean('shipper_xl', $id);
                if ($shipper) {
                    // Load the relationship
                    $shipper->load_relationship('shipper_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($shipper->shipper_xl_emails_1) {
                        // Use the relationship's add() method
                        $shipper->shipper_xl_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $shipper->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Password reset email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendForgetPasswordMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function verifyToken($data)
{
    // return $data;
    $result = array();
    global $db;
    // $sql = 'SELECT * FROM shipper_xl_cstm WHERE email_c = "' . $data['email'] . '"';
    $sql = 'SELECT c.* FROM shipper_xl_cstm AS c JOIN shipper_xl AS s ON s.id = c.id_c WHERE c.email_c = "' . $data['email'] . '" AND s.deleted = 0';

    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);

    if ($result) {
        $shipper = BeanFactory::getBean('shipper_xl', $result['id_c']);
        $shipper->status_c = 'Active';
        $shipper->save();
        $result['status'] = 'success';
        $result['message'] = 'Password reset email sent successfully';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Invalid token';
    }

    return $result;
}
function setPassword($data)
{
    $shipper = BeanFactory::getBean('shipper_xl', $data['id']);
    $shipper->password_c = encrypt($data['password']);
    $shipper->status_c = 'Active';
    $shipper->save();
    $result['status'] = 'success';
    $result['message'] = 'Password reset successfully';

    return $result;
}
function resetPassword($data)
{
    global $db;
    $sql = 'SELECT * FROM shipper_xl_cstm WHERE email_c = "' . $data['email'] . '" AND token_c = "' . $data['token'] . '"';
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    if ($result) {
        $shipper = BeanFactory::getBean('shipper_xl', $result['id_c']);
        $shipper->password_c = encrypt($data['password']);
        $shipper->save();
        $result['status'] = 'success';
        $result['message'] = 'Password reset successfully';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Invalid token';
    }

    return $result;
}
function checkShipper($email, $username, $freight_id)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper email: ' . json_encode($email) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper username: ' . json_encode($username) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper freight_id: ' . json_encode($freight_id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    global $db;
    $sql = 'SELECT c.* FROM shipper_xl_cstm AS c JOIN shipper_xl AS s ON s.id = c.id_c WHERE c.email_c = "' . $email . '" AND s.deleted = 0';
    // $sql = 'SELECT * FROM shipper_xl_cstm WHERE email_c = "' . $email . '" ';
    $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper sql: ' . json_encode($sql) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper result: ' . json_encode($result) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    if ($result) {
        $shipper = BeanFactory::getBean('shipper_xl', $result['id_c']);
        $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper id: ' . json_encode($shipper->name) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $shipper->load_relationship('shipper_xl_freight_xl_1');
        $shipper->shipper_xl_freight_xl_1->add($freight_id);
        $log_message = '[' . date('Y-m-d H:i:s') . '] check shipper freight added: ' . json_encode($freight_id) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $shipper->save();
        $log_message = '[' . date('Y-m-d H:i:s') . '] already added: ' . json_encode($result['id_c']) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        return [
            'status' => 'success',
            'message' => 'Shipper found',
            'link' => 'https://stretchxlfreight.com/dashboard/login.php',
            'id' => $result['id_c']
        ];
    } else {
        $shipper = BeanFactory::newBean('shipper_xl');
        $shipper->name = $username;
        $shipper->email1 = $email;
        $shipper->email_c = $email;
        $shipper->status_c = 'Disabled';
        $shipper->save();

        $shipper->load_relationship('shipper_xl_freight_xl_1');
        $shipper->shipper_xl_freight_xl_1->add($freight_id);

        $shipper->save();
        $log_message = '[' . date('Y-m-d H:i:s') . '] newly added: ' . json_encode($shipper->id) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $token = encrypt($shipper->id);
        $shipper->token_c = $token;
        $shipper->save();
        sendShipperAccountMail($shipper->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'new-password');

        return [
            'status' => 'error',
            'message' => 'Shipper not found',
            'link' => 'https://stretchxlfreight.com/dashboard/shipper-signup.php?email=' . $email . '&username=' . $username,
            'id' => $shipper->id
        ];
    }
}
function updateShipper($data)
{
    $log_file = 'vendorLogs.log';

    global $db;

    $sql = "SELECT * FROM shipper_xl_cstm WHERE email_c = '" . $data['email'] . "'";
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    if ($result) {
        $shipper = BeanFactory::getBean('shipper_xl', $result['id_c']);
        $shipper->name = $data['user_name'];
        if ($shipper->status_c != 'Active' || $shipper->status_c == null) {
            $shipper->status_c = 'Disabled';
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $shipper->password_c = encrypt($data['password']);
        }
        $shipper->save();

        $token = encrypt($shipper->id);
        $shipper->token_c = $token;
        $shipper->save();
        sendShipperAccountMail($shipper->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'login');

        return [
            'status' => 'success',
            'message' => 'Account updated successfully'
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Some Error Occurred'
        ];
    }
}
function fetchAllShipperLeads($data)
{
    $result = array();


        $shipper = BeanFactory::getBean('shipper_xl', $data['id']);
        $shipper->load_relationship('shipper_xl_freight_xl_1');
        $quotesArray = [];
        $tp_quotes = [];

        $shipper->load_relationship('shipper_xl_freight_xl_1');
        if (!empty($shipper->shipper_xl_freight_xl_1)) {
            $loads = $shipper->shipper_xl_freight_xl_1->get();
            $row = [];
            foreach ($loads as $load) {
                $load = BeanFactory::getBean('freight_xl', $load);
                $row['id'] = $load->id;
                $row['name'] = $load->name;
                $row['date_entered'] = $load->date_entered;
                $row['date_modified'] = $load->date_modified;
                $row['modified_user_id'] = $load->modified_user_id;
                $row['created_by'] = $load->created_by;
                $row['description'] = $load->description;
                $row['deleted'] = $load->deleted;
                $row['assigned_user_id'] = $load->assigned_user_id;
                $row['vehicle_source'] = $load->vehicle_source;
                $row['vehicle_cetagory'] = $load->vehicle_cetagory;
                $row['vehicle_id'] = $load->vehicle_id;
                $row['min_hours'] = $load->min_hours;
                $row['passenger'] = $load->passenger;
                $row['bags'] = $load->bags;
                $row['promhourly'] = $load->promhourly;
                $row['uc_vehicles_show'] = $load->uc_vehicles_show;
                $row['facilities'] = $load->facilities;
                $row['id_c'] = $load->id_c;
                $row['pickup_address_c'] = $load->pickup_address_c;
                $row['pickup_lat_c'] = $load->pickup_lat_c;
                $row['pickup_lng_c'] = $load->pickup_lng_c;
                $row['dropoff_address_c'] = $load->dropoff_address_c;
                $row['dropoff_lat_c'] = $load->dropoff_lat_c;
                $row['dropoff_lng_c'] = $load->dropoff_lng_c;
                $row['freight_description_c'] = $load->freight_description_c;
                $row['carrier_vehicle_type_c'] = $load->carrier_vehicle_type_c;
                $row['freight_weight_c'] = $load->freight_weight_c;
                $row['freight_length_c'] = $load->freight_length_c;
                $row['freight_width_c'] = $load->freight_width_c;
                $row['freight_height_c'] = $load->freight_height_c;
                $row['freight_pallet_count_c'] = $load->freight_pallet_count_c;
                $row['freight_box_count_c'] = $load->freight_box_count_c;
                $row['number_of_stops_c'] = $load->number_of_stops_c;
                $row['client_notes_c'] = $load->client_notes_c;
                $row['freight_shipper_name_c'] = $load->freight_shipper_name_c;
                $row['freight_shipper_phone_c'] = $load->freight_shipper_phone_c;
                $row['freight_shipper_email_c'] = $load->freight_shipper_email_c;
                $row['freight_shipper_address_c'] = $load->freight_shipper_address_c;
                $row['freight_type_c'] = $load->freight_type_c;
                $row['rate_c'] = $load->rate_c;
                $row['mileage_c'] = $load->mileage_c;
                $row['total_price_c'] = $load->total_price_c;
                $row['distance_c'] = $load->distance_c;
                $row['pickup_time_c'] = $load->pickup_time_c;
                $row['fuel_c'] = $load->fuel_c;
                $row['addons_c'] = $load->addons_c;
                $row['duration_c'] = $load->duration_c;
                $row['deadhead_price_c'] = $load->deadhead_price_c;
                $row['deadhead_distance_c'] = $load->deadhead_distance_c;
                $row['vendor_id_c'] = $load->vendor_id_c;
                $row['opertunity_id_c'] = $load->opertunity_id_c;
                $row['pickup_state_c'] = $load->pickup_state_c;
                $row['vendor_name_c'] = $load->vendor_name_c;
                $row['vendor_email_c'] = $load->vendor_email_c;
                $row['pickup_city_c'] = $load->pickup_city_c;
                $row['pickup_zip_c'] = $load->pickup_zip_c;
                $row['dropoff_city_c'] = $load->dropoff_city_c;
                $row['dropoff_state_c'] = $load->dropoff_state_c;
                $row['dropoff_zip_c'] = $load->dropoff_zip_c;
                $row['truckerpath_ref_id_c'] = $load->truckerpath_ref_id_c;
                $row['addons_total_c'] = $load->addons_total_c;
                $row['dropoff_time_c'] = $load->dropoff_time_c;
                $row['toll_c'] = $load->toll_c;
                $row['client_budget_c'] = $load->client_budget_c;
                $row['driver_info_c'] = $load->driver_info_c;
                $row['vendor_phone_c'] = $load->vendor_phone_c;
                $row['vendor_price_c'] = $load->vendor_price_c;
                $row['vendor_deposit_c'] = $load->vendor_deposit_c;
                $row['profit_c'] = $load->profit_c;
                $row['vendor_confirmation_c'] = $load->vendor_confirmation_c;
                $row['amount_paid_c'] = $load->amount_paid_c;
                $row['payments_made_c'] = $load->payments_made_c;
                $row['payment_notes_c'] = $load->payment_notes_c;
                $row['agreement_link_c'] = $load->agreement_link_c;
                $row['esigned_description_c'] = $load->esigned_description_c;
                $row['signed_agreement_link_c'] = $load->signed_agreement_link_c;
                $row['vnd_vendors_id_c'] = $load->vnd_vendors_id_c;
                $row['vnd_vechiles_id_c'] = $load->vnd_vechiles_id_c;
                $row['vendor_notes_c'] = $load->vendor_notes_c;
                $row['see_vendors_button_c'] = $load->see_vendors_button_c;
                $row['vendor_status_c'] = $load->vendor_status_c;
                $row['platform_price_c'] = $load->platform_price_c;
                $row['market_price_c'] = $load->market_price_c;
                $row['source_c'] = $load->source_c;
                $row['status_c'] = $load->status_c;
                $row['co_signer_c'] = $load->co_signer_c;
                $row['dropoff_date_c'] = $load->dropoff_date_c;
                $row['pickup_date_c'] = $load->pickup_date_c;
                $row['agreement_status_c'] = $load->agreement_status_c;
                $row['client_payment_type_c'] = $load->client_payment_type_c;
                $row['email1_c'] = $load->email1_c;
                $row['tracking_c'] = $load->tracking_c;
                $row['shipment_id_c'] = $load->shipment_id_c;
                $row['carrier_quote_ids_c'] = $load->carrier_quote_ids_c;
                $row['reminder_c'] = $load->reminder_c;
                $row['posted_c'] = $load->posted_c;

                if ($load->vendor_id_c != null) {
                    $vendor = BeanFactory::getBean('VND_Vendors', $load->vendor_id_c);
                    $row['vendor_name'] = $vendor->name;
                    $row['vendor_email'] = $vendor->email1;
                    $row['vendor_phone'] = $vendor->phone_office;
                    $row['vendor_rating'] = $vendor->safety_rating_c;
                    $row['vendor_dot'] = $vendor->dot_number;
                    $row['vendor_fmcsa'] = $vendor->fmcsa_safety_c;
                }
                    $freight = BeanFactory::getBean('freight_xl', $load->id);
                    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
                    $quotes = $freight->freight_xl_tnv_vendorquote_1->getBeans();
                    $quotesArray = [];
                    $tp_quotes = [];
                    foreach ($quotes as $quote) {
                        $quotesArray[] = [
                            'id' => $quote->id,
                            'name' => $quote->name,
                            'price' => $quote->quoted_price_c,
                            'price_with_profit' => $quote->quoted_price_with_profit_c,
                            'status' => $quote->quote_status_c,
                            'email' => $quote->vendor_email_c,
                            'phone' => $quote->vendor_phone_c,
                            'date_entered' => $quote->date_entered,
                            'date_modified' => $quote->date_modified,
                            'vendor_id' => $quote->vendor_id_c,
                            'vendor_dot' => $vendor->dot_number
                        ];
                    }
                    if(isset($load->truckerpath_ref_id_c) && $load->truckerpath_ref_id_c != ''){
                        $tp_quotes = fetchQuotesFromTP($load->truckerpath_ref_id_c);
                    }
                    $row['vendor_quotes'] = $quotesArray;
                    $row['tp_quotes'] = $tp_quotes['data']['data']['list'];
                $result[] = $row;
            }
        }

        return $result;
}
// function fetchAllShipperLeadsConverted($data)
// {
//     // return $data;
//     global $db;
//     $result = array();
//     $sql = "SELECT * FROM freight_xl 
//     JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c 
//     WHERE freight_xl_cstm.freight_shipper_email_c = '" . $data['email'] . "' AND freight_xl_cstm.status_c = 'Converted'";

//     $resultQuery = $db->query($sql);

//     while ($row = $db->fetchByAssoc($resultQuery)) {
//         if ($row['vendor_id_c'] != null) {
//             $vendor = BeanFactory::getBean('VND_Vendors', $row['vendor_id_c']);
//             $row['vendor_name'] = $vendor->name;
//             $row['vendor_email'] = $vendor->email1;
//             $row['vendor_phone'] = $vendor->phone_office;
//             $row['vendor_rating'] = $vendor->safety_rating_c;
//             $row['vendor_dot'] = $vendor->dot_number;
//             $row['vendor_fmcsa'] = $vendor->fmcsa_safety_c;

//             // First, get the freight record
//             $freight = BeanFactory::getBean('freight_xl', $row['id']);

//             // Load the relationship
//             $freight->load_relationship('freight_xl_tnv_vendorquote_1');

//             // Get all related vendor quotes and format them as an array
//             $quotes = $freight->freight_xl_tnv_vendorquote_1->getBeans();
//             $quotesArray = [];
//             $tp_quotes = [];

//             foreach ($quotes as $quote) {
//                 $quotesArray[] = [
//                     'id' => $quote->id,
//                     'name' => $quote->name,
//                     'price' => $quote->quoted_price_c,
//                     'status' => $quote->quote_status_c,
//                     'email' => $quote->vendor_email_c,
//                     'phone' => $quote->vendor_phone_c,
//                     'date_entered' => $quote->date_entered,
//                     'date_modified' => $quote->date_modified,
//                     'vendor_id' => $quote->vendor_id_c
//                 ];
//             }
//             if(isset($row['truckerpath_ref_id_c']) && $row['truckerpath_ref_id_c'] != ''){
//                 $tp_quotes = fetchQuotesFromTP($row['truckerpath_ref_id_c']);
//             }

//             $row['vendor_quotes'] = $quotesArray;
//             $row['tp_quotes'] = $tp_quotes['data']['data']['list'];
//         }
//         $result[] = $row;
//     }
//     return $result;
// }
function fetchAllShipperLeadsConverted($data)
{
    $result = array();


    $shipper = BeanFactory::getBean('shipper_xl', $data['id']);
    $shipper->load_relationship('shipper_xl_freight_xl_1');
    $quotesArray = [];
    $tp_quotes = [];

    $shipper->load_relationship('shipper_xl_freight_xl_1');
    if (!empty($shipper->shipper_xl_freight_xl_1)) {
        $loads = $shipper->shipper_xl_freight_xl_1->get();
        $row = [];
        foreach ($loads as $load) {
            $load = BeanFactory::getBean('freight_xl', $load);
            if($load->status_c == "Converted"){
                $row['id'] = $load->id;
                $row['name'] = $load->name;
                $row['date_entered'] = $load->date_entered;
                $row['date_modified'] = $load->date_modified;
                $row['modified_user_id'] = $load->modified_user_id;
                $row['created_by'] = $load->created_by;
                $row['description'] = $load->description;
                $row['deleted'] = $load->deleted;
                $row['assigned_user_id'] = $load->assigned_user_id;
                $row['vehicle_source'] = $load->vehicle_source;
                $row['vehicle_cetagory'] = $load->vehicle_cetagory;
                $row['vehicle_id'] = $load->vehicle_id;
                $row['min_hours'] = $load->min_hours;
                $row['passenger'] = $load->passenger;
                $row['bags'] = $load->bags;
                $row['promhourly'] = $load->promhourly;
                $row['uc_vehicles_show'] = $load->uc_vehicles_show;
                $row['facilities'] = $load->facilities;
                $row['id_c'] = $load->id_c;
                $row['pickup_address_c'] = $load->pickup_address_c;
                $row['pickup_lat_c'] = $load->pickup_lat_c;
                $row['pickup_lng_c'] = $load->pickup_lng_c;
                $row['dropoff_address_c'] = $load->dropoff_address_c;
                $row['dropoff_lat_c'] = $load->dropoff_lat_c;
                $row['dropoff_lng_c'] = $load->dropoff_lng_c;
                $row['freight_description_c'] = $load->freight_description_c;
                $row['carrier_vehicle_type_c'] = $load->carrier_vehicle_type_c;
                $row['freight_weight_c'] = $load->freight_weight_c;
                $row['freight_length_c'] = $load->freight_length_c;
                $row['freight_width_c'] = $load->freight_width_c;
                $row['freight_height_c'] = $load->freight_height_c;
                $row['freight_pallet_count_c'] = $load->freight_pallet_count_c;
                $row['freight_box_count_c'] = $load->freight_box_count_c;
                $row['number_of_stops_c'] = $load->number_of_stops_c;
                $row['client_notes_c'] = $load->client_notes_c;
                $row['freight_shipper_name_c'] = $load->freight_shipper_name_c;
                $row['freight_shipper_phone_c'] = $load->freight_shipper_phone_c;
                $row['freight_shipper_email_c'] = $load->freight_shipper_email_c;
                $row['freight_shipper_address_c'] = $load->freight_shipper_address_c;
                $row['freight_type_c'] = $load->freight_type_c;
                $row['rate_c'] = $load->rate_c;
                $row['mileage_c'] = $load->mileage_c;
                $row['total_price_c'] = $load->total_price_c;
                $row['distance_c'] = $load->distance_c;
                $row['pickup_time_c'] = $load->pickup_time_c;
                $row['fuel_c'] = $load->fuel_c;
                $row['addons_c'] = $load->addons_c;
                $row['duration_c'] = $load->duration_c;
                $row['deadhead_price_c'] = $load->deadhead_price_c;
                $row['deadhead_distance_c'] = $load->deadhead_distance_c;
                $row['vendor_id_c'] = $load->vendor_id_c;
                $row['opertunity_id_c'] = $load->opertunity_id_c;
                $row['pickup_state_c'] = $load->pickup_state_c;
                $row['vendor_name_c'] = $load->vendor_name_c;
                $row['vendor_email_c'] = $load->vendor_email_c;
                $row['pickup_city_c'] = $load->pickup_city_c;
                $row['pickup_zip_c'] = $load->pickup_zip_c;
                $row['dropoff_city_c'] = $load->dropoff_city_c;
                $row['dropoff_state_c'] = $load->dropoff_state_c;
                $row['dropoff_zip_c'] = $load->dropoff_zip_c;
                $row['truckerpath_ref_id_c'] = $load->truckerpath_ref_id_c;
                $row['addons_total_c'] = $load->addons_total_c;
                $row['dropoff_time_c'] = $load->dropoff_time_c;
                $row['toll_c'] = $load->toll_c;
                $row['client_budget_c'] = $load->client_budget_c;
                $row['driver_info_c'] = $load->driver_info_c;
                $row['vendor_phone_c'] = $load->vendor_phone_c;
                $row['vendor_price_c'] = $load->vendor_price_c;
                $row['vendor_deposit_c'] = $load->vendor_deposit_c;
                $row['profit_c'] = $load->profit_c;
                $row['vendor_confirmation_c'] = $load->vendor_confirmation_c;
                $row['amount_paid_c'] = $load->amount_paid_c;
                $row['payments_made_c'] = $load->payments_made_c;
                $row['payment_notes_c'] = $load->payment_notes_c;
                $row['agreement_link_c'] = $load->agreement_link_c;
                $row['esigned_description_c'] = $load->esigned_description_c;
                $row['signed_agreement_link_c'] = $load->signed_agreement_link_c;
                $row['vnd_vendors_id_c'] = $load->vnd_vendors_id_c;
                $row['vnd_vechiles_id_c'] = $load->vnd_vechiles_id_c;
                $row['vendor_notes_c'] = $load->vendor_notes_c;
                $row['see_vendors_button_c'] = $load->see_vendors_button_c;
                $row['vendor_status_c'] = $load->vendor_status_c;
                $row['platform_price_c'] = $load->platform_price_c;
                $row['market_price_c'] = $load->market_price_c;
                $row['source_c'] = $load->source_c;
                $row['status_c'] = $load->status_c;
                $row['co_signer_c'] = $load->co_signer_c;
                $row['dropoff_date_c'] = $load->dropoff_date_c;
                $row['pickup_date_c'] = $load->pickup_date_c;
                $row['agreement_status_c'] = $load->agreement_status_c;
                $row['client_payment_type_c'] = $load->client_payment_type_c;
                $row['email1_c'] = $load->email1_c;
                $row['tracking_c'] = $load->tracking_c;
                $row['shipment_id_c'] = $load->shipment_id_c;
                $row['carrier_quote_ids_c'] = $load->carrier_quote_ids_c;
                $row['reminder_c'] = $load->reminder_c;
                $row['posted_c'] = $load->posted_c;
        
                if ($load->vendor_id_c != null) {
                    $vendor = BeanFactory::getBean('VND_Vendors', $load->vendor_id_c);
                    $row['vendor_name'] = $vendor->name;
                    $row['vendor_email'] = $vendor->email1;
                    $row['vendor_phone'] = $vendor->phone_office;
                    $row['vendor_rating'] = $vendor->safety_rating_c;
                    $row['vendor_dot'] = $vendor->dot_number;
                    $row['vendor_fmcsa'] = $vendor->fmcsa_safety_c;
                }
                    $freight = BeanFactory::getBean('freight_xl', $load->id);
                    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
                    $quotes = $freight->freight_xl_tnv_vendorquote_1->getBeans();
                    $quotesArray = [];
                    $tp_quotes = [];
                    foreach ($quotes as $quote) {
                        $quotesArray[] = [
                            'id' => $quote->id,
                            'name' => $quote->name,
                            'price' => $quote->quoted_price_c,
                            'status' => $quote->quote_status_c,
                            'email' => $quote->vendor_email_c,
                            'phone' => $quote->vendor_phone_c,
                            'date_entered' => $quote->date_entered,
                            'date_modified' => $quote->date_modified,
                            'vendor_id' => $quote->vendor_id_c,
                            'vendor_dot' => $vendor->dot_number
                        ];
                    }
                    if(isset($load->truckerpath_ref_id_c) && $load->truckerpath_ref_id_c != ''){
                        $tp_quotes = fetchQuotesFromTP($load->truckerpath_ref_id_c);
                    }
                    $row['vendor_quotes'] = $quotesArray;
                    $row['tp_quotes'] = $tp_quotes['data']['data']['list'];
                $result[] = $row;
            }
            
        }
    }

    return $result;
}
// Vendor Functions
function createVendor($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor saved: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    global $db;

    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['email'] . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'error',
            'message' => 'Email already exists'
        ];
    }

    $vendor = BeanFactory::newBean('VND_Vendors');
    if (isset($data['ref_id']) && $data['ref_id'] != '') {
        $vendor->referred_by_c = $data['ref_id'];
        $refVendor = BeanFactory::getBean('VND_Vendors', $data['ref_id']);
    }
    $vendor->name = $data['user_name'];
    $vendor->username = $data['user_name'];
    $vendor->email1 = $data['email'];
    $vendor->status = 'Disabled';
    if(isset($data['type']) && $data['type'] == 'dot'){
        $vendor->dot_number = $data['number'];
    }else{
        $vendor->mc_number_c = $data['number'];
    }
    $vendor->password = encrypt($data['password']);
    $vendor->save();
    if (isset($data['ref_id']) && $data['ref_id'] != '') {
        if ($refVendor->total_referrers_c == '') {
            $refVendor->total_referrers_c = $vendor->id;
        } else {
            $refVendor->total_referrers_c = $refVendor->total_referrers_c . '|' . $vendor->id;
        }
        $refVendor->save();
    }

    $token = encrypt($vendor->id);
    $vendor->token_c = $token;
    $vendor->save();
    sendVendorAccountMail($vendor->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'login');

    return [
        'status' => 'success',
        'message' => 'Account created successfully'
    ];
}
function sendVendorAccountMail($id, $email_temp, $token, $redirect)
{
    $result = array();
    $log_file = 'vendorLogs.log';

    try {
        // Get shipper details
        $vendor = BeanFactory::getBean('VND_Vendors', $id);
        if (!$vendor) {
            throw new Exception('Vendor not found');
        }

        $link = 'https://stretchxlfreight.com/vendor/verify.php?token=' . urlencode($token) . '&email=' . urlencode($vendor->email1) . '&redirect=' . urlencode($redirect);

        // Log the action
        $log_message = '[' . date('Y-m-d H:i:s') . '] Password reset mail sent to shipper ID: ' . $id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($email_temp);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

        // Replace template variables
        $emailTemp->body_html = str_replace('$shipper_name', $vendor->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$link', $link, $emailTemp->body_html);

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'VND_Vendors';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($id)) {
                $vendor = BeanFactory::getBean('VND_Vendors', $id);
                if ($vendor) {
                    // Load the relationship
                    $vendor->load_relationship('vnd_vendors_emails_1');

                    // Make sure the relationship is loaded
                    if ($vendor->vnd_vendors_emails_1) {
                        // Use the relationship's add() method
                        $vendor->vnd_vendors_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $vendor->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for vendor ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Password reset email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendForgetPasswordMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function forgetPasswordVendor($data)
{
    global $db;
    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['email'] . "%'";
    $result = $db->query($sql);
    if ($result->num_rows == 0) {
        return [
            'status' => 'error',
            'message' => 'Invalid email or password'
        ];
    }
    while ($row = $result->fetch_assoc()) {
        $vendor = BeanFactory::getBean('VND_Vendors', $row['bean_id']);
        $token = encrypt($vendor->id);
        $vendor->token_c = $token;
        $vendor->save();
        sendVendorAccountMail($vendor->id, '28b5fec5-4b7f-0327-c60a-5693eccca2b8', $token, 'new-password');
        return [
            'status' => 'success',
            'message' => 'Password reset link sent to your email'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Invalid email or password'
    ];
}
function verifyTokenVendor($data)
{
    // return $data;
    $result = array();
    global $db;
    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['email'] . "%'";
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    // return $sql;

    if ($result) {
        $vendor = BeanFactory::getBean('VND_Vendors', $result['bean_id']);
        $vendor->status = 'Active';
        $vendor->save();
        $result['status'] = 'success';
        $result['message'] = 'Token verified successfully';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Invalid token';
    }

    return $result;
}
function resetPasswordVendor($data)
{
    global $db;
    $sql = 'SELECT * FROM vnd_vendors_cstm WHERE  token_c = "' . $data['token'] . '"';
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    if ($result) {
        $vendor = BeanFactory::getBean('VND_Vendors', $result['id_c']);
        $vendor->password = encrypt($data['password']);
        $username = explode('@', $vendor->email1);
        $vendor->username = $username[0];
        $vendor->save();
        $result['status'] = 'success';
        $result['message'] = 'Password reset successfully';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Invalid token';
    }

    return $result;
}
function vendorLogin($data)
{
    global $db;
    // return $data;
    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['email'] . "%'";
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    // return $result['bean_id'];

    if (!isset($result['bean_id']) || $result['bean_id'] == null || $result['bean_id'] == '') {
        return [
            'status' => 'error',
            'message' => 'Invalid email or password'
        ];
    }

    // while ($row = $result->fetch_assoc()) {
    $vendor = BeanFactory::getBean('VND_Vendors', $result['bean_id']);
    if ($vendor->status == 'Disabled') {
        return [
            'status' => 'error',
            'message' => 'Please click the email link we sent you to verify your account!'
        ];
    }
    if (decrypt($vendor->password) == $data['password']) {
        return [
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'email' => $vendor->email1,
                'profile_status' => $vendor->profile_status_c,
                'dot_number' => $vendor->dot_number,
                'mc_number' => $vendor->mc_number_c,
                'vnd_type' => $vendor->vnd_vendors_type,
                'phone' => $vendor->phone_office,
                'city' => $vendor->billing_address_city,
                'state' => $vendor->billing_address_state,
                'zip' => $vendor->billing_address_postalcode,
                'street' => $vendor->billing_address_street,
                'tier_status' => $vendor->tier_status_c,
                'has_vehicle' => $vendor->has_vehicle_c,
            ]
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Invalid email or password'
        ];
    }
    // }
}
function updateVendor($data)
{
    $log_file = 'vendorLogs.log';

    global $db;

    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['email'] . "%'";
    $result = $db->query($sql);
    $result = $db->fetchByAssoc($result);
    if ($result) {
        $vendor = BeanFactory::getBean('VND_Vendors', $result['bean_id']);
        $vendor->name = $data['user_name'];
        $vendor->username = $data['user_name'];
        $vendor->dot_number = $data['dot_number'];
        $vendor->mc_number_c = $data['mc_number'];
        $vendor->billing_address_street = $data['street'];
        $vendor->billing_address_state = $data['state'];
        $vendor->vnd_vendors_type = $data['vnd_type'];
        $vendor->phone_office = $data['phone'];
        $vendor->billing_address_city = $data['city'];
        $vendor->billing_address_postalcode = $data['zip'];
        if(isset($vendor->mc_number_c) && $vendor->mc_number_c != '' && isset($vendor->billing_address_street) && $vendor->billing_address_street != '' && isset($vendor->billing_address_state) && $vendor->billing_address_state != '' && isset($vendor->billing_address_city) && $vendor->billing_address_city != '' && isset($vendor->billing_address_postalcode) && $vendor->billing_address_postalcode != ''){
           
            $vendor->profile_status_c = 'Complete';
        }

        if ($vendor->status_c != 'Active' || $vendor->status_c == null) {
            $vendor->status_c = 'Disabled';
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $vendor->password = encrypt($data['password']);
        }
        $vendor->save();

        $token = encrypt($vendor->id);
        $vendor->token_c = $token;
        $vendor->save();

        if (isset($data['password']) && !empty($data['password'])) {
            sendVendorAccountMail($vendor->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'login');
        }

        return [
            'status' => 'success',
            'message' => 'Account updated successfully',
            'data' => [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'email' => $vendor->email1,
                'profile_status' => $vendor->profile_status_c,
                'dot_number' => $vendor->dot_number,
                'mc_number' => $vendor->mc_number_c,
                'vnd_type' => $vendor->vnd_vendors_type,
                'phone' => $vendor->phone_office,
                'city' => $vendor->billing_address_city,
                'state' => $vendor->billing_address_state,
                'zip' => $vendor->billing_address_postalcode,
                'street' => $vendor->billing_address_street,
            ]
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Some Error Occurred'
        ];
    }
}

function fetchAllVendorLeads($data)
{
    // return $data;
    global $db;
    $result = array();
    // $sql = "SELECT * FROM freight_xl 
    // JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c 
    // WHERE freight_xl_cstm.vendor_id_c = '" . $data['id'] . "' OR freight_xl_cstm.carrier_quote_ids_c LIKE '%" . $data['id'] . "%' AND freight_xl.deleted = 0";
$sql = "SELECT *
FROM freight_xl
JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c
WHERE (
    freight_xl_cstm.vendor_id_c LIKE '%" . $data['id'] . "%'
    OR freight_xl_cstm.carrier_quote_ids_c LIKE '%" . $data['id'] . "%'
)
AND freight_xl.deleted = 0;
";
    $resultQuery = $db->query($sql);

    while ($row = $db->fetchByAssoc($resultQuery)) {
                    $freight = BeanFactory::getBean('freight_xl', $row['id']);
                    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
                    $quotes = $freight->freight_xl_tnv_vendorquote_1->getBeans();
                    $quotesArray = [];
                    $tp_quotes = [];
                    foreach ($quotes as $quote) {
                        $quotesArray[] = [
                            'id' => $quote->id,
                            'name' => $quote->name,
                            'price' => $quote->quoted_price_c,
                            'price_with_profit' => $quote->quoted_price_with_profit_c,
                            'status' => $quote->quote_status_c,
                            'email' => $quote->vendor_email_c,
                            'phone' => $quote->vendor_phone_c,
                            'date_entered' => $quote->date_entered,
                            'date_modified' => $quote->date_modified,
                            'vendor_id' => $quote->vendor_id_c,
                            'vendor_dot' => $vendor->dot_number
                        ];
                    }
                      $row['vendor_quotes'] = $quotesArray;
        $result[] = $row;
    }
    return $result;
}
function fetchAllVendorLeadsConverted($data)
{
    // return $data;
    global $db;
    $result = array();
    $sql = "SELECT *
FROM freight_xl
JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c
WHERE (
    freight_xl_cstm.vendor_id_c LIKE '%" . $data['id'] . "%'
    OR freight_xl_cstm.carrier_quote_ids_c LIKE '%" . $data['id'] . "%'
)
AND freight_xl.deleted = 0 AND freight_xl_cstm.status_c = 'Converted'
";
    // $sql = "SELECT * FROM freight_xl 
    // JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c 
    // WHERE freight_xl_cstm.vendor_id_c = '" . $data['id'] . "' AND freight_xl_cstm.status_c = 'Converted' AND freight_xl.deleted = 0";

    $resultQuery = $db->query($sql);

    while ($row = $db->fetchByAssoc($resultQuery)) {
         $freight = BeanFactory::getBean('freight_xl', $row['id']);
                    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
                    $quotes = $freight->freight_xl_tnv_vendorquote_1->getBeans();
                    $quotesArray = [];
                    $tp_quotes = [];
                    foreach ($quotes as $quote) {
                        $quotesArray[] = [
                            'id' => $quote->id,
                            'name' => $quote->name,
                            'price' => $quote->quoted_price_c,
                            'price_with_profit' => $quote->quoted_price_with_profit_c,
                            'status' => $quote->quote_status_c,
                            'email' => $quote->vendor_email_c,
                            'phone' => $quote->vendor_phone_c,
                            'date_entered' => $quote->date_entered,
                            'date_modified' => $quote->date_modified,
                            'vendor_id' => $quote->vendor_id_c,
                            'vendor_dot' => $vendor->dot_number
                        ];
                    }
                      $row['vendor_quotes'] = $quotesArray;
        $result[] = $row;
    }
    return $result;
}
function fetchAllVendorLeadsFormal($data)
{
    // return $data;
    global $db;
    $result = array();
    // $sql = "SELECT * FROM freight_xl 
    // JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c 
    // WHERE freight_xl_cstm.vendor_id_c = '" . $data['id'] . "' AND freight_xl_cstm.status_c = 'Formal' AND freight_xl.deleted = 0";
     $sql = "SELECT *
FROM freight_xl
JOIN freight_xl_cstm ON freight_xl.id = freight_xl_cstm.id_c
WHERE (
    freight_xl_cstm.vendor_id_c LIKE '%" . $data['id'] . "%'
    OR freight_xl_cstm.carrier_quote_ids_c LIKE '%" . $data['id'] . "%'
)
AND freight_xl.deleted = 0 AND freight_xl_cstm.status_c = 'Formal'
";

    $resultQuery = $db->query($sql);

    while ($row = $db->fetchByAssoc($resultQuery)) {
        $result[] = $row;
    }
    return $result;
}
function fetchAllVendorVehicles($data)
{
    global $db;
    $result = array();
    $sql = "SELECT v.*, vc.*
        FROM vnd_vechiles v
        JOIN vnd_vechiles_cstm vc ON v.id = vc.id_c
        JOIN vnd_vechiles_vnd_vendors_c vvc ON v.id = vvc.vnd_vechiles_vnd_vendorsvnd_vechiles_idb
        WHERE vvc.vnd_vechiles_vnd_vendorsvnd_vendors_ida = '" . $data['id'] . "'
        AND v.deleted = 0;";

    $resultQuery = $db->query($sql);
    while ($row = $db->fetchByAssoc($resultQuery)) {
        $result[] = $row;
    }
    return $result;
}
function fetchVehicleById($data)
{
    $vehicle = BeanFactory::getBean('VND_Vechiles', $data['id']);
    $result = array();
    $result['id'] = $vehicle->id;
    $result['name'] = $vehicle->name;
    $result['capacity'] = $vehicle->vehicle_capacity;
    $result['quantity'] = $vehicle->vehicle_quantity;
    $result['hourly_rate'] = $vehicle->base_hourly_rate;
    $result['fuel_percentage'] = $vehicle->fuel_surcharge_percentage;
    $result['gratuity_percentage'] = $vehicle->driver_gratuity_percentage;
    $result['status'] = $vehicle->published_c;
    $result['created_at'] = $vehicle->date_entered;
    $result['pickup_city'] = $vehicle->pickup_city_c;
    $result['pickup_state'] = $vehicle->pickup_state_c;
    $result['pickup_address'] = $vehicle->pickup_address_c;
    $result['availability'] = $vehicle->availability_type_c;
    $result['vehicle_type'] = $vehicle->vehicle_type_c;
    $result['images'] = $vehicle->images;
    $result['mileage'] = $vehicle->mileage_c;
    return $result;
}
function updateVehicle($data)
{
    $vehicle = BeanFactory::getBean('VND_Vechiles', $data['id']);
    $result = array();
    $vehicle->name = $data['name'];
    $vehicle->vehicle_capacity = $data['capacity'];
    $vehicle->vehicle_quantity = $data['quantity'];
    $vehicle->base_hourly_rate = $data['hourly_rate'];
    $vehicle->vehicle_type_c = $data['vehicle_type'];
    $vehicle->vehicle_model = $data['model'];
    $vehicle->fuel_surcharge_percentage = $data['fuel_percentage'];
    $vehicle->driver_gratuity_percentage = $data['gratuity_percentage'];
    $vehicle->published_c = $data['status'];
    $vehicle->pickup_city_c = $data['pickup_city'];
    $vehicle->pickup_state_c = $data['pickup_state'];
    $vehicle->pickup_address_c = $data['pickup_address'];
    $vehicle->availability_type_c = $data['availability'];
    $vehicle->mileage_c = $data['mileage'];
    $vehicle->images = $data['images'];
    $vehicle->save();
    $result['status'] = 'success';
    $result['message'] = 'Vehicle updated successfully';

    return $result;
}
function addVehicle($data)
{
    $vehicle = BeanFactory::newBean('VND_Vechiles');
    $result = array();
    $vehicle->name = $data['name'];
    $vehicle->vehicle_capacity = $data['capacity'];
    $vehicle->vehicle_quantity = $data['quantity'];
    $vehicle->base_hourly_rate = $data['hourly_rate'];
    $vehicle->vehicle_model = $data['model'];
    $vehicle->fuel_surcharge_percentage = $data['fuel_percentage'];
    $vehicle->driver_gratuity_percentage = $data['gratuity_percentage'];
    $vehicle->published_c = $data['status'];
    $vehicle->pickup_city_c = $data['pickup_city'];
    $vehicle->pickup_state_c = $data['pickup_state'];
    $vehicle->pickup_address_c = $data['pickup_address'];
    $vehicle->vehicle_type_c = $data['vehicle_type'];
    $vehicle->availability_type_c = $data['availability'];
    $vehicle->mileage_c = $data['mileage'];
    $vehicle->images = $data['images'];
    $vehicle->save();

    $vehicle->load_relationships('vnd_vechiles_vnd_vendors');
    $vehicle->vnd_vechiles_vnd_vendors->add($data['vendor_id']);
    $vehicle->save();

    $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);
    $vendor->has_vehicle_c = "1";
    $vendor->save();
    $result['status'] = 'success';
    $result['message'] = 'Vehicle added successfully';

    return $result;
}
function deleteVehicle($data)
{
    $vehicle = BeanFactory::getBean('VND_Vechiles', $data['id']);
    $vehicle->deleted = 1;
    $vehicle->save();

    $result['status'] = 'success';
    $result['message'] = 'Vehicle deleted successfully';
    return $result;
}
function updateShipmentStatus($data)
{
    $freight = BeanFactory::getBean('freight_xl', $data['id']);
    if ($freight === false) {
        $result['status'] = 'error';
        $result['message'] = 'Record not found';
        return $result;
    }
    // $loadStatus = $freight->status_c;

    if ($data['status'] == '1' || $data['status'] == 1) {
        $vendor = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);
        if ($vendor !== false) {
            $quote = BeanFactory::newBean('tnv_VendorQuote');
            $quote->name = $vendor->name;
            $quote->vendor_email_c = $vendor->email1;
            $quote->vendor_phone_c = $vendor->phone_office;
            $quote->quoted_price_c = $freight->total_price_c;
            $quote->quote_status_c = 'Pending';
            $quote->vendor_id_c = $vendor->id;
            $quoteData = array(
                'id' => $freight->id,
                'name' => $freight->freight_shipper_name_c,
                'email' => $freight->freight_shipper_email_c,
                'module' => 'freight_xl',
                'email_temp' => '4742bee5-b037-d803-0b2c-6603ebdfdb93',
                'link' => 'https://stretchxlfreight.com/dashboard/'
            );
            sendQuoteMailNew($quoteData);

            $quote->save();
            $freight->load_relationship('freight_xl_tnv_vendorquote_1');
            $freight->freight_xl_tnv_vendorquote_1->add($quote->id);
            $freight->status_c = 'Formal';
        }
    }
    
    // Only update vendor_status_c, leave status_c as is

    // $freight->status_c = $loadStatus;
    $freight->vendor_status_c = $data['status'];
    $freight->save();

    $result['status'] = 'success';
    $result['message'] = 'Status updated successfully';
    return $result;
}
function fetchShipmentById($data)
{
    // return $data;
    $shipment = BeanFactory::getBean('freight_xl', $data['id']);
    $result = array();
    $result['id'] = $shipment->id;
    $result['type'] = $shipment->freight_type_c;
    $result['description'] = $shipment->freight_description_c;
    $result['carrier_vehicle_type'] = $shipment->carrier_vehicle_type_c;
    $result['rate'] = $shipment->rate_c;
    $result['mileage'] = $shipment->mileage_c;
    $result['fuel'] = $shipment->fuel_c;
    $result['distance'] = $shipment->distance_c;
    $result['duration'] = $shipment->duration_c;
    $result['pickup_time'] = $shipment->pickup_time_c;
    $result['pickup_date'] = $shipment->pickup_date_c;
    $result['pickup_address'] = $shipment->pickup_address_c;
    $result['dropoff_address'] = $shipment->dropoff_address_c;
    $result['dropoff_date'] = $shipment->dropoff_date_c;
    $result['dropoff_time'] = $shipment->dropoff_time_c;
    $result['freight_length'] = $shipment->freight_length_c;
    $result['freight_weight'] = $shipment->freight_weight_c;
    $result['freight_type'] = $shipment->freight_type_c;
    $result['freight_width'] = $shipment->freight_width_c;
    $result['freight_height'] = $shipment->freight_height_c;
    $result['freight_pallet_count'] = $shipment->freight_pallet_count_c;
    $result['freight_box_count'] = $shipment->freight_box_count_c;
    $result['number_of_stops'] = $shipment->number_of_stops_c;
    $result['platform_price'] = $shipment->platform_price_c;
    $result['addons'] = $shipment->addons_c;
    $result['addons_total'] = $shipment->addons_total_c;
    $result['shipper_name'] = $shipment->freight_shipper_name_c;
    $result['shipper_address'] = $shipment->freight_shipper_address_c;
    $result['shipper_phone'] = $shipment->freight_shipper_phone_c;
    $result['shipper_email'] = $shipment->freight_shipper_email_c;
    $result['vendor_status'] = $shipment->vendor_status_c;
    $result['status'] = $shipment->status_c;
    $result['vendor_id'] = $shipment->vendor_id_c;
    $result['total_price'] = $shipment->total_price_c;
    $result['opertunity_id'] = $shipment->opertunity_id_c;

    $shipment->load_relationship('freight_xl_tnv_vendorquote_1');

    // Get all related vendor quotes and format them as an array
    $quotes = $shipment->freight_xl_tnv_vendorquote_1->getBeans();
    $quotesArray = [];

    foreach ($quotes as $quote) {
        if ($quote->vendor_id_c == $data['vendor_id']) {
            $quotesArray[] = [
                'id' => $quote->id,
                'name' => $quote->name,
                'price' => $quote->quoted_price_c,
                'status' => $quote->quote_status_c,
                'email' => $quote->vendor_email_c,
                'phone' => $quote->vendor_phone_c,
                'date_entered' => $quote->date_entered,
                'date_modified' => $quote->date_modified,
                'vendor_id' => $quote->vendor_id_c
            ];
        }
    }

    $result['vendor_quotes'] = $quotesArray;

    return $result;
}
function uberRates($pickup, $dropoff, $pickup_date)
{
    $pickup_lat_long = get_lat_long($pickup);
    $dropoff_lat_long = get_lat_long($dropoff);

    $pickup_city_state = extractCityState($pickup);
    $dropoff_city_state = extractCityState($dropoff);

    $url = 'https://www.uber.com/freight/platform/api/fetchLanePrices?localeCode=en';

    // Prepare headers
    $headers = [
        'accept: */*',
        'accept-language: en-US,en;q=0.9',
        'content-type: application/json',
        'priority: u=1, i',
        'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'x-csrf-token: x',
        'Referer: https://www.uber.com/freight/platform/create-load?loadType=FTL',
        'Referrer-Policy: strict-origin-when-cross-origin',
        'Cookie: marketing_vistor_id=1849b9f3-67ba-481d-b1c4-9699e2f8f8a8; udi-id=ymtW1mCpKr7A+PxAYGYgZukRbxvRlSfBEWUaLrDMUemmiEWa63rigoymA0enzLEYGL5/tzXTQxwHXt/xsDOA9UUZTYk5U16VbrR6rbbiqzc15F5DpE0uNqkOt0K5HmFbn3ueJFmsNGJHluT4BcM3R9B+zwQEWuCYGhHai1um2ZfknAdJw/G6diYUQWEPXwBMJt5ri8AH88cSsOVevs3WaQ==2HB2coRqpiORoN1bX3uhow==+b7RxJgTKZJE54zRWoar3Hgv2LwxRHfmhzfZz4ncT+w=; CONSENTMGR=1750853402959|consent:true; UBER_CONSENTMGR=1750853402960|consent:true; u-cookie-prefs=eyJ2ZXJzaW9uIjoxMDAsImRhdGUiOjE3NTA4NTM0MDMwOTAsImNvb2tpZUNhdGVnb3JpZXMiOlsiYWxsIl0sImltcGxpY2l0Ijp0cnVlfQ%3D%3D; sent-gtm-consent=true; _ga=GA1.1.771380613.1750853404; hubspotutk=6aaacc2d347e057c5548257704ff6752; _gcl_au=1.1.340582420.1750853846; _ga_4N6XJEFJV9=GS2.1.s1750856321$o2$g0$t1750856321$j60$l0$h0; sid=QA.CAESELkbUYOzvUtjlX3sP2i_7N8YtK2XxAYiATEqJDFkNzRjZWIwLTE2Y2EtNGUxMS1iMDUzLTAyNmJlN2E1YTUyOTI8TdEbf6h0xpUeOfGo_5MplWTE_A1yp374qbVPU71O-O2ecKS8IrTMRrrysJgw_nFMy5WQSHJIesGIQdawOgExQgh1YmVyLmNvbQ.sUTl8-NJ2JzWXJVaifdfWyIFSa5VVtmDIWnOrFHxeyU; smeta={\"expiresAt\":1753601716455}; csid=1.1753601717244.Mzq+evsUoUC0gh1DO0mlj7pzyAtOV3JuIZThVZ8KYME=; __cf_bm=kqco1tH3y8B6twEustCo9ua5Nuqxu6mIiFxnkitrEcY-1751108137-1.0.1.1-jlvHbkEjqxVZZd9QaTcrcOsCWoDfc7gWtBQXrBxxDhxgFC3A8QATw5pJLJUwJfyvbqbLDMRYwiNVryL8ZJnD48R1CwzEpqqixhnYZZHZJAk; _ua={\"session_id\":\"a681a7ea-7c60-4f66-b5b4-4e91f876c788\",\"session_time_ms\":1751108137856}; jwt-session=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7InRlbmFuY3kiOiJ1YmVyL3Byb2R1Y3Rpb24ifSwiaWF0IjoxNzUxMTA4MTM4LCJleHAiOjE3NTExOTQ1Mzh9.JH9VO8qPCfQ1LSWxx_xPqBB-I_wifUpZ2v62tkF-XxA; _uetsid=70ca5d20540e11f0a8aa173a65c54c26; _uetvid=70caafa0540e11f09e1e038dcce38aae; __hstc=183424633.6aaacc2d347e057c5548257704ff6752.1750853406886.1751042393568.1751108145221.4; __hssrc=1; __hssc=183424633.1.1751108145221; x-uber-analytics-session-id=cd38c3e6-335b-4ad2-aebc-344e80e867e8; udi-fingerprint=HUu2UKt1nLChMMi7F5r2xrUvPePFhgS13rLfIbWuZF4XkBQTcGubnPgstpVVLvlbafBt3Mu4sMLp58/Hhaf+ag==HXG1njJ0hXic6sdlLTTakE/NN4FBpvCKlJg/P6E8/xw=; _ga_4LFS4XVKRN=GS2.1.s1751108144$o6$g1$t1751108238$j28$l0$h0'
    ];

    // Prepare request body
    $postData = [
        'waypoints' => [
            [
                'city' => $pickup_city_state['city'],
                'countryIso2' => 'US',
                'id' => $pickup,
                'latitude' => $pickup_lat_long['lat'],
                'longitude' => $pickup_lat_long['long'],
                'state' => $pickup_city_state['state'],
                'timeZone' => 'America/New_York',
                'zipCodes' => [''],
                'postalCode' => '',
                'type' => 'CITY_LOCATION',
                'name' => $pickup
            ],
            [
                'city' => $dropoff_city_state['city'],
                'countryIso2' => 'US',
                'id' => $dropoff,
                'latitude' => $dropoff_lat_long['lat'],
                'longitude' => $dropoff_lat_long['long'],
                'state' => $dropoff_city_state['state'],
                'timeZone' => 'America/New_York',
                'zipCodes' => [''],
                'postalCode' => '',
                'type' => 'CITY_LOCATION',
                'name' => $dropoff
            ]
        ],
        'loadRequirements' => ['equipmentRequirement' => 'VAN'],
        'numberOfDays' => 21,
        'startDate' => 1751295600000,
        'opportunityCreationType' => 'v2',
        'pricingOptions' => ['applyCreditCardSurcharge' => false],
        'shippingMode' => 'FTL',
        'isAllowlistedForImdl' => false,
        'includeCustomerTierOptions' => true,
        'qs' => ['loadType' => 'FTL'],
        '_logging' => [
            'shipperUuid' => '10c0d66a-6c6e-453f-b9a9-ea4091d6825f',
            'shipperName' => 'Stretch XL Freight'
        ]
    ];

    return $postData;
    // Initialize cURL
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check for errors
    if (curl_errno($ch)) {
        return ['error' => 'Curl error: ' . curl_error($ch)];
    }

    curl_close($ch);

    // Decode the response
    // $result = json_decode($response, true);

    // Return the first FTL opportunity or the full response
    // return $result['data']['ftlOpportunities'][0] ?? $result;

    $result = json_decode($response, true);

    // Get the first FTL opportunity or return the full response if not found
    $opportunity = $result['data']['ftlOpportunities'][0] ?? $result;

    // If we have a pickup_date in the request, try to find the matching rate
    if (!empty($pickup_date) && isset($opportunity['dates']) && is_array($opportunity['dates'])) {
        // Convert the provided pickup_date to a timestamp for comparison
        $pickupDate = strtotime($pickup_date);
        $pickupDateMs = $pickupDate * 1000;  // Convert to milliseconds

        // Find the first date that matches or is after the requested pickup date
        $matchingDate = null;
        foreach ($opportunity['dates'] as $dateMs) {
            if ($dateMs >= $pickupDateMs) {
                $matchingDate = $dateMs;
                break;
            }
        }

        // If we found a matching date, add it to the response
        if ($matchingDate !== null) {
            $opportunity['selectedPickupDate'] = $matchingDate;
            $opportunity['selectedPickupDateFormatted'] = date('Y-m-d H:i:s', $matchingDate / 1000);
        }
    }

    // Calculate the total rate in dollars (converting from cents)
    if (isset($opportunity['fareInCents'])) {
        $opportunity['rate'] = [
            'amount' => $opportunity['fareInCents'] / 100,
            'currency' => $opportunity['currencyCode'] ?? 'USD'
        ];
    }

    return $opportunity['rate'];
}
function extractCityState($address)
{
    // Split the address by commas and trim whitespace
    $parts = array_map('trim', explode(',', $address));

    // The city is typically the second-to-last part
    $city = isset($parts[count($parts) - 3]) ? $parts[count($parts) - 3] : '';

    // The state and ZIP are in the last part, so we'll split by space
    $stateZip = isset($parts[count($parts) - 2]) ? $parts[count($parts) - 2] : '';
    $stateZipParts = explode(' ', trim($stateZip));
    $state = $stateZipParts[0] ?? '';

    return [
        'city' => $city,
        'state' => $state
    ];
}
function updateQuote($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Quote Data Updating: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = array();
    $quote = BeanFactory::getBean('tnv_VendorQuote', $data['id']);
    $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);
    $quoteData = array(
        'id' => $vendor->id,
        'name' => $vendor->name,
        'email' => $vendor->email1,
        'module' => 'VND_Vendors',
        'link' => 'https://stretchxlfreight.com/vendor/editShipment.php?id=' . $data['freight_id'],
        'email_temp' => '31c49591-265c-b85a-e792-68ac5ad68ed3',

    );
    $log_message = '[' . date('Y-m-d H:i:s') . '] Quote Email Data Updating: ' . json_encode($quoteData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    // if($data['status'] == 'rejected'){
        
    // }
    sendQuoteMailNew($quoteData);
    $quote->quote_status_c = $data['status'];
    $quote->save();
    $result['status'] = 'success';
    $result['message'] = 'Quote updated successfully';
    return $result;
}
function updateShipmentCustomPrice($data)
{
    $quote = BeanFactory::newBean('tnv_VendorQuote');
    $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);
    $freight = BeanFactory::getBean('freight_xl', $data['shipment_id']);

    $lead_Charges = leadCharges();

    // return $lead_Charges;
    $client_markup = (floatval($lead_Charges['Client_Markup']) / 100);

    $price_with_profit = $data['price'] + ($data['price'] * $client_markup);

    $quote->name = $vendor->name;
    $quote->vendor_email_c = $vendor->email1;
    $quote->vendor_phone_c = $vendor->phone_office;
    $quote->vendor_id_c = $data['vendor_id'];
    $quote->quoted_price_c = $data['price'];
    $quote->quoted_price_with_profit_c = $price_with_profit;
    $quote->quote_status_c = 'Pending';
    $quote->save();
    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
    $freight->freight_xl_tnv_vendorquote_1->add($quote->id);
    $freight->status_c = 'Formal';
    $freight->vendor_status_c = '1';
    $freight->save();
    $result['status'] = 'success';
    $result['message'] = 'Quote updated successfully';

    $quoteData = array(
        'id' => $freight->id,
        'name' => $freight->freight_shipper_name_c,
        'email' => $freight->freight_shipper_email_c,
        'module' => 'freight_xl',
        'email_temp' => '4742bee5-b037-d803-0b2c-6603ebdfdb93',
        'link' => 'https://stretchxlfreight.com/dashboard/'
    );
    sendQuoteMailNew($quoteData);
    return $result;
}
function addLoad($data)
{
    // return $data;
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Load received: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    // return true;
    // return $data;
    $result = get_pricing($data['pickup_address'], $data['dropoff_address']);
    // return $result;


    // $log_message = '[' . date('Y-m-d H:i:s') . "] Load Pricing : " . json_encode($result) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    $rate = 3; // Default rate if no valid rates are found
    
    // Calculate average of non-null and non-zero rates
    if (isset($result['rates']) && is_array($result['rates'])) {
        $validRates = array_filter($result['rates'], function($item) {
            return isset($item['avgRate']) && $item['avgRate'] !== null && $item['avgRate'] > 0;
        });
        
        if (!empty($validRates)) {
            $sum = array_sum(array_column($validRates, 'avgRate'));
            $rate = $sum / count($validRates);
        }
    }
    $rate = number_format($rate, 2);
    
    // return $rate;

    $distance = floatval(str_replace(',', '', $result['distance']));
    $mileage_cost = $rate * $distance;
    $pickup_address_data = get_address_data($data['pickup_address']);
    $dropoff_address_data = get_address_data($data['dropoff_address']);
    $lead_charges = leadCharges();

    $log_message = '[' . date('Y-m-d H:i:s') . '] Load Pricing : ' . json_encode($lead_charges) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $fuel_toll_cost = get_fuel_and_toll_cost($data['pickup_address'], $data['dropoff_address'], $data['freight_type']);;
    // $log_message = '[' . date('Y-m-d H:i:s') . "] Drop Off received: " . json_encode($dropoff_address_data) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    // return [
    //     $fuel_toll_cost,
    //     $distance,
    //     $rate

    // ];
    $log_message = '[' . date('Y-m-d H:i:s') . '] Load Addons before: ' . json_encode($data['addons']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

  

   
    $log_message = '[' . date('Y-m-d H:i:s') . '] Load Addons after: ' . json_encode($addons) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $freight = BeanFactory::newBean('freight_xl');
    $freight->name = $data['name'];
    $freight->pickup_address_c = $data['pickup_address'];
    $freight->pickup_lat_c = $result['pickup_lat'];
    $freight->pickup_lng_c = $result['pickup_long'];
    $freight->dropoff_address_c = $data['dropoff_address'];
    $freight->dropoff_lat_c = $result['dropoff_lat'];
    $freight->dropoff_lng_c = $result['dropoff_long'];
    $freight->distance_c = number_format($distance, 2);
    $freight->duration_c = $result['duration'];
    $freight->rate_c = $rate;
    $freight->addons_c = $data['addons'];
    $freight->addons_total_c = $data['addons_total'];
    $freight->fuel_c = $fuel_toll_cost['fuel_cost'];
    $freight->mileage_c = $fuel_toll_cost['total_cost'];
    $freight->toll_c = $fuel_toll_cost['toll_cost']['total_toll_cost'];
    $freight->pickup_state_c = $pickup_address_data['state'];
    $freight->pickup_city_c = $pickup_address_data['city'];
    $freight->pickup_zip_c = $pickup_address_data['zip'];
    $freight->dropoff_state_c = $dropoff_address_data['state'];
    $freight->dropoff_city_c = $dropoff_address_data['city'];
    $freight->dropoff_zip_c = $dropoff_address_data['zip'];
    $freight->opertunity_id_c = generate_opertunity_id();
    $freight->freight_description_c = $data['freight_description'];
    $freight->carrier_vehicle_type_c = $data['vehicle_type'];
    $freight->freight_weight_c = $data['freight_weight'];
    $freight->freight_length_c = $data['freight_length'];
    $freight->freight_width_c = $data['freight_width'];
    $freight->freight_height_c = $data['freight_height'];
    $freight->freight_pallet_count_c = $data['freight_pallet_count'];
    $freight->freight_box_count_c = $data['freight_box_count'];
    $freight->number_of_stops_c = $data['number_of_stops'];
    $freight->client_notes_c = $data['notes'];
    $freight->freight_type_c = $data['freight_type'];
    $freight->pickup_time_c = $data['pickup_time'];
    $freight->pickup_date_c = $data['pickup_date'];
    $freight->dropoff_time_c = $data['dropoff_time'];
    $freight->dropoff_date_c = $data['dropoff_date'];
    $freight->freight_shipper_name_c = $data['name'];
    $freight->assigned_user_id = '8cf8b27d-5a29-984b-b3c3-5693eede3156';
    $freight->status_c = 'Assigned';
    $freight->source_c = '.com';
    $freight->freight_shipper_address_c = $data['shipper_address'];
    $freight->freight_shipper_phone_c = $data['shipper_phone'];
    $freight->freight_shipper_email_c = $data['shipper_email'];
    $freight->email1 = $data['shipper_email'];
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead lat: ' . json_encode($result['pickup_lat']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead lng: ' . json_encode($result['pickup_long']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead state: ' . json_encode($pickup_address_data['state']) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vendorData = select_vendor_for_lead($result['pickup_lat'], $result['pickup_long'], $pickup_address_data['state']);
    $deadhead_distance = floatval(str_replace(',', '', $vendorData['distance']));
    $deadhead_price = $deadhead_distance * $rate;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor selected: ' . json_encode($vendorData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $freight->vendor_id_c = $vendorData['id'];
    $freight->deadhead_distance_c = $deadhead_distance;
    $freight->deadhead_price_c = number_format($deadhead_price, 2);
    $total_cost_new = str_replace(',', '', $fuel_toll_cost['total_cost']);
    $fuel_cost_new = str_replace(',', '', $fuel_toll_cost['fuel_cost']);
    $total_price_c = floatval($deadhead_price) + floatval($data['addons_total']) + floatval($total_cost_new) + floatval($fuel_toll_cost['toll_cost']['total_toll_cost']) + floatval($fuel_cost_new);
    $total_market_price = floatval($total_cost_new);

    $freight->market_price_c = number_format($total_market_price, 2);

    // $log_message = '[' . date('Y-m-d H:i:s') . "] Lead Charges: " . json_encode($lead_charges) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    $profit = (floatval($total_price_c) * (floatval($lead_charges['Client_Markup']) / 100));
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Profit: ' . json_encode($profit) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $total_cost = floatval($total_price_c) + floatval($profit);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Total Cost: ' . json_encode($total_cost) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $freight->profit_c = number_format($profit, 2);
    $freight->total_price_c = number_format($total_cost, 2);

    $vendor = BeanFactory::getBean('VND_Vendors', $vendorData['id']);
    $freight->vendor_name_c = $vendor->name;
    $freight->vendor_email_c = $vendor->email1;
    $freight->save();

    $shipperData = checkShipper($data['shipper_email'], $data['shipper_first_name'] . ' ' . $data['shipper_last_name'], $freight->id);
    // send_lead_mail($freight->id, '8c187af7-a713-c17f-9640-6867aae982df' ,  $data['shipper_email']);
    send_lead_mail($freight->id, '59c99e53-24ba-c30a-a262-6891ba01c57f', $data['shipper_email']);

    post_load($freight->id);

    return [
        'status' => 'success',
        'message' => 'Lead saved successfully',
        'id' => $freight->id,
        'redirect' => $shipperData['link']
    ];
}
function deleteShipment($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $shipment = BeanFactory::getBean('freight_xl', $data['id']);
    $shipment->status_c = 'Deleted';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment from trucker path: ' . json_encode($shipment->truckerpath_ref_id_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $ids = explode("|" , $shipment->truckerpath_ref_id_c);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment from trucker path: ' . json_encode($ids) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    // return $ids[1];
    if($ids[0] != ''){
        $response = deleteShipmentFromTruckerPath($ids[0]);
        $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment response: ' . json_encode($response) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    }
    if($ids[1] != ''){
        $tokenResponse = getTSToken();
        $accessToken = json_decode($tokenResponse ,true);
        $responseTS = deleteLoadTS($accessToken['access_token'], $ids[1]);
        $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment response TS: ' . json_encode($responseTS) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    }
    if($ids[2] != ''){
    $response123 = deleteLoad123($ids[2]);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Delete shipment response 123: ' . json_encode($response123) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    }
 
    $shipment->save();

    $result['status'] = 'success';
    $result['message'] = 'Shipment deleted successfully';
    return $result;
}
function updateLoad($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Load received: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $newMarketPrice = 0;
    $newTotalPrice = 0;
    $totalPrice = 0;
    $newPlatformPrice = 0;
    $marketPrice = 0;
    $addonOldPrice = 0;
    $addonNewPrice = 0;
    $lead_charges = leadCharges();

    $freight = BeanFactory::getBean('freight_xl', $data['id']);

    $totalPrice = floatval(str_replace(',', '', $freight->mileage_c)) + floatval(str_replace(',', '', $freight->fuel_c)) + floatval(str_replace(',', '', $freight->addons_total_c)) + floatval(str_replace(',', '', $freight->deadhead_price_c)) + floatval(str_replace(',', '', $freight->toll_c));

    $marketPrice = $totalPrice;
    // $marketPrice = floatval(str_replace(',', '', $freight->market_price_c));
    $log_message = '[' . date('Y-m-d H:i:s') . '] Market Price: ' . json_encode($marketPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $addonOldPrice = floatval(str_replace(',', '', $freight->addons_total_c));
    $log_message = '[' . date('Y-m-d H:i:s') . '] Addon Old Price: ' . json_encode($addonOldPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $addonNewPrice = floatval(str_replace(',', '', $data['addons_total']));
    $log_message = '[' . date('Y-m-d H:i:s') . '] Addon New Price: ' . json_encode($addonNewPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $newMarketPrice = ($marketPrice - $addonOldPrice) + $addonNewPrice;
    $log_message = '[' . date('Y-m-d H:i:s') . '] New Market Price: ' . json_encode($newMarketPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $newTotalPrice = $newMarketPrice + ($newMarketPrice * (floatval($lead_charges['Client_Markup']) / 100));
    $log_message = '[' . date('Y-m-d H:i:s') . '] New Total Price: ' . json_encode($newTotalPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $newPlatformPrice = $newMarketPrice - ($newMarketPrice * (floatval($lead_charges['Vendor_Percentage']) / 100));
    $log_message = '[' . date('Y-m-d H:i:s') . '] New Platform Price: ' . json_encode($newPlatformPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $freight->market_price_c = number_format($newMarketPrice, 2);
    $freight->total_price_c = number_format($newTotalPrice, 2);
    $freight->platform_price_c = number_format($newPlatformPrice, 2);
    $freight->name = $data['name'];
    $freight->addons_c = $data['addons'];
    $freight->addons_total_c = $data['addons_total'];
    $freight->freight_description_c = $data['freight_description'];
    $freight->carrier_vehicle_type_c = $data['vehicle_type'];
    $freight->freight_weight_c = $data['freight_weight'];
    $freight->freight_length_c = $data['freight_length'];
    $freight->freight_width_c = $data['freight_width'];
    $freight->freight_height_c = $data['freight_height'];
    $freight->freight_pallet_count_c = $data['freight_pallet_count'];
    $freight->freight_box_count_c = $data['freight_box_count'];
    $freight->number_of_stops_c = $data['number_of_stops'];
    $freight->client_notes_c = $data['notes'];
    $freight->freight_type_c = $data['freight_type'];
    $freight->pickup_time_c = $data['pickup_time'];
    $freight->pickup_date_c = $data['pickup_date'];
    $freight->dropoff_time_c = $data['dropoff_time'];
    $freight->dropoff_date_c = $data['dropoff_date'];
    $freight->freight_shipper_name_c = $data['name'];
    $freight->freight_shipper_address_c = $data['shipper_address'];
    $freight->freight_shipper_phone_c = $data['shipper_phone'];

    $log_message = '[' . date('Y-m-d H:i:s') . '] Market Price after update: ' . json_encode($freight->market_price_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . '] New Total Price after update: ' . json_encode($freight->total_price_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $freight->save();

    $ids = explode('|', $freight->truckerpath_ref_id_c);

    if (isset($ids[0]) && $ids[0] != '') {
        update_load_truckerpath($freight->id);
    }
    if (isset($ids[2]) && $ids[2] != '') {
        editLoad123($freight->id);
    } 
    if (isset($ids[1]) && $ids[1] != '') {
        $tokenResponse = getTSToken();
        $accessToken = json_decode($tokenResponse ,true);

        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Token: ' . json_encode($accessToken['access_token']) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $addons = $freight->addons_c;
        $addonsArray = explode(',', $addons);
        $formattedAddons = [];

        foreach ($addonsArray as $addon) {
            if (empty(trim($addon)))
                continue;

            // Remove price suffix (e.g., -50, -100)
            $addon = preg_replace('/-\d+$/', '', $addon);

            // Replace underscores with spaces
            $addon = str_replace('_', ' ', $addon);

            $formattedAddons[] = $addon;
        }

        // Join with newlines
        $formattedAddonsString = implode(',', $formattedAddons);

        $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;
        $pickupFormatted = explode(',', $freight->pickup_address_c);
        $dropoffFormatted = explode(',', $freight->dropoff_address_c);

        $lead_Charges = leadCharges();
        $marketPrice = floatval(str_replace(',', '', $freight->market_price_c));
        $platformProfit = floatval($marketPrice) * (floatval($lead_Charges['Vendor_Percentage']) / 100);
        $platformPrice = floatval($marketPrice) - floatval($platformProfit);
        $platformPrice = number_format($platformPrice, 2);
        $platformPrice = str_replace(',', '', $platformPrice);
        $dataTS = [
            "note" => $newDescription,
            'pickup_location' => "Shipper",
            'pickup_city' => $pickupFormatted[0],
            'pickup_state' => $pickupFormatted[1],
            'pickup_date_time' => $freight->pickup_date_c . 'T' . $freight->pickup_time_c . ':00',
            'pickup_contact_name' => "StretchXL",
            'pickup_contact_phone' => "18555644788",
            'dropoff_location' => "Receiver",
            'dropoff_city' => $dropoffFormatted[0],
            'dropoff_state' => $dropoffFormatted[1],
            'dropoff_date_time' => $freight->dropoff_date_c . 'T' . $freight->dropoff_time_c . ':00',
            'dropoff_contact_name' => "StretchXL",
            'dropoff_contact_phone' => "18555644788",
            'rate' => $platformPrice,
            'length' => $freight->freight_length_c,
            'width' => $freight->freight_width_c,
            'height' => $freight->freight_height_c,
            'weight' => $freight->freight_weight_c,
            'pallet_count' => $freight->freight_pallet_count_c,
        ];
        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Data: ' . json_encode($dataTS) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $loadResponse = editLoadTS($accessToken['access_token'] , $ids[1] , $dataTS);
        $loadResponse = json_decode($loadResponse ,true);
        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Load Response: ' . json_encode($loadResponse) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    } 

    shipmentUpdateMail($freight->id);



    

    return [
        'status' => 'success',
        'message' => 'Lead saved successfully',
        'id' => $freight->id,
        'redirect' => $shipperData['link']
    ];
}
function vendorTierPayment($data)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Payment Data received: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);

    // $vendor_first_name = explode(' ', $vendor->name)[0];
    // $vendor_last_name = explode(' ', $vendor->name)[1];
    // if($vendor_last_name == '') {
    //     $vendor_last_name = $data['cardName'];
    // }
    // if($vendor_first_name == '') {
    //     $vendor_first_name = $data['cardName'];
    // }
    $vendor_phone = "1234567899";
    if(!empty($vendor->phone_office) && strlen(trim($vendor->phone_office)) <= 10) {
        $vendor_phone = trim($vendor->phone_office);
    }
    $log_file = 'vendorLogs.log';

     $userData = [
        'first_name' =>  $data['cardName'],
        'last_name' => $data['cardName'],
        'email' => $vendor->email1,
    ];
    $contact = createContact($userData);

    // return json_decode($contact, true);
    $contact = json_decode($contact, true);

    $log_message = '[' . date('Y-m-d H:i:s') . '] Contact Created: ' . json_encode($contact) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

   
    // return $userData;

    // $contact = FortisPayAPI::createContact($userData);

    // return json_decode($contact, true);
    // $contact = json_decode($contact, true);

    // $log_message = '[' . date('Y-m-d H:i:s') . '] Contact Created: ' . json_encode($contact) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);

    // $transaction_data = [
    //     'transaction_amount' => '100.00',
    //     'account_number' => $data['cardNumber'],
    //     // 'account_number' => '4111111111111111',
    //     'exp_date' => str_replace('/', '', $data['expiryDate']),
    //     'contact_id' => $contact['contact']['id']
    // ];
    // $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Data: ' . json_encode($transaction_data) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    // $transaction = FortisPayAPI::makeTransaction($transaction_data);
    // $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Response: ' . json_encode($transaction) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);

    // $transaction = json_decode($transaction, true);

    // return $contact; 

     $transactionData = [
        'contact_id' => $contact['data']['id'],
        // 'description' => 'Payment for ' . $freight->freight_shipper_name_c,
        'location_id' => '11f08353a231b4c2982c2880',
        'transaction_amount' => $data['amount'] ? $data['amount'] : '35',
        'currency_code' => 'USD',
        'account_holder_name' => $data['cardName'],
        'account_number' => $data['cardNumber'],
        'exp_date' => str_replace('/', '', $data['expiryDate']),
        'pin' => $data['cvv'],
    ];

    // return $transactionData;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Data: ' . json_encode($transactionData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $transaction = createTransaction($transactionData);
    $transaction = json_decode($transaction, true);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Response: ' . json_encode($transaction) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    if (isset($transaction['data']['id']) && $transaction['data']['id'] != '') {
        $transaction_id = $transaction['data']['id'];
        $payment = BeanFactory::newBean('SQ_Payments');
        $payment->name = $data['cardName'];
        $payment->transaction_id = $transaction_id;
        $payment->customer_id = $contact['contact']['id'];
        $payment->credit_card_number = $data['cardNumber'];
        $payment->security_code = $data['cvv'];
        $payment->card_expiration = $data['expiryDate'];
        $payment->amount = $data['amount'] ? $data['amount'] : '35';
        $payment->card_type = $data['cardType'];
        $payment->payment_date = date('Y-m-d');
        $payment->transaction_time = date('Y-m-d H:i:s');
        $payment->transaction_status = 'Success';
        $payment->payment_type = 'Deposit';
        // Save the payment first
        $payment_id = $payment->save();

        // Log the payment save
        $log_message = '[' . date('Y-m-d H:i:s') . '] Payment saved with ID: ' . $payment_id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        // Load the vendor again to ensure we have a fresh copy
        $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);

        // Add relationship
        $vendor->load_relationship('vnd_vendors_sq_payments_1');
        $vendor->vnd_vendors_sq_payments_1->add($payment_id);
        $vendor->tier_status_c = '1';
        $vendor->tier_date_c = date('Y-m-d');
        $vendor->tier_amount_c = $data['amount'] ? $data['amount'] : '35';

        // Save the vendor to update the relationship
        $vendor_save_result = $vendor->save();

        // Log the relationship save result
        $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor save result: ' . ($vendor_save_result ? 'success' : 'failed') . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        // Verify the relationship was saved
        $vendor->load_relationship('vnd_vendors_sq_payments_1');
        $related_payments = $vendor->vnd_vendors_sq_payments_1->getBeans();
        $log_message = '[' . date('Y-m-d H:i:s') . '] Related payments count: ' . count($related_payments) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $vendorMailData =
        [
            "vendor_id" => $vendor->id,
            "vendor_name" => $vendor->name,
            "email" => $vendor->email1,
            "email_temp" => '65678180-af49-e37f-7c08-68a6f768dfb5'
        ];
        sendVendorTierMail($vendorMailData);
        $vendorMailData =
        [
            "vendor_id" => $vendor->id,
            "vendor_name" => $vendor->name,
            "email" => $vendor->email1,
            "email_temp" => 'a62c0814-3457-c9d2-eef5-68a702e7e22a'
        ];
        sendVendorTierMail($vendorMailData, "a62c0814-3457-c9d2-eef5-68a702e7e22a");

        $result['status'] = 'success';
        $result['message'] = 'Transaction successful';
        $result['transaction_id'] = $transaction_id;
        $result['payment_id'] = $payment->id;
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Transaction failed';
    }

    return $result;
}
function agreementPayment($data)
{

    // return $data;
    $result = array();
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Agreement Payment Data received: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $quote_data = json_decode(htmlspecialchars_decode($data['quote']), true);

    $freight = BeanFactory::getBean('freight_xl', $data['agreement_id']);
    $card = BeanFactory::getBean('cards_xl', $data['card_id']);
   
    $shipper_first_name = explode(' ', $freight->freight_shipper_name_c)[0];
    $shipper_last_name = explode(' ', $freight->freight_shipper_name_c)[1];
    $shipper_phone = $freight->freight_shipper_phone_c;
    
    // Ensure phone number is exactly 10 digits by removing the first character if longer than 10
    if ($shipper_phone && strlen($shipper_phone) > 10) {
        $shipper_phone = substr($shipper_phone, 1);
    }
    
    

    // $userData = [
    //     'first_name' => $shipper_first_name,
    //     'last_name' => $shipper_last_name,
    //     'email' => $freight->freight_shipper_email_c,
    //     'address' => $freight->freight_shipper_address_c,
    //     'city' => $freight->pickup_city_c,
    //     'state' => $freight->pickup_state_c,
    //     'zip' => $freight->pickup_zip_c,
    //     'home_phone' => '1234567891'
    // ];

    // $log_file = 'vendorLogs.log';
    // $log_message = '[' . date('Y-m-d H:i:s') . '] User Data: ' . json_encode($userData) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    // return $userData;

    $userData = [
        'first_name' =>  $shipper_first_name,
        'last_name' => $shipper_last_name ??  $shipper_first_name,
        'email' => $freight->freight_shipper_email_c,
    ];
    $contact = createContact($userData);

    // return json_decode($contact, true);
    $contact = json_decode($contact, true);

    $log_message = '[' . date('Y-m-d H:i:s') . '] Contact Created: ' . json_encode($contact) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    // $transaction_data = [
    //     'transaction_amount' => str_replace(',', '', $data['amount']),
    //     'account_number' => $card->card_number_c,
    //     // 'account_number' => '4111111111111111',
    //     'exp_date' => str_replace('/', '', $card->card_exp_c),
    //     'contact_id' => $contact['contact']['id']
    // ];
    // $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Data: ' . json_encode($transaction_data) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    // $transaction = FortisPayAPI::makeTransaction($transaction_data);
    // $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Response: ' . json_encode($transaction) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);

    // $transaction = json_decode($transaction, true);
    $transactionData = [
        'contact_id' => $contact['data']['id'],
        // 'description' => 'Payment for ' . $freight->freight_shipper_name_c,
        'location_id' => '11f08353a231b4c2982c2880',
        'transaction_amount' => intval(str_replace(',', '', $data['amount'])) * 100,
        'currency_code' => 'USD',
        'account_holder_name' => $shipper_first_name . ' ' . $shipper_last_name,
        'account_number' => $card->card_number_c,
        'exp_date' => str_replace('/', '', $card->card_exp_c),
        'pin' => $card->card_cvv_c,
    ];
    $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Data: ' . json_encode($transactionData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $transaction = createTransaction($transactionData);
    $transaction = json_decode($transaction, true);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Transaction Response: ' . json_encode($transaction) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    if (isset($transaction['data']['id']) && $transaction['data']['id'] != '') {
        $transaction_id = $transaction['data']['id'];
        $payment = BeanFactory::newBean('SQ_Payments');
        $payment->name = $freight->freight_shipper_name_c;
        $payment->transaction_id = $transaction_id;
        $payment->customer_id = $contact['data']['id'];
        $payment->credit_card_number = $card->card_number_c;
        $payment->security_code = $card->card_cvv_c;
        $payment->card_expiration = $card->card_exp_c;
        $payment->amount = $data['amount'];
        $payment->card_type = $card->card_type_c;
        $payment->payment_date = date('Y-m-d');
        $payment->transaction_time = date('Y-m-d H:i:s');
        $payment->transaction_status = 'Success';
        $payment->payment_type = 'Deposit';
        // Save the payment first
        $payment_id = $payment->save();

        // Log the payment save
        $log_message = '[' . date('Y-m-d H:i:s') . '] Payment saved with ID: ' . $payment_id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        // Load the vendor again to ensure we have a fresh copy
        $freight = BeanFactory::getBean('freight_xl', $data['agreement_id']);

        // Add relationship
        $freight->load_relationship('freight_xl_sq_payments_1');
        $freight->freight_xl_sq_payments_1->add($payment_id);
        $freight->agreement_status_c = 'SIGNED';
        $freight->status_c = 'Converted';
        $freight->client_payment_type_c = 'paid_by_creditcard';
        $freight->amount_paid_c = $data['amount'];
        $freight->payments_made_c = 1 + floatval($freight->payments_made_c);
        $freight->signed_agreement_link_c = $data['agreement_pdf'];
        $freight->vendor_id_c = $quote_data['vendor_id'];
        $freight->vendor_email_c = $quote_data['email'];
        $freight->vendor_name_c = $quote_data['name'];
        

        // Save the vendor to update the relationship
        $freight_save_result = $freight->save();

        // Log the relationship save result
        $log_message = '[' . date('Y-m-d H:i:s') . '] Freight save result: ' . ($freight_save_result ? 'success' : 'failed') . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        global $db;
      $quote_result =  $db->query("SELECT * FROM tnv_vendorquote WHERE id = '" . $data['quote_id'] . "'");
      if($quote_result->num_rows > 0){
        $log_message = '[' . date('Y-m-d H:i:s') . '] Quote Found: ' . $data['quote_id'] . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $quote = BeanFactory::getBean('tnv_VendorQuote', $data['quote_id']);
        $quote->quote_status_c = "Accepted";
        $freight->signed_price_c = $quote->quoted_price_c;
        $freight->save();
        $quote->save();
        }
        else{
                $log_message = '[' . date('Y-m-d H:i:s') . '] Quote Not Found: ' . $data['quote_id'] . "\n";
                file_put_contents($log_file, $log_message, FILE_APPEND);
               
                if (json_last_error() === JSON_ERROR_NONE && isset($quote_data)) {
                    
                    $vendor_new = createVendorForQuote($quote_data);
                    $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor creation result: ' . json_encode($vendor_new) . "\n";
                    file_put_contents($log_file, $log_message, FILE_APPEND);
                } else {
                    $log_message = '[' . date('Y-m-d H:i:s') . '] Invalid quote data format: ' . $data['quote'] . "\n";
                    file_put_contents($log_message, FILE_APPEND);
                }
                if(isset($vendor_new['id'])){

                    $vendor = BeanFactory::getBean('vnd_Vendors', $vendor_new['id']);
                    $quote = BeanFactory::newBean('tnv_VendorQuote');
                    $quote->name = $quote_data['contact']['name'];
                    $quote->vendor_email_c = $vendor->email1;
                    $quote->vendor_phone_c = $vendor->phone_office;
                    $quote->quoted_price_c = $quote_data['priceCents'];
                    $quote->quote_status_c = 'Accepted';
                    $quote->vendor_id_c = $vendor->id;
                    $quote->save();
                    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
                    $freight->freight_xl_tnv_vendorquote_1->add($quote->id);
                    $freight->status_c = 'Converted';
                    
                    $freight->save();
                    $tpQuoteData = [
                        'id' => $quote_data['id'],
                        'shipmentId' =>  $quote_data['shipmentId']
                    ];
                    acceptQuoteOnTP($tpQuoteData);
                    sendVendorAccountMailNew($vendor_new['id'] , "815e4d9b-516d-045f-8cbf-6600665695a0");
                }

        
        }

        // Verify the relationship was saved
        $freight->load_relationship('freight_xl_sq_payments_1');
        $related_payments = $freight->freight_xl_sq_payments_1->getBeans();
        $log_message = '[' . date('Y-m-d H:i:s') . '] Related payments count: ' . count($related_payments) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $result['status'] = 'success';
        $result['message'] = 'Transaction successful';
        $result['transaction_id'] = $transaction_id;
        $result['payment_id'] = $payment->id;
        $result['payment_pdf'] = $data['agreement_pdf'];
        BOLSigned($freight->id);
        agreementConfirmationMail($freight->id);
        send_shipmentDetails_vendor($freight->id);
        send_shipmentDetails_shipper($freight->id);
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Transaction failed';
    }

    return $result;
}
function createVendorForQuote($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Vendor for Quote saved: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    global $db;

    $sql = "SELECT * FROM `email_addr_bean_rel` eabr INNER JOIN `email_addresses` ea ON eabr.`email_address_id` = ea.`id` WHERE ea.`email_address` LIKE '%" . $data['contact']['email'] . "%' AND eabr.`bean_module` = 'VND_Vendors'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'error',
            'message' => 'Email already exists',
            'id' => $result->fetch_assoc()['bean_id']
           
        ];
    }

    $vendor = BeanFactory::newBean('VND_Vendors');
   
    $vendor->username = $data['contact']['name'];
    $vendor->name = $data['contact']['name'];
    $vendor->email1 =$data['contact']['email'];
    $vendor->phone_office =$data['contact']['phone'];
    $vendor->dot_number =$data['company']['dot'];
    $vendor->safety_rating_c =strtolower($data['company']['safetyRating']);
    $vendor->status = 'Disabled';
    $vendor->save();
  

    $token = encrypt($vendor->id);
    $vendor->token_c = $token;
    $vendor->save();
    // sendVendorAccountMail($vendor->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token, 'login');

    return [
        'status' => 'success',
        'message' => 'Account created successfully',
        'id' => $vendor->id
    ];
}
function verifyDotMCNew($data)
{
    // Initialize response array
    $response = [
        'status' => 'error',
        'message' => '',
        'data' => null
    ];

    try {
        // Validate input
        $dotMcNumber = trim($data['dot_mc_number']);
        $type = strtoupper(trim($data['verification_type']));
        
        if (empty($dotMcNumber)) {
            throw new Exception('DOT/MC Number is required');
        }
        
        if (!in_array($type, ['DOT', 'MC'])) {
            throw new Exception('Invalid verification type. Must be either "DOT" or "MC"');
        }

        // Set up cURL
        $ch = curl_init('https://safer.fmcsa.dot.gov/query.asp');
        
        // Prepare form data
        $postFields = http_build_query([
            'searchtype' => 'ANY',
            'query_type' => 'queryCarrierSnapshot',
            'query_param' => $type === 'DOT' ? 'USDOT' : 'MC',
            'query_string' => $dotMcNumber
        ]);
        
        // Set cURL options
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => [
                'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
                'accept-language: en-US,en;q=0.9',
                'cache-control: max-age=0',
                'content-type: application/x-www-form-urlencoded',
                'priority: u=0, i',
                'sec-ch-ua: "Not;A=Brand";v="99", "Google Chrome";v="139", "Chromium";v="139"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-fetch-dest: document',
                'sec-fetch-mode: navigate',
                'sec-fetch-site: same-origin',
                'sec-fetch-user: ?1',
                'upgrade-insecure-requests: 1',
                'Referer: https://safer.fmcsa.dot.gov/'
            ],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_COOKIEJAR => 'safer_cookies.txt',
            CURLOPT_COOKIEFILE => 'safer_cookies.txt',
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36'
        ];
        
        curl_setopt_array($ch, $options);

        // Execute the request
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        
        // Close cURL session
        curl_close($ch);

        // Check for cURL errors
        if ($error) {
            throw new Exception('cURL Error: ' . $error);
        }

        // Check if we got a valid response
        if ($httpCode !== 200) {
            throw new Exception("FMCSA SAFER system returned HTTP status: {$httpCode}");
        }

        // Check if the DOT/MC number was found
        if (strpos($result, 'No records found') !== false) {
            $response['status'] = 'success';
            $response['message'] = 'No records found for the provided ' . $type . ' number';
            $response['data'] = [
                'valid' => false,
                'number' => $dotMcNumber,
                'type' => $type
            ];
            return $response;
        }

        // If we get here, the number was found
        $response['status'] = 'success';
        $response['message'] = $type . ' number verified successfully';
        $response['data'] = [
            'valid' => true,
            'number' => $dotMcNumber,
            'type' => $type,
            'details' => 'Carrier information found in FMCSA SAFER system'
        ];
        
    } catch (Exception $e) {
        // Handle any exceptions
        $response['message'] = $e->getMessage();
    }

    return $response;
}
function verifyDotMC($data)
{
    // Initialize response array
    $response = [
        'status' => 'error',
        'message' => '',
        'data' => null
    ];

    try {
        // Validate required fields
        if (empty($data['dot_mc_number'])) {
            $response['message'] = 'DOT/MC Number is required';
            return $response;
        }

        if (empty($data['verification_type']) || !in_array(strtolower($data['verification_type']), ['dot', 'mc'])) {
            $response['message'] = 'Invalid verification type. Must be either "dot" or "mc"';
            return $response;
        }

        $number = trim($data['dot_mc_number']);
        $type = strtolower($data['verification_type']);

        // Build the API URL
        $apiUrl = "https://api.truckerpath.com/services/saferwatch/{$type}/{$number}";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Content-Type: application/json'
            ],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        // Execute the request
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        // Close cURL session
        curl_close($ch);

        // Check for cURL errors
        if ($error) {
            throw new Exception('cURL Error: ' . $error);
        }

        // Parse the JSON response
        $apiResponse = json_decode($result, true);

        // Check if JSON parsing was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON response from API');
        }

        // Check HTTP status code
        if ($httpCode !== 200) {
            $errorMsg = $apiResponse['message'] ?? 'Unknown error occurred';
            throw new Exception("API Error: {$errorMsg} (Status Code: {$httpCode})");
        }

        // Success response
        $response['status'] = 'success';
        $response['message'] = 'DOT/MC verification successful';
        $response['data'] = $apiResponse['CarrierService.CarrierLookup'];
    } catch (Exception $e) {
        // Handle any exceptions
        $response['message'] = $e->getMessage();
    }

    return $response;
}
function getReferralData($data)
{
    $vendor = BeanFactory::getBean('VND_Vendors', $data['id']);
    $total_referrers_c = $vendor->total_referrers_c;
    $referral_ids = array();
    if ($total_referrers_c != null) {
        $referral_ids = explode('|', $total_referrers_c);
    }

    if (isset($referral_ids) && count($referral_ids) > 0) {
        $referral_data = array();

        foreach ($referral_ids as $referral) {
            $referral_vendor = BeanFactory::getBean('VND_Vendors', $referral);
            $refArray = array();
            $refArray['id'] = $referral_vendor->id;
            $refArray['email'] = $referral_vendor->email1;
            $refArray['status'] = $referral_vendor->profile_status_c;
            $referral_data[] = $refArray;
        }
    }
    return $referral_data;
}
function addCard($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Add card: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $card = BeanFactory::newBean('cards_xl');
    $card->owner_c = $data['user-id'];
    $card->card_number_c = $data['card-number'];
    $card->card_exp_c = $data['card-expiry'];
    $card->card_cvv_c = $data['card-cvv'];
    $card->name = $data['card-holder'];
    $card->card_type_c = $data['card-type'];
    $card->save();
    if ($data['type'] == 'vendor') {
        $card->load_relationship('cards_xl_vnd_vendors_1');
        $card->cards_xl_vnd_vendors_1->add($data['user-id']);
        $card->save();
    } else {
        $card->load_relationship('cards_xl_shipper_xl_1');
        $card->cards_xl_shipper_xl_1->add($data['user-id']);
        $card->save();
    }

    $result = array();
    $result['id'] = $card->id;
    $result['status'] = 'success';
    $result['message'] = 'Card added successfully';
    return $result;
}
function fetchAllUserCards($data)
{
    if ($data['type'] == 'vendor') {
        $user = BeanFactory::getBean('VND_Vendors', $data['id']);
        $user->load_relationship('cards_xl_vnd_vendors_1');
        $cards = $user->cards_xl_vnd_vendors_1->getBeans();
    } else {
        $user = BeanFactory::getBean('shipper_xl', $data['id']);
        $user->load_relationship('cards_xl_shipper_xl_1');
        $cards = $user->cards_xl_shipper_xl_1->getBeans();
    }

    // Load the relationship

    // Get all related vendor quotes and format them as an array
    $cardsArray = [];

    foreach ($cards as $card) {
        $cardsArray[] = [
            'id' => $card->id,
            'name' => $card->name,
            'card_number' => $card->card_number_c,
            'card_exp' => $card->card_exp_c,
            'card_cvv' => $card->card_cvv_c,
            'card_type' => $card->card_type_c,
            'date_entered' => $card->date_entered,
            'date_modified' => $card->date_modified,
        ];
    } 

    $result['cards'] = $cardsArray;
    return $result;
}
function getCardDetails($data)
{
    try {
        if (empty($data['id'])) {
            throw new Exception('Card ID is required');
        }

        $card = BeanFactory::getBean('cards_xl', $data['id']);

        if (empty($card->id)) {
            throw new Exception('Card not found');
        }

        return [
            'status' => 'success',
            'card' => [
                'id' => $card->id,
                'name' => $card->name,
                'card_number' => $card->card_number_c,
                'card_exp' => $card->card_exp_c,
                'card_cvv' => $card->card_cvv_c,
                'card_type' => $card->card_type_c,
                'date_entered' => $card->date_entered,
                'date_modified' => $card->date_modified,
            ]
        ];
    } catch (Exception $e) {
        return [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }
}
function updateCard($data)
{
    try {
        $log_file = 'vendorLogs.log';
        $log_message = '[' . date('Y-m-d H:i:s') . '] Update card: ' . json_encode($data) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        if (empty($data['id'])) {
            throw new Exception('Card ID is required for update');
        }

        $card = BeanFactory::getBean('cards_xl', $data['id']);

        if (empty($card->id)) {
            throw new Exception('Card not found');
        }

        // Update card fields if they exist in the request
        if (isset($data['card-holder']))
            $card->name = $data['card-holder'];
        if (isset($data['card-number']))
            $card->card_number_c = $data['card-number'];
        if (isset($data['card-expiry']))
            $card->card_exp_c = $data['card-expiry'];
        if (isset($data['card-cvv']))
            $card->card_cvv_c = $data['card-cvv'];
        if (isset($data['card-type']))
            $card->card_type_c = $data['card-type'];

        $card->save();

        return [
            'status' => 'success',
            'message' => 'Card updated successfully',
            'id' => $card->id
        ];
    } catch (Exception $e) {
        $log_message = '[' . date('Y-m-d H:i:s') . '] Error updating card: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        return [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }
}
function deleteCard($data)
{
    try {
        $log_file = 'vendorLogs.log';
        $log_message = '[' . date('Y-m-d H:i:s') . '] Delete card: ' . json_encode($data) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        if (empty($data['id'])) {
            throw new Exception('Card ID is required for deletion');
        }

        $card = BeanFactory::getBean('cards_xl', $data['id']);

        if (empty($card->id)) {
            throw new Exception('Card not found');
        }

        $card->deleted = 1;
        $card->save();

        return [
            'status' => 'success',
            'message' => 'Card deleted successfully',
            'id' => $card->id
        ];
    } catch (Exception $e) {
        $log_message = '[' . date('Y-m-d H:i:s') . '] Error deleting card: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        return [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }
}
// function getLoadsFromTP($data)
// {
//     $pickup_address = $data['address'] ?? 'Glen Burnie,MD,US';
    
//     $lat_long = get_lat_long($pickup_address);
//     // return $lat_long;
//     $pickup_lat = number_format($lat_long['lat'], 2) ?? 39.16;
//     $pickup_lng = number_format($lat_long['long'], 2) ?? -76.6;
//     $load_radius = intval($data['load_radius']) ?? 300;
//     $load_type = $data['load_type'] ?? 'all';
//     $loadArr = [];

//     if ($load_type != 'all') {
//         $loadArr = [$load_type];
//     }

//     $url = 'https://api.truckerpath.com/tl/search/filter/web/v2';

//     // $headers = [
//     //     'accept: */*',
//     //     'accept-language: en-US,en;q=0.9',
//     //     'client: WebCarriers/0.0.0',
//     //     'content-type: application/json',
//     //     'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
//     //     'priority: u=1, i',
//     //     'x-auth-token: r:27bd805046c34345bda57cce5fe89d2b',
//     //     'Referer: https://loadboard.truckerpath.com/'
//     // ];

//     $headers = [
//     'Accept: */*',
//     'Accept-Language: en-US,en;q=0.9',
//     'client: WebCarriers/0.0.0',
//     'Content-Type: text/plain;charset=UTF-8',
//     'Installation-ID: a2fc4582-aea5-4004-8b28-61aa520d90ab',
//     'x-auth-token: r:27bd805046c34345bda57cce5fe89d2b',

//     // Browser-like security headers
//     'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-ch-ua: "Chromium";v="142", "Google Chrome";v="142", "Not_A Brand";v="99"',
//     'sec-ch-ua-mobile: ?0',

//     'Referer: https://loadboard.truckerpath.com/',
//     ];

//     $day = date('d');
//     $month = date('m');
//     $next_month = date('m', strtotime('+1 month'));
//     $year = date('Y');
//     $from = $year . '-' . $month . '-' . $day . 'T00:00:00';
//     $to = $year . '-' . $next_month . '-' . $day . 'T23:59:59';

//     $postData = [
//         'sort' => [['smart_sort' => 'desc']],
//         'offset' => 0,
//         'options' => [
//             'repeat_search' => false,
//             // "mark_new_since" => "2025-07-29T07:14:16.037Z",
//             'mark_new_since' => gmdate('Y-m-d\TH:i:s.\0\0\0\Z'),
//             'road_miles' => true,
//             'include_auth_required' => false
//         ],
//         'limit' => 100,
//         'paging_enable' => true,
//         'other' => [
//             'source' => 'list',
//             'pickup_type' => 'home location',
//             'dropoff_type' => 'anywhere',
//             'chr_switch' => false
//         ],
//         'query' => [
//             'weight' => ['allow_null' => true],
//             'length' => ['allow_null' => true],
//             'pickup' => [
//                 'geo' => [
//                     'location' => [
//                         'address' => $pickup_address,
//                         'lat' => $pickup_lat,
//                         'lng' => $pickup_lng
//                     ],
//                     'deadhead' => ['max' => $load_radius]
//                 ],
//                 'date_local' => [
//                     // "from" => "2025-07-29T00:00:00",
//                     'from' => $from,
//                     // "to" => "2025-08-29T23:59:59"
//                     'to' => $to
//                 ]
//             ],
//             'equipment' => $loadArr
//         ],
//         'search_id' => null,
//         'origins' => ['TRUCKERPATH']
//     ];
//     // return $postData;

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Only for development, remove in production

//     $response = curl_exec($ch);
//     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//     $error = curl_error($ch);
//     curl_close($ch);

//     if ($error) {
//         return ['error' => true, 'message' => $error];
//     }

//     return [
//         'status' => $httpCode,
//         'data' => json_decode($response, true)
//     ];
// }

function getLoadsFromTP($data)
{

    $pickup_address = $data['address'] ?? 'Glen Burnie,MD,US';
    
    $lat_long = get_lat_long($pickup_address);
    // return $lat_long;
    $pickup_lat = number_format($lat_long['lat'], 2) ?? 39.16;
    $pickup_lng = number_format($lat_long['long'], 2) ?? -76.6;
    $load_radius = intval($data['load_radius']) ?? 300;
    $load_type = $data['load_type'] ?? 'all';
    $loadArr = [];
    $from = date('Y-m-d') . 'T00:00:00';
    $to   = date('Y-m-d', strtotime('+7 days')) . 'T23:59:59';


    if ($load_type != 'all') {
        $loadArr = [$load_type];
    }
    $url = "https://api.truckerpath.com/tl/search/filter/web/v2";

    // RAW body string (exactly like fetch() sends it)
    $body = '{
        "sort":[{"smart_sort":"desc"}],
        "offset":0,
        "options":{
            "repeat_search":false,
            "mark_new_since":"2025-12-09T13:10:12.299Z",
            "road_miles":true,
            "include_auth_required":false
        },
        "limit":100,
        "paging_enable":true,
        "other":{
            "source":"list",
            "pickup_type":"home location",
            "dropoff_type":"anywhere",
            "chr_switch":false
        },
        "query":{
            "weight":{"allow_null":true},
            "length":{"allow_null":true},
            "pickup":{
                "geo":{
                    "location":{
                        "address":"'.$pickup_address.'",
                        "lat":'.$pickup_lat.',
                        "lng":'.$pickup_lng.'
                    },
                    "deadhead":{"max":300}
                },
                "date_local":{
                    "from":"'.$from.'",
                    "to":"'.$to.'"
                }
            },
            "equipment":[]
        },
        "search_id":null,
        "origins":["TRUCKERPATH"]
    }';
// return $body;
    // EXACT headers from fetch — same case, same format
    $headers = [
        'client: WebCarriers/0.0.0',
        'content-type: text/plain;charset=UTF-8',
        'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
        'sec-ch-ua: "Chromium";v="142", "Google Chrome";v="142", "Not_A Brand";v="99"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'x-auth-token: r:27bd805046c34345bda57cce5fe89d2b',
        'Referer: https://loadboard.truckerpath.com/'
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $body, // raw body
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_SSL_VERIFYPEER => false, // remove in production
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($error) {
        return ['error' => true, 'message' => $error];
    }

    return [
        'status' => $status,
        'data' => json_decode($response, true)
    ];
}





// Helper Functions
// function send_lead_mail($freight_id, $email_temp, $freight_email)
// {
//     $log_file = 'vendorLogs.log';
//     $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($freight_id) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $result = array();
//     $link_crm = 'https://stretchxlfreight.com/logistx/index.php?module=freight_xl&action=DetailView&record=' . $freight_id;
//     require_once './modules/EmailTemplates/EmailTemplate.php';
//     $emailTemp = new EmailTemplate();
//     $emailTemp->retrieve($email_temp);
//     $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($freight_id) . "\n";
//     $freight = BeanFactory::getBean('freight_xl', $freight_id);

//     $addons = $freight->addons_c;

//     // Process addons: remove numbers, replace underscores with spaces, and capitalize first letter of each word
//     // $addons = preg_replace('/-\d+/', '', $addons); // Remove numbers after hyphen
//     $addons = str_replace('_', ' ', $addons);  // Replace underscores with spaces
//     $addons = str_replace('-', ' : $', $addons);  // Replace underscores with spaces
//     $addonItems = explode(',', $addons);  // Split into array
//     $formattedAddons = array_map('trim', $addonItems);  // Trim whitespace
//     $formattedAddons = array_filter($formattedAddons);  // Remove empty items
//     $formattedAddons = array_map('ucwords', $formattedAddons);  // Capitalize first letter of each word
//     $addons = implode('<br>', $formattedAddons);  // Join with line breaks
//     $dashboard_link = 'https://stretchxlfreight.com/dashboard/';
//     $emailTemp->body_html = str_replace('$lead_date_entered', $freight->date_entered, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$dashboard_link', $dashboard_link, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_pickup_time_c', $freight->pickup_time_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_eventdate_c', $freight->pickup_date_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_pickup_date_c', $freight->pickup_date_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_dropoff_time_c', $freight->dropoff_time_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_dropoff_date_c', $freight->dropoff_date_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_phone_mobile', $freight->freight_shipper_phone_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_email1', $freight->email1, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$link_crm', $link_crm, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_rate_per_mile_c', $freight->rate_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_distance_c', $freight->distance_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_mileage_c', $freight->mileage_c ? $freight->mileage_c : '0', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_fuel_c', $freight->fuel_c ? $freight->fuel_c : '0', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_total_trip_cost_c', $freight->total_price_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_dead_head_c', $freight->deadhead_price_c ? $freight->deadhead_price_c : '0d', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_addon_price_c', $freight->addons_total_c ? $freight->addons_total_c : '0', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_addons_c', $addons ? $addons : 'none', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_type_c', $freight->freight_type_c ? $freight->freight_type_c : '', $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_pickup_address_c', $freight->pickup_address_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_pickuplocation_c', $freight->pickup_address_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_location_c', $freight->dropoff_address_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_carrier_vehicle_type_c', $freight->carrier_vehicle_type_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_weight_c ', $freight->freight_weight_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_pallet_count_c', $freight->freight_pallet_count_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_clientnotes_c', $freight->client_notes_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_shipper_phone_c', $freight->freight_shipper_phone_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_shipper_email_c', $freight->freight_shipper_email_c, $emailTemp->body_html);
//     $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $emailObj = new Email();
//     $defaults = $emailObj->getSystemDefaultEmail();
//     $vmail = new SugarPHPMailer();
//     $vmail->From = $defaults['email'];
//     $vmail->FromName = $defaults['name'];
//     $vmail->setMailerForSystem();
//     $vmail->ClearAllRecipients();
//     $vmail->ClearReplyTos();
//     $vmail->Subject = ($emailTemp->subject);
//     $vmail->AddAddress($freight_email);
//     $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent to : ' . json_encode($freight_email) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $vmail->Body = $emailTemp->body_html;
//     $vmail->AltBody = $emailTemp->body;
//     $attachments = array();
//     $vmail->handleAttachments($attachments);
//     $vmail->prepForOutbound();
//     $emailObj->to_addrs = $freight_email;
//     $emailObj->cc_addrs = '';
//     $emailObj->name = $emailTemp->subject;
//     $emailObj->date_sent = TimeDate::getInstance()->nowDb();
//     $emailObj->description_html = $emailTemp->body_html;
//     $emailObj->description = strip_tags($emailTemp->body_html);
//     $emailObj->from_addr = $vmail->From;
//     $emailObj->modified_user_id = '1';
//     $emailObj->created_by = '1';
//     $emailObj->status = 'sent';
//     $emailObj->type = 'out';
//     $emailObj->parent_type = 'freight_xl';
//     $emailObj->parent_id = $freight_id;
//     $emailObj->save();
//     $emailSent = @$vmail->Send();
//     if ($emailSent) {
//         $emailObj->status = 'sent';
//          $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent successfully for freight ID: ' . $freight_id . "\n";
//         file_put_contents($log_file, $log_message, FILE_APPEND);
//     } else {
//         $emailObj->status = 'send_error';
//         $emailObj->save();
//         $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent failed for freight ID: ' . $freight_id . "\n";
//         file_put_contents($log_file, $log_message, FILE_APPEND);
//         return $result;
//     }
//     if (!empty($freight_id)) {
//         $freight = BeanFactory::getBean('freight_xl', $freight_id);
//         if ($freight) {
//             // Load the relationship
//             $freight->load_relationship('freight_xl_emails_1');

//             // Make sure the relationship is loaded
//             if ($freight->freight_xl_emails_1) {
//                 // Use the relationship's add() method
//                 $freight->freight_xl_emails_1->add($emailObj->id);

//                 // Explicitly save the freight bean to ensure relationship is saved
//                 $freight->save();
//             } else {
//                 // Log error if relationship couldn't be loaded
//                 $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for freight ID: ' . $freight_id . "\n";
//                 file_put_contents($log_file, $log_message, FILE_APPEND);
//             }
//         }
//     }
//     $result['success'] = $emailObj;
//     return $result;
// }

function send_lead_mail($freight_id, $email_temp, $freight_email)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($freight_id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = array();
    $link_crm = 'https://stretchxlfreight.com/logistx/index.php?module=freight_xl&action=DetailView&record=' . $freight_id;
    require_once './modules/EmailTemplates/EmailTemplate.php';
    $emailTemp = new EmailTemplate();
    $emailTemp->retrieve($email_temp);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($freight_id) . "\n";
    $freight = BeanFactory::getBean('freight_xl', $freight_id);

    $addons = $freight->addons_c;

    // Process addons: remove numbers, replace underscores with spaces, and capitalize first letter of each word
    // $addons = preg_replace('/-\d+/', '', $addons); // Remove numbers after hyphen
    $addons = str_replace('_', ' ', $addons);  // Replace underscores with spaces
    $addons = str_replace('-', ' : $', $addons);  // Replace underscores with spaces
    $addonItems = explode(',', $addons);  // Split into array
    $formattedAddons = array_map('trim', $addonItems);  // Trim whitespace
    $formattedAddons = array_filter($formattedAddons);  // Remove empty items
    $formattedAddons = array_map('ucwords', $formattedAddons);  // Capitalize first letter of each word
    $addons = implode('<br>', $formattedAddons);  // Join with line breaks
    $dashboard_link = 'https://stretchxlfreight.com/dashboard/';
    $emailTemp->body_html = str_replace('$lead_date_entered', $freight->date_entered, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$dashboard_link', $dashboard_link, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickup_time_c', $freight->pickup_time_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_eventdate_c', $freight->pickup_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickup_date_c', $freight->pickup_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_dropoff_time_c', $freight->dropoff_time_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_dropoff_date_c', $freight->dropoff_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_phone_mobile', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_email1', $freight->email1, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$link_crm', $link_crm, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_rate_per_mile_c', $freight->rate_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_distance_c', $freight->distance_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_mileage_c', $freight->mileage_c ? $freight->mileage_c : '0', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_fuel_c', $freight->fuel_c ? $freight->fuel_c : '0', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_total_trip_cost_c', $freight->total_price_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_dead_head_c', $freight->deadhead_price_c ? $freight->deadhead_price_c : '0d', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_addon_price_c', $freight->addons_total_c ? $freight->addons_total_c : '0', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_addons_c', $addons ? $addons : 'none', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_type_c', $freight->freight_type_c ? $freight->freight_type_c : '', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickup_address_c', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickuplocation_c', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_location_c', $freight->dropoff_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_carrier_vehicle_type_c', $freight->carrier_vehicle_type_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_weight_c ', $freight->freight_weight_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_pallet_count_c', $freight->freight_pallet_count_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_clientnotes_c', $freight->freight_description_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_phone_c', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_email_c', $freight->freight_shipper_email_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $vmail = new SugarPHPMailer();
    $vmail->From = $defaults['email'];
    $vmail->FromName = $defaults['name'];
    $vmail->setMailerForSystem();
    $vmail->ClearAllRecipients();
    $vmail->ClearReplyTos();
    $vmail->Subject = ($emailTemp->subject);
    $vmail->AddAddress($freight_email);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent to : ' . json_encode($freight_email) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vmail->Body = $emailTemp->body_html;
    $vmail->AltBody = $emailTemp->body;
    $attachments = array();
    $vmail->handleAttachments($attachments);
    $vmail->prepForOutbound();
    $emailObj->to_addrs = $freight_email;
    $emailObj->cc_addrs = '';
    $emailObj->name = $emailTemp->subject;
    $emailObj->date_sent = TimeDate::getInstance()->nowDb();
    $emailObj->description_html = $emailTemp->body_html;
    $emailObj->description = strip_tags($emailTemp->body_html);
    $emailObj->from_addr = $vmail->From;
    $emailObj->modified_user_id = '1';
    $emailObj->created_by = '1';
    $emailObj->status = 'sent';
    $emailObj->type = 'out';
    $emailObj->parent_type = 'freight_xl';
    $emailObj->parent_id = $freight_id;
    $emailObj->save();
    $emailSent = @$vmail->Send();
    if ($emailSent) {
        $emailObj->status = 'sent';
         $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent successfully for freight ID: ' . $freight_id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    } else {
        $emailObj->status = 'send_error';
        $emailObj->save();
        // Added ErrorInfo to log
        $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent failed for freight ID: ' . $freight_id . ' Error: ' . $vmail->ErrorInfo . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return $result;
    }
    if (!empty($freight_id)) {
        $freight = BeanFactory::getBean('freight_xl', $freight_id);
        if ($freight) {
            // Load the relationship
            $freight->load_relationship('freight_xl_emails_1');

            // Make sure the relationship is loaded
            if ($freight->freight_xl_emails_1) {
                // Use the relationship's add() method
                $freight->freight_xl_emails_1->add($emailObj->id);

                // Explicitly save the freight bean to ensure relationship is saved
                $freight->save();
            } else {
                // Log error if relationship couldn't be loaded
                $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for freight ID: ' . $freight_id . "\n";
                file_put_contents($log_file, $log_message, FILE_APPEND);
            }
        }
    }
    $result['success'] = $emailObj;
    return $result;
}
function get_pricing($pickup, $dropoff)
{
    $pickup_lat_long = get_lat_long($pickup);
    // $log_file = 'vendorLogs.log';
    // $log_message = '[' . date('Y-m-d H:i:s') . "] Lead pick: " . json_encode($pickup_lat_long) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    $dropoff_lat_long = get_lat_long($dropoff);

    // $log_message = '[' . date('Y-m-d H:i:s') . "] Lead dropoff: " . json_encode($dropoff_lat_long) . "\n";
    // file_put_contents($log_file, $log_message, FILE_APPEND);
    $distance = see_distance($pickup_lat_long['lat'], $pickup_lat_long['long'], $dropoff_lat_long['lat'], $dropoff_lat_long['long']);
    $result = array();

    $data = [
        'pickUp' => [
            'address' => $pickup,
            'lat' => $pickup_lat_long['lat'],
            'lng' => $pickup_lat_long['long'],
            'postalCode' => ''  // Add if available
        ],
        'equipment' => ['flatbed'],  // You can change this to other types like "van", "reefer", etc.
        "dropOff" => [
            "address" => $dropoff,
            "lat" => $dropoff_lat_long['lat'],
            "lng" => $dropoff_lat_long['long'],
            "postalCode" => "" // Add if available
        ]
        // 'dropOff' => [
        //     'address' => $pickup,
        //     'lat' => $pickup_lat_long['lat'],
        //     'lng' => $pickup_lat_long['long'],
        //     'postalCode' => ''  // Add if available
        // ],
    ];

    $response = get_truckpath_single_lane_rate($data);

    // return $response;

    // Process the response
    if ($response['status'] === 200 && !empty($response['body']['data'])) {
        $rates = $response['body']['data'];
        // Process the rates array as needed

        // return $rates;
        $allRatesNull = true;
        foreach ($rates as $rate) {
            if ($rate['avgRate'] != null) {
                $allRatesNull = false;
                break;
            }
        }
        if ($allRatesNull) {
            $state = get_state_from_address($pickup);
            $dataState = [
                'pickUp' => 'pickup',
                'equipment' => ['flatbed'],  // You can change this to other
                'state' => $state
            ];
            $responseState = get_truckpath_state_rate($dataState);

            if ($responseState['status'] === 200 && !empty($responseState['body']['data']['avgRates'])) {
                $ratesState = $responseState['body']['data']['avgRates'];

                $result = [
                    'rates' => $ratesState,
                    'type' => 'state'
                ];
            } else {
                $result = [
                    'rates' => 'Error at state rate',
                    'type' => 'state'
                ];
            }
        } else {
            $result = [
                'rates' => $rates,
                'type' => 'single_lane'
            ];
        }
    } else {
        // Handle error
        $result = [
            'error' => 'Failed to get rates single lane',
            'details' => $response['body'] ?? 'Unknown error'
        ];
    }

    $result['distance'] = number_format($distance['distance'], 2);
    $result['duration'] = $distance['duration'];
    $result['pickup_lat'] = number_format($pickup_lat_long['lat'], 2);
    $result['pickup_long'] = number_format($pickup_lat_long['long'], 2);
    $result['dropoff_lat'] = number_format($dropoff_lat_long['lat'], 2);
    $result['dropoff_long'] = number_format($dropoff_lat_long['long'], 2);

    return $result;
}
function get_lat_long($address)
{
    $address = str_replace(' ', '+', $address);

    // return $address;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.radar.io/v1/geocode/forward?query=' . $address,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: prj_live_pk_54b2a02354afc907c3550d5b7e709b61937d9d88'
            // 'Authorization: prj_live_pk_e929d749ecc96426f1ea2790d3d96e4b42db8703'
            // Amplify Themes
            // 'Authorization: prj_live_pk_2fa076eaf5ac1c59953ae96583170ea90df6c76c'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response, true);
    $result = array();

    if (isset($response['meta']['code']) && $response['meta']['code'] == 200) {
        if (isset($response['addresses'][0]['geometry']['coordinates'])) {
            $result['lat'] = $response['addresses'][0]['geometry']['coordinates'][1];
            $result['long'] = $response['addresses'][0]['geometry']['coordinates'][0];
        } else {
            $result['error'] = 'Coordinates not found';
        }
    } else {
        $result['error'] = isset($response['meta']['message']) ? $response['meta']['message'] : 'Error fetching data';
    }

    return $result;
}
function see_distance($origin_lat, $origin_lng, $dest_lat, $dest_lng)
{
    $origin = urlencode("$origin_lat,$origin_lng");
    $destination = urlencode("$dest_lat,$dest_lng");

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.radar.io/v1/route/matrix?origins=$origin&destinations=$destination&mode=car&units=metric",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: prj_live_pk_54b2a02354afc907c3550d5b7e709b61937d9d88'
        ),
    ));

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $result = [
        'distance' => 'Null',
        'duration' => 'Null',
        'response' => null,
        'url' => "https://api.radar.io/v1/route/matrix?origins=$origin&destinations=$destination&mode=car&units=metric"
    ];

    if ($response) {
        $response = json_decode($response, true);
        $result['response'] = $response;

        if ($httpCode === 200 && isset($response['matrix'][0][0])) {
            $result['distance'] = round($response['matrix'][0][0]['distance']['value'] / 1609.34, 2);
            $result['duration'] = $response['matrix'][0][0]['duration']['text'];
        }
    }

    if ($result['distance'] === 0) {
        $result['distance'] = 1;
    }

    return $result;
}
function get_truckpath_single_lane_rate($data)
{
    $url = 'https://api.truckerpath.com/tl/broker/rate/get/check/all';

    // Add required parameters if not present
    if (!isset($data['equipment'])) {
        $data['equipment'] = ['flatbed'];  // Default equipment type
    }
    if (!isset($data['pickUp']['postalCode'])) {
        $data['pickUp']['postalCode'] = '';  // Add if you have this info
    }
    if (!isset($data['dropOff']['postalCode'])) {
        $data['dropOff']['postalCode'] = '';  // Add if you have this info
    }

    $headers = array(
        'x-auth-token: r:5f5882876ce244b9b7842389a2492c23',
        'Content-Type: application/json',
        'Origin: https://truckerpath.com'  // Required by CORS
    );
    // return $data;
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HEADER => true,
        CURLOPT_REFERER => 'https://truckerpath.com/',
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($response === false) {
        return [
            'status' => 500,
            'error' => 'Curl error: ' . curl_error($ch),
            'http_code' => $httpCode
        ];
    }

    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);

    $result = [
        'status' => $httpCode,
        'headers' => $headers,
        'body' => json_decode($body, true)
    ];

    curl_close($ch);

    return $result;
}
function get_truckpath_state_rate($data)
{
    $url = 'https://api.truckerpath.com/tl/broker/state/rate/get/check/all';

    // Prepare the request payload
    $payload = [
        'locationType' => $data['pickUp'] ?? 'pickup',  // Changed from locationType to pickUp
        'state' => $data['state'] ?? '',
        'equipment' => is_array($data['equipment']) ? $data['equipment'][0] : 'flatbed'  // Send as string, not array
    ];

    $headers = [
        'x-auth-token: r:5f5882876ce244b9b7842389a2492c23',
        'Content-Type: application/json',
        'Origin: https://truckerpath.com',
        'Referer: https://truckerpath.com/'
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HEADER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
    ]);

    // Enable verbose output for debugging
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $verbose = fopen('php://temp', 'w+');
    curl_setopt($ch, CURLOPT_STDERR, $verbose);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Log the request and response for debugging
    rewind($verbose);
    $verboseLog = stream_get_contents($verbose);
    error_log('Curl verbose output: ' . $verboseLog);
    error_log('Request payload: ' . json_encode($payload));
    error_log('Response code: ' . $httpCode);
    error_log('Response: ' . $response);

    if ($response === false) {
        return [
            'status' => 500,
            'error' => 'Curl error: ' . curl_error($ch),
            'http_code' => $httpCode
        ];
    }

    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);

    $result = [
        'status' => $httpCode,
        'headers' => $headers,
        'body' => json_decode($body, true),
        'request_payload' => $payload  // Include request payload in response for debugging
    ];

    curl_close($ch);

    return $result;
}
function get_state_from_address($address)
{
    // Split the address by commas and trim spaces
    $parts = array_map('trim', explode(',', $address));

    // The state is typically the second to last part (before country)
    // For "Balaji Temple Drive, Bridgewater, NJ, USA" it would be "NJ"
    if (count($parts) >= 3) {
        $statePart = $parts[count($parts) - 2];  // Gets "NJ" from the example
        // Remove any non-letter characters (in case of zip code or other characters)
        $state = preg_replace('/[^A-Za-z]/', '', $statePart);

        // If it's a valid state abbreviation (2 letters)
        if (strlen($state) === 2) {
            return strtoupper($state);  // Return uppercase (NJ -> NJ)
        }
    }

    // Fallback: try to find a 2-letter state code using regex
    if (preg_match('/\b([A-Z]{2})\b/i', $address, $matches)) {
        return strtoupper($matches[1]);
    }

    return null;  // Return null if no state found
}
function validate_address($address)
{
    $apiKey = 'prj_live_pk_54b2a02354afc907c3550d5b7e709b61937d9d88';

    // First, geocode the address to get the components
    $geocodeUrl = 'https://api.radar.io/v1/geocode/forward?query=' . urlencode($address);
    $ch = curl_init($geocodeUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: ' . $apiKey
        ]
    ]);

    $geocodeResponse = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode !== 200 || !$geocodeResponse) {
        return ['error' => 'Failed to geocode address'];
    }

    $geocodeData = json_decode($geocodeResponse, true);

    if (empty($geocodeData['addresses'])) {
        return ['error' => 'No addresses found'];
    }

    $firstAddress = $geocodeData['addresses'][0];

    // Now validate the address using the validation endpoint
    $validateUrl = 'https://api.radar.io/v1/addresses/validate?' . http_build_query([
        'countryCode' => $firstAddress['countryCode'] ?? 'US',  // Default to US if not provided
        'stateCode' => $firstAddress['stateCode'] ?? '',
        'city' => $firstAddress['city'] ?? '',
        'postalCode' => $firstAddress['postalCode'] ?? '',
        'addressLabel' => $firstAddress['formattedAddress'] ?? $address
    ]);

    curl_setopt($ch, CURLOPT_URL, $validateUrl);
    $validateResponse = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $validateResponse) {
        $validateData = json_decode($validateResponse, true);

        // If validation was successful, return the validated address
        if (isset($validateData['address'])) {
            return [
                'success' => true,
                'verified' => ($validateData['result']['verificationStatus'] ?? '') === 'verified',
                'address' => [
                    'formattedAddress' => $validateData['address']['formattedAddress'] ?? '',
                    'street' => $validateData['address']['addressLabel'] ?? '',
                    'city' => $validateData['address']['city'] ?? '',
                    'state' => $validateData['address']['stateCode'] ?? '',
                    'zip' => $validateData['address']['postalCode'] ?? '',
                    'zip4' => $validateData['address']['plus4'] ?? '',
                    'county' => $validateData['address']['county'] ?? '',
                    'country' => $validateData['address']['countryCode'] ?? ''
                ]
            ];
        }
    }

    // If validation fails, return the geocoded data as fallback
    return [
        'success' => false,
        'verified' => false,
        'address' => [
            'formattedAddress' => $firstAddress['formattedAddress'] ?? $address,
            'street' => $firstAddress['formattedAddress'] ?? $address,
            'city' => $firstAddress['city'] ?? '',
            'state' => $firstAddress['stateCode'] ?? '',
            'zip' => $firstAddress['postalCode'] ?? '',
            'country' => $firstAddress['countryCode'] ?? 'US',
            'lat' => $firstAddress['geometry']['coordinates'][1] ?? null,
            'lng' => $firstAddress['geometry']['coordinates'][0] ?? null
        ]
    ];
}
function get_address_data($address)
{
    $result = validate_address($address);

    if (isset($result['address'])) {
        return [
            'city' => $result['address']['city'],
            'state' => $result['address']['state'],
            'zip' => $result['address']['zip'],
            'lat' => $result['address']['lat'] ?? null,
            'lng' => $result['address']['lng'] ?? null,
            'formattedAddress' => $result['address']['formattedAddress']
        ];
    }

    // Fallback to the original method if Radar.io fails
    $parts = array_map('trim', explode(',', $address));
    if (count($parts) >= 3) {
        $statePart = $parts[count($parts) - 2];
        $state = preg_replace('/[^A-Za-z]/', '', $statePart);
        if (strlen($state) === 2) {
            return strtoupper($state);
        }
    }

    if (preg_match('/\b([A-Z]{2})\b/i', $address, $matches)) {
        return strtoupper($matches[1]);
    }

    return null;
}
function generate_opertunity_id()
{
    global $db;

    // Query to get the highest existing opportunity ID
    $query = "SELECT MAX(CAST(opertunity_id_c AS UNSIGNED)) as max_id FROM freight_xl_cstm WHERE opertunity_id_c REGEXP '^[0-9]+\$'";
    $result = $db->query($query);

    $next_id = 1;  // Default starting ID

    if ($result && $row = $db->fetchByAssoc($result)) {
        if (!empty($row['max_id'])) {
            $next_id = (int) $row['max_id'] + 1;
        }
    }

    // Format as 6-digit number with leading zeros
    $formatted_id = str_pad($next_id, 6, '0', STR_PAD_LEFT);

    // Ensure we don't exceed 6 digits
    if (strlen($formatted_id) > 6) {
        $formatted_id = '999999';  // Or handle this case as needed
    }

    return $formatted_id;
}
function select_vendor_for_lead($pickup_lat = null, $pickup_lng = null, $pickup_state)
{
    global $db;

    // return [
    //     $pickup_lat,
    //     $pickup_lng,
    //     $pickup_state
    // ];

    // First try: With coordinates if available
    if (!empty($pickup_lat) && !empty($pickup_lng)) {
        // Radius of Earth in miles
        $earthRadius = 3959;

        // SQL to find the closest vendor based on Haversine distance
        $query = "
            SELECT 
                v.id, 
                v.name,
                v.billing_address_state, 
                v.billing_address_street, 
                vc.address_lat_c, 
                vc.address_lng_c,
                (
                    $earthRadius * ACOS(
                        COS(RADIANS($pickup_lat)) * COS(RADIANS(vc.address_lat_c)) * COS(RADIANS(vc.address_lng_c) - RADIANS($pickup_lng)) + 
                        SIN(RADIANS($pickup_lat)) * SIN(RADIANS(vc.address_lat_c))
                    )
                ) AS distance_miles
            FROM vnd_vendors v
            JOIN vnd_vendors_cstm vc ON v.id = vc.id_c
            WHERE v.deleted = 0
            AND v.billing_address_state = '{$pickup_state}'
            AND vc.address_lat_c IS NOT NULL
            AND vc.address_lng_c IS NOT NULL
            ORDER BY distance_miles ASC
            LIMIT 1
        ";

        $result = $db->query($query);
        $closest = $db->fetchByAssoc($result);

        if ($closest) {
            $distanceInfo = see_distance($pickup_lat, $pickup_lng, $closest['address_lat_c'], $closest['address_lng_c']);
            return [
                'id' => $closest['id'],
                'name' => $closest['name'],
                'state' => $closest['billing_address_state'],
                'address' => $closest['billing_address_street'],
                'lat' => $closest['address_lat_c'],
                'lng' => $closest['address_lng_c'],
                'distance' => $distanceInfo['distance']
            ];
        }
    }

    // Second try: Any vendor in the state with coordinates
    $query = "
        SELECT 
            v.id, 
            v.name,
            v.billing_address_state, 
            v.billing_address_street, 
            vc.address_lat_c, 
            vc.address_lng_c,
            0 as distance_miles
        FROM vnd_vendors v
        JOIN vnd_vendors_cstm vc ON v.id = vc.id_c
        WHERE v.deleted = 0
        AND v.billing_address_state = '{$pickup_state}'
        AND vc.address_lat_c IS NOT NULL
        AND vc.address_lng_c IS NOT NULL
        LIMIT 1
    ";

    $result = $db->query($query);
    $closest = $db->fetchByAssoc($result);

    if ($closest) {
        $distance = (!empty($pickup_lat) && !empty($pickup_lng))
            ? see_distance($pickup_lat, $pickup_lng, $closest['address_lat_c'], $closest['address_lng_c'])['distance']
            : 0;

        return [
            'id' => $closest['id'],
            'name' => $closest['name'],
            'state' => $closest['billing_address_state'],
            'address' => $closest['billing_address_street'],
            'lat' => $closest['address_lat_c'],
            'lng' => $closest['address_lng_c'],
            'distance' => $distance
        ];
    }

    // Final try: Any vendor in the state, even without coordinates
    $query = "
        SELECT 
            v.id, 
            v.name,
            v.billing_address_state, 
            v.billing_address_street,
            NULL as address_lat_c,
            NULL as address_lng_c,
            0 as distance_miles
        FROM vnd_vendors v
        WHERE v.deleted = 0
        AND v.billing_address_state = '{$pickup_state}'
        LIMIT 1
    ";

    $result = $db->query($query);
    $closest = $db->fetchByAssoc($result);

    if ($closest) {
        return [
            'id' => $closest['id'],
            'name' => $closest['name'],
            'state' => $closest['billing_address_state'],
            'address' => $closest['billing_address_street'],
            'lat' => $closest['address_lat_c'],
            'lng' => $closest['address_lng_c'],
            'distance' => 0
        ];
    }

    return ['error' => 'No vendors found'];
}
function post_load_to_truckerpath($data)
{
    $log_file = 'vendorLogs.log';
    // return $data;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Posted Load to truckerpath curl: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $url = 'https://api.truckerpath.com/shipments';

    // Prepare headers
    $headers = [
        'Content-Type: application/json',
        'x-auth-token: r:5f5882876ce244b9b7842389a2492c23'
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);  // 30 seconds timeout

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check for errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        $log_message = '[' . date('Y-m-d H:i:s') . '] Error Posted Load to truckerpath curl: ' . json_encode($error_msg) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return ['success' => false, 'error' => $error_msg];
    }

    // Process the response
    $responseData = json_decode($response, true);

    // return $responseData;

    // Check if the request was successful (HTTP 2xx)
    if ($httpCode >= 200 && $httpCode < 300) {
        $log_message = '[' . date('Y-m-d H:i:s') . '] Posted Load to truckerpath: ' . json_encode($responseData) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return ['success' => true, 'data' => $responseData];
    } else {
        $log_message = '[' . date('Y-m-d H:i:s') . '] Error Posted Load to truckerpath: ' . json_encode($responseData) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return [
            'success' => false,
            'http_code' => $httpCode,
            'error' => $responseData['message'] ?? 'Unknown error occurred',
            'response' => $responseData,
            'data' => $data
        ];
    }

    curl_close($ch);

    // Process the response
    $responseData = json_decode($response, true);

    // Check if the request was successful (HTTP 2xx)
    if ($httpCode >= 200 && $httpCode < 300) {
        return ['success' => true, 'data' => $responseData];
    } else {
        return [
            'success' => false,
            'http_code' => $httpCode,
            'error' => $responseData['message'] ?? 'Unknown error occurred',
            'response' => $responseData,
            'data' => $data
        ];
    }
}
// function prepare_post_load($data)
// {
//     $log_file = 'vendorLogs.log';

//     $pickup_time = date('H:i:s', strtotime($data['pickup_time']));
//     $dropoff_time = date('H:i:s', strtotime($data['dropoff_time']));

//     $loadData = [
//         'equipment' => [
//             $data['equipment']
//         ],
//         'load_size' => 'partial',
//         'weight' => (int) $data['weight'],
//         'description' => $data['description'] ?? '',
//         'pickup' => [
//             'city' => $data['pickup_city'],
//             'state' => $data['pickup_state'],
//             'date_local' => $data['pickup_date'] . 'T' . $pickup_time
//         ],
//         'from_date' => strtotime($data['pickup_date'] . ' 00:00:00') * 1000,
//         'to_date' => strtotime($data['dropoff_date'] . ' 00:00:00') * 1000,
//         'from_date_local' => $data['pickup_date'] . 'T' . $pickup_time,
//         'drop_off' => [
//             'city' => $data['dropoff_city'],
//             'state' => $data['dropoff_state'],
//             'date_local' => $data['dropoff_date'] . 'T' . $dropoff_time
//         ],
//         'to_date_local' => $data['dropoff_date'] . 'T' . $dropoff_time,
//         'distance' => floatval($data['distance']),
//         'collect_offer' => true,
//         'contact_first_name' => 'Kenneth',
//         'contact_last_name' => 'Kugler',
//         'company' => 'Stretch XL Freight',
//         'phone' => '8555644788',
//         'email' => 'ken@stretchxlfreight.com',
//         'biddable' => true,
//         'book_now' => false,
//         'source' => 'truckerpath',
//         'target_price' => $data['total_price'],
//         'inte_type' => 'TruckerPathPortal',
//         'trip_details' => [
//             [
//                 'type' => 'P',
//                 'num' => 0,
//                 'state' => $data['pickup_state'],
//                 'city' => $data['pickup_city'],
//                 'address' => '',
//                 'location' => $data['pickup_lat'] . ',' . $data['pickup_long'],
//                 'zip' => $data['pickup_zip'],
//                 'distance' => floatval($data['distance']),
//                 'country' => 'USA',
//                 'date_local_start' => $data['pickup_date'] . 'T' . $pickup_time
//             ],
//             [
//                 'type' => 'D',
//                 'num' => 1,
//                 'state' => $data['dropoff_state'],
//                 'city' => $data['dropoff_city'],
//                 'address' => '',
//                 'location' => $data['dropoff_lat'] . ',' . $data['dropoff_long'],
//                 'zip' => $data['dropoff_zip'],
//                 'distance' => floatval($data['distance']),
//                 'country' => 'USA',
//                 'date_local_start' => $data['dropoff_date'] . 'T' . $dropoff_time
//             ]
//         ]
//     ];
//     $log_message = '[' . date('Y-m-d H:i:s') . '] Post Prepare Load to truckerpath: ' . json_encode($loadData) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     // return $loadData;
//     $result = post_load_to_truckerpath($loadData);

//     // return $result;
//     if ($result['success']) {
//         return $result['data'];
//     } else {
//         return $result['error'] = 'Failed to post load';
//     }
// }
function prepare_post_load($data)
{
    $log_file = 'vendorLogs.log';

    // Normalize date formats to yyyy-MM-dd
    $pickup_date = date('Y-m-d', strtotime($data['pickup_date']));
    $dropoff_date = date('Y-m-d', strtotime($data['dropoff_date']));

    $pickup_time = date('H:i:s', strtotime($data['pickup_time']));
    $dropoff_time = date('H:i:s', strtotime($data['dropoff_time']));

    $loadData = [
        'equipment' => [$data['equipment']],
        'load_size' => 'partial',
        'weight' => (int) $data['weight'],
        'description' => $data['description'] ?? '',
        'pickup' => [
            'city' => $data['pickup_city'],
            'state' => $data['pickup_state'],
            'date_local' => $pickup_date . 'T' . $pickup_time
        ],
        'from_date' => strtotime($pickup_date . ' 00:00:00') * 1000,
        'to_date' => strtotime($dropoff_date . ' 00:00:00') * 1000,
        'from_date_local' => $pickup_date . 'T' . $pickup_time,
        'drop_off' => [
            'city' => $data['dropoff_city'],
            'state' => $data['dropoff_state'],
            'date_local' => $dropoff_date . 'T' . $dropoff_time
        ],
        'to_date_local' => $dropoff_date . 'T' . $dropoff_time,
        'distance' => floatval($data['distance']),
        'collect_offer' => true,
        'contact_first_name' => 'Kenneth',
        'contact_last_name' => 'Kugler',
        'company' => 'Stretch XL Freight',
        'phone' => '8555644788',
        'email' => 'ken@stretchxlfreight.com',
        'biddable' => true,
        'book_now' => false,
        'source' => 'truckerpath',
        'target_price' => $data['total_price'],
        'inte_type' => 'TruckerPathPortal',
        'trip_details' => [
            [
                'type' => 'P',
                'num' => 0,
                'state' => $data['pickup_state'],
                'city' => $data['pickup_city'],
                'address' => '',
                'location' => $data['pickup_lat'] . ',' . $data['pickup_long'],
                'zip' => $data['pickup_zip'],
                'distance' => floatval($data['distance']),
                'country' => 'USA',
                'date_local_start' => $pickup_date . 'T' . $pickup_time
            ],
            [
                'type' => 'D',
                'num' => 1,
                'state' => $data['dropoff_state'],
                'city' => $data['dropoff_city'],
                'address' => '',
                'location' => $data['dropoff_lat'] . ',' . $data['dropoff_long'],
                'zip' => $data['dropoff_zip'],
                'distance' => floatval($data['distance']),
                'country' => 'USA',
                'date_local_start' => $dropoff_date . 'T' . $dropoff_time
            ]
        ]
    ];

    $log_message = '[' . date('Y-m-d H:i:s') . '] Post Prepare Load to truckerpath: ' . json_encode($loadData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $result = post_load_to_truckerpath($loadData);

    if ($result['success']) {
        return $result['data'];
    } else {
        return $result['error'] = 'Failed to post load';
    }
}

function post_load($id)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Posting Load to truckerpath: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $freight = BeanFactory::getBean('freight_xl', $id);
    $lead_Charges = leadCharges();
    $marketPrice = floatval(str_replace(',', '', $freight->market_price_c));
    $log_message = '[' . date('Y-m-d H:i:s') . '] TP MP: ' . json_encode($marketPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $platformProfit = floatval($marketPrice) * (floatval($lead_Charges['Vendor_Percentage']) / 100);
    $log_message = '[' . date('Y-m-d H:i:s') . '] TP PP: ' . json_encode($platformProfit) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $platformPrice = floatval($marketPrice) - floatval($platformProfit);
    $platformPrice = number_format($platformPrice, 2);
    $platformPrice = str_replace(',', '', $platformPrice);
    $log_message = '[' . date('Y-m-d H:i:s') . '] TP PPP: ' . json_encode($platformPrice) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $distance = str_replace(',', '', $freight->distance_c);
    $distance = floatval($distance);
    $distance = number_format($distance, 2);

    $addons = $freight->addons_c;
    $addonsArray = explode(',', $addons);
    $formattedAddons = [];

    foreach ($addonsArray as $addon) {
        if (empty(trim($addon)))
            continue;

        // Remove price suffix (e.g., -50, -100)
        $addon = preg_replace('/-\d+$/', '', $addon);

        // Replace underscores with spaces
        $addon = str_replace('_', ' ', $addon);

        $formattedAddons[] = $addon;
    }

    // Join with newlines
    $formattedAddonsString = implode(',', $formattedAddons);

    $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;

    $load['weight'] = $freight->freight_weight_c;
    $load['pickup_date'] = $freight->pickup_date_c;
    $load['pickup_time'] = $freight->pickup_time_c;
    $load['pickup_city'] = $freight->pickup_city_c;
    $load['pickup_state'] = $freight->pickup_state_c;
    $load['pickup_lat'] = $freight->pickup_lat_c;
    $load['pickup_long'] = $freight->pickup_lng_c;
    $load['pickup_zip'] = $freight->pickup_zip_c;
    $load['dropoff_city'] = $freight->dropoff_city_c;
    $load['dropoff_state'] = $freight->dropoff_state_c;
    $load['dropoff_time'] = $freight->dropoff_time_c;
    $load['dropoff_date'] = $freight->dropoff_date_c;
    $load['dropoff_lat'] = $freight->dropoff_lat_c;
    $load['dropoff_long'] = $freight->dropoff_lng_c;
    $load['dropoff_zip'] = $freight->dropoff_zip_c;
    $load['distance'] = $distance;
    $load['total_price'] = $platformPrice;
    $load['equipment'] = $freight->carrier_vehicle_type_c;
    $load['description'] = $newDescription;
    $log_message = '[' . date('Y-m-d H:i:s') . '] Preparing Load to truckerpath: ' . json_encode($load) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $load = prepare_post_load($load);
    $freight->truckerpath_ref_id_c = $load['id'];

    $freight->profit_c = floatval($freight->profit_c) + floatval($platformProfit);
    $freight->platform_price_c = $platformPrice;
    $freight->tp_c = "1";
    $freight->save();
    return $load;
}
function update_load_truckerpath($id)
{
    // Get load details from database using the provided ID
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Updating Load to truckerpath: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $load = BeanFactory::getBean('freight_xl', $id);
    $platformPrice = number_format(floatval(str_replace(',', '', $load->platform_price_c)), 2);
    $platformPrice = str_replace(',', '', $load->platform_price_c);
    $addons = $load->addons_c;
    $addonsArray = explode(',', $addons);
    $formattedAddons = [];

    foreach ($addonsArray as $addon) {
        if (empty(trim($addon)))
            continue;

        // Remove price suffix (e.g., -50, -100)
        $addon = preg_replace('/-\d+$/', '', $addon);

        // Replace underscores with spaces
        $addon = str_replace('_', ' ', $addon);

        $formattedAddons[] = $addon;
    }

    // Join with newlines
    $formattedAddonsString = implode(',', $formattedAddons);

    $newDescription = $formattedAddonsString . '. ' . $load->description_c;

    // $distance = intval(str_replace(',', '', $load->distance_c));

    if (!$load->truckerpath_ref_id_c) {
        return ['success' => false, 'message' => 'Load not found'];
    }

    // Prepare the request data
    $url = 'https://api.truckerpath.com/shipments';

    // Prepare headers
    $headers = [
        'accept: */*',
        'accept-language: en-US,en;q=0.9',
        'client: Web-brokers/1.220323.47',
        'content-type: application/json',
        'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
        'priority: u=1, i',
        'x-auth-token: r:1665a0568a384279bed5059cfeb94795',
        'Referer: https://shipment.truckerpath.com/'
    ];
    // return $id;

    $tpId = explode("|" , $load->truckerpath_ref_id_c);
    $tpId = $tpId[0];
    $equipment = str_replace(" " , "_" , $load->carrier_vehicle_type_c);

    // Prepare the request body
    $data = [
        'company' => 'Stretch XL Freight',
        'contact_first_name' => 'Kenneth',
        'contact_last_name' => 'Kugler',
        // 'distance' => $distance,
        'drop_off' => [
            'city' => $load->dropoff_city_c,
            'state' => $load->dropoff_state_c,
            'date_local' => date('Y-m-d\TH:i:s', strtotime($load->dropoff_date_c . ' ' . $load->dropoff_time_c))
        ],
        'email' => 'ken@stretchxlfreight.com',
        'equipment' => [$equipment ? $equipment : 'van'],
        'from_date' => strtotime($load->pickup_date_c . ' ' . $load->pickup_time_c) * 1000,  // Convert to milliseconds
        'phone' => '8555644788',
        'pickup' => [
            'city' => $load->pickup_city_c,
            'state' => $load->pickup_state_c,
            'date_local' => date('Y-m-d\TH:i:s', strtotime($load->pickup_date_c . ' ' . $load->pickup_time_c))
        ],
        'target_price' => $platformPrice,
        'weight' => $load->freight_weight_c,
        'collect_offer' => true,
        'private_load' => false,
        'from_date_time_format' => date('H:i', strtotime($load->pickup_time_c)),
        'to_date_time_format' => date('H:i', strtotime($load->dropoff_time_c)),
        'to_date' => strtotime($load->dropoff_date_c . ' ' . $load->dropoff_time_c) * 1000,  // Convert to milliseconds
        'book_now' => false,
        'load_size' => 'partial',
        'description' => $newDescription,
        // 'description' => $load->freight_description_c,
        // 'total_distance' => $distance, // You might want to calculate this based on actual distance
        'phone-ext' => null,
        'from_date_local' => date('Y-m-d\TH:i:s', strtotime($load->pickup_date_c . ' ' . $load->pickup_time_c)),
        'to_date_local' => date('Y-m-d\TH:i:s', strtotime($load->dropoff_date_c . ' ' . $load->dropoff_time_c)),
        'biddable' => true,
        'source' => 'truckerpath',
        'inte_type' => 'TruckerPathPortal',
        'trip_details' => [
            [
                'type' => 'P',
                'num' => 0,
                'state' => $load->pickup_state_c,
                'city' => $load->pickup_city_c,
                'address' => $load->pickup_address_c,
                'location' => $load->pickup_lat_c . ',' . $load->pickup_lng_c,
                // 'distance' => 0,
                'country' => 'USA',
                'date_local_start' => date('Y-m-d\TH:i:s', strtotime($load->pickup_date_c . ' ' . $load->pickup_time_c))
            ],
            [
                'type' => 'D',
                'num' => 1,
                'state' => $load->dropoff_state_c,
                'city' => $load->dropoff_city_c,
                'address' => $load->dropoff_address_c,
                'location' => $load->dropoff_lat_c . ',' . $load->dropoff_lng_c,
                // 'distance' => $distance, // You might want to calculate this
                'country' => 'USA',
                'date_local_start' => date('Y-m-d\TH:i:s', strtotime($load->dropoff_date_c . ' ' . $load->dropoff_time_c))
            ]
        ],
        'external_id' => 'TP:' . $tpId
    ];

    $log_message = '[' . date('Y-m-d H:i:s') . '] Updating Load Data to truckerpath: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    // return $data;

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Only for development, remove in production
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    // Close cURL
    curl_close($ch);

    // Handle the response
    if ($error) {
        return ['success' => false, 'message' => 'cURL Error: ' . $error];
    }

    // Process the response
    $responseData = json_decode($response, true);

     $log_message = '[' . date('Y-m-d H:i:s') . '] Updating Load Data to truckerpath Response: ' . json_encode($responseData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    if ($httpCode >= 200 && $httpCode < 300) {
        // Success
        return [
            'success' => true,
            'data' => $responseData,
            'message' => 'Load successfully updated on TruckerPath'
        ];
    } else {
        // Error
        return [
            'success' => false,
            'http_code' => $httpCode,
            'response' => $responseData,
            'message' => 'Failed to update load on TruckerPath'
        ];
    }
}
function getFuelPriceFromEIA()
{
    $url = 'https://api.eia.gov/v2/petroleum/pri/gnd/data/';

    // Construct the full URL with query parameters
    $queryParams = http_build_query([
        'api_key' => 'gA1L6RpYaTgLmYHukt9TxDBGFyZdyLOYMCRI8PRK',
        'frequency' => 'weekly',
        'data[0]' => 'value',
        'sort[0][column]' => 'period',
        'sort[0][direction]' => 'desc',
        'offset' => 0,
        'length' => 1,  // just get the latest
    ]);

    $fullUrl = $url . '?' . $queryParams;

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $fullUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute and get the response
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return ['error' => 'Failed to connect to API'];
    }

    // Decode the response
    $data = json_decode($response, true);

    if (isset($data['response']['data'][0]['value'])) {
        $price = $data['response']['data'][0]['value'];
        $date = $data['response']['data'][0]['period'];
        return [
            'price_per_gallon' => $price,
            'date' => $date
        ];
    } else {
        return ['error' => 'Invalid response structure'];
    }
}
function calculateFuelCost($distance, $freightType)
{
    $fuelPricePerGallon = getFuelPriceFromEIA();
    $price_per_gallon = $fuelPricePerGallon['price_per_gallon'];

    if (!$price_per_gallon) {
        $price_per_gallon = 3.7;
    }

    $fuelEfficiencyMap = [
        'general' => 6.0,
        'perishables' => 5.5,
        'non_hazardous' => 6.0,
        'bulk' => 5.0,
        'heavy' => 4.5,
        'vehicles' => 5.5,
        'high_value' => 6.0,
        'specialized' => 4.8,
        'misc' => 5.3
    ];

    if (!array_key_exists($freightType, $fuelEfficiencyMap)) {
        return 'Invalid freight type.';
    }

    $mpg = $fuelEfficiencyMap[$freightType];
    $fuelNeeded = $distance / $mpg;
    $fuelCost = $fuelNeeded * $price_per_gallon;

    return number_format($fuelCost, 2);
}
function getTollCost($pickup_lat, $pickup_lng, $dropoff_lat, $dropoff_lng)
{
    $url = 'https://router.hereapi.com/v8/routes?origin=' . $pickup_lat . ',' . $pickup_lng . '&destination=' . $dropoff_lat . ',' . $dropoff_lng . '&transportMode=truck&return=summary%2Ctolls&apikey=ydxYsKC-qNFdeLfpZXI644NxbT_OyBDx4TbJ1bLfWSA';

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute and get the response
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return ['error' => 'Failed to connect to API'];
    }

    // Decode the response
    $data = json_decode($response, true);

    if (isset($data['routes'][0]['sections'][0]['tolls'])) {
        $tolls = $data['routes'][0]['sections'][0]['tolls'];
        $totalTollCost = 0;

        foreach ($tolls as $toll) {
            if (!empty($toll['fares'])) {
                // Find the lowest fare for this toll system
                $lowestFare = null;
                foreach ($toll['fares'] as $fare) {
                    if (isset($fare['price']['value'])) {
                        $fareValue = (float) $fare['price']['value'];
                        if ($lowestFare === null || $fareValue < $lowestFare) {
                            $lowestFare = $fareValue;
                        }
                    }
                }

                if ($lowestFare !== null) {
                    $totalTollCost += $lowestFare;
                }
            }
        }

        return [
            'total_toll_cost' => number_format($totalTollCost, 2),
            'currency' => 'USD',
            'toll_systems_count' => count($tolls)
        ];
    } else {
        // return ['error' => 'No toll information available'];
        return [
            'error' => 'No toll information available',
            'total_toll_cost' => 0,
            'currency' => 'USD',
            'toll_systems_count' => 0
        ];
    }
}
function get_fuel_and_toll_cost_vendor($data)
{
    $fuel_cost = calculateFuelCost($data['distance'], $data['freight_type']);
    $toll_cost = getTollCost($data['pickup_lat'], $data['pickup_lng'], $data['dropoff_lat'], $data['dropoff_lng']);

    return [
        'fuel_cost' => $fuel_cost,
        'toll_cost' => $toll_cost,
    ];
}
function get_fuel_and_toll_cost($pickup_address, $dropoff_address, $freightType)
{
    // return [
    //     $pickup_address,
    //     $dropoff_address,
    //     $freightType
    // ];
    $pickup_lat_long = get_lat_long($pickup_address);
    $dropoff_lat_long = get_lat_long($dropoff_address);
    $distance = see_distance($pickup_lat_long['lat'], $pickup_lat_long['long'], $dropoff_lat_long['lat'], $dropoff_lat_long['long']);
    $fuel_cost = calculateFuelCost($distance['distance'], $freightType);
    $toll_cost = getTollCost($pickup_lat_long['lat'], $pickup_lat_long['long'], $dropoff_lat_long['lat'], $dropoff_lat_long['long']);

    // return [
    //     'fuel_cost' => $fuel_cost,
    //     'toll_cost' => $toll_cost,
    //     'total_cost' => number_format($fuel_cost + $toll_cost, 2),
    //     'distance' => number_format($distance['distance'], 2),
    // ];

    $pricing = get_pricing($pickup_address, $dropoff_address);
    $rate = 3; // Default rate if no valid rates are found
    
    // Calculate average of non-null and non-zero rates
    $validRates = array_filter($pricing['rates'], function($item) {
        return $item['avgRate'] !== null && $item['avgRate'] > 0;
    });
    
    if (!empty($validRates)) {
        $sum = array_sum(array_column($validRates, 'avgRate'));
        $rate = $sum / count($validRates);
    }

    $total_cost = $rate * floatval($distance['distance']);
    return [
        'fuel_cost' => $fuel_cost,
        'toll_cost' => $toll_cost,
        'total_cost' => number_format($total_cost, 2),
        'distance' => number_format($distance['distance'], 2),
    ];
}
function encrypt($data)
{
    $key = hash('sha256', 'stretchxl', true);
    $iv = substr(hash('sha256', 'stretchxl'), 0, 16);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
function decrypt($data)
{
    $decoded = base64_decode($data);
    if (strpos($decoded, '::') === false) {
        return false;
    }
    list($encrypted_data, $iv) = explode('::', $decoded, 2);
    $key = hash('sha256', 'stretchxl', true);
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
}
function leadCharges()
{
    $ChargesPerMile = 0;
    $FuelSarcharge = 0;
    $Gratuity = 0;
    $Vendor_Percentage = 0;
    $Client_Markup = 0;
    $configurator = new Configurator();
    $configurator->loadConfig();
    if (!empty($configurator->config['Lead_Charges']) && isset($configurator->config['Lead_Charges'])) {
        $ChargesPerMile = $configurator->config['Lead_Charges']['CHARGES_PER_MILE'];
        $FuelSarcharge = $configurator->config['Lead_Charges']['FUEL_SURCHARGE'];
        $Gratuity = $configurator->config['Lead_Charges']['GRATUITY'];
        $Vendor_Percentage = $configurator->config['Lead_Charges']['VENDOR_PERCENTAGE'];
        $Client_Markup = $configurator->config['Lead_Charges']['CLIENT_MARKUP'];
    }

    // Create an array to hold the data
    $result = array(
        'ChargesPerMile' => $ChargesPerMile,
        'FuelSarcharge' => $FuelSarcharge,
        'Gratuity' => $Gratuity,
        'Vendor_Percentage' => $Vendor_Percentage,
        'Client_Markup' => $Client_Markup,
    );
    // $result['name'] = $test;

    return $result;
}
function deleteShipmentFromTruckerPath($id)
{
    $url = 'https://api.truckerpath.com/shipments/' . urlencode($id);

    $headers = [
        'client: Web-brokers/1.220323.47',
        'content-type: application/json',
        'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
        'sec-ch-ua: "Not)A;Brand";v="8", "Chromium";v="138", "Google Chrome";v="138"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'x-auth-token: r:1665a0568a384279bed5059cfeb94795',
        'Referer: https://shipment.truckerpath.com/'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['error' => $error];
    }

    return [
        'status' => ($httpCode >= 200 && $httpCode < 300) ? 'success' : 'error',
        'http_code' => $httpCode,
        'response' => json_decode($response, true)
    ];
}
function getBrokerData($brokerDot)
{
    $url = 'https://api.truckerpath.com/services/saferwatch/DOT/' . urlencode($brokerDot);

    try {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json'
        ]);

        // Execute the request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        // Check for HTTP errors
        if ($httpCode >= 400) {
            throw new Exception('HTTP error ' . $httpCode);
        }

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check for JSON decode errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('JSON decode error: ' . json_last_error_msg());
        }

        return $data;
    } catch (Exception $e) {
        error_log('Error loading broker data: ' . $e->getMessage());
        return null;
    }
}
function getBrokerDataNew($brokerNumber, $type = 'DOT')
{
    $url = 'https://api.truckerpath.com/services/saferwatch/' . $type . '/' . urlencode($brokerNumber);

    // return $url;

    try {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json'
        ]);

        // Execute the request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        // Check for HTTP errors
        if ($httpCode >= 400) {
            throw new Exception('HTTP error ' . $httpCode);
        }

        // Decode the JSON response
        $data = json_decode($response, true);

        // Check for JSON decode errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('JSON decode error: ' . json_last_error_msg());
        }

        return $data;
    } catch (Exception $e) {
        error_log('Error loading broker data: ' . $e->getMessage());
        return null;
    }
}
function quoteLoad($data)
{
    
    $log_file = 'vendorLogs.log';

    // 2. Decode HTML entities first
    $decoded_vendor_data = html_entity_decode($data['vendor_data']);
    $decoded_shipment_data = html_entity_decode($data['shipment_data']);

    $log_message = '[' . date('Y-m-d H:i:s') . "] vendor data: " . json_encode($decoded_vendor_data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . "] shipment data: " . json_encode($decoded_shipment_data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);



    
    // return true;
    
    // 3. Now decode the JSON
    $vendor_data = json_decode($decoded_vendor_data, true);
    $shipment_data = json_decode($decoded_shipment_data, true);


    $laneData =null;
    // $brokerData = null;
    // return $shipment_data;
    // if (isset($shipment_data['shipment_data']['equipments'])) {
    //     $brokerData = getBrokerDataNew($shipment_data['broker_dot'] , "MC");
    //     return $brokerData;
    // }

      // Example usage
      $laneRateData = [
        'pickup_address' => $shipment_data['pickup'],
        'dropoff_address' => $shipment_data['dropoff']
    ];

    $laneResult = laneRate($laneRateData);

   
    $laneData = json_decode($laneResult['body'], true);
    // return $laneData;

    $log_message = '[' . date('Y-m-d H:i:s') . "] lane Rate:  ". json_encode($laneData)  . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
  
    

    // return $shipment_data;
    $refStatus = null;
    $load_id = null;
    if(isset($shipment_data['shipment_data']['external_id'])){
        $external_id = explode(':', $shipment_data['shipment_data']['external_id']);
        $load_id = $external_id[1];
    }else{
        $load_id = $shipment_data['id'];
    }
    
// return $load_id;
$refStatus = checkShipmentRef($load_id);
$brokerDatax = [];
$newBrokerData = [];

// return $refStatus;



if(isset($refStatus['status']) && $refStatus['status'] == 'success'){

    $vendor = BeanFactory::getBean('VND_Vendors', $vendor_data['id']);
    $freight = BeanFactory::getBean('freight_xl', $refStatus['id']);
    $quote = BeanFactory::newBean('tnv_VendorQuote');
     $lead_Charges = leadCharges();

    // return $lead_Charges;
    $client_markup = (floatval($lead_Charges['Client_Markup']) / 100);

    $price_with_profit = $data['quote_price'] + ($data['quote_price'] * $client_markup);
    $quote->name = $vendor->name;
    $quote->vendor_email_c = $vendor->email1;
    $quote->vendor_phone_c = $vendor->phone_office;
    $quote->quoted_price_c = $data['quote_price'];
    $quote->quoted_price_with_profit_c = $price_with_profit;
    $quote->description = $data['quote_description'];
    $quote->quote_status_c = 'Pending';
    $quote->vendor_id_c = $vendor->id;
    $quote->save();
    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
    $freight->freight_xl_tnv_vendorquote_1->add($quote->id);
    $freight->status_c = 'Formal';
    $freight->shipment_id_c =  $shipment_data['id'] . "|" . $freight->shipment_id_c;
    $freight->carrier_quote_ids_c = $vendor_data['id'] . "|" . $freight->carrier_quote_ids_c;
    $freight->save();
    // $freight->load_relationship('shipper_xl_freight_xl_1');
    // $shippers = $freight->shipper_xl_freight_xl_1->getBeans();
    // $shipper_id = '';
    
    // foreach ($shippers as $shipper) {
    //     $log_message = '[' . date('Y-m-d H:i:s') . "] Shipper: " . $shipper->name . " (ID: " . $shipper->id . ")\n";
    //     file_put_contents($log_file, $log_message, FILE_APPEND);

    // }
    $freight->load_relationship('shipper_xl_freight_xl_1');
$shippers = $freight->shipper_xl_freight_xl_1->getBeans();

if (!empty($shippers)) {
    $shipper = reset($shippers); // Get the first bean
    $log_message = '[' . date('Y-m-d H:i:s') . "] Shipper Name: " . $shipper->name . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

    

    $quoteData = array(
        'id' => $freight->id,
        'shipper_id' => $shippers->id,
        'name' => $freight->freight_shipper_name_c,
        'email' => $freight->freight_shipper_email_c,
        'module' => 'freight_xl',
        'email_temp' => '4742bee5-b037-d803-0b2c-6603ebdfdb93',
        'link' => 'https://stretchxlfreight.com/dashboard'
    );
    sendQuoteMailNew($quoteData);
    return ['success' => true, 'message' => 'Quote added successfully'];
}else{

   
    $pickup_lat = number_format($shipment_data['pickup_lat'], 2);
    $pickup_lng = number_format($shipment_data['pickup_lng'], 2);
    $dropoff_lat = number_format($shipment_data['dropoff_lat'], 2);
    $dropoff_lng = number_format($shipment_data['dropoff_lng'], 2);
    $distance_total = number_format($shipment_data['distance_total'], 2);
    $price = number_format($shipment_data['price'], 2);
    $avgPrice = number_format($shipment_data['avg_price'], 2);
    $rate = number_format($laneData['data']['avgRatePerMile'], 2);

    
    if($price == 0 || $price == null || $price == ''){
        $price = number_format($laneData['data']['averageRateForMileage'], 2);
    }
    if($avgPrice == 0 || $avgPrice == null || $avgPrice == ''){
        $avgPrice = number_format($laneData['data']['averageRateForMileage'], 2);
    }
    if($distance_total == 0 || $distance_total == null || $distance_total == ''){
        $distance_total = number_format($laneData['data']['totalMileage'], 2);
    }
    // Initialize the equipment string
    $equipment_str = '';


    if (isset($shipment_data['shipment_data']['equipment']) && is_array($shipment_data['shipment_data']['equipment'])) {
        foreach ($shipment_data['shipment_data']['equipment'] as $eq) {
            $equipment_str .= $eq . ', ';
        }
        // Remove the trailing comma and space
        $equipment_str = rtrim($equipment_str, ', ');
    }else{
        if (isset($shipment_data['shipment_data']['equipments']) && is_array($shipment_data['shipment_data']['equipments'])) {
            foreach ($shipment_data['shipment_data']['equipments'] as $eq) {
                $equipment_str .= $eq['equipmentType'] . ', ';
            }
            // Remove the trailing comma and space
            $equipment_str = rtrim($equipment_str, ', ');
        }

    }

    

    // return $equipment_str;

    $freight = BeanFactory::newBean('freight_xl');
    $freight->name = $shipment_data['broker'] ?? 'N/A';
    $freight->pickup_address_c = $shipment_data['pickup'];
    $freight->pickup_lat_c = number_format($shipment_data['pickup_lat'], 2);
    $freight->pickup_lng_c = number_format($shipment_data['pickup_lng'], 2);
    $freight->dropoff_address_c = $shipment_data['dropoff'];
    $freight->dropoff_lat_c = $shipment_data['dropoff_lat'];
    $freight->dropoff_lng_c = $shipment_data['dropoff_lng'];
    $freight->distance_c = $shipment_data['distance_total'];
    $freight->rate_c = number_format($rate, 2);
    $address =null;
    if(isset($shipment_data['shipment_data']['pickup']['address']['state'])){
        $log_message = '[' . date('Y-m-d H:i:s') . "] TP Flow: " . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        if(isset($shipment_data['broker_dot']) && $shipment_data['broker_dot'] != ''){
            $brokerData = getBrokerDataNew($shipment_data['broker_dot'] , "DOT");
 
         //    return $brokerData;
                 if(isset($brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress']) && $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress'] != '' && isset($brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName']) && $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName'] != ''){
                     $newBrokerData['broker_email'] = $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress'];
                     $newBrokerData['broker_name'] = $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName'];
                    $brokerDatax = createBrokerOnQuote($newBrokerData);
                 }
 
             }
        $freight->pickup_state_c = $shipment_data['shipment_data']['pickup']['address']['state'];
        $freight->pickup_city_c = $shipment_data['shipment_data']['pickup']['address']['city'];
        $freight->pickup_zip_c = $shipment_data['shipment_data']['pickup']['address']['zip'];
        $freight->dropoff_state_c = $shipment_data['shipment_data']['drop_off']['address']['state'];
        $freight->dropoff_city_c = $shipment_data['shipment_data']['drop_off']['address']['city'];
        $freight->dropoff_zip_c = $shipment_data['shipment_data']['drop_off']['address']['zip'];
        $address =$shipment_data['pickup'];
        $freight->opertunity_id_c = generate_opertunity_id();
        $freight->freight_description_c = $data['quote_description'];
        $freight->carrier_vehicle_type_c = $equipment_str;
        $freight->freight_weight_c = $shipment_data['shipment_data']['weight'];
        $freight->freight_length_c = $shipment_data['shipment_data']['length'];
        $freight->truckerpath_ref_id_c = $shipment_data['shipment_data']['reference_id'];
        $pickupDate = DateTime::createFromFormat('m/d', $shipment_data['shipment_data']['all_in_one_date']['pickup_day']);
        // $freight->pickup_date_c = $shipment_data['shipment_data']['all_in_one_date']['pickup_day'];
        $freight->pickup_time_c = $shipment_data['shipment_data']['all_in_one_date']['pickup_hour_begin'];
        $freight->deadhead_distance_c = number_format($shipment_data['shipment_data']['pickup']['deadhead'], 2);
        // $newPrice=0;
        // if(!isset($shipment_data['shipment_data']['price']) || $shipment_data['shipment_data']['price'] == null || $shipment_data['shipment_data']['price'] == ''){
        //     $newPrice = $shipment_data['shipment_data']['avg_price'];
        // }
        $freight->market_price_c = $avgPrice;
        $freight->total_price_c = $price;
        $freight->platform_price_c = $price;
        $now = new DateTime();
        $currentYear = (int) $now->format('Y');
        // If the date has already passed this year, use next year
        if ($pickupDate < $now) {
            $pickupDate->modify('+1 year');
        }
        $formattedPickupDate = $pickupDate->format('Y-m-d');
        $freight->pickup_date_c = $formattedPickupDate;
    }else{
       
        $log_message = '[' . date('Y-m-d H:i:s') . "] 123Load Flow: " . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        if(isset($shipment_data['shipment_data']['originLocation']['address']['city'])){
            if(isset($shipment_data['shipment_data']['poster']['docketNumber']['number']) && $shipment_data['shipment_data']['poster']['docketNumber']['number'] != ''){
           $brokerData = getBrokerDataNew($shipment_data['shipment_data']['poster']['docketNumber']['number'] , "MC");

        //    return $brokerData;
                if(isset($brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress']) && $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress'] != '' && isset($brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName']) && $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName'] != ''){
                    $newBrokerData['broker_email'] = $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['emailAddress'];
                    $newBrokerData['broker_name'] = $brokerData['CarrierService.CarrierLookup']['CarrierDetails']['Identity']['legalName'];
                   $brokerDatax = createBrokerOnQuote($newBrokerData);
                }

            }


            $freight->pickup_state_c = $shipment_data['shipment_data']['originLocation']['address']['state'];
            $freight->pickup_city_c = $shipment_data['shipment_data']['originLocation']['address']['city'];
            $freight->pickup_zip_c = $shipment_data['shipment_data']['originLocation']['address']['zip'];
            $freight->dropoff_state_c = $shipment_data['shipment_data']['destinationLocation']['address']['state'];
            $freight->dropoff_city_c = $shipment_data['shipment_data']['destinationLocation']['address']['city'];
            $freight->dropoff_zip_c = $shipment_data['shipment_data']['destinationLocation']['address']['zip'];
            $freight->opertunity_id_c = generate_opertunity_id();
            $freight->freight_description_c = $data['quote_description'];
            $freight->carrier_vehicle_type_c = $equipment_str;
            $freight->freight_weight_c = $shipment_data['shipment_data']['weight'];
            $freight->freight_length_c = $shipment_data['shipment_data']['length'];
            $freight->truckerpath_ref_id_c = $shipment_data['shipment_data']['id'];
            // $pickupDate = DateTime::createFromFormat('m/d', $shipment_data['shipment_data']['pickupDates'][0]);
            $freight->pickup_date_c = $shipment_data['shipment_data']['pickupDates'][0];
            $freight->pickup_time_c = $shipment_data['shipment_data']['pickupDateTime'];
            $freight->deadhead_distance_c = 0;
            $freight->market_price_c = $avgPrice;
            $freight->total_price_c = $price;
            $freight->platform_price_c = $price;
            $dateTime = new DateTime($freight->pickup_time_c);
            $freight->pickup_time_c = $dateTime->format('H:i');

        }
    }


    if(!isset($brokerDatax['id']) || $brokerDatax['id'] == null || $brokerDatax['id'] == ''){
        addQuoteInTP($freight->truckerpath_ref_id_c , $data['quote_price']);
    }
    
    $log_message = '[' . date('Y-m-d H:i:s') . "] freight check: " . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $log_message = '[' . date('Y-m-d H:i:s') . "] freight check 1: " . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    // return $shipment_data;
    $freight->mileage_c = number_format($laneData['data']['totalMileage'], 2) ?? 0;
    $freight->fuel_c = number_format($laneData['data']['fuelCost'], 2)?? 0;
    $freight->freight_type_c = 'general';
    // $freight->dropoff_time_c = $shipment_data['all_in_one_date']['dropoff_hour_begin'];
    // $freight->dropoff_date_c = $shipment_data['all_in_one_date']['dropoff_date'];
    $freight->freight_shipper_name_c = $shipment_data['broker'];
    $freight->assigned_user_id = '8cf8b27d-5a29-984b-b3c3-5693eede3156';
    $freight->status_c = 'Formal';
    $freight->source_c = 'TruckerPath';
    $freight->freight_shipper_address_c = $data['pickup'];
    // $freight->freight_shipper_phone_c = $brokerPhone;
    $freight->freight_shipper_email_c = $newBrokerData['broker_email'];
    $freight->email1 = $newBrokerData['broker_email'];
    $freight->vendor_id_c = $vendor_data['id'];
    $vendor = BeanFactory::getBean('VND_Vendors', $vendor_data['id']);
    $freight->vendor_name_c = $vendor->name;
    $freight->vendor_email_c = $vendor->email1;
    $freight->save();
    $freight->load_relationships('shipper_xl_freight_xl_1');
    $freight->shipper_xl_freight_xl_1->add($brokerDatax['id']);
    $freight->save();
    $quote = BeanFactory::newBean('tnv_VendorQuote');
    $quote->name = $vendor->name;
    $quote->vendor_email_c = $vendor->email1;
    $quote->vendor_phone_c = $vendor->phone_office;
    $quote->quoted_price_c = $data['quote_price'];
    $quote->description = $data['quote_description'];
    $quote->quote_status_c = 'Pending';
    $quote->vendor_id_c = $vendor->id;
    $quote->save();
    $freight->load_relationship('freight_xl_tnv_vendorquote_1');
    $freight->freight_xl_tnv_vendorquote_1->add($quote->id);
    $freight->status_c = 'Formal';
    $freight->shipment_id_c = $shipment_data['id'];
    $freight->save();

    $quoteData = array(
        'id' => $freight->id,
        'shipper_id' => $brokerDatax['id'],
        'name' => $freight->freight_shipper_name_c,
        'email' => $freight->freight_shipper_email_c,
        'module' => 'freight_xl',
        'email_temp' => '4742bee5-b037-d803-0b2c-6603ebdfdb93',
        'link' => 'https://stretchxlfreight.com/dashboard/quoteRegistration.php?id='.$brokerDatax['id']
    );
    sendQuoteMailNew($quoteData);

    // $data = [
    //     'price_dollar' => $data['quote_price'],
    //     'shipment_id' => $shipment_data['id'],
    //     'message' => '',
    //     'shipmentJSON' => ''
    // ];

    return ['success' => true, 'response' => "Quote added successfully"];
    // $result = addQuoteInTP($data);

    // if ($result['success']) {
    // } else {
    //     return ['success' => false, 'error' => $result['error']];
    // }
}


   
    // sendQuoteMail($broker['id'], $freight->id, '117699cb-f823-f88c-3bac-6238b74507ca');
    // return ['success' => true, 'freight_id' => $freight->id];
}
function createBrokerOnQuote($data)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead saved: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    global $db;

    $sql = "SELECT * FROM shipper_xl_cstm WHERE email_c = '" . $data['broker_email'] . "'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'error',
            'message' => 'Email already exists',
            'id' => $result->fetch_assoc()['id_c'],
            'email' => $data['broker_email']
        ];
    }

    $shipper = BeanFactory::newBean('shipper_xl');
    $shipper->name = $data['broker_name'];
    $shipper->email1 = $data['broker_email'];
    $shipper->email_c = $data['broker_email'];
    $shipper->status_c = 'Disabled';
    // $shipper->password_c = encrypt($data['password']);
    $shipper->save();

    // $token = encrypt($shipper->id);
    // $shipper->token_c = $token;
    // $shipper->save();
    // sendShipperAccountMail($shipper->id, '1d195c57-adda-fbfc-20c8-685a8f559ad9', $token , 'login');

    return [
        'status' => 'success',
        'message' => 'Account created successfully',
        'id' => $shipper->id,
        'email' => $data['broker_email']
    ];
}
function sendQuoteMail($shipper_id, $freight_id, $email_temp)
{
    $result = array();
    $log_file = 'vendorLogs.log';

    try {
        // Get shipper details
        $shipper = BeanFactory::getBean('shipper_xl', $shipper_id);
        $freight = BeanFactory::getBean('freight_xl', $freight_id);
        // $shipperEmail = 'ahmadhassanyaseen@gmail.com';
        $shipperEmail = $shipper->email_c;

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($email_temp);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }
        $link = 'http://localhost/stretch-dashboard/quoteRegistration.php?id=' . $shipper->id;

        // Replace template variables
        $emailTemp->body_html = str_replace('$lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$lead_link', $link, $emailTemp->body_html);

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();
        $emailSubject = str_replace('lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->subject);

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = ($emailSubject);
        $vmail->AddAddress($shipperEmail);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $shipperEmail;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'shipper_xl';
        $emailObj->parent_id = $shipper->id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($shipper_id)) {
                $shipper = BeanFactory::getBean('shipper_xl', $shipper_id);
                if ($shipper) {
                    // Load the relationship
                    $shipper->load_relationship('shipper_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($shipper->shipper_xl_emails_1) {
                        // Use the relationship's add() method
                        $shipper->shipper_xl_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $shipper->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }
            if (!empty($freight_id)) {
                $freight = BeanFactory::getBean('freight_xl', $freight_id);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Password reset email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendForgetPasswordMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function fetchShipperDataById($id)
{
    $shipper = BeanFactory::getBean('shipper_xl', $id);
    return [
        'id' => $shipper->id,
        'name' => $shipper->name,
        'email' => $shipper->email1
    ];
}
function fetchQuotesFromTP($shipment_id) {
    $url = "https://api.truckerpath.com/tl/shipment/{$shipment_id}/bids/bookings";
    
    $headers = [
        'accept: */*',
        'accept-language: en-US,en;q=0.9',
        'client: Web-brokers/1.220323.47',
        'content-type: application/json',
        'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
        'priority: u=1, i',
        'sec-ch-ua: "Not)A;Brand";v="8", "Chromium";v="138", "Google Chrome";v="138"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-site',
        'x-auth-token: r:1665a0568a384279bed5059cfeb94795',
        'Referer: https://shipment.truckerpath.com/'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for development, remove in production
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        // Log the error or handle it as needed
        error_log("cURL Error: " . $error);
        return [
            'success' => false,
            'error' => $error,
            'http_code' => $httpCode
        ];
    }
    
    $decodedResponse = json_decode($response, true);
    
    // Check if response is valid JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            'success' => false,
            'error' => 'Invalid JSON response',
            'response' => $response,
            'http_code' => $httpCode
        ];
    }
    
    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'data' => $decodedResponse,
        'http_code' => $httpCode
    ];
}
function sendVendorAccountMailNew($id, $email_temp)
{
    $result = array();
    $log_file = 'vendorLogs.log';

    try {
        // Get shipper details
        $vendor = BeanFactory::getBean('VND_Vendors', $id);
        if (!$vendor) {
            throw new Exception('Vendor not found');
        }

        $link = 'https://stretchxlfreight.com/vendor/carrier-signup.php?email=' . urlencode($vendor->email1) . '&username=' . urlencode($vendor->name);

      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($email_temp);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

        // Replace template variables
        // $emailTemp->body_html = str_replace('$shipper_name', $vendor->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$load_link', $link, $emailTemp->body_html);
       

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'VND_Vendors';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($id)) {
                $vendor = BeanFactory::getBean('VND_Vendors', $id);
                if ($vendor) {
                    // Load the relationship
                    $vendor->load_relationship('vnd_vendors_emails_1');

                    // Make sure the relationship is loaded
                    if ($vendor->vnd_vendors_emails_1) {
                        // Use the relationship's add() method
                        $vendor->vnd_vendors_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $vendor->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for vendor ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Password reset email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendForgetPasswordMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function acceptQuoteOnTP($data) {

    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] TP Load: ' . json_encode($data) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);

    $url = "https://api.truckerpath.com/tl/bids/accept";
    
    // Prepare headers
    $headers = [
        'accept: */*',
        'accept-language: en-US,en;q=0.9',
        'client: Web-brokers/1.220323.47',
        'content-type: application/json',
        'installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab',
        'priority: u=1, i',
        'sec-ch-ua: "Not;A=Brand";v="99", "Google Chrome";v="139", "Chromium";v="139"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-site',
        'x-auth-token: r:1665a0568a384279bed5059cfeb94795',
        'Referer: https://shipment.truckerpath.com/'
    ];
    
    // Prepare request body
    $postData = json_encode([
        'id' => $data['id'] ?? '',
        'shipmentId' => $data['shipmentId'] ?? ''
    ]);

    $log_message = '[' . date('Y-m-d H:i:s') . '] TP Accept Load: ' . json_encode($postData) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    
    // Initialize cURL
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PATCH',
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 0
    ]);
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    
    // Close cURL
    curl_close($ch);

    $log_message = '[' . date('Y-m-d H:i:s') . '] TP Accept Load Response: ' . json_encode($response) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    
    // Handle response
    if ($error) {
        return [
            'success' => false,
            'error' => $error,
            'http_code' => $httpCode
        ];
    }
    
    // Try to decode JSON response
    $decodedResponse = json_decode($response, true);
    
    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'status_code' => $httpCode,
        'data' => $decodedResponse ?: $response
    ];
}
function sendVendorTierMail($data)
{
    $result = array();
    $log_file = 'vendorLogs.log';

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($data['email_temp']);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }
        $link = 'https://stretchxlfreight.com/dashboard/';
        // Replace template variables
        $emailTemp->body_html = str_replace('$link', $link, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$dashboard', "Login to your account", $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$vendor_name', $data['vendor_name'], $emailTemp->body_html);
       

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($data['email']);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $data['email'];
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'VND_Vendors';
        $emailObj->parent_id = $data['vendor_id'];

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($id)) {
                $vendor = BeanFactory::getBean('VND_Vendors', $data['vendor_id']);
                if ($vendor) {
                    // Load the relationship
                    $vendor->load_relationship('vnd_vendors_emails_1');

                    // Make sure the relationship is loaded
                    if ($vendor->vnd_vendors_emails_1) {
                        // Use the relationship's add() method
                        $vendor->vnd_vendors_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $vendor->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for vendor ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Welcome mail sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendForgetPasswordMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function sendQuoteMailNew($data)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] sendQuoteMailNew data : ' . json_encode($data) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($data['email_temp']);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }
        // $link = 'https://stretchxlfreight.com/dashboard/';
        // Replace template variables
        // $emailTemp->body_html = str_replace('$link', $link, $emailTemp->body_html);
        // $emailTemp->body_html = str_replace('$dashboard', "Login to your account", $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$name', $data['name'], $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$link', $data['link'], $emailTemp->body_html);
       

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($data['email']);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $data['email'];
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = $data['module'];
        $emailObj->parent_id = $data['id'];

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

            // Link email to shipper
            if (!empty($data['shipper_id'])) {
                $shipper = BeanFactory::getBean('shipper_xl', $data['shipper_id']);
                if ($shipper) {
                    // Load the relationship
                    $shipper->load_relationship('shipper_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($shipper->shipper_xl_emails_1) {
                        // Use the relationship's add() method
                        $shipper->shipper_xl_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $shipper->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }
            if (!empty($data['id'])) {
                $freight = BeanFactory::getBean('freight_xl', $data['id']);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);

                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Password reset email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }


        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in sendQuoteMail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function addQuoteInTP($data) {
    $url = "https://api.truckerpath.com/tl/bids/dynamic/create/web/v2";
    
    $headers = array(
        "accept: */*",
        "accept-language: en-US,en;q=0.9",
        "client: WebCarriers/0.0.0",
        "content-type: application/json",
        "installation-id: a2fc4582-aea5-4004-8b28-61aa520d90ab",
        "priority: u=1, i",
        "sec-ch-ua: \"Chromium\";v=\"140\", \"Not=A?Brand\";v=\"24\", \"Google Chrome\";v=\"140\"",
        "sec-ch-ua-mobile: ?0",
        "sec-ch-ua-platform: \"Windows\"",
        "sec-fetch-dest: empty",
        "sec-fetch-mode: cors",
        "sec-fetch-site: same-site",
        "x-auth-token: r:27bd805046c34345bda57cce5fe89d2b",
        "Referer: https://loadboard.truckerpath.com/"
    );

    $postData = array(
        'price_dollar' => $data['price_dollar'] ?? '',
        'shipment_id' => $data['shipment_id'] ?? '',
        'message' => $data['message'] ?? '',
        'next_node' => 'server/s_verify_common_bid',
        'shipmentJSON' => $data['shipmentJSON'] ?? '',
        'origin' => 'truckerpath'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    
    curl_close($ch);

    if ($error) {
        return [
            'success' => false,
            'error' => $error
        ];
    }

    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'status_code' => $httpCode,
        'response' => json_decode($response, true)
    ];
}

// 123 LoadBoard APIs
function laneRate($data) {
    $url = 'https://stretchxlfreight.com/xion/lane-rate.php';
    
    $postData = [
        'pickup_address' => $data['pickup_address'] ?? '',
        'dropoff_address' => $data['dropoff_address'] ?? ''
    ];
    
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_HEADER, true); // Include header in output
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (use with caution)
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // Get final URL after redirects
    
    // Get header size
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    
    // Return response data
    return [
        'status_code' => $httpCode,
        'redirect_url' => $redirectUrl,
        'body' => $body
    ];
}
function getLoadFrom123($data) {
    $url = 'https://stretchxlfreight.com/xion/check.php?location=' . urlencode($data['location']);
    
    // Initialize cURL session
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5); // Maximum number of redirects to follow
    curl_setopt($ch, CURLOPT_TIMEOUT, 180); // Set timeout to 3 minutes
    
    // Execute the request
    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        return ['error' => 'cURL Error: ' . $error];
    }
    
    // Get HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Get final URL after redirects
    $finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    
    // Close cURL session
    curl_close($ch);
    
    // Check if the final response is JSON
    $decodedResponse = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        return $decodedResponse;
    }
    
    // If we get here, the response wasn't JSON
    return [
        'error' => 'Unexpected response format',
        'http_code' => $httpCode,
        'final_url' => $finalUrl,
        'response' => $response
    ];
}
function postLoad123($data) {
    $url = 'https://stretchxlfreight.com/xion/postLoad123.php';
    
    $postData = [
        'origin' => $data['origin'] ?? '',
        'destination' => $data['destination'] ?? '',
        'length' => $data['length'] ?? '',
        'weight' => $data['weight'] ?? '',
        'rate' => $data['rate'] ?? '',
        'notes' => $data['notes'] ?? '',
        'type' => $data['type'] ?? ''
    ];
    
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_HEADER, true); // Include header in output
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (use with caution)
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // Get final URL after redirects
    
    // Get header size
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    
    // Return response data
    // return [
    //     'status_code' => $httpCode,
    //     // 'redirect_url' => $redirectUrl,
    //     'body' => $body
    // ];
    $body = json_decode($body, true);
    return $body;
}
function deleteLoad123($id) {
    $url = 'https://stretchxlfreight.com/xion/deleteLoad123.php';
    
    $postData = [
        'id' => $id ?? '',
    ];
    
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_HEADER, true); // Include header in output
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (use with caution)
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // Get final URL after redirects
    
    // Get header size
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    $body = json_decode($body, true);
    return $body;
}
function addQuote123($id , $amount) {
    $url = 'https://stretchxlfreight.com/xion/addQuote123.php';
    
    $postData = [
        'id' => $id ?? '',
        'amount' => $amount ?? '',
    ];
    
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_HEADER, true); // Include header in output
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (use with caution)
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // Get final URL after redirects
    
    // Get header size
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    $body = json_decode($body, true);
    return $body;
}
function editLoad123($id) {

    $freight = BeanFactory::getBean('freight_xl', $id);
    
    $url = 'https://stretchxlfreight.com/xion/editLoad123.php';

    $ids = explode('|', $freight->truckerpath_ref_id_c);

    $addons = $freight->addons_c;
    $addonsArray = explode(',', $addons);
    $formattedAddons = [];

    foreach ($addonsArray as $addon) {
        if (empty(trim($addon)))
            continue;

        // Remove price suffix (e.g., -50, -100)
        $addon = preg_replace('/-\d+$/', '', $addon);

        // Replace underscores with spaces
        $addon = str_replace('_', ' ', $addon);

        $formattedAddons[] = $addon;
    }

    // Join with newlines
    $formattedAddonsString = implode(',', $formattedAddons);

    $newDescription = $formattedAddonsString . '. ' . $freight->description_c;
    $type = '';
    $type = str_replace(" ","_", $freight->carrier_vehicle_type_c);
    $type = str_replace("-","_", $type);
    
    
    $postData = [
        'id' => $ids[1] ?? '',
        'origin' => $freight->pickup_address_c ?? null,
        'destination' => $freight->dropoff_address_c ?? null,
        'length' => $freight->freight_length_c ?? null,
        'weight' => $freight->freight_weight_c ?? null,
        'notes' => $newDescription ?? null,
        'type' => $type ?? null
    ];
    
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_HEADER, true); // Include header in output
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (use with caution)
    
    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // Get final URL after redirects
    
    // Get header size
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    
    curl_close($ch);
    $body = json_decode($body, true);
    return $body;
}

// Fortis APIs
function createContact($data)
{
    $curl = curl_init();

    $data = [
        // Production
        'location_id' => '11f07de17850f504bfd17514',
        // Development
        // 'location_id' => '11f08353a231b4c2982c2880',
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
    ];

    curl_setopt_array($curl, [
        // Production
        CURLOPT_URL => 'https://api.fortis.tech/v1/contacts',
        // Development
        // CURLOPT_URL => 'https://api.sandbox.fortis.tech/v1/contacts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Content-Type: application/json',
            // Production
            'user-id: 11f07de29f90461e84024f16',
            'user-api-key: 11f0d831d00dedc4898e67d9',
            'developer-id: XL2P9tL7'
            // Development
            // 'user-id: 11f083f7e8b6396eb497a1c6',
            // 'user-api-key: 11f0953e6f34a870c033418f',
            // 'developer-id: 7Oq164Hk'
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo 'cURL Error #: ' . $err;
    } else {
       return $response;
    }
}
function createTransaction($data)
{
    $curl = curl_init();

    $data = [
        'contact_id' => $data['contact_id'],
        'description' => $data['description'],
        // Production
        'location_id' => '11f07de17850f504bfd17514',
        // Development
        // 'location_id' => '11f08353a231b4c2982c2880',
        'transaction_amount' => $data['transaction_amount'],
        'currency_code' => 'USD',
        'account_holder_name' => $data['account_holder_name'],
        'account_number' => $data['account_number'],
        'exp_date' => $data['exp_date'],
        'pin' => $data['pin'],
    ];

    curl_setopt_array($curl, [
        // Production
        CURLOPT_URL => 'https://api.fortis.tech/v1/transactions/cc/auth-only/keyed',
        // Development
        // CURLOPT_URL => 'https://api.sandbox.fortis.tech/v1/transactions/cc/auth-only/keyed',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Content-Type: application/json',
            // Production
            'user-id: 11f07de29f90461e84024f16',
            'user-api-key: 11f0d831d00dedc4898e67d9',
            'developer-id: XL2P9tL7'
            // Development
            // 'user-id: 11f083f7e8b6396eb497a1c6',
            // 'user-api-key: 11f0953e6f34a870c033418f',
            // 'developer-id: 7Oq164Hk'
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo 'cURL Error #: ' . $err;
    } else {
        return $response;
    }
}

// TruckStop APIs

function postLoadTS($accessToken , $data) {
    // for production
    $url = "https://api.truckstop.com/loadmanagement/v2/load";
    // for testing
    // $url = "https://api-int.truckstop.com/loadmanagement/v2/load";

    $data = [
        "equipmentAttributes" => [
            "equipmentTypeId" => 12,
            "equipmentOptions" => [2],
            "transportationModeId" => 2,
            "otherEquipmentNeeds" => "Pallet Return"
        ],
        "loadStops" => [
            [
                "type" => 1,
                "earlyDateTime" => date('Y-m-d\TH:i:s', strtotime($data['pickup_datetime'])),
                "lateDateTime" => date('Y-m-d\TH:i:s', strtotime($data['pickup_datetime'])),
                "location" => [
                    "locationName" => $data['pickup_location'],
                    "city" => $data['pickup_city'],
                    "state" => $data['pickup_state'],
                    "countryCode" => "USA",
                ],
                "contactName" => $data['pickup_contact_name'],
                "contactPhone" => $data['pickup_contact_phone'],
                "stopNotes" => "Pickup"
            ],
            [
                "type" => 2,
                "earlyDateTime" => date('Y-m-d\\TH:i:s', strtotime($data['dropoff_datetime'])),
                "lateDateTime" => date('Y-m-d\\TH:i:s', strtotime($data['dropoff_datetime'])),
                "location" => [
                    "locationName" => "Receiver",
                    "city" => $data['dropoff_city'],
                    "state" => $data['dropoff_state'],
                    "countryCode" => "USA"
                ],
                "contactName" => $data['dropoff_contact_name'],
                "contactPhone" => $data['dropoff_contact_phone'],
                "stopNotes" => "Delivery"
            ]
        ],
        "note" => $data['note'],
            "loadTrackingRequired" => $data['load_tracking'],
            "rateAttributes" => [
                "postedAllInRate" => [
                "amount" => $data['rate'],
                "currencyCode" => "USD"
                ]
            ],
            "Dimensional" => [
                "length" => $data['length'],
                "width" => $data['width'],
                "height" => $data['height'],
                "weight" => $data['weight'],
                "palletCount" => $data['pallet_count'],
                "cube" => $data['cube']
            ],
    ];

    // return $data;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $accessToken,
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}
function editLoadTS($accessToken , $loadId , $data) {
    // for production
    $url = "https://api.truckstop.com/loadmanagement/v2/load/" . $loadId;
    // for testing
    // $url = "https://api-int.truckstop.com/loadmanagement/v2/load/" . $loadId;

    $data = [
        "equipmentAttributes" => [
            "equipmentTypeId" => 18,
            "equipmentOptions" => [2],
            "transportationModeId" => 2,
            "otherEquipmentNeeds" => "Pallet Return"
        ],
        "loadStops" => [
            [
                "type" => 1,
                "earlyDateTime" => $data['pickup_date_time'],
                "lateDateTime" => $data['pickup_date_time'],
                "location" => [
                    "locationName" => $data['pickup_location'],
                    "city" => $data['pickup_city'],
                    "state" => $data['pickup_state'],
                    "countryCode" => "USA",
                ],
                "contactName" => $data['pickup_contact_name'],
                "contactPhone" => $data['pickup_contact_phone'],
                "stopNotes" => "Pickup"
            ],
            [
                "type" => 2,
                "earlyDateTime" => $data['dropoff_date_time'],
                "lateDateTime" => $data['dropoff_date_time'],
                "location" => [
                    "locationName" => "Receiver",
                    "city" => $data['dropoff_city'],
                    "state" => $data['dropoff_state'],
                    "countryCode" => "USA"
                ],
                "contactName" => $data['dropoff_contact_name'],
                "contactPhone" => $data['dropoff_contact_phone'],
                "stopNotes" => "Delivery"
            ]
        ],
        "note" => $data['note'],
            "loadTrackingRequired" => $data['load_tracking'] ?? false,
            "rateAttributes" => [
                "postedAllInRate" => [
                "amount" => $data['rate'],
                "currencyCode" => "USD"
                ]
            ],
            "Dimensional" => [
                "length" => $data['length'],
                "width" => $data['width'],
                "height" => $data['height'],
                "weight" => $data['weight'],
                "palletCount" => $data['pallet_count'],
                "cube" => $data['cube']
            ],
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $accessToken,
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}
function getTSToken() {
    // for production
    $url = "https://api.truckstop.com/auth/token?scope=truckstop";
    // for testing
    // $url = "https://api-int.truckstop.com/auth/token?scope=truckstop";

    $headers = [
        // for testing
        // "Authorization: Basic MTk0NjFFQjQtNDA2Ri00NzNFLTg3ODItOTAzRjI3QkFGQ0IxOjk0OTI4QjEyLTlCRTAtNEQ1MC04RjU1LTBCQzhCRUFEOTVGRA==",
        // for production
        "Authorization: Basic OUFDMTcwMkEtMzk4NS00NjM1LUExMjYtMDg3RTEzMTVCQjAyOkM5REI1NkUwLTE1OUMtNEJCRC1BMDAwLUExNTEwMDY2M0RGNg==",
        "accept: application/json",
        "content-type: application/x-www-form-urlencoded"
    ];

    $postFields = http_build_query([
        "grant_type" => "password",  
        "username"   => "quotes@stretchxlfreight.com",
        "password"   => "H$4Y3vs9UA!fnew"
    ]);
    // $postFields = http_build_query([
    //     "grant_type" => "password",  
    //     "username"   => "post@stretchxlfreight.com",
    //     "password"   => "Welcome123#"
    // ]);

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_COOKIEFILE => "",
        CURLOPT_COOKIEJAR => ""
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception("cURL Error: " . curl_error($ch));
    }
    curl_close($ch);

    return $response;
}
function searchLoadsTS() {
    $tokenResponse = getTSToken();
    $accessToken = json_decode($tokenResponse ,true);
    // for production
    $url = "https://api.truckstop.com/loadmanagement/v2/load/search";
    // for testing
    // $url = "https://api-int.truckstop.com/loadmanagement/v2/load/search";

    $headers = [
        "accept: application/json",
        "authorization: Bearer " . $accessToken['access_token'],
        "content-type: application/json"
    ];

    $postData = [
        "pagination" => [
            "pageNumber" => 1,
            "pageSize"   => 100
        ]
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => $headers
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception("cURL Error: " . curl_error($ch));
    }
    curl_close($ch);
    $response = json_decode($response , true);
    return $response;
}
function getLoadTS($accessToken, $loadId) {
    // for production
    $url = "https://api.truckstop.com/loadmanagement/v2/load/" . $loadId;
    // for testing
    // $url = "https://api-int.truckstop.com/loadmanagement/v2/load/" . $loadId;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "accept: application/json",
        "authorization: Bearer " . $accessToken
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    }

    curl_close($ch);
    return $response;
}
function deleteLoadTSXeno(){
    $tokenResponse = getTSToken();
    $accessToken = json_decode($tokenResponse ,true);
    $response = [];

    $loads = searchLoadsTS();
    foreach ($loads['data'] as $load) {
        $response = deleteLoadTS($accessToken['access_token'], $load['loadId']);
    }    
    return $response;
}
function deleteLoadTS($accessToken, $loadId) {
    // for production
    $url = "https://api.truckstop.com/loadmanagement/v2/load/" . $loadId;
    // for testing
    // $url = "https://api-int.truckstop.com/loadmanagement/v2/load/" . $loadId;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "authorization: Bearer " . $accessToken,
        "content-type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    }

    curl_close($ch);
    return $response;
}


function getLoadTSapi($id) {
    $tokenResponse = getTSToken();
    $accessToken = json_decode($tokenResponse ,true);
    // return $tokenResponse;
    $loadResponse = getLoadTS($accessToken['access_token'], $id);
    $load = json_decode($loadResponse ,true);
    
    return $load;
}

function checkShipmentRef($id)
{

    global $db;
    $sql = "SELECT * FROM `freight_xl_cstm` WHERE `truckerpath_ref_id_c` LIKE '%" . $id . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            'status' => 'success',
            'message' => 'Ref Id Found',
            'id' => $result->fetch_assoc()['id_c']
        ];
    }else{
        return [
            'status' => 'error',
            'message' => 'Ref Id does not exist'
        ];
    }   
}

function threeDayCarrierReminder($id)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] threeDayCarrierReminder data : ' . json_encode($id) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve('43504220-2dea-fba0-c3d0-68dcfe9e56fe');
        $freight  = BeanFactory::getBean('freight_xl', $id);
        $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

        $addons = $freight->addons_c;
        $addonsArray = explode(',', $addons);
        $formattedAddons = [];
        foreach ($addonsArray as $addon) {
            if (empty(trim($addon)))
                continue;
            // Remove price suffix (e.g., -50, -100)
            $addon = preg_replace('/-\d+$/', '', $addon);
            // Replace underscores with spaces
            $addon = str_replace('_', ' ', $addon);
            $formattedAddons[] = $addon;
        }
        // Join with newlines
        $formattedAddonsString = implode(',', $formattedAddons);
        $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;
        $confirm_link = 'https://stretchxlfreight.com/vendor/reminderResponse.php?id=' . $id.'&action=confirm';
        $deny_link = 'https://stretchxlfreight.com/vendor/reminderResponse.php?id=' . $id.'&action=deny';
        // Replace template variables
        $emailTemp->body_html = str_replace('$confirm_link', $confirm_link, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$deny_link', $deny_link, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$carrier_name', $vendor->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$pickup_address', $freight->pickup_address_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$pickup_datetime', $freight->pickup_date_c . ' ' . $freight->pickup_time_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$destination_address', $freight->dropoff_address_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$delivery_datetime', $freight->dropoff_datetime_c . ' ' . $freight->dropoff_time_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$final_amount', $freight->platform_price_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$special_instructions', $newDescription, $emailTemp->body_html);

       

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'freight_xl';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

           
            if (!empty($id)) {
                $freight = BeanFactory::getBean('freight_xl', $id);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);
                        $freight->reminder_c = "1";
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Three day carrier reminder email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }


        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in threeDayCarrierReminder: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function updateReminderForShipper($data)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] updateReminderForShipper data : ' . json_encode($data) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);
    $emailTempId = "3de5bf28-5a2c-27c3-478c-68dfbba6750f";
    if(isset($data['action']) && $data['action'] == 'confirm'){
        $emailTempId = "ae0d71bb-26f5-f078-1782-68dd0ab7d74d";
    }

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve($emailTempId);
        $freight  = BeanFactory::getBean('freight_xl', $data['id']);
        $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);
        $error_message = '[' . date('Y-m-d H:i:s') . '] updateReminderForShipper data : ' . json_encode($data) . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

        $addons = $freight->addons_c;
        $addonsArray = explode(',', $addons);
        $formattedAddons = [];
        foreach ($addonsArray as $addon) {
            if (empty(trim($addon)))
                continue;
            // Remove price suffix (e.g., -50, -100)
            $addon = preg_replace('/-\d+$/', '', $addon);
            // Replace underscores with spaces
            $addon = str_replace('_', ' ', $addon);
            $formattedAddons[] = $addon;
        }
        // Join with newlines
        $formattedAddonsString = implode(',', $formattedAddons);
        $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;
        $link = 'https://stretchxlfreight.com/dashboard';
     
        $emailTemp->body_html = str_replace('$shipper_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$pickup_address', $freight->pickup_address_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$pickup_datetime', $freight->pickup_date_c . ' ' . $freight->pickup_time_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$destination_address', $freight->dropoff_address_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$delivery_datetime', $freight->dropoff_datetime_c . ' ' . $freight->dropoff_time_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$final_amount', $freight->platform_price_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$special_instructions', $newDescription, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$carrier_name', $vendor->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$carrier_email', $vendor->email1, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$carrier_dot', $vendor->dot_number, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$reassign_link', $link, $emailTemp->body_html);


       

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($freight->freight_shipper_email_c);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $freight->freight_shipper_email_c;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'freight_xl';
        $emailObj->parent_id = $data['id'];

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

           
            if (!empty($data['id'])) {
                $freight = BeanFactory::getBean('freight_xl', $data['id']);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Three day shipper reminder email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }


        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in updateReminderForShipper: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}

function BOLSigned($id)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] BOLSigned data : ' . json_encode($id) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve('6c141134-c9fd-8951-cb95-68de6edf34d6');
        $freight  = BeanFactory::getBean('freight_xl', $id);
        $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);
       

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

       $lead_link = "https://stretchxlfreight.com/vendor/";
       
     
        $emailTemp->body_html = str_replace('$lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$lead_link', $lead_link, $emailTemp->body_html);
       
        $error_message = '[' . date('Y-m-d H:i:s') . '] BOLSigned email vendor : ' . json_encode($vendor->email1) . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'freight_xl';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

           
            if (!empty($id)) {
                $error_message = '[' . date('Y-m-d H:i:s') . '] BOL Vendor email : ' . json_encode($id) . "\n";
                file_put_contents($log_file, $error_message, FILE_APPEND);
                $freight = BeanFactory::getBean('freight_xl', $id);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'BOLSigned Email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }

 
        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in BOLSigned: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}
function agreementConfirmationMail($id)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] agreementConfirmationMail: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    try {
      

        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve('e3fd5210-1df3-6a12-4fb8-68e6459be2f3');
        $freight  = BeanFactory::getBean('freight_xl', $id);
       
       

        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }

    //    $lead_link = "https://stretchxlfreight.com/vendor/";
       
     
        $emailTemp->body_html = str_replace('$client_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$agreement_link', $freight->signed_agreement_link_c, $emailTemp->body_html);
        
       
      

        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();

        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($freight->freight_shipper_email_c);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);

        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();

        // Set email object properties
        $emailObj->to_addrs = $freight->freight_shipper_email_c;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'freight_xl';
        $emailObj->parent_id = $id;

        // Save email record
        $emailObj->save();

        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save();

           
            if (!empty($id)) {
                $error_message = '[' . date('Y-m-d H:i:s') . '] agreement confirmation mail sent to : ' . json_encode($id) . "\n";
                file_put_contents($log_file, $error_message, FILE_APPEND);
                $freight = BeanFactory::getBean('freight_xl', $id);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');

                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Agreement confirmation Email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }

 
        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in Agreement confirmation mail: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}



function threeDayShipperReminder(){
    global $db;
    $currentDate = date('Y-m-d');
    $threeDayAheadDate = date('Y-m-d', strtotime($currentDate . ' + 3 days'));
    // $sql = "SELECT * FROM `freight_xl_cstm` WHERE `pickup_date_c` <= '$threeDayAheadDate' AND  `status_c` = 'Converted'";
    $sql = "SELECT * FROM `freight_xl_cstm` WHERE `pickup_date_c` <= '$threeDayAheadDate' AND `pickup_date_c` >= '$currentDate' AND `status_c` = 'Converted' AND `reminder_c` = '0'";
    $result = $db->query($sql);

    while ($row = $db->fetchByAssoc($result)) {
        $rows[] = $row['id_c'];
        if(isset($row['id_c']) && !empty($row['id_c'])){
            threeDayCarrierReminder($row['id_c']);
        }
    }
    return $rows;
}


function shipmentUpdateMail($id)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] shipmentUpdateMail data : ' . json_encode($id) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);
    try {
        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve('7252f8a6-179c-ee65-0f2c-68e4bae45fc1');
        $freight  = BeanFactory::getBean('freight_xl', $id);
        $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);
        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }
        $lead_link = "https://stretchxlfreight.com/vendor/editShipment.php?id=".$id;
        $emailTemp->body_html = str_replace('$name', $vendor->name, $emailTemp->body_html);
        $emailTemp->body_html = str_replace('$link', $lead_link, $emailTemp->body_html);
        $error_message = '[' . date('Y-m-d H:i:s') . '] BOLSigned email vendor : ' . json_encode($vendor->email1) . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);
        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();
        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);
        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();
        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'vnd_vendors';
        $emailObj->parent_id = $id;
        // Save email record
        $emailObj->save();
        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save(); 
            if (!empty($id)) {
                $freight = BeanFactory::getBean('freight_xl', $id);
                if ($freight) {
                    // Load the relationship
                    $freight->load_relationship('freight_xl_emails_1');
                    // Make sure the relationship is loaded
                    if ($freight->freight_xl_emails_1) {
                        // Use the relationship's add() method
                        $freight->freight_xl_emails_1->add($emailObj->id);
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $freight->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for shipper ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'BOLSigned Email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }

 
        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in BOLSigned: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}

function postLoadTSBoard($data){
      $tokenResponse = getTSToken();
    $accessToken = json_decode($tokenResponse ,true);

    

    $loadResponseTS = postLoadTS($accessToken['access_token'] , $data);
    $loadResponseTS = json_decode($loadResponseTS ,true);
    return $loadResponseTS;
}
function postLoadOnline($id){
    $log_file = 'vendorLogs.log';
    $freight = BeanFactory::getBean('freight_xl', $id);
    
    // $freight->posted_c = '1';
    // $freight->save();
    

    $lead_Charges = leadCharges();
    $marketPrice = floatval(str_replace(',', '', $freight->market_price_c));
    $platformProfit = floatval($marketPrice) * (floatval($lead_Charges['Vendor_Percentage']) / 100);
    $platformPrice = floatval($marketPrice) - floatval($platformProfit);
    $platformPrice = number_format($platformPrice, 2);
    $platformPrice = str_replace(',', '', $platformPrice);
    $addons = $freight->addons_c;
    $addonsArray = explode(',', $addons);
    $formattedAddons = [];
    foreach ($addonsArray as $addon) {
        if (empty(trim($addon)))
            continue;
        // Remove price suffix (e.g., -50, -100)
        $addon = preg_replace('/-\d+$/', '', $addon);
        // Replace underscores with spaces
        $addon = str_replace('_', ' ', $addon);
        $formattedAddons[] = $addon;
    }
    // Join with newlines
    $formattedAddonsString = implode(',', $formattedAddons);
    $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;

    // Parse existing IDs to determine progress
    // Format: TP_ID|TS_ID|123_ID
    $existing_ids = array_filter(explode('|', $freight->truckerpath_ref_id_c));
    $step_count = count($existing_ids);

    // Step 1: TP Load
    if ($step_count < 1) {
        $old_id = $freight->truckerpath_ref_id_c;
        // if(isset($freight->tp_c) && $freight->tp_c == "0"){   
        $postedLoadTP = post_load($id);
        $log_message = '[' . date('Y-m-d H:i:s') . '] TP Load posted: ' . json_encode($postedLoadTP) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        // }
        
        // Check if ID was updated internally by post_load
        if ($freight->truckerpath_ref_id_c !== $old_id && !empty($freight->truckerpath_ref_id_c)) {
             $freight->save(); // Save progress just in case
        } else {
            // Attempt to extract ID from TP response
            $tpId = '';
            if (is_array($postedLoadTP) && isset($postedLoadTP['loadId'])) {
                $tpId = $postedLoadTP['loadId'];
            } elseif (is_string($postedLoadTP) && !empty($postedLoadTP)) {
                 $tpId = $postedLoadTP;
            }
            
            if (!empty($tpId)) {
                $freight->truckerpath_ref_id_c = empty($freight->truckerpath_ref_id_c) ? $tpId : $freight->truckerpath_ref_id_c . '|' . $tpId;
                $freight->save(); // Save progress
            } else {
                 // Failed to get ID. Log and return error so we can retry later.
                 $log_message = '[' . date('Y-m-d H:i:s') . '] TP Load failed to return valid ID. Response: ' . json_encode($postedLoadTP) . "\n";
                 file_put_contents($log_file, $log_message, FILE_APPEND);
                 return ["success" => false, "message" => "TP Load failed to return valid ID"];
            }
        }
        
        // Refresh IDs
        $existing_ids = array_filter(explode('|', $freight->truckerpath_ref_id_c));
        $step_count = count($existing_ids);
    }

    $pickupFormatted = explode(',', $freight->pickup_address_c);
    $dropoffFormatted = explode(',', $freight->dropoff_address_c);

    $dataTS = [
        "note" => $newDescription,
        'pickup_location' => "Shipper",
        'pickup_city' => $pickupFormatted[1] ?? '',
        'pickup_state' => $pickupFormatted[2] ?? '',
        'pickup_contact_name' => "Stretch XL Freight",
        'pickup_contact_phone' => "18555644788",
        'pickup_datetime' => $freight->pickup_date_c. 'T' . $freight->pickup_time_c.':00' ?? '',
        'dropoff_location' => "Receiver",
        'dropoff_city' => $dropoffFormatted[1] ?? '',
        'dropoff_state' => $dropoffFormatted[2] ?? '',
        'dropoff_contact_name' => "Stretch XL Freight",
        'dropoff_contact_phone' => "18555644788",
        'dropoff_datetime' => $freight->dropoff_date_c. 'T' . $freight->dropoff_time_c.':00' ?? '',
        'rate' => $platformPrice,
        'load_tracking' =>false,
        'length' => $freight->freight_length_c ?? '',
        'width' => $freight->freight_width_c ?? '',
        'height' => $freight->freight_height_c ?? '',
        'weight' => $freight->freight_weight_c ?? '',
        'pallet_count' => $freight->freight_pallet_count_c ?? '',
        // 'cube' => $data['freight_cube'] ?? '',
    ];

    // Step 2: TS Load
    if ($step_count < 2) {
        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Data : ' . json_encode($dataTS) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $tokenResponse = getTSToken();
        $accessToken = json_decode($tokenResponse ,true);

        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Token : ' . json_encode($accessToken['access_token']) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $loadResponseTS = postLoadTS($accessToken['access_token'] , $dataTS);
        $loadResponseTS = json_decode($loadResponseTS ,true);

        $log_message = '[' . date('Y-m-d H:i:s') . '] TS Data Response: ' . json_encode($loadResponseTS) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);

        $freight->truckerpath_ref_id_c =  $freight->truckerpath_ref_id_c . '|' . $loadResponseTS['loadId'];
        $freight->save(); // Save progress

        // Refresh IDs
        $existing_ids = array_filter(explode('|', $freight->truckerpath_ref_id_c));
        $step_count = count($existing_ids);
    }

    $pickup123Formatted = (explode(',', $freight->pickup_address_c));
    $dropoff123Formatted = (explode(',', $freight->dropoff_address_c));

    $postLoad123Data = [
        'origin' => $pickup123Formatted[1].','.$pickup123Formatted[2].','.$pickup123Formatted[3] ?? '',
        'destination' => $dropoff123Formatted[1].','.$dropoff123Formatted[2].','.$dropoff123Formatted[3] ?? '',
        'length' => $freight->freight_length_c ?? '',
        'weight' => $freight->freight_weight_c ?? '',
        'rate' => $platformPrice ?? '',
        'notes' => $newDescription ?? '',
        'type' => $freight->carrier_vehicle_type_c ?? ''
    ];

    // Step 3: 123 Load
    if ($step_count < 3) {
        $load123 =postLoad123($postLoad123Data);
        $log_message = '[' . date('Y-m-d H:i:s') . '] 123 loadboard : ' . json_encode($load123) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $truckerpath_ref_id_c = $freight->truckerpath_ref_id_c;
        $log_message = '[' . date('Y-m-d H:i:s') . '] load Id : ' . json_encode(end($load123['data'])) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $lastLoad = end($load123['data']);
        $truckerpath_ref_id_c  =  $truckerpath_ref_id_c .'|' . $lastLoad['id'];
        $log_message = '[' . date('Y-m-d H:i:s') . '] load before : ' . json_encode($truckerpath_ref_id_c) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $freight->truckerpath_ref_id_c = $truckerpath_ref_id_c;
        $log_message = '[' . date('Y-m-d H:i:s') . '] load after : ' . json_encode( $freight->truckerpath_ref_id_c) . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        $freight->posted_c = '1';
        $freight->save();
    }
    
    return ["success" => true , "message" => "Load posted successfully"];
}
// function postLoadOnline($id){
//     $log_file = 'vendorLogs.log';
//     $freight = BeanFactory::getBean('freight_xl', $id);
    

//     $lead_Charges = leadCharges();
//     $marketPrice = floatval(str_replace(',', '', $freight->market_price_c));
//     $platformProfit = floatval($marketPrice) * (floatval($lead_Charges['Vendor_Percentage']) / 100);
//     $platformPrice = floatval($marketPrice) - floatval($platformProfit);
//     $platformPrice = number_format($platformPrice, 2);
//     $platformPrice = str_replace(',', '', $platformPrice);
//     $addons = $freight->addons_c;
//     $addonsArray = explode(',', $addons);
//     $formattedAddons = [];
//     foreach ($addonsArray as $addon) {
//         if (empty(trim($addon)))
//             continue;
//         // Remove price suffix (e.g., -50, -100)
//         $addon = preg_replace('/-\d+$/', '', $addon);
//         // Replace underscores with spaces
//         $addon = str_replace('_', ' ', $addon);
//         $formattedAddons[] = $addon;
//     }
//     // Join with newlines
//     $formattedAddonsString = implode(',', $formattedAddons);
//     $newDescription = $formattedAddonsString . '. ' . $freight->freight_description_c;



//     // if(isset($freight->tp_c) && $freight->tp_c == "0"){   
//     $postedLoadTP = post_load($id);
//     $log_message = '[' . date('Y-m-d H:i:s') . '] TP Load posted: ' . json_encode($postedLoadTP) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     // }
//     $pickupFormatted = explode(',', $freight->pickup_address_c);
//     $dropoffFormatted = explode(',', $freight->dropoff_address_c);

//     $dataTS = [
//         "note" => $newDescription,
//         'pickup_location' => "Shipper",
//         'pickup_city' => $pickupFormatted[0] ?? '',
//         'pickup_state' => $pickupFormatted[1] ?? '',
//         'pickup_contact_name' => "Stretch XL Freight",
//         'pickup_contact_phone' => "18555644788",
//         'pickup_datetime' => $freight->pickup_date_c. 'T' . $freight->pickup_time_c.':00' ?? '',
//         'dropoff_location' => "Receiver",
//         'dropoff_city' => $dropoffFormatted[0] ?? '',
//         'dropoff_state' => $dropoffFormatted[1] ?? '',
//         'dropoff_contact_name' => "Stretch XL Freight",
//         'dropoff_contact_phone' => "18555644788",
//         'dropoff_datetime' => $freight->dropoff_date_c. 'T' . $freight->dropoff_time_c.':00' ?? '',
//         'rate' => $platformPrice,
//         'load_tracking' =>false,
//         'length' => $freight->freight_length_c ?? '',
//         'width' => $freight->freight_width_c ?? '',
//         'height' => $freight->freight_height_c ?? '',
//         'weight' => $freight->freight_weight_c ?? '',
//         'pallet_count' => $freight->freight_pallet_count_c ?? '',
//         // 'cube' => $data['freight_cube'] ?? '',
//     ];
//     $log_message = '[' . date('Y-m-d H:i:s') . '] TS Data : ' . json_encode($dataTS) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);

//     $tokenResponse = getTSToken();
//     $accessToken = json_decode($tokenResponse ,true);

//     $log_message = '[' . date('Y-m-d H:i:s') . '] TS Token : ' . json_encode($accessToken['access_token']) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);

//     $loadResponseTS = postLoadTS($accessToken['access_token'] , $dataTS);
//     $loadResponseTS = json_decode($loadResponseTS ,true);

//     $log_message = '[' . date('Y-m-d H:i:s') . '] TS Data Response: ' . json_encode($loadResponseTS) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);

//     $freight->truckerpath_ref_id_c =  $freight->truckerpath_ref_id_c . '|' . $loadResponseTS['loadId'];



//     $postLoad123Data = [
//         'origin' => $freight->pickup_address_c ?? '',
//         'destination' => $freight->dropoff_address_c ?? '',
//         'length' => $freight->freight_length_c ?? '',
//         'weight' => $freight->freight_weight_c ?? '',
//         'rate' => $platformPrice ?? '',
//         'notes' => $newDescription ?? '',
//         'type' => $freight->carrier_vehicle_type_c ?? ''
//     ];
//     $load123 =postLoad123($postLoad123Data);
//     $log_message = '[' . date('Y-m-d H:i:s') . '] 123 loadboard : ' . json_encode($load123) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $truckerpath_ref_id_c = $freight->truckerpath_ref_id_c;
//     $log_message = '[' . date('Y-m-d H:i:s') . '] load Id : ' . json_encode(end($load123['data'])) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $lastLoad = end($load123['data']);
//     $truckerpath_ref_id_c  =  $truckerpath_ref_id_c .'|' . $lastLoad['id'];
//     $log_message = '[' . date('Y-m-d H:i:s') . '] load before : ' . json_encode($truckerpath_ref_id_c) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $freight->truckerpath_ref_id_c = $truckerpath_ref_id_c;
//     $log_message = '[' . date('Y-m-d H:i:s') . '] load after : ' . json_encode( $freight->truckerpath_ref_id_c) . "\n";
//     file_put_contents($log_file, $log_message, FILE_APPEND);
//     $freight->posted_c = '1';
//     $freight->save();
//     return ["success" => true , "message" => "Load posted successfully"];
// }

function postLoadCron(){
    global $db;
    $rows = array();
    $sql = "SELECT c.id_c FROM freight_xl_cstm AS c JOIN freight_xl AS s ON s.id = c.id_c WHERE c.posted_c LIKE '%0%' AND s.deleted = 0";
    // $sql = "SELECT id_c FROM `freight_xl_cstm` WHERE `posted_c` LIKE '%0%'";
    $result = $db->query($sql);

    while ($row = $db->fetchByAssoc($result)) {
        $rows[] = $row['id_c'];

    }
    return $rows;

}



function vendorLoadsInfoMail($id)
{
    $result = array();
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] vendorLoadsInfoMail data : ' . json_encode($id) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);
    try {
        require_once './modules/EmailTemplates/EmailTemplate.php';
        $emailTemp = new EmailTemplate();
        $emailTemp->retrieve('778f06e1-44ec-6c48-0d07-690c8c4c96e2');
      
        $vendor  = BeanFactory::getBean('VND_Vendors', $id);
        $vendor_loads = [];

        $vendorLoadData = [
                            'address' => $vendor->billing_address_city . ',' . $vendor->billing_address_state . ', USA',
                            'load_radius' => '300',
                            'load_type' => 'all',
                        ];

                        $vendor_loads =    getLoadsFromTP($vendorLoadData);
                        // return $vendor_loads['data']['items'];




        if (empty($emailTemp->id)) {
            throw new Exception('Email template not found');
        }
        $link = "https://stretchxlfreight.com/vendor/searchLoad.php";
        // $emailTemp->body_html = str_replace('$vendor_name', $vendor->name, $emailTemp->body_html);
        // Build your table HTML
            $tableHtml = '
            <table border="1" cellspacing="0" cellpadding="6" style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th>Pickup</th>
                        <th>Dropoff</th>
                        <th>Pickup Date</th>
                        <th>Rate</th>
                        <th>Weight (lbs)</th>
                    </tr>
                </thead>
                <tbody>
            ';
            $count = 0;

            foreach ($vendor_loads['data']['items'] as $load) {
                if(!isset($load['price']) || $load['price'] == '' || !isset($load['weight']) || $load['weight'] == ''){
                    continue;
                }

                if($count > 9){
                    break;
                }
                $count++;

                $dt = new DateTime($load['pickup']['date_local']);
                $formatted = $dt->format('m/d/y');

                $tableHtml .= '
                    <tr>
                        <td>' . htmlspecialchars($load['pickup']['address']['city'] .','.$load['pickup']['address']['state']) . '</td>
                        <td>' . htmlspecialchars($load['drop_off']['address']['city'] .','.$load['drop_off']['address']['state']) . '</td>
                        <td>' . htmlspecialchars($formatted) . '</td>
                        <td>$' . htmlspecialchars($load['price']) . '</td>
                        <td>' . htmlspecialchars($load['weight']) . '</td>
                    </tr>
                ';
            }

            $tableHtml .= '
                </tbody>
            </table>
            ';

            // Replace placeholder in email template
            $emailTemp->body_html = str_replace('$loads_available', $tableHtml, $emailTemp->body_html);

            // Replace vendor name as you already do
            $emailTemp->body_html = str_replace('$vendor_name', $vendor->name, $emailTemp->body_html);
            // $emailTemp->body_html = str_replace('$loads_available', '', $emailTemp->body_html);

        $emailTemp->body_html = str_replace('$link', $link, $emailTemp->body_html);
        $error_message = '[' . date('Y-m-d H:i:s') . '] Vendor Loads Info Email vendor : ' . json_encode($vendor->email1) . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);
        // Set up email
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $vmail = new SugarPHPMailer();
        $vmail->From = $defaults['email'];
        $vmail->FromName = $defaults['name'];
        $vmail->setMailerForSystem();
        $vmail->ClearAllRecipients();
        $vmail->ClearReplyTos();
        $vmail->Subject = $emailTemp->subject;
        $vmail->AddAddress($vendor->email1);
        $vmail->Body = $emailTemp->body_html;
        $vmail->AltBody = strip_tags($emailTemp->body_html);
        // Handle attachments if any
        $attachments = array();
        $vmail->handleAttachments($attachments);
        $vmail->prepForOutbound();
        // Set email object properties
        $emailObj->to_addrs = $vendor->email1;
        $emailObj->cc_addrs = '';
        $emailObj->name = $emailTemp->subject;
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->description_html = $emailTemp->body_html;
        $emailObj->description = strip_tags($emailTemp->body_html);
        $emailObj->from_addr = $vmail->From;
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->type = 'out';
        $emailObj->parent_type = 'vnd_vendors';
        $emailObj->parent_id = $id;
        // Save email record
        $emailObj->save();
        // Send email
        $emailSent = @$vmail->Send();
        if ($emailSent) {
            $emailObj->status = 'sent';
            $emailObj->save(); 
            if (!empty($id)) {
                $vendor = BeanFactory::getBean('VND_Vendors', $id);
                if ($vendor) {
                    // Load the relationship
                    $vendor->load_relationship('vnd_vendor_emails_1');
                    // Make sure the relationship is loaded
                    if ($vendor->vnd_vendor_emails_1) {
                        // Use the relationship's add() method
                        $vendor->vnd_vendor_emails_1->add($emailObj->id);
                        // Explicitly save the shipper bean to ensure relationship is saved
                        $vendor->save();
                    } else {
                        // Log error if relationship couldn't be loaded
                        $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for vendor ID: ' . $id . "\n";
                        file_put_contents($log_file, $log_message, FILE_APPEND);
                    }
                }
            }

            $result['success'] = true;
            $result['message'] = 'Vendor Loads Info Email sent successfully';
        } else {
            throw new Exception('Failed to send email: ' . $vmail->ErrorInfo);
        }

 
        // return ["success" => true , "message" => "Email sent successfully"];
       
    } catch (Exception $e) {
        // Log the error
        $error_message = '[' . date('Y-m-d H:i:s') . '] Error in Vendor Loads Info Email: ' . $e->getMessage() . "\n";
        file_put_contents($log_file, $error_message, FILE_APPEND);

        // Set error status
        if (isset($emailObj) && is_object($emailObj)) {
            $emailObj->status = 'send_error | Vendor Loads Info Email';
            $emailObj->save();
        }

        $result['success'] = false;
        $result['error'] = $e->getMessage();
    }

    return $result;
}



function vendorLoadsInfoCron(){
    global $db;
    $sql = "SELECT id FROM `vnd_vendors` WHERE `deleted` = 0 AND `status` LIKE '%active%';";
    $result = $db->query($sql);
    $rows = array();
    while ($row = $db->fetchByAssoc($result)) {
        // $rows[] = $row['id'];
        $rows[] = vendorLoadsInfoMail($row['id']);
    }
    return $rows;
}
    

function save_international_freight($data){
  
    $log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] save_international_freight data : ' . json_encode($data) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    $pickup_lat_long = get_lat_long($data['pickup_address']);
    $dropoff_lat_long = get_lat_long($data['dropoff_address']);

    $distance = see_distance($pickup_lat_long['lat'], $pickup_lat_long['long'], $dropoff_lat_long['lat'], $dropoff_lat_long['long']);
   
    $addons = '';
    if(isset($data['customs']) && $data['customs'] !== ''){
        $addons = 'Customs';
    }
    if(isset($data['insurance']) && $data['insurance'] !== ''){
        $addons = $addons . ', Insurance';
    }
    if(isset($data['delivery']) && $data['delivery'] !== ''){
        $addons = $addons . ', Delivery';
    }
    if(isset($data['broker']) && $data['broker'] !== ''){
        $addons = $addons . ', Broker';
    }
    
    $pickup_address_data = get_address_data($data['pickup_address']);
    $dropoff_address_data = get_address_data($data['dropoff_address']);


    $error_message = '[' . date('Y-m-d H:i:s') . '] save_international_freight distance : ' . json_encode($distance) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);
    $freight_name = $data['freight_shipper_first_name'] . ' ' . $data['freight_shipper_last_name'];

    $freight = BeanFactory::newBean('freight_xl');
    $freight->name = $freight_name;
    $freight->pickup_address_c = $data['pickup_address'];
    $freight->pickup_lat_c = $pickup_lat_long['pickup_lat'];
    $freight->pickup_lng_c = $pickup_lat_long['pickup_long'];
    $freight->dropoff_address_c = $data['dropoff_address'];
    $freight->dropoff_lat_c = $dropoff_lat_long['dropoff_lat'];
    $freight->dropoff_lng_c = $dropoff_lat_long['dropoff_long'];
    $freight->distance_c = number_format($distance['distance'], 2);
    $freight->duration_c = $distance['duration'];
    $freight->addons_c = $addons;
    $freight->pickup_state_c = $pickup_address_data['state'];
    $freight->pickup_city_c = $pickup_address_data['city'];
    $freight->pickup_zip_c = $pickup_address_data['zip'];
    $freight->dropoff_state_c = $dropoff_address_data['state'];
    $freight->dropoff_city_c = $dropoff_address_data['city'];
    $freight->dropoff_zip_c = $dropoff_address_data['zip'];
    $freight->opertunity_id_c = generate_opertunity_id();
    $freight->total_price_c = number_format((float)$data['calculated_total'], 2);
    $freight->freight_description_c = $data['freight_description'];
    $freight->carrier_vehicle_type_c = $data['carrier_vehicle_type'];
    $freight->freight_type_c ='International';
    $freight->freight_weight_c = $data['freight_weight'];
    $freight->pickup_date_c = $data['pickup_date'];
    $freight->dropoff_date_c = $data['dropoff_date'];
    $freight->freight_shipper_name_c =  $freight_name;
    $freight->assigned_user_id = '8cf8b27d-5a29-984b-b3c3-5693eede3156';
    $freight->status_c = 'Assigned';
    $freight->source_c = '.com';
    $freight->freight_shipper_address_c = $data['freight_shipper_address'];
    $freight->freight_shipper_phone_c = $data['freight_shipper_phone'];
    $freight->freight_shipper_email_c = $data['freight_shipper_email'];
    $freight->hazardous_c = $data['is_hazardous'];
    $freight->insurance_amount_c = $data['insurance_value'];
    $freight->is_international_c = '1';
    $freight->posted_c = '1';
    $freight->email1 = $data['freight_shipper_email'];

    $freight->save();
    $shipperData = checkShipper($data['freight_shipper_email'], $freight_name, $freight->id);
   
    send_lead_mail_international($freight->id);

    return ['success' => true, 'message' => 'Freight saved successfully'];
}



function send_lead_mail_international($id)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = array();
    require_once './modules/EmailTemplates/EmailTemplate.php';
    $emailTemp = new EmailTemplate();
    $emailTemp->retrieve('ae5d6b7c-886b-63a6-dbec-692ae10af6ef');
  
    $freight = BeanFactory::getBean('freight_xl', $id);

    $addons = $freight->addons_c;

    // Process addons: remove numbers, replace underscores with spaces, and capitalize first letter of each word
    // $addons = preg_replace('/-\d+/', '', $addons); // Remove numbers after hyphen

    $addonItems = explode(',', $addons);  // Split into array
    $formattedAddons = array_map('trim', $addonItems);  // Trim whitespace
    $formattedAddons = array_filter($formattedAddons);  // Remove empty items
    $formattedAddons = array_map('ucwords', $formattedAddons);  // Capitalize first letter of each word
    $addons = implode('<br>', $formattedAddons);  // Join with line breaks
   
    $emailTemp->body_html = str_replace('$lead_date_entered', $freight->date_entered, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$dashboard_link', $dashboard_link, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_pickup_time_c', $freight->pickup_time_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_eventdate_c', $freight->pickup_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickup_date_c', $freight->pickup_date_c, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_dropoff_time_c', $freight->dropoff_time_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_dropoff_date_c', $freight->dropoff_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_phone_mobile', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_email1', $freight->email1, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$link_crm', $link_crm, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_opertunityid_c', $freight->opertunity_id_c, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_rate_per_mile_c', $freight->rate_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_distance_c', $freight->distance_c, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_mileage_c', $freight->mileage_c ? $freight->mileage_c : '0', $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_fuel_c', $freight->fuel_c ? $freight->fuel_c : '0', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_total_trip_cost_c', $freight->total_price_c, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_freight_dead_head_c', $freight->deadhead_price_c ? $freight->deadhead_price_c : '0d', $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$lead_freight_addon_price_c', $freight->addons_total_c ? $freight->addons_total_c : '0', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_addons_c', $addons ? $addons : 'none', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_type_c', $freight->freight_type_c ? $freight->freight_type_c : '', $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickup_address_c', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_pickuplocation_c', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_location_c', $freight->dropoff_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_carrier_vehicle_type_c', $freight->carrier_vehicle_type_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_weight_c ', $freight->freight_weight_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_pallet_count_c', $freight->freight_pallet_count_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_clientnotes_c', $freight->client_notes_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_phone_c', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_email_c', $freight->freight_shipper_email_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$lead_freight_shipper_name_c', $freight->freight_shipper_name_c, $emailTemp->body_html);
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $vmail = new SugarPHPMailer();
    $vmail->From = $defaults['email'];
    $vmail->FromName = $defaults['name'];
    $vmail->setMailerForSystem();
    $vmail->ClearAllRecipients();
    $vmail->ClearReplyTos();
    $vmail->Subject = ($emailTemp->subject);
    $vmail->AddAddress($freight->email1);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent to : ' . json_encode($freight->email1) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vmail->Body = $emailTemp->body_html;
    $vmail->AltBody = $emailTemp->body;
    $attachments = array();
    $vmail->handleAttachments($attachments);
    $vmail->prepForOutbound();
    $emailObj->to_addrs = $freight->email1;
    $emailObj->cc_addrs = '';
    $emailObj->name = $emailTemp->subject;
    $emailObj->date_sent = TimeDate::getInstance()->nowDb();
    $emailObj->description_html = $emailTemp->body_html;
    $emailObj->description = strip_tags($emailTemp->body_html);
    $emailObj->from_addr = $vmail->From;
    $emailObj->modified_user_id = '1';
    $emailObj->created_by = '1';
    $emailObj->status = 'sent';
    $emailObj->type = 'out';
    $emailObj->parent_type = 'freight_xl';
    $emailObj->parent_id = $id;
    $emailObj->save();
    $emailSent = @$vmail->Send();
    if ($emailSent) {
        $emailObj->status = 'sent';
         $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent successfully for freight ID: ' . $id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    } else {
        $emailObj->status = 'send_error';
        $emailObj->save();
        // Added ErrorInfo to log
        $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent failed for freight ID: ' . $id . ' Error: ' . $vmail->ErrorInfo . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return $result;
    }
    if (!empty($id)) {
        $freight = BeanFactory::getBean('freight_xl', $id);
        if ($freight) {
            // Load the relationship
            $freight->load_relationship('freight_xl_emails_1');

            // Make sure the relationship is loaded
            if ($freight->freight_xl_emails_1) {
                // Use the relationship's add() method
                $freight->freight_xl_emails_1->add($emailObj->id);

                // Explicitly save the freight bean to ensure relationship is saved
                $freight->save();
            } else {
                // Log error if relationship couldn't be loaded
                $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for freight ID: ' . $id . "\n";
                file_put_contents($log_file, $log_message, FILE_APPEND);
            }
        }
    }
    $result['success'] = $emailObj;
    return $result;
}

function saveTopLocationsVendor($data){
$log_file = 'vendorLogs.log';
    $error_message = '[' . date('Y-m-d H:i:s') . '] vendor locations updated : ' . json_encode($data) . "\n";
    file_put_contents($log_file, $error_message, FILE_APPEND);

    $vendor  = BeanFactory::getBean('VND_Vendors', $data['id']);
    $vendor->top_locations_c = $data['locations'];
    $vendor->save();

    return ['success' => true, 'message' => 'Locations updated successfully'];


}
function fetchVendorTopLocations($id){
    $vendor  = BeanFactory::getBean('VND_Vendors', $id);
    return $vendor->top_locations_c;
    // return ['success' => true, 'data' => $vendor->top_locations_c];
}


function deleteVendor($data){
 global $db;
 $sql = "DELETE ea, eabr
        FROM vnd_vendors v
        JOIN vnd_vendors_cstm vc
        ON vc.id_c = v.id
        JOIN email_addr_bean_rel eabr
        ON eabr.bean_id = v.id
        AND eabr.bean_module = 'VND_Vendors'
        JOIN email_addresses ea
        ON ea.id = eabr.email_address_id
        WHERE v.id = '".$data['id']."';
        ";

    $result = $db->query($sql);

    if($result){
        return ['success' => true, 'message' => 'Vendor deleted successfully'];
    }



    return ['success' => false, 'message' => 'Vendor deleted failed'];
}
function fetchVendorById($data){
    $result =[];
    $vendor  = BeanFactory::getBean('VND_Vendors', $data['id']);
    $result['tier_status'] = $vendor->tier_status_c;
    $result['tier_amount'] = $vendor->tier_amount_c;
    $result['tier_date'] = $vendor->tier_date_c;
    $result['tier_renew'] = $vendor->tier_renew_c;
    return $result;
}
function stopRenew($data){
    $result =[];
    $vendor  = BeanFactory::getBean('VND_Vendors', $data['id']);
    $vendor->tier_renew_c = '1';
    $vendor->save();
    return [
        'success' => true,
        'message' => 'Subscription stopped successfully'
    ];
}

function send_shipmentDetails_vendor($id)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = array();
    require_once './modules/EmailTemplates/EmailTemplate.php';
    $emailTemp = new EmailTemplate();
    $emailTemp->retrieve('1c7f4ec3-3f7e-8481-2a41-69428b6112ff');
  
    $freight = BeanFactory::getBean('freight_xl', $id);

    $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);

    $load_link = 'https://stretchxlfreight.com/vendor/editShipment.php?id='.$id;


    $emailTemp->body_html = str_replace('$carrier_name', $vendor->name, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$load_number', $freight->opertunity_id_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$equipment_type', $freight->carrier_vehicle_type_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$weight', $freight->freight_weight_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$shipper_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_address', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_date', $freight->pickup_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_time', $freight->pickup_time_new_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$shipper_contact', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$consignee_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_address', $freight->dropoff_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_date', $freight->dropoff_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_time', $freight->dropoff_time_new_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$special_instructions', $freight->freight_description_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$load_link', $load_link, $emailTemp->body_html);
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $vmail = new SugarPHPMailer();
    $vmail->From = $defaults['email'];
    $vmail->FromName = $defaults['name'];
    $vmail->setMailerForSystem();
    $vmail->ClearAllRecipients();
    $vmail->ClearReplyTos();
    $vmail->Subject = ($emailTemp->subject);
    $vmail->AddAddress($vendor->email1);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent to : ' . json_encode($vendor->email1) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vmail->Body = $emailTemp->body_html;
    $vmail->AltBody = $emailTemp->body;
    $attachments = array();
    $vmail->handleAttachments($attachments);
    $vmail->prepForOutbound();
    $emailObj->to_addrs = $vendor->email1;
    $emailObj->cc_addrs = '';
    $emailObj->name = $emailTemp->subject;
    $emailObj->date_sent = TimeDate::getInstance()->nowDb();
    $emailObj->description_html = $emailTemp->body_html;
    $emailObj->description = strip_tags($emailTemp->body_html);
    $emailObj->from_addr = $vmail->From;
    $emailObj->modified_user_id = '1';
    $emailObj->created_by = '1';
    $emailObj->status = 'sent';
    $emailObj->type = 'out';
    $emailObj->parent_type = 'freight_xl';
    $emailObj->parent_id = $id;
    $emailObj->save();
    $emailSent = @$vmail->Send();
    if ($emailSent) {
        $emailObj->status = 'sent';
         $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent successfully for freight ID: ' . $id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    } else {
        $emailObj->status = 'send_error';
        $emailObj->save();
        // Added ErrorInfo to log
        $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent failed for freight ID: ' . $id . ' Error: ' . $vmail->ErrorInfo . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return $result;
    }
    if (!empty($id)) {
        $freight = BeanFactory::getBean('freight_xl', $id);
        if ($freight) {
            // Load the relationship
            $freight->load_relationship('freight_xl_emails_1');

            // Make sure the relationship is loaded
            if ($freight->freight_xl_emails_1) {
                // Use the relationship's add() method
                $freight->freight_xl_emails_1->add($emailObj->id);

                // Explicitly save the freight bean to ensure relationship is saved
                $freight->save();
            } else {
                // Log error if relationship couldn't be loaded
                $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for freight ID: ' . $id . "\n";
                file_put_contents($log_file, $log_message, FILE_APPEND);
            }
        }
    }
    $result['success'] = $emailObj;
    return $result;
}
function send_shipmentDetails_shipper($id)
{
    $log_file = 'vendorLogs.log';
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent: ' . json_encode($id) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $result = array();
    require_once './modules/EmailTemplates/EmailTemplate.php';
    $emailTemp = new EmailTemplate();
    $emailTemp->retrieve('6bec0c11-c1e1-9174-2b09-69429fdc9a50');
  
    $freight = BeanFactory::getBean('freight_xl', $id);

    $vendor  = BeanFactory::getBean('VND_Vendors', $freight->vendor_id_c);

    $load_link = 'https://stretchxlfreight.com/vendor/editShipment.php?id='.$id;


    $emailTemp->body_html = str_replace('$carrier_name', $vendor->name, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$load_number', $freight->opertunity_id_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$equipment_type', $freight->carrier_vehicle_type_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$weight', $freight->freight_weight_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$shipper_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_address', $freight->pickup_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_date', $freight->pickup_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$pickup_time', $freight->pickup_time_new_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$shipper_contact', $freight->freight_shipper_phone_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$consignee_name', $freight->freight_shipper_name_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_address', $freight->dropoff_address_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_date', $freight->dropoff_date_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$delivery_time', $freight->dropoff_time_new_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$special_instructions', $freight->freight_description_c, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$carrier_dot', $vendor->dot_number, $emailTemp->body_html);
    $emailTemp->body_html = str_replace('$carrier_contact', $vendor->phone_office, $emailTemp->body_html);
    // $emailTemp->body_html = str_replace('$load_link', $load_link, $emailTemp->body_html);
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $vmail = new SugarPHPMailer();
    $vmail->From = $defaults['email'];
    $vmail->FromName = $defaults['name'];
    $vmail->setMailerForSystem();
    $vmail->ClearAllRecipients();
    $vmail->ClearReplyTos();
    $vmail->Subject = ($emailTemp->subject);
    $vmail->AddAddress($freight->freight_shipper_email_c);
    $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent to : ' . json_encode($freight->freight_shipper_email_c) . "\n";
    file_put_contents($log_file, $log_message, FILE_APPEND);
    $vmail->Body = $emailTemp->body_html;
    $vmail->AltBody = $emailTemp->body;
    $attachments = array();
    $vmail->handleAttachments($attachments);
    $vmail->prepForOutbound();
    $emailObj->to_addrs = $freight->freight_shipper_email_c;
    $emailObj->cc_addrs = '';
    $emailObj->name = $emailTemp->subject;
    $emailObj->date_sent = TimeDate::getInstance()->nowDb();
    $emailObj->description_html = $emailTemp->body_html;
    $emailObj->description = strip_tags($emailTemp->body_html);
    $emailObj->from_addr = $vmail->From;
    $emailObj->modified_user_id = '1';
    $emailObj->created_by = '1';
    $emailObj->status = 'sent';
    $emailObj->type = 'out';
    $emailObj->parent_type = 'freight_xl';
    $emailObj->parent_id = $id;
    $emailObj->save();
    $emailSent = @$vmail->Send();
    if ($emailSent) {
        $emailObj->status = 'sent';
         $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent successfully for freight ID: ' . $id . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
    } else {
        $emailObj->status = 'send_error';
        $emailObj->save();
        // Added ErrorInfo to log
        $log_message = '[' . date('Y-m-d H:i:s') . '] Lead Mail sent failed for freight ID: ' . $id . ' Error: ' . $vmail->ErrorInfo . "\n";
        file_put_contents($log_file, $log_message, FILE_APPEND);
        return $result;
    }
    if (!empty($id)) {
        $freight = BeanFactory::getBean('freight_xl', $id);
        if ($freight) {
            // Load the relationship
            $freight->load_relationship('freight_xl_emails_1');

            // Make sure the relationship is loaded
            if ($freight->freight_xl_emails_1) {
                // Use the relationship's add() method
                $freight->freight_xl_emails_1->add($emailObj->id);

                // Explicitly save the freight bean to ensure relationship is saved
                $freight->save();
            } else {
                // Log error if relationship couldn't be loaded
                $log_message = '[' . date('Y-m-d H:i:s') . '] Error: Could not load emails relationship for freight ID: ' . $id . "\n";
                file_put_contents($log_file, $log_message, FILE_APPEND);
            }
        }
    }
    $result['success'] = $emailObj;
    return $result;
}









































































































/**
 * Get live freight rate averages for widget display
 */
function getRouteAverages($data) {
    $origin = $data['origin'] ?? 'Easley, SC';
    $destinations = isset($data['destinations']) ? json_decode($data['destinations'], true) : array();
    
    if (empty($destinations)) {
        return array('status' => 400, 'error' => 'No destinations provided', 'origin' => $origin);
    }
    
    $routes = array();
    
    foreach ($destinations as $destination) {
        $laneRateData = array(
            'pickup_address' => $origin,
            'dropoff_address' => $destination
        );
        
        try {
            $laneResult = laneRate($laneRateData);
            $laneData = isset($laneResult['body']) ? json_decode($laneResult['body'], true) : null;
            
            $avgRatePerMile = 0;
            $distance = 0;
            $avgTotal = 0;
            
            if ($laneData && isset($laneData['data'])) {
                $avgRatePerMile = floatval($laneData['data']['avgRatePerMile'] ?? 0);
                $distance = intval($laneData['data']['totalMileage'] ?? 0);
                $avgTotal = floatval($laneData['data']['averageRateForMileage'] ?? 0);
                
                if ($avgTotal == 0 && $avgRatePerMile > 0 && $distance > 0) {
                    $avgTotal = round($avgRatePerMile * $distance, 2);
                }
            }
            
            // Fallback if API didn't return good data
            if ($avgRatePerMile == 0 || $distance == 0) {
                $distance = estimateDistance($origin, $destination);
                
                if ($distance < 200) {
                    $avgRatePerMile = 3.15 + (rand(-20, 20) / 100);
                } elseif ($distance < 400) {
                    $avgRatePerMile = 2.85 + (rand(-20, 20) / 100);
                } elseif ($distance < 700) {
                    $avgRatePerMile = 2.55 + (rand(-20, 20) / 100);
                } elseif ($distance < 1000) {
                    $avgRatePerMile = 2.35 + (rand(-20, 20) / 100);
                } else {
                    $avgRatePerMile = 2.15 + (rand(-20, 20) / 100);
                }
                
                $avgTotal = round($avgRatePerMile * $distance, 2);
            }
            
            $trend = round((rand(-50, 50) / 1000), 3);
            
            $routes[] = array(
                'destination' => $destination,
                'distance' => $distance,
                'rate' => round($avgRatePerMile, 2),
                'total' => round($avgTotal),
                'trend' => $trend,
                'source' => ($laneData && isset($laneData['data']['avgRatePerMile'])) ? 'live' : 'estimated'
            );
            
        } catch (Exception $e) {
            $distance = estimateDistance($origin, $destination);
            $rate = 2.50 + (rand(-30, 30) / 100);
            
            $routes[] = array(
                'destination' => $destination,
                'distance' => $distance,
                'rate' => round($rate, 2),
                'total' => round($rate * $distance),
                'trend' => round((rand(-50, 50) / 1000), 3),
                'source' => 'estimated'
            );
        }
    }
    
    return array(
        'status' => 200,
        'updated_at' => date('c'),
        'origin' => $origin,
        'routes' => $routes
    );
}

/**
 * Estimate distance between two cities
 */
function estimateDistance($origin, $destination) {
    $cityCoords = array(
        'atlanta' => array(33.749, -84.388),
        'chicago' => array(41.878, -87.630),
        'dallas' => array(32.777, -96.797),
        'los angeles' => array(34.052, -118.244),
        'houston' => array(29.760, -95.370),
        'phoenix' => array(33.449, -112.074),
        'philadelphia' => array(39.953, -75.164),
        'charlotte' => array(35.227, -80.843),
        'indianapolis' => array(39.768, -86.158),
        'columbus' => array(39.961, -82.999),
        'memphis' => array(35.150, -90.049),
        'nashville' => array(36.163, -86.782),
        'denver' => array(39.739, -104.990),
        'seattle' => array(47.606, -122.332),
        'miami' => array(25.762, -80.192),
        'san antonio' => array(29.425, -98.494),
        'jacksonville' => array(30.332, -81.656),
        'louisville' => array(38.253, -85.759),
        'kansas city' => array(39.100, -94.579),
        'st. louis' => array(38.627, -90.199),
        'cincinnati' => array(39.103, -84.512),
        'cleveland' => array(41.499, -81.694),
        'detroit' => array(42.331, -83.046),
        'minneapolis' => array(44.978, -93.265),
        'portland' => array(45.523, -122.677),
        'las vegas' => array(36.169, -115.140),
        'salt lake city' => array(40.761, -111.891),
        'albuquerque' => array(35.085, -106.651),
        'oklahoma city' => array(35.468, -97.516),
        'savannah' => array(32.081, -81.091),
        'charleston' => array(32.777, -79.931),
        'baltimore' => array(39.290, -76.612),
        'newark' => array(40.736, -74.172),
        'sacramento' => array(38.582, -121.494),
        'san francisco' => array(37.775, -122.419),
        'raleigh' => array(35.779, -78.638),
        'richmond' => array(37.541, -77.436),
        'birmingham' => array(33.521, -86.802),
        'new orleans' => array(29.951, -90.072),
        'tampa' => array(27.951, -82.458),
        'orlando' => array(28.538, -81.379),
        'boston' => array(42.360, -71.059),
        'pittsburgh' => array(40.441, -79.990),
        'greenville' => array(34.852, -82.394),
        'columbia' => array(34.000, -81.035),
        'spartanburg' => array(34.950, -81.932),
        'easley' => array(34.830, -82.601),
        'greer' => array(34.939, -82.229),
        'anderson' => array(34.503, -82.650),
    );
    
    $originCity = strtolower(trim(explode(',', $origin)[0]));
    $destCity = strtolower(trim(explode(',', $destination)[0]));
    
    $originCoords = $cityCoords[$originCity] ?? array(39.8283, -98.5795);
    $destCoords = $cityCoords[$destCity] ?? array(39.8283, -98.5795);
    
    $earthRadius = 3959;
    $lat1 = deg2rad($originCoords[0]);
    $lat2 = deg2rad($destCoords[0]);
    $deltaLat = deg2rad($destCoords[0] - $originCoords[0]);
    $deltaLng = deg2rad($destCoords[1] - $originCoords[1]);
    
    $a = sin($deltaLat/2) * sin($deltaLat/2) +
         cos($lat1) * cos($lat2) * sin($deltaLng/2) * sin($deltaLng/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
    return round($earthRadius * $c * 1.3);
}
