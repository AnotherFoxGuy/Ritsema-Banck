<?php
require('../includes/navbar.php');
?>

    <div class="five wide white rounded container">

        <div class="ten wide container">
            <div class="padded row">
                <div class="six wide centered column">
                    <button class="ten wide blue inverted button"><a href="/customer">Inloggen</a></button>
                </div>
                <div class="six wide centered column">
                    <button class="ten wide blue button">Registreren</button>
                </div>
            </div>
        </div>

        <div id="container" class="ten wide container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="twelve wide column">
                        <label for="firstName">Voornaam</label>
                        <input id="firstName" name="email" type="text" placeholder="Voer je voornaam in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="lastName">Achternaam</label>
                        <input id="lastName" name="lastName" type="text" placeholder="Voer je achternaam in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="sex">Geslacht:</label>
                        <select id="sex" name="sex">
                            <option value="Man">Man</option>
                            <option value="Vrouw">Vrouw</option>
                            <option value="Anders">Anders</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="Voer je E-mail in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="phoneNumber">Telefoon nummer</label>
                        <input id="phoneNumber" name="phoneNumber" type="number"
                               placeholder="Voer je telefoon nummer in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="password">Wachtwoord</label>
                        <input id="password" name="password" type="password" placeholder="Voer je wachtwoord in">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve wide column">
                        <label for="passwordRepeat">Herhaal wachtwoord</label>
                        <input id="passwordRepeat" name="passwordRepeat" type="password"
                               placeholder="Voer je wachtwoord opnieuw in">
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