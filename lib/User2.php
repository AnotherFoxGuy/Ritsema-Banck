<?php

namespace classes;

class User2
{
    public $first_Name;
    public $last_name;

    public $sex;

    public $email;

    //beginning validations for name
    public function checkOnlyLettersFirstName($firstName)
    {
        $temp = str_split($firstName);
        $bool = true;
        while ($bool == true) {
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i] == "a") {
                    continue;
                }
                if ($temp[$i] == "b") {
                    continue;
                }
                if ($temp[$i] == "c") {
                    continue;
                }
                if ($temp[$i] == "d") {
                    continue;
                }
                if ($temp[$i] == "e") {
                    continue;
                }
                if ($temp[$i] == "f") {
                    continue;
                }
                if ($temp[$i] == "g") {
                    continue;
                }
                if ($temp[$i] == "h") {
                    continue;
                }
                if ($temp[$i] == "i") {
                    continue;
                }
                if ($temp[$i] == "j") {
                    continue;
                }
                if ($temp[$i] == "k") {
                    continue;
                }
                if ($temp[$i] == "l") {
                    continue;
                }
                if ($temp[$i] == "m") {
                    continue;
                }
                if ($temp[$i] == "n") {
                    continue;
                }
                if ($temp[$i] == "o") {
                    continue;
                }
                if ($temp[$i] == "p") {
                    continue;
                }
                if ($temp[$i] == "q") {
                    continue;
                }
                if ($temp[$i] == "r") {
                    continue;
                }
                if ($temp[$i] == "s") {
                    continue;
                }
                if ($temp[$i] == "t") {
                    continue;
                }
                if ($temp[$i] == "u") {
                    continue;
                }
                if ($temp[$i] == "v") {
                    continue;
                }
                if ($temp[$i] == "w") {
                    continue;
                }
                if ($temp[$i] == "x") {
                    continue;
                }
                if ($temp[$i] == "y") {
                    continue;
                }
                if ($temp[$i] == "z") {
                    continue;
                }
                if ($i == 0) {
                    if ($temp[$i] == "A") {
                        continue;
                    }
                    if ($temp[$i] == "B") {
                        continue;
                    }
                    if ($temp[$i] == "C") {
                        continue;
                    }
                    if ($temp[$i] == "D") {
                        continue;
                    }
                    if ($temp[$i] == "E") {
                        continue;
                    }
                    if ($temp[$i] == "F") {
                        continue;
                    }
                    if ($temp[$i] == "G") {
                        continue;
                    }
                    if ($temp[$i] == "H") {
                        continue;
                    }
                    if ($temp[$i] == "I") {
                        continue;
                    }
                    if ($temp[$i] == "J") {
                        continue;
                    }
                    if ($temp[$i] == "K") {
                        continue;
                    }
                    if ($temp[$i] == "L") {
                        continue;
                    }
                    if ($temp[$i] == "M") {
                        continue;
                    }
                    if ($temp[$i] == "N") {
                        continue;
                    }
                    if ($temp[$i] == "O") {
                        continue;
                    }
                    if ($temp[$i] == "P") {
                        continue;
                    }
                    if ($temp[$i] == "Q") {
                        continue;
                    }
                    if ($temp[$i] == "R") {
                        continue;
                    }
                    if ($temp[$i] == "S") {
                        continue;
                    }
                    if ($temp[$i] == "T") {
                        continue;
                    }
                    if ($temp[$i] == "U") {
                        continue;
                    }
                    if ($temp[$i] == "V") {
                        continue;
                    }
                    if ($temp[$i] == "W") {
                        continue;
                    }
                    if ($temp[$i] == "X") {
                        continue;
                    }
                    if ($temp[$i] == "Y") {
                        continue;
                    }
                    if ($temp[$i] == "Z") {
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
                if ($temp[$i] == "a") {
                    continue;
                }
                if ($temp[$i] == "b") {
                    continue;
                }
                if ($temp[$i] == "c") {
                    continue;
                }
                if ($temp[$i] == "d") {
                    continue;
                }
                if ($temp[$i] == "e") {
                    continue;
                }
                if ($temp[$i] == "f") {
                    continue;
                }
                if ($temp[$i] == "g") {
                    continue;
                }
                if ($temp[$i] == "h") {
                    continue;
                }
                if ($temp[$i] == "i") {
                    continue;
                }
                if ($temp[$i] == "j") {
                    continue;
                }
                if ($temp[$i] == "k") {
                    continue;
                }
                if ($temp[$i] == "l") {
                    continue;
                }
                if ($temp[$i] == "m") {
                    continue;
                }
                if ($temp[$i] == "n") {
                    continue;
                }
                if ($temp[$i] == "o") {
                    continue;
                }
                if ($temp[$i] == "p") {
                    continue;
                }
                if ($temp[$i] == "q") {
                    continue;
                }
                if ($temp[$i] == "r") {
                    continue;
                }
                if ($temp[$i] == "s") {
                    continue;
                }
                if ($temp[$i] == "t") {
                    continue;
                }
                if ($temp[$i] == "u") {
                    continue;
                }
                if ($temp[$i] == "v") {
                    continue;
                }
                if ($temp[$i] == "w") {
                    continue;
                }
                if ($temp[$i] == "x") {
                    continue;
                }
                if ($temp[$i] == "y") {
                    continue;
                }
                if ($temp[$i] == "z") {
                    continue;
                }
                if ($i == 0) {
                    if ($temp[$i] == "A") {
                        continue;
                    }
                    if ($temp[$i] == "B") {
                        continue;
                    }
                    if ($temp[$i] == "C") {
                        continue;
                    }
                    if ($temp[$i] == "D") {
                        continue;
                    }
                    if ($temp[$i] == "E") {
                        continue;
                    }
                    if ($temp[$i] == "F") {
                        continue;
                    }
                    if ($temp[$i] == "G") {
                        continue;
                    }
                    if ($temp[$i] == "H") {
                        continue;
                    }
                    if ($temp[$i] == "I") {
                        continue;
                    }
                    if ($temp[$i] == "J") {
                        continue;
                    }
                    if ($temp[$i] == "K") {
                        continue;
                    }
                    if ($temp[$i] == "L") {
                        continue;
                    }
                    if ($temp[$i] == "M") {
                        continue;
                    }
                    if ($temp[$i] == "N") {
                        continue;
                    }
                    if ($temp[$i] == "O") {
                        continue;
                    }
                    if ($temp[$i] == "P") {
                        continue;
                    }
                    if ($temp[$i] == "Q") {
                        continue;
                    }
                    if ($temp[$i] == "R") {
                        continue;
                    }
                    if ($temp[$i] == "S") {
                        continue;
                    }
                    if ($temp[$i] == "T") {
                        continue;
                    }
                    if ($temp[$i] == "U") {
                        continue;
                    }
                    if ($temp[$i] == "V") {
                        continue;
                    }
                    if ($temp[$i] == "W") {
                        continue;
                    }
                    if ($temp[$i] == "X") {
                        continue;
                    }
                    if ($temp[$i] == "Y") {
                        continue;
                    }
                    if ($temp[$i] == "Z") {
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
    //end validation for name


    //beginning validation for sex
    public function setSex($Sex)
    {
        $this->sex = trim($Sex);
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function checkOnlyLettersSex($Sex)
    {
        $temp = str_split($Sex);
        $bool = true;
        while ($bool == true) {
            for ($i = 0; $i < count($temp); $i++) {
                if ($temp[$i] == "a") {
                    continue;
                }
                if ($temp[$i] == "b") {
                    continue;
                }
                if ($temp[$i] == "c") {
                    continue;
                }
                if ($temp[$i] == "d") {
                    continue;
                }
                if ($temp[$i] == "e") {
                    continue;
                }
                if ($temp[$i] == "f") {
                    continue;
                }
                if ($temp[$i] == "g") {
                    continue;
                }
                if ($temp[$i] == "h") {
                    continue;
                }
                if ($temp[$i] == "i") {
                    continue;
                }
                if ($temp[$i] == "j") {
                    continue;
                }
                if ($temp[$i] == "k") {
                    continue;
                }
                if ($temp[$i] == "l") {
                    continue;
                }
                if ($temp[$i] == "m") {
                    continue;
                }
                if ($temp[$i] == "n") {
                    continue;
                }
                if ($temp[$i] == "o") {
                    continue;
                }
                if ($temp[$i] == "p") {
                    continue;
                }
                if ($temp[$i] == "q") {
                    continue;
                }
                if ($temp[$i] == "r") {
                    continue;
                }
                if ($temp[$i] == "s") {
                    continue;
                }
                if ($temp[$i] == "t") {
                    continue;
                }
                if ($temp[$i] == "u") {
                    continue;
                }
                if ($temp[$i] == "v") {
                    continue;
                }
                if ($temp[$i] == "w") {
                    continue;
                }
                if ($temp[$i] == "x") {
                    continue;
                }
                if ($temp[$i] == "y") {
                    continue;
                }
                if ($temp[$i] == "z") {
                    continue;
                }
                if ($i == 0) {
                    if ($temp[$i] == "A") {
                        continue;
                    }
                    if ($temp[$i] == "B") {
                        continue;
                    }
                    if ($temp[$i] == "C") {
                        continue;
                    }
                    if ($temp[$i] == "D") {
                        continue;
                    }
                    if ($temp[$i] == "E") {
                        continue;
                    }
                    if ($temp[$i] == "F") {
                        continue;
                    }
                    if ($temp[$i] == "G") {
                        continue;
                    }
                    if ($temp[$i] == "H") {
                        continue;
                    }
                    if ($temp[$i] == "I") {
                        continue;
                    }
                    if ($temp[$i] == "J") {
                        continue;
                    }
                    if ($temp[$i] == "K") {
                        continue;
                    }
                    if ($temp[$i] == "L") {
                        continue;
                    }
                    if ($temp[$i] == "M") {
                        continue;
                    }
                    if ($temp[$i] == "N") {
                        continue;
                    }
                    if ($temp[$i] == "O") {
                        continue;
                    }
                    if ($temp[$i] == "P") {
                        continue;
                    }
                    if ($temp[$i] == "Q") {
                        continue;
                    }
                    if ($temp[$i] == "R") {
                        continue;
                    }
                    if ($temp[$i] == "S") {
                        continue;
                    }
                    if ($temp[$i] == "T") {
                        continue;
                    }
                    if ($temp[$i] == "U") {
                        continue;
                    }
                    if ($temp[$i] == "V") {
                        continue;
                    }
                    if ($temp[$i] == "W") {
                        continue;
                    }
                    if ($temp[$i] == "X") {
                        continue;
                    }
                    if ($temp[$i] == "Y") {
                        continue;
                    }
                    if ($temp[$i] == "Z") {
                        continue;
                    }
                }
                return false;
                $bool = false;
            }
            $this->setSex($Sex);
            $bool = false;
        }
    }
    //end validation sex

    //beginning validation email
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
            return true;
        }
    }
}
