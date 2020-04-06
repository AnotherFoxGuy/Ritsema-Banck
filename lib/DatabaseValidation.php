<?php

namespace RitsemaBanck;

use mysqli;

class DatabaseValidation
{
    public function insertIntoDB($user, $email, $password, $bsn, $firstName, $lastName, $gender, $tnumber)
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password, email, BSN, firstname, lastname, gender, tnumber) VALUES ('$user', '$hash', '$email', '$bsn', '$firstName', '$lastName', '$gender', '$tnumber')";

        if ($mysql->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }
}
