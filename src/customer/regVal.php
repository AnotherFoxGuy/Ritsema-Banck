<?php

use RitsemaBanck\DatabaseValidation;
use RitsemaBanck\EmailValidation;
use RitsemaBanck\GeslachtValidation;
use RitsemaBanck\NaamValidation;
use RitsemaBanck\TelefoonValidation;
use RitsemaBanck\WachtwoordValidation;

require __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nameVal = new NaamValidation;
    $sexVal = new GeslachtValidation;
    $emailVal = new EmailValidation;
    $pasVal = new WachtwoordValidation;
    $db = new DatabaseValidation;
    $phoneVal = new TelefoonValidation;

    if ($_POST["firstName"] != '') {
        $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
    }
    if ($_POST["lastName"] != '') {
        $nameVal->checkOnlyLettersLastName($_POST["lastName"]);
    }

    if ($_POST["sex"] != '') {
        $sexVal->checkOnlyLettersSex($_POST["sex"]);
    }

    if ($_POST["email"] != '') {
        $emailVal->validateEmail($_POST["email"]);
    }

    if ($_POST["phoneNumber"] != '') {
        $phoneVal->valPhone($_POST["phoneNumber"]);
    }

    if ($_POST["password"] != '') {
        $pasVal->testSpecialCharacter($_POST["password"]);
    }

    $firstNameState = 'false';
    $lastNameState = 'false';
    $sexState = 'false';
    $emailState = 'false';
    $phoneState = 'false';
    $pasState = 'false';
    $pasReState = 'false';
    $emailDBState = 'false';

    if ($nameVal->getFirstName() == $_POST["firstName"] & $_POST["firstName"] != '') {
        $firstNameState = 'true';
    }
    if ($nameVal->getLastName() == $_POST["lastName"] & $_POST["lastName"] != '') {
        $lastNameState = 'true';
    }
    if ($sexVal->getSex() == $_POST["sex"] & $_POST["sex"] != '') {

        $sexState = 'true';
    }
    if ($emailVal->getEmail() == $_POST["email"] & $_POST["email"] != '') {
        $emailState = 'true';
    }
    if ($db->checkEmail(htmlspecialchars($_POST["email"]))) {
        $emailDBState = 'true';
    }
    if ($phoneVal->getPhone() == $_POST["phoneNumber"] & $_POST["phoneNumber"] != '') {
        $phoneState = 'true';
    }
    if ($pasVal->getPassword() == $_POST["password"] & $_POST["password"] != '') {
        $pasState = 'true';
    }
    if ($_POST["password"] == $_POST["passwordRepeat"] & $_POST["passwordRepeat"] != '') {
        $pasReState = 'true';
    }

    if ($firstNameState == 'true' & $lastNameState == 'true' & $sexState == 'true' & $emailState == 'true' & $pasState == 'true' & $pasReState == 'true' & $phoneState == 'true' & $emailDBState == 'true') {
        if ($db->insertIntoDB(htmlspecialchars($emailVal->getEmail()), htmlspecialchars($pasVal->getPassword()), "012346789", htmlspecialchars($nameVal->getFirstName()), htmlspecialchars($nameVal->getLastName()), htmlspecialchars($sexVal->getSex()), htmlspecialchars($phoneVal->getPhone())) == true) {
            header("location: /customer/login.php");
            exit();
        } else {
            echo "DB error";
        }
    } else {
        header("location: /customer/register.php?X=1&FNS=".$firstNameState."&FN=".$_POST["firstName"]."&LNS=".$lastNameState."&LN=".$_POST["lastName"]."&SS=".$sexState."&S=".$_POST["sex"]."&ES=".$emailState."&E=".$_POST["email"]."&PS=".$phoneState."&P=".$_POST["phoneNumber"]."&PWS=".$pasState."&PWRS=".$pasState."&EDBS=".$emailDBState);
        exit();
    }
}