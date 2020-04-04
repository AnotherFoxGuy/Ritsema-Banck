<?php

use RitsemaBanck\Cookie;
use RitsemaBanck\Database;
use RitsemaBanck\Token;
use RitsemaBanck\User;
use RitsemaBanck\PDF;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

$cookie = new Cookie("token");
if ($cookie->does_cookie_exist()) {
    if ($cookie->validate_user($_COOKIE["token"])) {
        $_SESSION["logged_in"] = true;
        $cookie->update();
        $database = new Database();
        $database->connect("localhost", "root", "", "ritsemabanck");
        $result = $database->fetch($database->select("SELECT * FROM user WHERE email = ?", array(Token::decode($cookie->get_value())->username)));

        $user = new User();
        $user->id = $result["id"];
        $user->firstname = $result["firstname"];
        $user->lastname = $result["lastname"];
        $user->gender = $result["gender"];
        $user->birth_date = $result["birth_date"];
        $user->residence = $result["residence"];
        $user->street = $result["street"];
        $user->house_number = $result["house_number"];
        $user->addition = $result["addition"];
        $user->postal_code = $result["postal_code"];
        $user->phone_number = $result["tnumber"];
        $user->email = $result["email"];

        $_SESSION["user"] = $user;
    } else {
        $_SESSION["logged_in"] = false;
        header("Location: /customer");
    }
} else {
    $_SESSION["logged_in"] = false;
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFont("Arial", "I", 12);
$pdf->write(5, "Dit document bevat alle gegevens die wij van u hebben. Als u vragen heeft verwijzen wij naar ons privacystatement.\nMailen kan altijd naar info@ritsemabanck.frl\n.");
$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Naam\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->firstname . " " . $_SESSION["user"]->lastname . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Geslacht\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->gender . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Geboortedatum\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->birth_date . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Adres\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->street . " " . $_SESSION["user"]->house_number . " " . $_SESSION["user"]->addition . "\n");
$pdf->write(5, $_SESSION["user"]->postal_code . ", " . $_SESSION["user"]->residence . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Telefoonnummer\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->phone_number . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "E-mailadres\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $_SESSION["user"]->email . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "I", 12);
$pdf->write(5, "Voor meer informatie over onze gegevensverwerking verwijzen wij u graag door naar onze\n");

$pdf->SetFont("Arial", "U", 12);
$pdf->Cell(0, 4.3, "privacyverklaring.", "", "", "", false, "http://localhost/temp/privacyverklaring.php");
$pdf->Output();
