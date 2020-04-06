<?php

namespace RitsemaBanck;

class Cookie
{
    private $name;
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function create($value): void
    {
        $this->value = $value;
        setcookie($this->name, $this->value, time() + 86400, "/");
    }

    public function update(): void
    {
        $value = Token::decode($this->get_value());
        $value->timestamp = time();
        setcookie("token", Token::encode($value->username, $value->timestamp, $value->verified), time() + 86400, "/");
    }

    public function remove(): void
    {
        setcookie($this->name, "", time() - 3600, "/");
    }

    // returns the name of the cookie
    public function get_value(): string
    {
        return $_COOKIE[$this->name];
    }

    // checks whether the cookie exists or not
    public function does_cookie_exist(): bool
    {
        if (isset($_COOKIE[$this->name])) {
            return true;
        } else {
            return false;
        }
    }

    // determines if the token the cookie holds is still valid
    public function check_expiration_date($token): bool
    {

        // decodes the encoded token string to get the timestamp
        $timestamp = Token::decode($token)->timestamp;
        if (time() - $timestamp > 300) {
            return false;
        } else {
            return true;
        }
    }

    // checks if the token is verified
    public function verify($token): bool
    {

        // decodes the encoded token the cookie holds
        $decoded = Token::decode($token);
        if ($decoded->verified == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function validate_user($value)
    {
        // checks for the existance of the cookie
        if ($this->does_cookie_exist()) {

            // checks if the timestamp is still valid
            if ($this->check_expiration_date($value)) {

                // checks if the token is verified
                if ($this->verify($value)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
