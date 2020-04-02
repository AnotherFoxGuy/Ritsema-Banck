<?php

namespace RitsemaBanck;

class Token
{
    private $username;
    private $password;
    private $time_stamp;
    private $verified;

    private $token;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->time_stamp = time();
        $this->verified = 0;
        $this->encode();
    }

    public static function encode($username, $time_stamp, $verified): string
    {
        $key = "2344df98df76df5dfdf54534534v";

        // encodes the header and the payload to a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode(['username' => $username, 'timestamp' => $time_stamp, 'verified' => $verified]);

        // creates a base64 string
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // it somehow works
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($base64UrlPayload, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);

        // signs the signature
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'fkdj54jgj!$&dfj', true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        return $base64UrlHeader . "." . $ciphertext . "." . $base64UrlSignature;
    }

    public static function decode($token): models\Token
    {
        $key = "2344df98df76df5dfdf54534534v";

        // splits the encoded JWT token in the header, payload and signature. Gets the payload
        $encoded = explode('.', $token)[1];

        // somehow decyphers the encoded payload
        $c = base64_decode($encoded);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

        if (hash_equals($hmac, $calcmac)) {
            // decodes the decyphered string to a JSON string
            $replaced = str_replace(['-', '_', ''], ['+', '/', '='], $original_plaintext);
            $base64 = base64_decode($replaced);
            $json = json_decode($base64);

            $json = json_decode($base64);

            // converts the JSON string to a Tok object
            $token = new models\Token();
            $token->username = $json->username;
            $token->timestamp = $json->timestamp;
            $token->verified = $json->verified;

            return $token;
        } else {
            return new models\Token();
        }
    }

    // signs a Tok object
    public static function verify($token): models\Token
    {
        $token->verified = 1;
        return $token;
    }
}
