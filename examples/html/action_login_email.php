<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$user = new User($pdo, 'users');

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$token = '';

if ($user->loginByEmail($email, $password)) {
    $token = $user->generateTokenEmail($email);
    echo json_encode(array("token" => $token));
} else {
    echo json_encode(array("error" => "Authentication failed"));
}

echo '<hr>';

// Assuming the token is received from the client
echo $receivedToken = $token;

echo '<hr>';

// Check if the token is valid
$username = $user->validateTokenEmail($receivedToken);
if ($username !== false) {
    echo "Token is valid for email: $email";
} else {
    echo "Token is not valid";
}