<?php

session_start();

require __DIR__ . '/../../vendor/autoload.php';

RitsemaBanck\CheckLogin::validate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ritsema Banck</title>
    <link rel='icon' href='/img/ritsemabanck-favicon.png' type='image/x-icon'/>
    <link type="text/css" rel="stylesheet" href="/css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>
<div class="row nopad">
    <nav class="twelve wide centered container">
        <a href="/"><img class="navbar-logo" src="/img/Ritsema%20Banck%20logo.png"
                         alt="navbar logo"></a>

        <div class="navbar-menu-wrapper centered column">
            <span id="openNav">&#9776;</span>
        </div>

        <div id="mobileNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
            <div class="overlay-content">
                <a href="/">Home</a>
                <a href="/QA.php">Veelgestelde vragen</a>
                <a href="/contact.php">Contact</a>
                <?php echo ($_SESSION["logged_in"] == false) ? '<a href="/customer">Inloggen</a>' : '<a href="/customer/overview.php">Overzicht</a>'; ?>
            </div>
        </div>

        <div class="nav-links">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/QA.php">Veelgestelde vragen</a></li>
                <li><a href="/contact.php">Contact</a></li>
                <li><?php echo ($_SESSION["logged_in"] == false) ? '<a href="/customer">Inloggen</a>' : '<a href="/customer/overview.php">Overzicht</a>'; ?></li>
                <?php echo ($_SESSION["logged_in"] == true) ? '<li><a href="/customer/logout.php">Uitloggen</a></li>' : ''; ?>
            </ul>
        </div>
    </nav>
</div>
