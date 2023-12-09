<?php
include('../dbconnect.php');

if (isset($_POST['delete_inventory_id'])) {
    $inventoryId = $_POST['delete_inventory_id'];
    $sql = "DELETE FROM inventory WHERE inventory_id = '$inventoryId'";

    if (mysqli_query($con, $sql)) {
        echo "Supply record deleted successfully.";
    } else {
        echo "Error deleting supply record: " . mysqli_error($con);
    }
}
?>
