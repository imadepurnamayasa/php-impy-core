<?php

namespace Imadepurnamayasa\PhpInti\Auth;

class JsonAuthV1
{
    private $secretKey;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function generateToken($userData)
    {
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

        $signature = hash_hmac('sha256', $headerBase64 . '.' . $payloadBase64, $this->secretKey, true);
        $signatureBase64 = $this->base64UrlEncode($signature);

        return $headerBase64 . '.' . $payloadBase64 . '.' . $signatureBase64;
    }

    public function verifyToken($token)
    {
        list($headerBase64, $payloadBase64, $signature) = explode('.', $token);

        $data = json_decode($this->base64UrlDecode($payloadBase64), true);

        $signatureCheck = hash_hmac('sha256', $headerBase64 . '.' . $payloadBase64, $this->secretKey, true);
        $signatureCheckBase64 = $this->base64UrlEncode($signatureCheck);

        if ($signature === $signatureCheckBase64 && $data['exp'] >= time()) {
            return $data['data'];
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
