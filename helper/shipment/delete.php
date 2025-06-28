<?php
include '../../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data['id'] = $_GET['id'];
    $data['status'] ='-1';
    $response = updateShipmentStatus($data);
    echo $response;
    if ($response) {
        header('Location: ../../index.php?status=success');
        exit;
    } else {
        header('Location: ../../index.php?status=error');
        exit;
    }
}
