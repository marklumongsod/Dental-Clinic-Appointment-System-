<?php

session_start();
include('../dbconnect.php');

if (!isset($_SESSION['id'])) {
    $_SESSION['error_message'] = "You must log in to access this page.";
    header("Location: ../index_admin.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    try {
        // Prepare and execute SQL statement to insert the image into the qr_code table
        $stmt = $pdo->prepare("INSERT INTO qr_code (attachment) VALUES (?)");
        $image = file_get_contents($_FILES["image"]["tmp_name"]);
        $stmt->bindParam(1, $image, PDO::PARAM_LOB);

        $pdo->beginTransaction();
        $stmt->execute();
        $pdo->commit();
        echo "Image uploaded successfully.";
    } catch (PDOException $e) {
        $pdo->rollBack();
        die("Error uploading image: " . $e->getMessage());
    }
}

?>
