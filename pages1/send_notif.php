<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../dbconnect.php';
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Create a new instance of PHPMailer
$mail = new PHPMailer();

// Query to retrieve expiring medicines within one month
$current_date = date('Y-m-d');
$one_month_later = date('Y-m-d', strtotime('+1 month'));
$stmt = $con->prepare("SELECT * FROM medicine WHERE expiration_date BETWEEN ? AND ?");
$stmt->bind_param("ss", $current_date, $one_month_later);
$stmt->execute();
$result = $stmt->get_result();

// Send notifications for expiring medicines
while ($row = $result->fetch_assoc()) {
    $medicine_id = $row['id'];
    $medicine_name = $row['medicine_name'];
    $expiration_date = $row['expiration_date'];
    $expiration_date_formatted = date('F j, Y', strtotime($expiration_date));
    $notification_message = "Reminder: The medicine '{$medicine_name}' will expire on {$expiration_date_formatted}. Please take necessary action.";
    
    // Check if notification has already been sent for this medicine
    $notification_sent_stmt = $con->prepare("SELECT COUNT(*) AS num_notifications FROM notification_log WHERE medicine_id = ?");
    $notification_sent_stmt->bind_param("i", $medicine_id);
    $notification_sent_stmt->execute();
    $notification_sent_result = $notification_sent_stmt->get_result();
    $num_notifications = $notification_sent_result->fetch_assoc()['num_notifications'];

    $recipient_query = "SELECT email FROM email_notification WHERE id = 1";
    $recipient_result = $con->query($recipient_query);

    if ($recipient_result->num_rows > 0) {
        $recipient_row = $recipient_result->fetch_assoc();
        $recipient_email = $recipient_row['email'];

        if ($num_notifications == 0) { 
            try {
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'orthomagic9@gmail.com'; 
                $mail->Password = 'fqstvttkvjangybt'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                // Set email content
                $mail->setFrom('orthomagic9@gmail.com', 'OrthoMagic Dental'); 
                $mail->addAddress($recipient_email); 
                $mail->Subject = 'Medicine Expiry Notification';
                $mail->Body = $notification_message;

                // Send email
                $mail->send();

                // Log the notification
                $log_stmt = $con->prepare("INSERT INTO notification_log (medicine_id, notification_message, notification_date, is_read) VALUES (?, ?, NOW(), 0)");
                $log_stmt->bind_param("is", $medicine_id, $notification_message);
                $log_stmt->execute();
                $log_stmt->close();
            } catch (Exception $e) {
                echo "Error sending email: {$mail->ErrorInfo}";
            }
        }
}}
?>
