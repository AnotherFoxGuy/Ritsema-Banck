<?php

use RitsemaBanck\Cookie;
use RitsemaBanck\Token;
use RitsemaBanck\Validate;

require __DIR__ . '/../../vendor/autoload.php';

if ((isset($_POST["email"])) && (isset($_POST["password"]))) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $validation = new Validate();

    if ($validation->filter_length($email)) {
        if ($validation->filter_length($password)) {
            if ($validation->filter_characters($password)) {
                if ($validation->validate_email($email)) {
                    if ($validation->validate_user($email, $password)) {
                        $cookie = new Cookie("token");
                        $cookie->create(Token::encode($email, time(), 0));
                        print("true");
                    } else {
                        print($validation->get_errors()[0]);
                    }
                } else {
                    print($validation->get_errors()[0]);
                }
            } else {
                print($validation->get_errors()[0]);
            }
        } else {
            print($validation->get_errors()[0]);
        }
    } else {
        print($validation->get_errors()[0]);
    }
}

if (isset($_POST["code"])) {
    $code = $_POST["code"];
    $validation = new Validate();
    if ($validation->filter_length($code)) {
        if ($validation->filter_characters($code)) {
            if ($validation->filter_alphanumeric($code)) {
                if ($validation->validate_code($code)) {
                    $cookie = new Cookie("token");
                    $token = $cookie->get_value();
                    $decoded = Token::decode($token);
                    $verified = Token::verify($decoded);
                    $decoded = Token::encode($verified->username, $verified->timestamp, $verified->verified);
                    $cookie->create($decoded);
                    print("true");
                } else {
                    print_r($validation->get_errors());
                }
            } else {
                print_r($validation->get_errors());
            }
        } else {
            print_r($validation->get_errors());
        }
    } else {
        print_r($validation->get_errors());
    }
}
