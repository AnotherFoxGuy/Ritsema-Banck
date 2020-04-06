<?php

namespace RitsemaBanck;

use mysqli;

class DatabaseValidation
{
    public function insertIntoDB($email, $password, $bsn, $firstName, $lastName, $gender, $tnumber)
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password, email, BSN, firstname, lastname, gender, tnumber) VALUES ('$email', '$hash', '$email', '$bsn', '$firstName', '$lastName', '$gender', '$tnumber')";

        if ($mysql->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($email)
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();
        $sql = "SELECT `email` FROM `user` WHERE `email`='$email'";
        if ($mysql->query($sql)->num_rows === 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
