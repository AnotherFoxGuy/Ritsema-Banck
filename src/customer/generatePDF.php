<?php

use RitsemaBanck\Cookie;
use RitsemaBanck\Database;
use RitsemaBanck\Token;
use RitsemaBanck\User;
use RitsemaBanck\PDF;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

if (!RitsemaBanck\CheckLogin::validate()) {
    header("Location: /customer");
}

$user = RitsemaBanck\CheckLogin::getUser();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFont("Arial", "I", 12);
$pdf->write(5, "Dit document bevat alle gegevens die wij van u hebben. Als u vragen heeft verwijzen wij naar ons privacystatement.\nMailen kan altijd naar info@ritsemabanck.frl.\n");
$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Naam\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->firstname . " " . $user->lastname . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Geslacht\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->gender . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Geboortedatum\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->birth_date . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Adres\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->street . " " . $user->house_number . " " . $user->addition . "\n");
$pdf->write(5, $user->postal_code . ", " . $user->residence . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "Telefoonnummer\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->phone_number . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "B", 12);
$pdf->write(5, "E-mailadres\n");
$pdf->setFont("Arial", "", 12);
$pdf->write(5, $user->email . "\n");

$pdf->Ln();

$pdf->setFont("Arial", "I", 12);
$pdf->write(5, "Voor meer informatie over onze gegevensverwerking verwijzen wij u graag door naar onze\n");

$pdf->SetFont("Arial", "U", 12);
$pdf->Cell(0, 4.3, "privacyverklaring.", "", "", "", false, "/privacyverklaring.php");
$pdf->Output();
