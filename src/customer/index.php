<?php require __DIR__ . '/../includes/navbar.php'; ?>

    <div class="five wide white rounded container">

        <div class="ten wide container">
            <div class="padded row">
                <div class="six wide centered column">
                    <button class="ten wide blue button">Inloggen</button>
                </div>
                <div class="six wide centered column">
                    <button class="ten wide blue inverted button"><a href="/customer/register.php">Registreren</a>
                    </button>
                </div>
            </div>
        </div>

        <div id="container" class="ten wide container">
            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mailadres</label>
                    <input id="email" name="email" type="email" placeholder="Voer je e-mail in">
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="password">Wachtwoord</label>
                    <input id="password" name="password" type="password"
                           placeholder="Voer je wachtwoord in">
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <button class="twelve wide blue button" id="submit">Inloggen</button>
                </div>

            </div>
        </div>
    </div>

    <script src="/js/popup/popup.js"></script>
    <script src="/js/binding.js"></script>

<?php require __DIR__ . '/../includes/footer.php'; ?>
