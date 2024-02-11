<?php

use Imadepurnamayasa\PhpInti\Auth\JsonAuth;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$jsonAuth = new JsonAuth();

// Attempt authentication
$username = 'user'; // Assuming username and password are sent via POST request
$password = 'password';
if ($jsonAuth->authenticate($username, $password)) {
    // Authentication successful, generate token
    $token = $jsonAuth->generateToken($username);
    echo json_encode(array("token" => $token));
} else {
    // Authentication failed
    echo json_encode(array("error" => "Authentication failed"));
}

echo '<hr>';

// Assuming the token is received from the client
echo $receivedToken = $token;

echo '<hr>';

// Check if the token is valid
$username = $jsonAuth->validateToken($receivedToken);
if ($username !== false) {
    echo "Token is valid for user: $username";
} else {
    echo "Token is not valid";
}
