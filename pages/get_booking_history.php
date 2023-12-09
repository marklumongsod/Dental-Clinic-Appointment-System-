<?php
include('../dbconnect.php');

if (isset($_POST['booking_id'])) {
    $bookingId = $_POST['booking_id'];

    $sql = "SELECT name FROM booking_applicant WHERE booking_id = $bookingId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];

            $sql = "SELECT * FROM booking_applicant WHERE name = '$name'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $output = '<table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 8px 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2; font-weight: bold;">Date and Time of Appointment</th>
                            <th style="padding: 8px 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2; font-weight: bold;">Appointment Code</th>
                            <th style="padding: 8px 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2; font-weight: bold;">Patient Name</th>
                            <th style="padding: 8px 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2; font-weight: bold;">Service</th>
                            <th style="padding: 8px 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2; font-weight: bold;">Remark</th>
                        </tr>
                    </thead>
                    <tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        $appointmentDate = date('F j, Y g:i A', strtotime($row['appointment_date'])); 
                        $output .= '<tr>';
                        $output .= '<td style="padding: 8px 12px; text-align: left; border: 1px solid #ddd;">' . $appointmentDate . '</td>';
                        $output .= '<td style="padding: 8px 12px; text-align: left; border: 1px solid #ddd;">' . $row['appointment_code'] . '</td>';
                        $output .= '<td style="padding: 8px 12px; text-align: left; border: 1px solid #ddd;">' . $row['name'] . '</td>';
                        $output .= '<td style="padding: 8px 12px; text-align: left; border: 1px solid #ddd;">' . $row['service'] . '</td>';
                        $output .= '<td style="padding: 8px 12px; text-align: left; border: 1px solid #ddd;">' . $row['remark'] . '</td>';
                        $output .= '</tr>';
                    }                    

                $output .= '</tbody>
                </table>';

                    

                    echo $output;
                } else {
                    echo 'No booking history found for this name.';
                }
            } else {
                echo 'Error in executing the query: ' . mysqli_error($con);
            }
        } else {
            echo 'No name found for this booking ID.';
        }
    } else {
        echo 'Error in executing the query: ' . mysqli_error($con);
    }
} else {
    echo 'Invalid request.';
}
?>
