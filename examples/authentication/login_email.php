<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$user = new User($pdo, 'users');

$email = 'johndoe@example.com';
$password = 'johndoe';
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
$email = $user->validateTokenEmail($receivedToken);
if ($email !== false) {
    echo "Token is valid for email: $email";
} else {
    echo "Token is not valid";
}
