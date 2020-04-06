<?php

use RitsemaBanck\Database;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/includes/navbar.php';

if(isset($_POST["firstname"])){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $database = new Database();
    $return = $database->insert("INSERT INTO `user` (`username`, `password`, `email`, `BSN`, `firstname`, `lastname`, `gender`, `tnumber`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);", array($firstname . " " . $lastname, $password, $email, 0, $firstname, $lastname, $sex, $phone));
    if($return == true){
        ?>
        <div class="twelve wide container">
            <div class="ten wide container">
                <div class="padded row">
                    <div class="twelve wide column">
                        <h1>Gelukt!</h1>
                        <span>Je hebt succesvol een gebruiker aan de database toegevoegd! Ga terug naar het overzicht om meer te doen.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="three wide column">
                        <button class="ten wide blue button"><a href="index.php">Terug</a></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    exit();
}
?>
<div class="ten wide container">
    <div class="padded row">
        <div class="six wide column">
            <div class="six wide column">
                <h3>Gebruiker verwijderen</h3>
                <button id="button_remove_user" class="twelve wide red button">Verwijder</button>

            </div>
        </div>
        <form method="post">
            <div class="six wide column">
                <div class="row">
                    <h3>Gebruiker toevoegen</h3>
                </div>
                <div class="row">
                    <label>Voornaam</label>
                    <input type="text" name="firstname">
                </div>
                <div class="row">
                    <label>Achternaam</label>
                    <input type="text" name="lastname">
                </div>
                <div class="row">
                    <label>Geslacht</label>
                    <select name="sex">
                        <option value="Man">Man</option>
                        <option value="Vrouw">Vrouw</option>
                    </select>
                </div>
                <div class="row">
                    <label>E-mailadres</label>
                    <input type="text" name="email">
                </div>
                <div class="row">
                    <label>Telefoonnummer</label>
                    <input type="text" name="phone">
                </div>
                <div class="row">
                    <label>Wachtwoord</label>
                    <input type="password" name="password">
                </div>
                <div class="row">
                    <button class="twelve wide blue button">Versturen</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="/js/popup/popup.js"></script>
<script src="/js/dashboard.js"></script>