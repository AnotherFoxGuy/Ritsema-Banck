<?php
//    Scenario: Gebruiker registreert zich
//
//    Actions:
//    1) Gebruiker vult zijn voornaam, achternaam, geslacht, emailadres, wachtwoord en telefoonnummer in
//    2) Het systeem controleert dat alle verplichte invoervelden ingevuld zijn
//    3) Gebruiker bevestigt zijn email adres via een bevestigingsbericht
//    4) Het systeem maakt een account voor de gebruiker aan
//
//
//
//    Er wordt een account voor de gebruiker aangemaakt


class RegisterCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->fillField('voornaam', 'davert');
        $I->fillField('achternaam', 'davert');
        $I->selectOption('.geslacht','man');
        $I->fillField('emailadres', 'davert@test.com');
        $I->fillField('wachtwoord', 'qwerty');
        $I->fillField('wachtwoordb', 'qwerty');
        $I->fillField('telefoonnummer', '0612345688');
        $I->click('register');
        $I->see('Welcome, Davert!');
    }

    // tests
    public function WrongNumber(AcceptanceTester $I)
    {
        $I->fillField('telefoonnummer', 'dsbvhjsdjhgfsdhvgf');
        $I->seeElement('.error');
    }
}
