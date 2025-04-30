<!DOCTYPE html>
<html>

<head>
    <title>PHP File Upload</title>
</head>

<body>
    <h2>Upload a File</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>
</body>

</html>

<?php
$uploadDir = "img/";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] === 0) {

        $file = $_FILES['myfile'];

        $originalName = basename($file['name']); // Original file name
        $tmpPath = $file['tmp_name']; // Temporary location
        $fileSize = $file['size']; // Size in bytes
        $fileType = mime_content_type($tmpPath); // MIME type from content
        $fileExt = pathinfo($originalName, PATHINFO_EXTENSION); // File extension

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 2 * 1024 * 1024; 
        if (!in_array($fileType, $allowedTypes)) {
            echo "Error: Invalid file type.";
        } elseif ($fileSize > $maxSize) {
            echo "Error: File is too large.";
        } elseif (!is_uploaded_file($tmpPath)) {
            echo "Error: Invalid upload.";
        } else {
            $targetPath = $uploadDir . $originalName;
            if (file_exists($targetPath)) {
                echo "Error: File already exists.";
            } else {
                if (move_uploaded_file($tmpPath, $targetPath)) {
                    echo "Success: File uploaded to $targetPath";
                } else {
                    echo "Error: Failed to move file.";
                }
            }
        }
    } else {
        echo "Upload error. Code: " . $_FILES['myfile']['error'];
    }
}
?>