<?php

namespace RitsemaBanck;

class WachtwoordValidation
{
    public $password;

    public function setPassword($pw)
    {
        $this->password = trim($pw);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function testLength($pw)
    {
        $count = strlen($pw);
        if ($count < 8) {
            return false;
        } else {
            $this->setPassword($pw);
        }
    }

    public function testUppercase($pw)
    {
        $uppercase = preg_match("@[A-Z]@", $pw);
        if ($uppercase) {
            $this->testLength($pw);
        } else {
            return false;
        }
    }

    public function testLowercase($pw)
    {
        $lowercase = preg_match("@[a-z]@", $pw);
        if ($lowercase) {
            $this->testUppercase($pw);
        } else {
            return false;
        }
    }

    public function testNumber($pw)
    {
        $Number = preg_match("@[0-9]@", $pw);
        if ($Number) {
            $this->testLowercase($pw);
        } else {
            return false;
        }
    }

    public function testSpecialCharacter($pw)
    {
        $SC = preg_match("@[^\w]@", $pw);
        if ($SC) {
            $this->testNumber($pw);
        } else {
            return false;
        }
    }
}
