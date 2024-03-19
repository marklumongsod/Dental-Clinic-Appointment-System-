<?php
include('../dbconnect.php');

if(isset($_GET['id'])) {
    $equipmentId = $_GET['id'];

    $sql = "SELECT * FROM equipment WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $equipmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {

        $equipmentData = $result->fetch_assoc();
        echo json_encode($equipmentData);
    } else {
   
        echo json_encode(array('error' => 'Equipment not found'));
    }

    $stmt->close();
    $con->close();
} else {

    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>