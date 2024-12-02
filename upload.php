<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['success' => false, 'message' => 'Invalid request method']));
}

if (!isset($_FILES['images'])) {
    die(json_encode(['success' => false, 'message' => 'No files uploaded']));
}

$config = require_once 'config.php';
$uploadDir = $config['image_folder'];
$maxFileSize = $config['max_file_size'];
$allowedTypes = $config['allowed_extensions'];

$response = ['success' => true, 'uploaded' => [], 'failed' => []];

foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $fileName = $_FILES['images']['name'][$key];
    $fileSize = $_FILES['images']['size'][$key];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    if (!in_array($fileType, $allowedTypes)) {
        $response['failed'][] = "$fileName: Invalid file type";
        continue;
    }
    
    if ($fileSize > $maxFileSize) {
        $response['failed'][] = "$fileName: File too large";
        continue;
    }
    
    $destination = $uploadDir . basename($fileName);
    
    if (move_uploaded_file($tmp_name, $destination)) {
        $response['uploaded'][] = $fileName;
    } else {
        $response['failed'][] = "$fileName: Upload failed";
    }
}

if (empty($response['uploaded'])) {
    $response['success'] = false;
    $response['message'] = 'No files were uploaded successfully';
}

echo json_encode($response);
