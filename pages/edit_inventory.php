<?php
include('../dbconnect.php');

if (isset($_POST['edit_submit'])) {
    $edit_inventory_id = $_POST['edit_inventory_id'];
    $edit_supply = mysqli_real_escape_string($con, $_POST['edit_supply']);
    $edit_quantity = mysqli_real_escape_string($con, $_POST['edit_quantity']);

    date_default_timezone_set("Asia/Manila");
    $dt = date('Y-m-d h:i:s A');

    $query = "UPDATE inventory SET supply_name = '$edit_supply', quantity = '$edit_quantity', update_created = '$dt' WHERE inventory_id = '$edit_inventory_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Supply updated successfully.');</script>";
        header("Location: inventory.php"); 
        exit(); 
    } else {
        echo "<script>alert('Error updating supply.');</script>";
        header("Location: inventory.php");
        exit(); 
    }
}

?>
