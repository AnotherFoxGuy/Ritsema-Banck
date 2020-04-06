<?php
require('../includes/navbar.php');
?>

<div class="five wide white rounded container">

    <div class="ten wide container">
        <div class="padded row">
            <div class="six wide centered column">
                <button class="ten wide blue inverted button"><a href="/customer/login.php">Inloggen</a></button>
            </div>
            <div class="six wide centered column">
                <button class="ten wide blue button">Registreren</button>
            </div>
        </div>
    </div>

    <div id="container" class="ten wide container">
        <form method="post" action="/customer/regVal.php">
            <div class="row">
                <div class="twelve wide column">
                    <label for="firstName">Voornaam</label>
                    <input title="Veld mag niet leeg zijn" id="firstName" name="firstName" type="text"
                           placeholder="Voer je voornaam in" value="<?php if (isset($_GET['X'])) {
                        echo $_GET['FN'];
                    } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['FNS'] == 'false') {
                            echo 'Hier mogen alleen letters in worden gevuld.';
                            echo '<br>';
                            echo 'Dit veld mag niet leeg zijn.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="lastName">Achternaam</label>
                    <input title="Veld mag niet leeg zijn" id="lastName" name="lastName" type="text"
                           placeholder="Voer je achternaam in" value="<?php if (isset($_GET['X'])) {
                        echo $_GET['LN'];
                    } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['LNS'] == 'false') {
                            echo 'Hier mogen alleen letters in worden gevuld.';
                            echo '<br>';
                            echo 'Dit veld mag niet leeg zijn.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="sex">Geslacht:</label>
                    <select id="sex" name="sex" value="<?php if (isset($_GET['X'])) {
                        echo $_GET['S'];
                    } ?>">
                        <option value="Man">Man</option>
                        <option value="Vrouw">Vrouw</option>
                        <option value="Anders">Anders</option>
                    </select>
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['SS'] == 'false') {
                            echo 'Het aanpassen van de html met het doel dit veld leeg te maken is niet toegestaan';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mail</label>
                    <input title="Veld mag niet leeg zijn" id="email" name="email" type="email"
                           placeholder="Voer je E-mail in" value="<?php if (isset($_GET['X'])) {
                        echo $_GET['E'];
                    } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['EDBS'] == 'false') {
                            echo 'Kies a.u.b. een ander email';
                            echo '<br>';
                        }
                    }
                    if (isset($_GET['X'])) {
                        if ($_GET['ES'] == 'false') {
                            echo 'Het door u ingevulde email is niet correct.';
                            echo '<br>';
                            echo 'Dit veld mag niet leeg zijn.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="phoneNumber">Telefoon nummer</label>
                    <input title="Veld mag niet leeg zijn" id="phoneNumber" name="phoneNumber" type="number"
                           placeholder="Voer je telefoon nummer in" value="<?php if (isset($_GET['X'])) {
                        echo $_GET['P'];
                    } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PS'] == 'false') {
                            echo 'Hier mogen alleen cijfers in worden gevuld.';
                            echo '<br>';
                            echo 'Dit veld mag niet leeg zijn.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="password">Wachtwoord</label>
                    <input title="Veld mag niet leeg zijn" id="password" name="password" type="password"
                           placeholder="Voer je wachtwoord in">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PWS'] == 'false') {
                            echo 'Uw wachtwoord moet minimaal 8 tekens lang zijn.';
                            echo '<br>';
                            echo 'Uw wachtwoord moet minimaal 1 hoofdletter bevatten.';
                            echo '<br>';
                            echo 'Uw wachtwoord moet minimaal 1 kleine letter bevatten.';
                            echo '<br>';
                            echo 'Uw wachtwoord moet minimaal 1 cijfer bevatten.';
                            echo '<br>';
                            echo 'Uw wachtwoord moet minimaal 1 speciaal teken bevatten.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="passwordRepeat">Herhaal wachtwoord</label>
                    <input title="Veld mag niet leeg zijn" id="passwordRepeat" name="passwordRepeat" type="password"
                           placeholder="Voer je wachtwoord opnieuw in">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PWRS'] == 'false') {
                            echo 'Het hier door u ingevoerde wachtwoord komt niet overeen met het andere wachtwoord.';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <button class="twelve wide blue button" id="submit">Versturen
                </div>
                </button>
            </div>
        </form>
    </div>
</div>

</div>
<script src="/js/popup/popup.js"></script>
<script src="/js/binding.js"></script>

<?php require('../includes/footer.php'); ?>
