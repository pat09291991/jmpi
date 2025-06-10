<?php
header('Content-Type: application/json');

// Check if we're in development mode
$isDevelopment = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']);

if ($isDevelopment) {
    echo json_encode(['success' => true]);
    exit;
}

// Get the hCaptcha response token from POST data
$hcaptcha_response = $_POST['h-captcha-response'] ?? '';

if (empty($hcaptcha_response)) {
    echo json_encode(['success' => false, 'message' => 'Please complete the captcha verification']);
    exit;
}

// Verify the hCaptcha response
$data = [
    'secret' => 'ES_85a380d26b044bafb651defcb385174b',
    'response' => $hcaptcha_response
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://hcaptcha.com/siteverify');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if ($result['success']) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Captcha verification failed']);
} 