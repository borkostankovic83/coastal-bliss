<?php
header('Content-Type: application/json');

// Include PHPMailer
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

// Load config
$config = include('../../config.php');

// Database Connection
require_once('../../database.php');
$conn = getDatabaseConnection();
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}

// Upload resume
$resumePath = '';
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . './../uploads/resumes/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $fileName = uniqid() . '_' . basename($_FILES['resume']['name']);
    $resumePath = '/uploads/resumes/' . $fileName;
    move_uploaded_file($_FILES['resume']['tmp_name'], $uploadDir . $fileName);
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO job_applications (
    name, email, position, license_status, resume_path, cover_letter,
    availability, experience, certifications, start_date, referral
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param(
    "sssssssssss",
    $_POST['name'],
    $_POST['email'],
    $_POST['position'],
    $_POST['license_status'],
    $resumePath,
    $_POST['cover_letter'],
    $_POST['availability'],
    $_POST['experience'],
    $_POST['certifications'],
    $_POST['start_date'],
    $_POST['referral']
);

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'DB error: ' . $stmt->error]);
    exit;
}
$stmt->close();
$conn->close();

// Send email to your sister with the application details
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $config['smtp_host'];
$mail->SMTPAuth = true;
$mail->Username = $config['smtp_user'];
$mail->Password = $config['smtp_pass'];
$mail->SMTPSecure = $config['smtp_secure'];
$mail->Port = $config['smtp_port'];

$mail->setFrom('info@coastalblissrehoboth.com', 'Job Application');
$mail->addAddress('info@coastalblissrehoboth.com', 'Milena');

// Build the resume URL dynamically based on current environment
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// Check if it's running locally
$basePath = ($host === 'localhost') ? '/coastal-bliss' : '';

$resumeURL = $protocol . $host . $basePath . $resumePath;


// Email subject and body
$mail->Subject = "New Job Application - " . $_POST['position'];
$body = "
<html>
  <body style='font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px;'>
    <table width='100%' cellpadding='0' cellspacing='0' style='max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);'>
      <tr>
        <td style='background-color: #beac5a; padding: 20px; color: #ffffff; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
          <h2 style='margin: 0;'>New Job Application</h2>
        </td>
      </tr>
      <tr>
        <td style='padding: 20px; color: #474c55;'>
          <p><strong>Name:</strong> {$_POST['name']}</p>
          <p><strong>Email:</strong> {$_POST['email']}</p>
          <p><strong>Position:</strong> {$_POST['position']}</p>
          <p><strong>License Status:</strong> {$_POST['license_status']}</p>
          <p><strong>Resume:</strong> <a href='{$resumeURL}' style='color: #beac5a; text-decoration: underline;'>Download Resume</a></p>
          <p><strong>Cover Letter:</strong><br>{$_POST['cover_letter']}</p>
          <p><strong>Availability:</strong> {$_POST['availability']}</p>
          <p><strong>Experience:</strong><br>{$_POST['experience']}</p>
          <p><strong>Certifications:</strong> {$_POST['certifications']}</p>
          <p><strong>Start Date:</strong> {$_POST['start_date']}</p>
          <p><strong>Referral:</strong> {$_POST['referral']}</p>
        </td>
      </tr>
      <tr>
        <td style='background-color: #f0f0f0; padding: 10px 20px; color: #999; text-align: center; font-size: 12px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
          Coastal Bliss Rehoboth &nbsp;|&nbsp; https://coastalblissrehoboth.com
        </td>
      </tr>
    </table>
  </body>
</html>";


$mail->msgHTML($body);

if (!$mail->send()) {
    echo json_encode(['status' => 'error', 'message' => 'Email failed to send.']);
    exit;
}

// Success response
echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully.']);
?>
