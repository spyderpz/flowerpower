<?php
require_once("../../view/php/menu.php");
require_once("../../controller/php/user.php");

if(isset($_POST['login'])){
    $user = new persoon();
    $test = $user->login($_POST['email'],$_POST['wachtwoord']);
    echo $test;
}


?>