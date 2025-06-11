<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/env_loader.php';
// Load SMTP and hCaptcha config from environment
$smtpHost = getenv('SMTP_HOST');
$smtpPort = getenv('SMTP_PORT');
$smtpUsername = getenv('SMTP_USERNAME');
$smtpPassword = getenv('SMTP_PASSWORD');
$smtpFromEmail = getenv('SMTP_FROM_EMAIL');
$smtpFromName = getenv('SMTP_FROM_NAME');
$hcaptchaSecret = getenv('HCAPTCHA_SECRET_KEY');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: text/html; charset=utf-8');

// Get form data
$formData = [
    'company_name' => $_POST['company_name'] ?? '',
    'contact_person' => $_POST['contact_person'] ?? '',
    'business_address' => $_POST['business_address'] ?? '',
    'business_email' => $_POST['business_email'] ?? '',
    'phone_number' => $_POST['phone_number'] ?? '',
    'interested_products' => $_POST['interested_products'] ?? '',
    'estimated_quantity' => $_POST['estimated_quantity'] ?? '',
    'interest_reason' => $_POST['interest_reason'] ?? '',
    'additional_info' => $_POST['additional_info'] ?? ''
];

// Validate required fields
$requiredFields = ['company_name', 'contact_person', 'business_address', 'business_email', 'phone_number', 'interested_products', 'estimated_quantity', 'interest_reason'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (empty($formData[$field])) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
    exit;
}

// Validate email format
if (!filter_var($formData['business_email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address']);
    exit;
}

try {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $smtpPort;

    // Enable debug output
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->Debugoutput = function($str, $level) {
        error_log("SMTP Debug: $str");
    };

    // Recipients
    $mail->setFrom($smtpFromEmail, $smtpFromName);
    $mail->addAddress($smtpFromEmail, 'JMPI Sales');
    $mail->addReplyTo($formData['business_email'], $formData['contact_person']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'TEST - New Dealer Application: ' . $formData['company_name'];

    // Email body
    $body = "
    <div style='background:#f4f4f4;padding:30px 0;font-family:Poppins,Arial,sans-serif;'>
      <table align='center' width='1000' cellpadding='0' cellspacing='0' style='background:#fff;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.07);padding:0 30px 30px 30px;'>
        <tr>
          <td style='text-align:center;padding:30px 0 10px 0;'>
            <img src='https://joshuameatproductsph.com/images/jmpi-logo.webp' alt='Joshua&#39;s Meat Products Logo' style='max-width:180px;max-height:60px;'>
          </td>
        </tr>
        <tr>
          <td style='text-align:center;padding-bottom:20px;'>
            <h2 style='margin:0;color:#b91c1c;font-size:28px;letter-spacing:1px;'>New Dealer Application</h2>
            <p style='color:#555;font-size:16px;margin:8px 0 0 0;'>A new dealer application has been submitted.</p>
          </td>
        </tr>
        <tr>
          <td>
            <table width='100%' cellpadding='0' cellspacing='0' style='font-size:16px;color:#222;line-height:1.7;'>
              <tr><td style='padding:8px 0;'><strong>Company Name:</strong> " . htmlspecialchars(
                $formData['company_name']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Contact Person:</strong> " . htmlspecialchars(
                $formData['contact_person']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Business Address:</strong> " . htmlspecialchars(
                $formData['business_address']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Business Email:</strong> <a href='mailto:" . htmlspecialchars($formData['business_email']) . "' style='color:#b91c1c;'>" . htmlspecialchars($formData['business_email']) . "</a></td></tr>
              <tr><td style='padding:8px 0;'><strong>Phone Number:</strong> " . htmlspecialchars(
                $formData['phone_number']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Interested Products:</strong> " . htmlspecialchars(
                $formData['interested_products']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Estimated Quantity:</strong> " . htmlspecialchars(
                $formData['estimated_quantity']) . "</td></tr>
              <tr><td style='padding:8px 0;'><strong>Interest Reason:</strong> " . htmlspecialchars(
                $formData['interest_reason']) . "</td></tr>
              " . (!empty($formData['additional_info']) ? "<tr><td style='padding:8px 0;'><strong>Additional Information:</strong> " . htmlspecialchars(
                $formData['additional_info']) . "</td></tr>" : "") . "
            </table>
          </td>
        </tr>
        <tr>
          <td style='padding-top:30px;text-align:center;color:#888;font-size:13px;'>
            Joshua&#39;s Meat Products Inc. &bull; sales@joshuameatproductsph.com<br>
            <span style='color:#bbb;'>This is an automated message. Please do not reply directly to this email.</span>
          </td>
        </tr>
      </table>
    </div>";

    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    // Output HTML modal and redirect
    echo '<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <meta http-equiv="refresh" content="3;url=dealer.php">
    <style>
        body { background: #f4f4f4; font-family: Poppins, Arial, sans-serif; }
        .modal-bg { position: fixed; inset: 0; background: rgba(0,0,0,0.4); display: flex; align-items: center; justify-content: center; }
        .modal { background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 2rem; max-width: 400px; text-align: center; }
        .modal h2 { color: #16a34a; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="modal-bg">
        <div class="modal">
            <h2>Thank You!</h2>
            <p>Your application has been submitted successfully.<br>Redirecting to the dealer form...</p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "dealer.php";
        }, 3000);
    </script>
</body>
</html>';
    exit;
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Failed to send test email. Error: ' . $mail->ErrorInfo]);
    error_log("Mailer Error: {$mail->ErrorInfo}");
}