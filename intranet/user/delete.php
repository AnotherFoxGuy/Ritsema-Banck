<?php

use RitsemaBanck\Database;
use RitsemaBanck\Validate;

require __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $validation = new Validate();
    if ($validation->filter_length($email)) {
        if ($validation->filter_characters($email)) {
            if ($validation->validate_email($email)) {
                if ($validation->does_user_exist_in_database($email)) {
                    $database = new Database();
                    $result = $database->delete("DELETE FROM user WHERE email = ?", array($email));
                    if ($result == true) {
                        print("true");
                    } else {
                        print("false");
                    }
                } else {
                    print(json_encode($validation->get_errors()[0]));
                }
            } else {
                print(json_encode($validation->get_errors()[0]));
            }
        } else {
            print(json_encode($validation->get_errors()[0]));
        }
    } else {
        print(json_encode($validation->get_errors()[0]));
    }
}
?>