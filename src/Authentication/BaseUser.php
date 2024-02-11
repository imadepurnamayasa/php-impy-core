<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

use Imadepurnamayasa\PhpInti\Database\ORM;
use Imadepurnamayasa\PhpInti\Helpers;

abstract class BaseUser extends ORM
{
    protected $table = 'users';
    protected $primariKey = 'id';
    protected $username = 'username';
    protected $password = 'password';
    protected $email = 'email';
    protected $token = 'token';
    protected $tokenExpired = 'token_expired';
    protected $secretKey = 'your_secret_key';

    public function loginByUsername($username, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->username} = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && Helpers::passwordVerify($password, $user['password'])) {
            
            return true;
        }

        return false;
    }

    public function loginByEmail($email, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->email} = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && Helpers::passwordVerify($password, $user['password'])) {
            
            return true;
        }

        return false;
    }

    public function generateTokenUsername($username)
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

    public function generateTokenEmail($email)
    {
        // Create a JSON Web Token (JWT)
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];
        $payload = [
            'email' => $email,
            'exp' => time() + (60 * 60) // Token expiration time (1 hour)
        ];

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
    }

    public function validateTokenUsername($token)
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

    public function validateTokenEmail($token)
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
            return $payload['email'];
        } else {
            return false;
        }
    }
}