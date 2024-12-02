<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'images/';
    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file.']);
        }
    }
}
?>
