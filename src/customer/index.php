<?php

use RitsemaBanck\Cookie;
use RitsemaBanck\Database;
use RitsemaBanck\Session;
use RitsemaBanck\Token;
use RitsemaBanck\User;

require __DIR__ . '/../../vendor/autoload.php';

if (!RitsemaBanck\CheckLogin::validate()) {
    header("Location: /customer/login.php");
}

$user = RitsemaBanck\CheckLogin::getUser();

$database = new Database();
$database->connect("ritsema-banck.frl", "root", "", "ritsemabanck");

require __DIR__ . '/../includes/navbar.php';

?>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Persoonlijke gegevens</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="twelve wide container">
        <form method="post" action=
        <div class="row">
            <div class="twelve wide column">
                <label for="name">Naam :</label>
                <?php
                print_r($user->firstname);
                ?>
            </div>

            <div class="twelve wide column">
                <label for="name">Geslacht :</label>
                <?php
                print_r($user->gender);
                ?>

            </div>

            <div class="twelve wide column">
                <label for="name">Geboortedatum :</label>
                <?php
                print_r($user->birth_date);
                ?>
            </div>

            <div class="twelve wide column">
                <label for="name">Woonplaats :</label>
                <?php
                print_r($user->residence);
                ?>
                <img id="residence"
                     data-popup='{"title" : "Verander je woonplaats", "inputs" : [{"description" : "Woonplaats", "name" : "residence", "id" : "residence"}], "button" : { "label" : "Verstuur", "id" : "button_change_residence" }}'
                     src="../img/pen.png">
            </div>
        </form>
    </div>
</div>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Contactgegevens</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post" action=
        <div class="row">

            <div class="twelve wide column">
                <label for="name">Telefoonnummer :</label>
                <?php
                print_r($user->phone_number);
                ?>

                <img id="phone_number"
                     data-popup='{"title" : "Verander je telefoonnummer", "inputs" : [{"description" : "Telefoonnummer", "name" : "phone_number", "id" : "input_phone_number"}], "button" : { "label" : "Verstuur", "id" : "button_change_phone_number" }}'
                     src="/img/pen.png">

                <div class="twelve wide column">
                    <label for="name">Email :</label>
                    <?php
                    print_r($user->email);
                    ?>
                    <img id="email" src="/img/pen.png"
                         data-popup='{"title" : "Verander je e-mailadres", "inputs" : [{"description" : "E-mailadres", "name" : "email_address", "id" : "input_email_adress"}], "button" : {"label" : "Verstuur", "id" : "button_change_email"}}\'>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Uw hypotheekaanvragen</h3>
            <div class="row">
                <div class="twelve wide column">
                    <label for="hypotheeken"> Hypotheken : </label>
                    <?php
                    $result = $database->select("SELECT * FROM `hypotheeken` WHERE user = ?", array($user->id));
                    $hypotheek = $database->fetch($result);
                    print($hypotheek['date'] . ' , Laatst bijgewerkt :' . $hypotheek['last_update'] . ' , Status : ' . $hypotheek['status']);
                    ?>

                    <div class="row"></div>

                    <div class="six wide column">
                        <button class="twelve wide blue button"><a href="/customer/comment.php">Opmerking plaatsen</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="six wide column">
                    <button class="twelve wide blue button">
                        <a href="/customer/generatePDF.php">Exporteer naar PDF</a>
                    </button>
                </div>
                <div class="six wide column">
                    <button class="twelve wide blue button">
                        <a href="/customer/MortgageRequest.php">Vraag hypotheek aan</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require __DIR__ . '/../includes/footer.php'; ?>
