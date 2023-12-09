<?php
include('../dbconnect.php');

if (isset($_POST['delete_payment_id'])) {
    $paymentId = $_POST['delete_payment_id'];

    
    $sql = "DELETE FROM applicant_payment WHERE payment_id = '$paymentId'";

    if (mysqli_query($con, $sql)) {
    
        echo "Payment record deleted successfully.";

    } else {
       
        echo "Error deleting payment record: " . mysqli_error($con);
    }
}
?>
