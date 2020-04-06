<?php

namespace RitsemaBanck;

class EmailValidation
{
    private $email;

    public function setEmail($Email)
    {
        $this->email = trim($Email);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function validateEmail($Email)
    {
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return $this->setEmail(@$Email);
        }
    }
}
