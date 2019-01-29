<?php
require_once("../../model/php/core.php");
if(isset($_POST['update'])){
    if($_POST['update']){
        require_once("../../controller/php/user.php");
        require_once("../../controller/php/medewerker.php");
        require_once("../../controller/php/admin.php");
        $admin = new admin;
        $res = $admin->update($_POST['userid'],$_POST['voornaam'],$_POST['achternaam'],$_POST['email'],$_POST['geboortedatum'],$_POST['postcode'],$_POST['woonplaats'],$_POST['functie']);
        var_dump($res);
        $_POST['update'] = false;
    }
}
