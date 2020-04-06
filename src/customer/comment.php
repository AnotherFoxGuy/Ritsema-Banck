<?php

use RitsemaBanck\ConnectDB;
use RitsemaBanck\Database;

require __DIR__ . '/../includes/navbar.php';
require __DIR__ . '/../../vendor/autoload.php';

if (!RitsemaBanck\CheckLogin::validate()) {
    header("Location: /customer/login.php");
}
$user = RitsemaBanck\CheckLogin::getUser();

//voorkomt SQL injection naar database
function ExtendedAddslash(&$params)
{
    foreach ($params as &$var) {
        is_array($var) ? ExtendedAddslash($var) : $var = addslashes($var);
    }
    //function for every POST variable.
    ExtendedAddslash($_POST);
}

// maakt verbinding met database
if (isset($_POST["message"])) {
    $message = $_POST["message"];


    $id = 1;
    $date = date("Y-m-d");
    $text = $message;
    $read = 0;
    $sender = $user->id;

    $conn = new ConnectDB();
    $connection = $conn->getConnection();

    $stmt = $connection->prepare("INSERT INTO `messages` (`date`, `text`, `read`, `sender`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $date, $text, $read, $sender);


    $stmt->execute();

    $stmt->close();
    ?>
    <div class="twelve wide container">
        <div class="ten wide container">
            <div class="padded row">
                <div class="twelve wide column">
                    <h1>Gelukt!</h1>
                    <span>Je bericht is succesvol verstuurd! Ga terug naar het overzicht.</span>
                </div>
            </div>
            <div class="row">
                <div class="three wide column">
                    <button class="ten wide blue button"><a href="/customer/index.php">Terug</a></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    exit();
}
?>

<form method="post" action="">
    <div class="row toppad">
        <div class="five wide centered container">
            <div class="ten wide container">
                <div class="row">
                    <h3>Plaats uw opmerking</h3>
                    <textarea id="message" name="message" placeholder="Typ hier uw bericht." rows="5"
                              cols="50"></textarea>
                </div>
                <div class="row">
                    <button class="twelve wide blue button">Verstuur</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php require __DIR__ . '/../includes/footer.php'; ?>
