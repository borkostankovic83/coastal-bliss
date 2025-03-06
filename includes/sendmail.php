<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
// Load config
$config = include('../../config.php');

// Database Connection
require_once('../../database.php');

$conn = getDatabaseConnection();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $config['smtp_host'];
$mail->SMTPAuth = true;
$mail->Username = $config['smtp_user'];
$mail->Password = $config['smtp_pass'];
$mail->SMTPSecure = $config['smtp_secure'];
$mail->Port = $config['smtp_port'];

$message = "";
$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['form_name'] != '' AND $_POST['form_email'] != '' AND $_POST['form_subject'] != '' ) {

        $name = $conn->real_escape_string($_POST['form_name']);
        $email = $conn->real_escape_string($_POST['form_email']);
        $subject = $conn->real_escape_string($_POST['form_subject']);
        $phone = isset($_POST['form_phone']) ? $conn->real_escape_string($_POST['form_phone']) : null;
        $messageContent = $conn->real_escape_string($_POST['form_message']);

        $botcheck = $_POST['form_botcheck'];
        $toemail = 'info@coastalblissrehoboth.com';
        $toname = 'Coastal Bliss ';

        if( $botcheck == '' ) {

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $phone, $subject, $messageContent);
            $stmt->execute();
            $stmt->close();

            // Email Setup
            $mail->SetFrom( $toemail , $toname );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
//             $mail->AddCC('milena.dubai93@gmail.com', 'Milena');
            $mail->Subject = $subject;

            $logoUrl = "https://coastalblissrehoboth.com/images/logo.png";

            $body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                    .container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; }
                    .header { text-align: center; }
                    .header img { max-width: 150px; margin-bottom: 10px; }
                    .content { padding: 10px; font-size: 16px; color: #333; }
                    .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
                    .button { background-color: #008CBA; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <img src='$logoUrl' alt='Coastal Bliss Spa'>
                        <h3>You've Got a New Inquiry from Coastal Bliss Wellness!</h3>
                    </div>
                    <div class='content'>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Phone:</strong> $phone</p>
                        <p><strong>Message:</strong></p>
                        <p>$messageContent</p>
                        <br>
                        <a class='button' href='mailto:$email'>Reply to $name</a>
                    </div>
                    <div class='footer'>
                        <p>Coastal Bliss Wellness | Rehoboth Beach, DE</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                $message = 'We have <strong>successfully</strong> received your Message and will get back to You as soon as possible.';
                $status = "true";
            else:
                $message = 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
                $status = "false";
            endif;
        } else {
            $message = 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
            $status = "false";
        }
    } else {
        $message = 'Please <strong>Fill up</strong> all the Fields and Try Again.';
        $status = "false";
    }
} else {
    $message = 'An <strong>unexpected error</strong> occurred. Please Try Again later.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
header("Location: ../page-contact.php?status=$status&message=" . urlencode($message));
exit();

?>