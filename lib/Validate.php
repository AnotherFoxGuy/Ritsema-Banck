<?php
namespace RitsemaBanck;

class Validate
{
    private $errors = array();

    // returns either true of false based on a regular expression
    public function filter_length($string): bool
    {
        // a pattern which checks if the entire string is between 1 and 50 characters
        $pattern = "'^.{1,50}$'";
        if (preg_match($pattern, $string)) {
            return true;
        } else {
            array_push($this->errors, "Je invoer moet tussen de 0 en 50 karakters bevatten");
            return false;
        }
    }

    // returns either true of false based on a regular expression
    public function filter_characters($string): bool
    {
        // a patterns which checks if the entire string contains only lowercase- and uppercase characters, numbers between 0 and 9, and some other characters
        $pattern = "'^[a-zA-Z0-9.|_|-]{1,}$'";
        if (preg_match($pattern, $string)) {
            return true;
        } else {
            array_push($this->errors, "Je invoer mag geen special tekens bevatten");
            return false;
        }
    }

    // returns either true of false based on a regular expression
    public function filter_alphanumeric($string): bool
    {
        // a regular expression which checks the entire string for numbers
        $pattern = "'^[0-9]+$'";
        if (preg_match($pattern, $string)) {
            return true;
        } else {
            array_push($this->errors, "Je invoer mag alleen maar cijfers bevatten");
            return false;
        }
    }

    // returns true if the email is a valid email
    public function validate_email($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            array_push($this->errors, "Het ingevoerde e-mailadres is niet geldig");
            return false;
        }
    }

    public function validate_user($email, $password)
    {
        // check whether the email does exists in the database
        $database = new Database();
        $result = $database->select("SELECT email FROM `user` WHERE email = ?", array($email));
        if (!$database->empty($result)) {
            // checks if the query returns a row. Most likely it does, but it is a good practice to check for it
            $result = $database->select("SELECT password FROM `user` WHERE email = ?", array($email));
            if (!$database->empty($result)) {
                // fetches the hash from the database
                $hash = $database->fetch($result)["password"];
                // verifies that the password is equal to the decyphered hash
                if (password_verify("test", $hash)) {
                    return true;
                } else {
                    array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                    return false;
                }
            } else {
                array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
                return false;
            }
        } else {
            array_push($this->errors, "De combinatie tussen je gebruikersnaam en je wachtwoord is niet juist");
            return false;
        }
    }

    public function validate_code($code): bool
    {
        // selects the telephone number from the user
        $database = new Database();
        $rows = $database->select("SELECT tnumber FROM `user` WHERE tnumber = ?", array($code))->num_rows;

        // return true of false based on the given telephone number
        if ($rows == 1) {
            return true;
        } else {
            array_push($this->errors, "De code is niet juist");
            return false;
        }
    }

    // returns the errors as an array
    public function get_errors(): array
    {
        return $this->errors;
    }
}
