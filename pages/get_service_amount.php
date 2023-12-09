<?php
include("../dbconnect.php"); 

$personname = $_POST['personname'];

$query = "SELECT service, price FROM booking_applicant WHERE name = '$personname'";
$result = $con->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = [
        'service' => $row['service'],
        'amount' => $row['price']
    ];
    echo json_encode($data);
} else {
    echo json_encode(['service' => '', 'amount' => '']);
}
?>
