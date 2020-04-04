<?php
require __DIR__ . '/includes/navbar.php';
require __DIR__ . '/contactvalidations.php';

?>

<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Contactformulier</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post"
              action="<?php echo htmlspecialchars("/contactvalidations.php"); ?>">
            <div class="row">
                <div class="twelve wide column">
                    <label for="name">Naam</label>
                    <?php if (isset($_GET['name'])) {
                        $name = $_GET['name'];
                        echo '<input id="name" name="name" type="text" placeholder="Uw naam" value="' . $name . '">';
                    } else {
                        echo '<input id="name" name="name" type="text" placeholder="Uw naam">';
                    } ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mailadres</label>
                    <?php if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo '<input id="email" name="email" type="text" placeholder="Uw email adres" value="' . $email . '">';
                    } else {
                        echo '<input id="email" name="email" type="text" placeholder="Uw email adres">';
                    } ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="message">Bericht</label>
                    <?php if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo '<textarea id="message" name="message" type="text" placeholder="Typ hier uw bericht.." rows="5" cols="30">' . $message . '</textarea>';
                    } else {
                        echo '<textarea id="message" name="message" type="text" placeholder="Typ hier uw bericht.." rows="5" cols="30"></textarea>';
                    } ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <button id="submit" type="submit" name="submit" value="submit" class="twelve wide blue button">
                        Versturen
                    </button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_GET['contact'])) {
            $contactCheck = $_GET['contact'];
            $errorboxStart = "<div class='row'><div class='twelve wide column'><p class='error'>";
            $errorboxEnd = "</p></div></div>";

            if ($contactCheck == 'empty') {
                echo
                    $errorboxStart . "You did not fill in all the fields" . $errorboxEnd;
            } elseif ($contactCheck == 'char') {
                echo
                    $errorboxStart . "You used invalid characters" . $errorboxEnd;
            } elseif ($contactCheck == 'invalidemail') {
                echo
                    $errorboxStart . "The e-mail you have used is invalid" . $errorboxEnd;
            }
        }
        ?>

    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
