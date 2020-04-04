<?php
require __DIR__ . '/../includes/navbar.php';
require __DIR__ . '/mortgagevalidations.php';
?>


<div class="row toppad">
    <div class="five wide centered container">
        <div class="ten wide container">
            <h3>Hypotheek berekenen</h3>
        </div>
    </div>
</div>

<div class="five wide white rounded container">
    <div class="ten wide container">
        <form method="post" action="<?php echo htmlspecialchars("/customer/mortgagevalidations.php");?>">

            <div class="row">
                <div class="twelve wide column">
                    <label for="name">Geboortedatum</label>
                    <?php if (isset($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];
    echo '<input id="birthdate" name="birthdate" type="text" placeholder="dd/mm/jjjj" value="'.$birthdate.'">';
} else {
    echo '<input id="birthdate" name="birthdate" type="text" placeholder="dd/mm/jjjj">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="gross_anual_income">Bruto jaarinkomen</label>
                    <?php if (isset($_GET['gross_anual_income'])) {
    $gross_anual_income = $_GET['gross_anual_income'];
    echo '<input id="gross_anual_income" name="gross_anual_income" type="text" placeholder="€" value="'.$gross_anual_income.'">';
} else {
    echo '<input id="gross_anual_income" name="gross_anual_income" type="text" placeholder="€">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="input_money">Eigen inbreng (als u geen eigen inbreng heeft vul hier dan 0 in)</label>
                    <?php if (isset($_GET['input_money'])) {
    $input_money = $_GET['input_money'];
    echo '<input id="input_money" name="input_money" type="text" placeholder="€" value="'.$input_money.'">';
} else {
    echo '<input id="input_money" name="input_money" type="text" placeholder="€">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="dept">Schulden (als u geen schulden heeft vul hier dan 0 in)</label>
                    <?php if (isset($_GET['dept'])) {
    $dept = $_GET['dept'];
    echo '<input id="dept" name="dept" type="text" placeholder="€" value="'.$dept.'">';
} else {
    echo '<input id="dept" name="dept" type="text" placeholder="€">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="purchase_price">Koopprijs</label>
                    <?php if (isset($_GET['purchase_price'])) {
    $purchase_price = $_GET['purchase_price'];
    echo '<input id="purchase_price" name="purchase_price" type="text" placeholder="€" value="'.$purchase_price.'">';
} else {
    echo '<input id="purchase_price" name="purchase_price" type="text" placeholder="€">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="email">E-mailadres</label>
                    <?php if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo '<input id="email" name="email" type="text" placeholder="Uw e-mailadres" value="'.$email.'">';
} else {
    echo '<input id="email" name="email" type="text" placeholder="Uw e-mailadres">';
}?>
                </div>
            </div>

            <div class="row">
                <div class="twelve wide column">
                    <label for="mortgage_duration">Hypotheek looptijd</label>
                    <?php if (isset($_GET['mortgage_duration'])) {
    $mortgage_duration = $_GET['mortgage_duration'];
    echo '<select id="mortgage_duration" name="mortgage_duration" type="text" placeholder="Selecteer..." value="'.$mortgage_duration.'">
                        <option value="5">5 jaar</option>
                        <option value="10">10 jaar</option>
                        <option value="15">15 jaar</option>
                        <option value="30">30 jaar</option>;
                        </select>';
} else {
    echo '<select id="mortgage_duration" name="mortgage_duration" type="text" placeholder="Selecteer...">
                        <option value="5">5 jaar</option>
                        <option value="10">10 jaar</option>
                        <option value="15">15 jaar</option>
                        <option value="30">30 jaar</option>
                        </select>';
}?>
                </div>
            </div>


            <div class="row">
                <div class="twelve wide column">
                    <button id="submit" type="submit" name="submit" value="submit" class="twelve wide blue button">Bereken</button>
                </div>
            </div>
        </form>

        <?php
        if (!isset($_GET['mortgagerequest'])) {
            print "";
        } else {
            $mortgageCheck = $_GET['mortgagerequest'];
            $errorboxStart = "<div class='row'><div class='twelve wide column'><p class='error'>";
            $errorboxEnd = "</p></div></div>";

            if ($mortgageCheck == 'empty') {
                echo
                    $errorboxStart . "U heeft niet alle velden ingevuld" . $errorboxEnd;
            } elseif ($mortgageCheck == 'invaliddate') {
                echo
                    $errorboxStart . "De datum is niet goed ingevuld. Het formaat is dd/mm/jjjj." . $errorboxEnd;
            } elseif ($mortgageCheck == 'invalidemail') {
                echo
                    $errorboxStart . "Het ingevulde e-mailadres is niet geldig" . $errorboxEnd;
            } elseif ($mortgageCheck == 'number') {
                echo
                    $errorboxStart . "Voer een bedrag in afgerond op hele euro's" . $errorboxEnd;
            }
        }
        ?>

    </div>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
