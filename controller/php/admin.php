<?php
require_once("../../model/php/core.php");

class admin extends medewerker{

    function getusers()
    {
        global $pdo;
        $passquery = $pdo->prepare("SELECT * FROM personen");
        $passquery->execute();
        $userres = $passquery->fetchAll(PDO::FETCH_ASSOC);
        if ($userres) {
            return $userres;
        } else {
            return false;
        }

    }


    function update($persid,$voornaam, $achternaam, $email,$geboortedatum, $postcode, $woonplaats,$rolid){
        global $pdo;
        $availabilityquery = $pdo->prepare("SELECT Email FROM personen WHERE Email = :email AND id != :persid");
        $availabilityquery->execute(['email' => $email, 'persid' => $persid]);
        $userres = $availabilityquery->fetch();
        if ($userres) {
            return false;
        }else{
            $newpersquery = $pdo->prepare("UPDATE personen SET Voornaam = :Voornaam,Achternaam = :Achternaam,Email = :Email,Geboortedatum = :geboortedatum,Postcode = :Postcode,Woonplaats = :Woonplaats,RolId = :RolId WHERE id = :persid");
            $correct = $newpersquery->execute(['Voornaam' => $voornaam, 'Achternaam' => $achternaam, 'Email' => $email, 'geboortedatum'=>$geboortedatum, 'Postcode' => $postcode, 'Woonplaats' => $woonplaats,'RolId' => $rolid,'persid'=>$persid]);
            return true;
        }

    }
    function delete($persid){
        global $pdo;

        $deletequery = $pdo->prepare("DELETE FROM personen WHERE id=:persid");
        $deletequery->execute(['persid' => $persid]);
        echo "Record deleted successfully";
    }



}