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
        $res = $cart->confirmorder($_POST['ophaaldatum'],$_POST['ophaallocatie']);
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
        if(isset($_SESSION['userid'])){
            $res = $user->addtoshoppingcart($_POST['prodid'],$_POST['amount']);
            echo true;
        }else{
            echo false;
        }

        $_POST['addtocart'] = false;

    }
}
if(isset($_POST['getbestelling'])){
    if($_POST['getbestelling']){
        require_once("../../controller/php/bestellingen.php");
        $bestelling = new bestellingen();
        if(isset($_SESSION['userid'])){
            $res = $bestelling->getbestellingen($_SESSION['role'],false);
            echo true;
        }else{
            echo false;
        }

        $_POST['getbestelling'] = false;

    }
}
if(isset($_POST['allorder'])){
    if($_POST['allorder']){
        require_once("../../controller/php/bestellingen.php");
        $bestelling = new bestellingen();
        if(isset($_SESSION['userid'])){
            $res = $bestelling->getbestellingen($_SESSION['role'],true);
            echo true;
        }else{
            echo false;
        }

        $_POST['allorder'] = false;

    }
}
if(isset($_POST['bestellingmade'])){
    if($_POST['bestellingmade']){
        bestellingstatus();
        $_POST['bestellingmade'] = false;

    }
}
if(isset($_POST['bestellingdone'])){
    if($_POST['bestellingdone']){
        bestellingstatus();
        $_POST['bestellingdone'] = false;
    }
}
function bestellingstatus(){
    require_once("../../controller/php/user.php");
    require_once("../../controller/php/medewerker.php");
    $medewerker = new medewerker();
    if(isset($_SESSION['userid'])){
        $res = $medewerker->SetOrderStatus($_SESSION['userid'],$_POST['orderid'],$_POST['status']);
        echo true;
    }else{
        echo false;
    }


}
