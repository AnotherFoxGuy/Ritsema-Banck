<?php

namespace RitsemaBanck;

class NaamValidation
{
    private $first_Name;
    private $last_name;

    public function checkOnlyLettersFirstName($firstName)
    {
        $temp = str_split($firstName);
        $bool = true;
        while ($bool == true) {
            for ($i = 0; $i < count($temp); $i++) {
                if (preg_match("@[a-z]@", $temp[$i])) {
                    continue;
                }
                if ($i == 0) {
                    if (preg_match("@[A-Z]@", $temp[$i])) {
                        continue;
                    }
                }
                return false;
                $bool = false;
            }
            $this->setFirstName($firstName);
            $bool = false;
        }
    }

    public function checkOnlyLettersLastName($lastName)
    {
        $temp = str_split($lastName);
        $bool = true;
        while ($bool == true) {
            for ($i = 0; $i < count($temp); $i++) {
                if (preg_match("@[a-z]@", $temp[$i])) {
                    continue;
                }
                if ($i == 0) {
                    if (preg_match("@[A-Z]@", $temp[$i])) {
                        continue;
                    }
                }
                return false;
                $bool = false;
            }
            $this->setLastName($lastName);
            $bool = false;
        }
    }

    public function setFirstName($firstName)
    {
        $this->first_Name = trim($firstName);
    }

    public function getFirstName()
    {
        return $this->first_Name;
    }

    public function setLastName($lastName)
    {
        $this->last_name = trim($lastName);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFullName()
    {
        return $this->first_Name . " " . $this->last_name;
    }
}
