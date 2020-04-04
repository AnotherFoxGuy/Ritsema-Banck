<?php


namespace RitsemaBanck;


class CheckLogin
{
    static function validate()
    {
        $cookie = new Cookie("token");
        if ($cookie->does_cookie_exist()) {
            if ($cookie->validate_user($_COOKIE["token"])) {
                $_SESSION["logged_in"] = true;
                $database = new Database();
                $database->connect("ritsema-banck.frl", "root", "", "ritsemabanck");

                return true;
            }
        }
        return false;
    }

    static function getUser()
    {
        $cookie = new Cookie("token");
        $database = new Database();
        $database->connect("ritsema-banck.frl", "root", "", "ritsemabanck");
        $result = $database->fetch($database->select("SELECT * FROM user WHERE email = ?", array(Token::decode($cookie->get_value())->username)));

        $user = new User();
        $user->id = $result["id"];
        $user->firstname = $result["firstname"];
        $user->lastname = $result["lastname"];
        $user->gender = $result["gender"];
        $user->birth_date = $result["birth_date"];
        $user->residence = $result["residence"];
        $user->house_number = $result["house_number"];
        $user->addition = $result["addition"];
        $user->postal_code = $result["postal_code"];
        $user->phone_number = $result["tnumber"];
        $user->email = $result["email"];

        return $user;
    }
}