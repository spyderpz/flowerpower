<?php
require_once("../../model/php/core.php");

class admin extends medewerker {

    function getusers(){
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
    function setRole($user){

    }
}