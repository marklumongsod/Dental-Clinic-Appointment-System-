<?php
include("../dbconnect.php");

if (isset($_POST['inventory_id'])) {
    $inventoryId = $_POST['inventory_id'];
    $sql = "SELECT * FROM inventory WHERE inventory_id = '$inventoryId'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); 
    } else {
        echo "Inventory item not found.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($con);
?>
