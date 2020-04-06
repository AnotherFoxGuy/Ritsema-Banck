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
                    <input id="firstName" name="firstName" type="text" placeholder="Voer je voornaam in"
                           value="<?php if (isset($_GET['X'])) {
                               echo $_GET['FN'];
                           } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['FNS'] == 'false') {
                            echo 'first name state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="lastName">Achternaam</label>
                    <input id="lastName" name="lastName" type="text" placeholder="Voer je achternaam in"
                           value="<?php if (isset($_GET['X'])) {
                               echo $_GET['LN'];
                           } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['LNS'] == 'false') {
                            echo 'last name state';
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
                            echo 'sex state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="Voer je E-mail in"
                           value="<?php if (isset($_GET['X'])) {
                               echo $_GET['E'];
                           } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['ES'] == 'false') {
                            echo 'email state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="phoneNumber">Telefoon nummer</label>
                    <input id="phoneNumber" name="phoneNumber" type="number" placeholder="Voer je telefoon nummer in"
                           value="<?php if (isset($_GET['X'])) {
                               echo $_GET['P'];
                           } ?>">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PS'] == 'false') {
                            echo 'phone state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="password">Wachtwoord</label>
                    <input id="password" name="password" type="password" placeholder="Voer je wachtwoord in">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PWS'] == 'false') {
                            echo 'password state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="passwordRepeat">Herhaal wachtwoord</label>
                    <input id="passwordRepeat" name="passwordRepeat" type="password"
                           placeholder="Voer je wachtwoord opnieuw in">
                    <?php
                    if (isset($_GET['X'])) {
                        if ($_GET['PWRS'] == 'false') {
                            echo 'password re state';
                            echo '<br>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <button class="twelve wide blue button" id="submit">Versturen</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<script src="/js/popup/popup.js"></script>
<script src="/js/binding.js"></script>

<?php require('../includes/footer.php'); ?>
