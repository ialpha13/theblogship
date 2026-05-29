<?php
require_once __DIR__ . '/../config.php';

function redirect_with($type, $message) {
 $type = ($type === 'success') ? 'success' : 'error';
 header("Location: ../contact.php?type=" . urlencode($type) . "&message=" . urlencode($message));
 exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
 redirect_with('error', 'Invalid request method.');
}

if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
    redirect_with('error', 'Invalid CSRF token.');
}

if (!check_rate_limit('last_contact_submit', 60)) {
    redirect_with('error', 'Please wait a moment before sending another message.');
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
 redirect_with('error', 'All fields are required.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 redirect_with('error', 'Invalid email format.');
}

// Basic header injection hardening
$clean_email = str_replace(["\r", "\n"], '', $email);
$clean_name = str_replace(["\r", "\n"], '', $name);

$to = defined('SITE_MAIL_TO') ? SITE_MAIL_TO : "info@theblogship.com";
$subject = "Contact Form Submission from " . $clean_name;

$body =
"Name: {$clean_name}\n" .
"Email: {$clean_email}\n\n" .
"Message:\n{$message}\n";

$from = defined('SITE_MAIL_FROM') ? SITE_MAIL_FROM : "no-reply@" . ($_SERVER['HTTP_HOST'] ?? 'localhost');

$headers = [];
$headers[] = "From: {$from}";
$headers[] = "Reply-To: {$clean_email}";
$headers[] = "X-Mailer: PHP/" . phpversion();
$headers[] = "Content-Type: text/plain; charset=UTF-8";

$headers_str = implode("\r\n", $headers);

if (@mail($to, $subject, $body, $headers_str)) {
 redirect_with('success', 'Message sent successfully!');
}

redirect_with('error', 'Failed to send the message.');
?>