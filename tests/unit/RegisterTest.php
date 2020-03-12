<?php

//    Scenario: Gebruiker registreert zich
//
//    Actions:
//    1) Gebruiker vult zijn voornaam, achternaam, geslacht, emailadres, wachtwoord en telefoonnummer in
//    2) Het systeem controleert dat alle verplichte invoervelden ingevuld zijn
//    3) Gebruiker bevestigt zijn email adres via een bevestigingsbericht
//    4) Het systeem maakt een account voor de gebruiker aan

//    Er wordt een account voor de gebruiker aangemaakt

class RegisterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testSomeFeature()
    {
       $res = $register->RegisterUser("voornaam",
           "achternaam",
           "geslacht",
           "emailadres",
           "wachtwoord",
           "telefoonnummer");

        $this->assertTrue($res);
    }
}