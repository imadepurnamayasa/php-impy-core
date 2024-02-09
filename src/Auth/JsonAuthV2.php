<?php

namespace Imadepurnamayasa\PhpInti\Auth;

class JsonAuthV2
{
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function generateToken($username, $password)
    {
        $userData = $this->verifyUser($username, $password);

        if ($userData) {
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            $payload = [
                'exp' => time() + (60 * 60), // Token expiration time (1 hour)
                'data' => $userData
            ];

            $headerBase64 = $this->base64UrlEncode(json_encode($header));
            $payloadBase64 = $this->base64UrlEncode(json_encode($payload));

            return $headerBase64 . '.' . $payloadBase64;
        }

        return false;
    }

    public function verifyToken($token)
    {
        list($headerBase64, $payloadBase64) = explode('.', $token);

        $data = json_decode($this->base64UrlDecode($payloadBase64), true);

        if ($data['exp'] >= time()) {
            return $data['data'];
        }

        return false;
    }

    private function verifyUser($username, $password)
    {
        if (isset($this->users[$username]) && password_verify($password, $this->users[$username])) {
            return ['username' => $username]; // You can include additional user data here
        }

        return false;
    }

    private function base64UrlEncode($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

    private function base64UrlDecode($data)
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
    }
}
