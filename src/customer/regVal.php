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
    $phoneVal = new TelefoonValidation();

    $nameVal->checkOnlyLettersFirstName($_POST["firstName"]);
    $nameVal->checkOnlyLettersLastName($_POST["lastName"]);
    $sexVal->checkOnlyLettersSex($_POST["sex"]);
    $emailVal->validateEmail($_POST["email"]);
    $phoneVal->valPhone($_POST["phoneNumber"]);
    $pasVal->testSpecialCharacter($_POST["password"]);
    $firstNameState = 'false';
    $lastNameState = 'false';
    $sexState = 'false';
    $emailState = 'false';
    $phoneState = 'false';
    $pasState = 'false';
    $pasReState = 'false';
    if ($nameVal->getFirstName() == $_POST["firstName"]) {
        $firstNameState = 'true';
    }
    if ($nameVal->getLastName() == $_POST["lastName"]) {
        $lastNameState = 'true';
    }
    if ($sexVal->getSex() == $_POST["sex"]) {
        $sexState = 'true';
    }
    if ($emailVal->getEmail() == $_POST["email"]) {
        $emailState = 'true';
    }
    if ($phoneVal->getPhone() == $_POST["phoneNumber"]) {
        $phoneState = 'true';
    }
    if ($pasVal->getPassword() == $_POST["password"]) {
        $pasState = 'true';
    }
    if ($_POST["password"] == $_POST["passwordRepeat"]) {
        $pasReState = 'true';
    }
    if ($firstNameState == 'true' & $lastNameState == 'true' & $sexState == 'true' & $emailState == 'true' & $pasState == 'true' & $pasReState == 'true' & $phoneState == 'true') {
        if ($db->insertIntoDB($nameVal->getFullName(), htmlspecialchars($pasVal->getPassword()), $emailVal->getEmail(), "012346789", $nameVal->getFirstName(), $nameVal->getLastName(), $sexVal->getSex(), $phoneVal->getPhone()) == true) {
            header("location: /customer/login.php");
            exit();
        }
    } else {
        header("location: /customer/register.php?X=1&FNS=" . $firstNameState . "&FN=" . $_POST["firstName"] . "&LNS=" . $lastNameState . "&LN=" . $_POST["lastName"] . "&SS=" . $sexState . "&S=" . $_POST["sex"] . "&ES=" . $emailState . "&E=" . $_POST["email"] . "&PS=" . $phoneState . "&P=" . $_POST["phoneNumber"] . "&PWS=" . $pasState . "&PWRS=" . $pasState);
        exit();
    }
}
?>