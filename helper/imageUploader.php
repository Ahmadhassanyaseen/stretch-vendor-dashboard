<?php

/**
 * Uploads multiple images to the vehicles folder
 * 
 * @param array $files The $_FILES array containing the uploaded files
 * @param string $vehicleId The ID of the vehicle (will be used as folder name)
 * @return array Returns an array with 'success' status and 'files' array containing uploaded filenames
 */
function uploadVehicleImages($files, $vehicleId = '') {
    $response = [
        'success' => false,
        'message' => '',
        'files' => []
    ];

    // Validate vehicle ID
    if (empty($vehicleId) && !empty($_POST['id'])) {
        $vehicleId = $_POST['id'];
    }
    
    if (empty($vehicleId)) {
        $response['message'] = 'Vehicle ID is required';
        return $response;
    }

    // Create upload directory if it doesn't exist
    $uploadDir = __DIR__ . '/../vehicles/' . $vehicleId . '/';
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            $response['message'] = 'Failed to create upload directory';
            return $response;
        }
    }

    // Check if files were uploaded
    if (empty($files['name'][0])) {
        $response['message'] = 'No files were uploaded';
        return $response;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    $uploadedFiles = [];

    // Process each file
    $fileCount = count($files['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        // Skip if no file was uploaded for this index
        if ($files['error'][$i] == UPLOAD_ERR_NO_FILE) {
            continue;
        }

        // Check for upload errors
        if ($files['error'][$i] !== UPLOAD_ERR_OK) {
            $response['message'] = 'Error uploading file: ' . $files['name'][$i];
            continue;
        }

        // Validate file type
        $fileType = mime_content_type($files['tmp_name'][$i]);
        if (!in_array($fileType, $allowedTypes)) {
            $response['message'] = 'Invalid file type: ' . $files['name'][$i] . '. Only JPG, PNG, GIF, and WebP are allowed.';
            continue;
        }

        // Validate file size
        if ($files['size'][$i] > $maxSize) {
            $response['message'] = 'File too large: ' . $files['name'][$i] . '. Maximum size is 5MB.';
            continue;
        }

        // Generate unique filename
        $fileExt = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
        $fileName = uniqid('img_') . '_' . bin2hex(random_bytes(4)) . '.' . $fileExt;
        $targetPath = $uploadDir . $fileName;

        // Move the uploaded file
        if (move_uploaded_file($files['tmp_name'][$i], $targetPath)) {
            $uploadedFiles[] = $fileName;
        }
    }

    if (!empty($uploadedFiles)) {
        $response['success'] = true;
        $response['files'] = $uploadedFiles;
        $response['message'] = count($uploadedFiles) . ' file(s) uploaded successfully';
    } else if (empty($response['message'])) {
        $response['message'] = 'No files were uploaded';
    }

    return $response;
}

