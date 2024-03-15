<?php
include('../dbconnect.php');

if(isset($_GET['id'])) {
    $medicineId = $_GET['id'];

    $sql = "SELECT * FROM medicine WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $medicineId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {

        $medicineData = $result->fetch_assoc();
        echo json_encode($medicineData);
    } else {
   
        echo json_encode(array('error' => 'Medicine not found'));
    }

    $stmt->close();
    $con->close();
} else {

    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>