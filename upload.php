<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a valid image
    $validExtensions = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $validExtensions)) {
        die("Restricted Area! JPG, JPEG, and PNG files ONLY! .");
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully.. :)";
    } else {
        echo "Error broo";
    }
}
?>
