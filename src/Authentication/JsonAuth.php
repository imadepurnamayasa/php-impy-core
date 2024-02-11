<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

class JsonAuth
{
    private $users = [
        'user' => 'password' // Replace with your actual user credentials
    ];
    private $secretKey = 'your_secret_key'; // Replace with your actual secret key

    public function authenticate($username, $password)
    {
        // Check if the username exists and the password matches
        if (isset($this->users[$username]) && $this->users[$username] === $password) {
            return true;
        } else {
            return false;
        }
    }

    public function generateToken($username)
    {
        // Create a JSON Web Token (JWT)
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];
        $payload = [
            'username' => $username,
            'exp' => time() + (60 * 60) // Token expiration time (1 hour)
        ];

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
    }

    public function validateToken($token)
    {
        $tokenParts = explode('.', $token);
        $header = json_decode(base64_decode($tokenParts[0]), true);
        $payload = json_decode(base64_decode($tokenParts[1]), true);
        $signature = $tokenParts[2];

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $validSignature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlValidSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($validSignature));

        if ($signature === $base64UrlValidSignature && $payload['exp'] >= time()) {
            return $payload['username'];
        } else {
            return false;
        }
    }
}
