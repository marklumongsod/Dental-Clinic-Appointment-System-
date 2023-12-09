<?php
include 'dbconnect.php';


$date = $_POST['date'];
$time = $_POST['time'];


$sql = "SELECT * FROM booking_applicant WHERE appointment_date = '$date' AND appointment_time = '$time'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "not available"; 
} else {
    echo "available"; 
}

$conn->close();
?>
