<?php
require_once("../../model/php/core.php");
class user{

    function login($email,$wachtwoord){
        global $pdo;
        $usernamequery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
        $usernamequery->execute(['email' => $email]);
        $userres = $usernamequery->fetch();
        if($userres){
            $passquery = $pdo->prepare("SELECT * FROM personen WHERE password = :password AND Email = :email");
            $passquery->execute(['password' => $wachtwoord,'email' => $email]);
            $userres = $passquery->fetch();
            if($userres){
                return true;
            }else{
                return false;
            }
        }else{
            echo false;
        }
    }
    function register($voornaam,$achternaam,$wachtwoord,$email,$postcode,$woonplaats){

    }
}