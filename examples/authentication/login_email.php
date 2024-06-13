<?php

use Imadepurnamayasa\PhpInti\Database\Connection\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 3306, 'root', 'root', 'test');
$pdo->open();
$user = new User($pdo, 'users');

$email = 'johndoe@example.com';
$password = 'johndoe';
$token = '';

if ($user->loginByEmail($email, $password)) {
    $token = $user->token;
    echo json_encode(array("token" => $token));
} else {
    echo json_encode(array("error" => "Authentication failed"));
}

echo '<hr>';

// Assuming the token is received from the client
echo $receivedToken = $token;

echo '<hr>';

// Check if the token is valid
$payload = $user->validateTokenEmail($receivedToken);
if ($payload !== false) {
    echo "Token is valid for email: {$payload['email']}";
} else {
    echo "Token is not valid";
}

Helpers::print_r($user);

$pdo->close();
