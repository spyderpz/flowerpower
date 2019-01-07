<?php
require_once("../../view/php/menu.php");
require_once("../../controller/php/user.php");

if(isset($_POST['email'])){
    echo "hoi";
    $user = new user();
    $test = $user->login($_POST['email'],$_POST['wachtwoord']);
    echo $test;
}

?>