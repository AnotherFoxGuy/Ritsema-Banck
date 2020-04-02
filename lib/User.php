<?php

namespace RitsemaBanck;
class User
{
    public $id;
    public $firstname;
    public $lastname;
    public $gender;
    public $birth_date;
    public $residence;
    public $street;
    public $house_number;
    public $addition;
    public $postal_code;
    public $phone_number;
    public $email;

    public function update_phone_number($email, $phone_number): bool
    {
        $database = new Database();
        $database->connect("localhost", "root", "", "ritsemabanck");

        if ($database->update("UPDATE User SET tnumber = ? WHERE email = ?", array($phone_number, $email))) {
            return true;
        } else {
            return false;
        }
    }

    public function update_email($email, $value): bool
    {
        $database = new Database();
        $database->connect("localhost", "root", "", "ritsemabanck");

        if ($database->update("UPDATE User SET email = ? WHERE email = ?", array($value, $email))) {
            return true;
        } else {
            return false;
        }
    }


}