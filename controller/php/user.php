<?php
require_once("../../model/php/core.php");
if(isset($_POST['logout'])){
    if($_POST['logout'] == true){
        $_SESSION['loggedin'] = false;
        $user = new user();
        $user->logout();
        $_POST['logout'] = false;
    }
}
class user
{

    function login($email, $wachtwoord){
        global $pdo;
        $usernamequery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
        $usernamequery->execute(['email' => $email]);
        $userres = $usernamequery->fetch();
        if ($userres) {
            $wachtwoord = hash('sha512',$wachtwoord);
            $passquery = $pdo->prepare("SELECT * FROM personen WHERE Wachtwoord = :password AND Email = :email");
            $passquery->execute(['password' => $wachtwoord, 'email' => $email]);
            $userres = $passquery->fetch();
            if ($userres) {
                $_SESSION['loggedin'] = true;
                $_SESSION['role'] = $userres['RolId'];
                return true;

            } else {
                return false;
            }
        } else {
            echo false;
        }
    }
    function register($voornaam, $achternaam, $wachtwoord,$wachtwoordcheck, $email,$geboortedatum, $postcode, $woonplaats){
        global $pdo;
        if($wachtwoord == $wachtwoordcheck){
            $availabilityquery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
            $availabilityquery->execute(['email' => $email]);
            $userres = $availabilityquery->fetch();
            if ($userres) {
                return false;
            }else{
                $wachtwoord = hash('sha512',$wachtwoord);
                $newpersquery = $pdo->prepare("INSERT INTO personen(Voornaam,Achternaam,Wachtwoord,Email,Geboortedatum,Postcode,Woonplaats)VALUES (:Voornaam,:Achternaam,:Wachtwoord,:Email,:geboortedatum,:Postcode,:Woonplaats)");
                $correct = $newpersquery->execute(['Voornaam' => $voornaam, 'Achternaam' => $achternaam, 'Wachtwoord' => $wachtwoord, 'Email' => $email, 'geboortedatum'=>$geboortedatum, 'Postcode' => $postcode, 'Woonplaats' => $woonplaats]);
                return true;
            }
        }else{
            return false;
        }
    }
    function logout(){
        $_SESSION['loggedin'] = false;
        session_destroy();
        session_start();
    }

}