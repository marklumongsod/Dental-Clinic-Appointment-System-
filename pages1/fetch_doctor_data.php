<?php
include('../dbconnect.php');

if(isset($_GET['id'])) {
    $doctorId = $_GET['id'];

    $sql = "SELECT * FROM doctors WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $doctorId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {

        $doctorData = $result->fetch_assoc();
        echo json_encode($doctorData);
    } else {
   
        echo json_encode(array('error' => 'Doctor not found'));
    }

    $stmt->close();
    $con->close();
} else {

    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>