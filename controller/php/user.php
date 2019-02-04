<?php
require_once("../../model/php/core.php");
$user = new user();
if(isset($_POST['logout'])){
    if($_POST['logout'] == true){
        $_SESSION['loggedin'] = false;
        $user->logout();
        $_POST['logout'] = false;
    }
}

if(isset($_POST['register'])){
    if($_POST['register']){
        $res = $user->register($_POST['voornaam'],$_POST['achternaam'],$_POST['wachtwoord'],$_POST['wachtwoordcheck'],$_POST['email'],$_POST['geboortedatum'],$_POST['postcode'],$_POST['woonplaats'],$_POST['functie']);
        echo $res;
        $_POST['register'] = false;
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
                $_SESSION['userid'] = $userres['id'];
                return true;

            } else {
                return false;
            }
        } else {
            echo false;
        }
    }
    function register($voornaam, $achternaam, $wachtwoord,$wachtwoordcheck, $email,$geboortedatum, $postcode, $woonplaats,$rolid){
        global $pdo;
        if($wachtwoord == $wachtwoordcheck){
            $availabilityquery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email");
            $availabilityquery->execute(['email' => $email]);
            $userres = $availabilityquery->fetch();
            if ($userres) {
                return false;
            }else{
                $wachtwoord = hash('sha512',$wachtwoord);
                $newpersquery = $pdo->prepare("INSERT INTO personen(Voornaam,Achternaam,Wachtwoord,Email,Geboortedatum,Postcode,Woonplaats,RolId)VALUES (:Voornaam,:Achternaam,:Wachtwoord,:Email,:geboortedatum,:Postcode,:Woonplaats,:RolId)");
                $correct = $newpersquery->execute(['Voornaam' => $voornaam, 'Achternaam' => $achternaam, 'Wachtwoord' => $wachtwoord, 'Email' => $email, 'geboortedatum'=>$geboortedatum, 'Postcode' => $postcode, 'Woonplaats' => $woonplaats,'RolId' => $rolid]);
                return true;
            }
        }else{
            return false;
        }
    }
    function logout(){
        unset($_POST);
        $_SESSION['loggedin'] = false;
        session_start();
        session_destroy();
    }
    function addtoshoppingcart($item_id,$amount){
        if(!isset($_SESSION['shoppingcart'])){
            $_SESSION['shoppingcart'] = array();
        }
        array_push($_SESSION['shoppingcart'],''.$item_id.','.$amount);

    }
}