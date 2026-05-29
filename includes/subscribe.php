<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'message' => 'Invalid request method.']);
    exit;
}

if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
    echo json_encode(['ok' => false, 'message' => 'Invalid CSRF token.']);
    exit;
}

if (!check_rate_limit('last_subscribe_submit', 60)) {
    echo json_encode(['ok' => false, 'message' => 'Please wait a moment before subscribing again.']);
    exit;
}

$email = filter_var((string)($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

if (!$email) {
    echo json_encode(['ok' => false, 'message' => 'Invalid email address.']);
    exit;
}

try {
    // Check if already subscribed
    $stmt = $pdo->prepare("SELECT id FROM subscribers WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['ok' => true, 'message' => 'You are already subscribed.']);
        exit;
    }

    // Insert new subscriber
    $stmt = $pdo->prepare("INSERT INTO subscribers (email, ip_address) VALUES (?, ?)");
    $stmt->execute([$email, $_SERVER['REMOTE_ADDR'] ?? '']);

    // Send Notification to Admin
    $to = defined('SITE_MAIL_TO') ? SITE_MAIL_TO : 'info@theblogship.com';
    $subject = "New Subscriber: " . $email;
    $message = "A new user has subscribed to the newsletter.\n\nEmail: " . $email;
    $headers = "From: " . (defined('SITE_MAIL_FROM') ? SITE_MAIL_FROM : 'no-reply@theblogship.com');
    
    @mail($to, $subject, $message, $headers);

    echo json_encode(['ok' => true, 'message' => 'Successfully subscribed!']);

} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['ok' => false, 'message' => 'An error occurred. Please try again later.']);
}
?>