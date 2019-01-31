<?php
require_once("../../model/php/core.php");
if(isset($_POST['update'])){
    if($_POST['update']){
        require_once("../../controller/php/user.php");
        require_once("../../controller/php/medewerker.php");
        require_once("../../controller/php/admin.php");
        $admin = new admin;
        $res = $admin->update($_POST['userid'],$_POST['voornaam'],$_POST['achternaam'],$_POST['email'],$_POST['geboortedatum'],$_POST['postcode'],$_POST['woonplaats'],$_POST['functie']);
        $_POST['update'] = false;
    }
}
if(isset($_POST['delete'])){
    if($_POST['delete']){
        require_once("../../controller/php/user.php");
        require_once("../../controller/php/medewerker.php");
        require_once("../../controller/php/admin.php");
        $admin = new admin();
        $res = $admin->delete($_POST['userid']);
        $_POST['delete'] = false;
    }
}
if(isset($_POST['cancelorder'])){
    if($_POST['cancelorder']){
        require_once("../../controller/php/winkelwagen.php");
        $cart = new winkelwagen();
        $res = $cart->cancelorder($_POST['itemid']);
        $_POST['cancelorder'] = false;
    }
}
if(isset($_POST['bestel'])){
    if($_POST['bestel']){
        require_once("../../controller/php/winkelwagen.php");
        $cart = new winkelwagen();
        $res = $cart->confirmorder($_POST['ophaaldatum']);
        if($res){
            echo true;
        }else{
            echo false;
        }
        $_POST['bestel'] = false;
    }
}
if(isset($_POST['addtocart'])){
    if($_POST['addtocart']){
        require_once("../../controller/php/user.php");
        $user = new user();
        $res = $user->addtoshoppingcart($_POST['prodid'],$_POST['amount']);
        var_dump($res);
        $_POST['addtocart'] = false;
    }
}
