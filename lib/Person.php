<?php

namespace RitsemaBanck;

class Person
{
    public $first_name = "Julian";
    public $last_name = "Hulzebosch";
    public $Full_Name = "Julian Hulzebosch";
    public $Gender = "Male";
    public $Born_age = "1997";
    public $Telephone = "06-21173334";
    public $Email = "julian-hulzebosch@live.nl";

    //validations for user
    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getFullName(){
        return $this->Full_Name;
    }

    public function getGender(){
        return $this->Gender;
    }

    public function getBornAge(){
        return $this->Born_age;
    }

    public function  getTelephone(){
        return $this->Telephone;
    }

    public function getEmail(){
        return $this->Email;
    }
}

