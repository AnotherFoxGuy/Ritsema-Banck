<?php

use RitsemaBanck\Cookie;
use RitsemaBanck\Database;
use RitsemaBanck\Token;
use RitsemaBanck\User;

session_start();

require __DIR__ . '/../../vendor/autoload.php';

$cookie = new Cookie("token");
if ($cookie->does_cookie_exist()) {
    if ($cookie->validate_user($_COOKIE["token"])) {
        $_SESSION["logged_in"] = true;
        $database = new Database();
        $database->connect("ritsema-banck.frl", "root", "", "ritsemabanck");
        $cookie = new Cookie("token");
        $result = $database->fetch($database->select("SELECT * FROM User WHERE email = ?", array(Token::decode($cookie->get_value())->username)));

        $user = new User();
        $user->id = $result["id"];
        $user->firstname = $result["firstname"];
        $user->lastname = $result["lastname"];
        $user->gender = $result["gender"];
        $user->birth_date = $result["birth_date"];
        $user->residence = $result["residence"];
        $user->house_number = $result["house_number"];
        $user->addition = $result["addition"];
        $user->postal_code = $result["postal_code"];
        $user->phone_number = $result["tnumber"];
        $user->email = $result["email"];

        $_SESSION["user"] = $user;
    } else {
        $_SESSION["logged_in"] = false;
    }
} else {
    $_SESSION["logged_in"] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ritsema Banck</title>
    <link rel='icon' href='http://ritsema-banck.frl/img/ritsemabanck-favicon.png' type='image/x-icon'/>
    <link type="text/css" rel="stylesheet" href="http://ritsema-banck.frl/css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>
<div class="row nopad">
    <nav class="twelve wide centered container">
        <a href="/"><img class="navbar-logo" src="http://ritsema-banck.frl/img/Ritsema%20Banck%20logo.png"
                         alt="navbar logo"></a>

        <div class="navbar-menu-wrapper centered column">
            <span id="openNav">&#9776;</span>
        </div>

        <div id="mobileNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
            <div class="overlay-content">
                <a href="/">Home</a>
                <?php echo ($_SESSION["logged_in"] == false) ? '<a href="login.php">Inloggen</a>' : '<a href="overview.php">Overzicht</a>'; ?>
                <a href="QA.php">Veelgestelde vragen</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>

        <div class="nav-links">
            <ul>
                <li><a href="/">Home</a></li>
                <li><?php echo ($_SESSION["logged_in"] == false) ? '<a href="index.php">Inloggen</a>' : '<a href="overview.php">Overzicht</a>'; ?></li>
                <?php echo ($_SESSION["logged_in"] == true) ? '<li><a href="logout.php">Uitloggen</a></li>' : ''; ?>
                <li><a href="QA.php">Veelgestelde vragen</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
</div>
