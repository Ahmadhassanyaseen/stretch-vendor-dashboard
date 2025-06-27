<?php

function uploadImage($file, $vehicleId = '') {
    if (empty($vehicleId) && !empty($_POST['id'])) {
        $vehicleId = $_POST['id'];
    }
    
    if (empty($vehicleId)) {
        throw new Exception('Vehicle ID is required for image upload');
    }
    
    $uploadDir = '../../vehicles/' . $vehicleId . '/';
    
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            throw new Exception('Failed to create upload directory');
        }
    }
    
    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception('Only JPG, PNG, and GIF files are allowed');
    }
    
    // Validate file size (5MB max)
    $maxSize = 5 * 1024 * 1024; // 5MB
    if ($file['size'] > $maxSize) {
        throw new Exception('File size exceeds maximum limit of 5MB');
    }
    
    $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\.\-]/', '_', $file['name']);
    $targetPath = $uploadDir . $fileName;
    
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception('Failed to move uploaded file');
    }
    
    return $fileName;
}
