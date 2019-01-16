<?php
require_once("../../model/php/core.php");
class user
{

    function login($email, $wachtwoord)
    {
        global $pdo;
        $usernamequery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
        $usernamequery->execute(['email' => $email]);
        $userres = $usernamequery->fetch();
        if ($userres) {
            $passquery = $pdo->prepare("SELECT * FROM personen WHERE Wachtwoord = :password AND Email = :email");
            $passquery->execute(['password' => $wachtwoord, 'email' => $email]);
            $userres = $passquery->fetch();
            if ($userres) {
                return true;
            } else {
                return false;
            }
        } else {
            echo false;
        }
    }
    function register($voornaam, $achternaam, $wachtwoord, $email,$geboortedatum, $postcode, $woonplaats){
        global $pdo;
        $availabilityquery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
        $availabilityquery->execute(['email' => $email]);
        $userres = $availabilityquery->fetch();
        if ($userres) {
            return false;
        }else{
            $newpersquery = $pdo->prepare("INSERT INTO personen(Voornaam,Achternaam,Wachtwoord,Email,Geboortedatum,Postcode,Woonplaats)VALUES (:Voornaam,:Achternaam,:Wachtwoord,:Email,:geboortedatum,:Postcode,:Woonplaats)");
            $correct = $newpersquery->execute(['Voornaam' => $voornaam, 'Achternaam' => $achternaam, 'Wachtwoord' => $wachtwoord, 'Email' => $email, 'geboortedatum'=>$geboortedatum, 'Postcode' => $postcode, 'Woonplaats' => $woonplaats]);
            return true;
        }
    }
}