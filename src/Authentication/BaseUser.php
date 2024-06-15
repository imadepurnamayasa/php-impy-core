<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Authentication;

use DateTime;
use Imadepurnamayasa\PhpInti\Database\ORM;
use Imadepurnamayasa\PhpInti\Helpers;

abstract class BaseUser extends ORM
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $id = 'id';
    public $username = 'username';
    public $password = 'password';
    public $email = 'email';
    public $token = 'token';
    public $tokenExpired = 'token_expired';
    public $secretKey = 'your_secret_key';

    public function loginByUsername($username, $password)
    {
        $stmt = $this->pdo->getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$this->username} = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && Helpers::passwordVerify($password, $user['password'])) {
            $this->generateTokenUsername($user['id'], $user['username']);
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            if ($user['secret_key'] != null) {
                $this->secretKey = $user['secret_key'];
            }
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
            $this->generateTokenEmail($user['id'], $user['email']);
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            if ($user['secret_key'] != null) {
                $this->secretKey = $user['secret_key'];
            }
            return true;
        }
        return false;
    }

    public function generateTokenUsername($id, $username)
    {
        $exp = time() + (60 * 60); // Token expiration time (1 hour)
        // Create a JSON Web Token (JWT)
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];
        $payload = [
            'id' => $id,
            'username' => $username,
            'exp' => $exp
        ];
        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        $token = "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
        $this->token = $token;
        $this->tokenExpired = $exp;
        $this->update(
            $this->id,
            [
                'token' => $this->token,
                'token_expired' => date('Y-m-d H:i:s', $this->tokenExpired)
            ]
        );
        return $this->token;
    }

    public function generateTokenEmail($id, $email)
    {
        $exp = time() + (60 * 60); // Token expiration time (1 hour)
        // Create a JSON Web Token (JWT)
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];
        $payload = [
            'id' => $id,
            'email' => $email,
            'exp' => $exp
        ];
        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        $token = "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
        $this->token = $token;
        $this->tokenExpired = $exp;
        $this->update(
            $this->id,
            [
                'token' => $this->token,
                'token_expired' => date('Y-m-d H:i:s', $this->tokenExpired)
            ]
        );
        return $this->token;
    }

    public function validateTokenUsername($token)
    {
        $tokenParts = explode('.', $token);
        $tokenHeader = isset($tokenParts[0]) ? $tokenParts[0] : '';
        $tokenPaylod = isset($tokenParts[1]) ? $tokenParts[1] : '';
        $tokenSignature = isset($tokenParts[2]) ? $tokenParts[2] : '';
        $header = json_decode(base64_decode($tokenHeader), true);
        $payload = json_decode(base64_decode($tokenPaylod), true);
        $signature = $tokenSignature;

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $validSignature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlValidSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($validSignature));

        if ($signature === $base64UrlValidSignature && $payload['exp'] >= time()) {
            $this->token = $token;
            return $payload;
        } else {
            return false;
        }
    }

    public function validateTokenEmail($token)
    {
        $tokenParts = explode('.', $token);
        $tokenHeader = isset($tokenParts[0]) ? $tokenParts[0] : '';
        $tokenPaylod = isset($tokenParts[1]) ? $tokenParts[1] : '';
        $tokenSignature = isset($tokenParts[2]) ? $tokenParts[2] : '';
        $header = json_decode(base64_decode($tokenHeader), true);
        $payload = json_decode(base64_decode($tokenPaylod), true);
        $signature = $tokenSignature;

        $base64UrlHeader = base64_encode(json_encode($header));
        $base64UrlPayload = base64_encode(json_encode($payload));
        $validSignature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $this->secretKey, true);
        $base64UrlValidSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($validSignature));

        if ($signature === $base64UrlValidSignature && $payload['exp'] >= time()) {
            $this->token = $token;
            return $payload;
        } else {
            return false;
        }
    }
}
