<?php
require_once("../../model/php/core.php");

class winkelwagen{

    function cancelorder($itemid){
        unset($_SESSION['shoppingcart'][$itemid]);
        $_SESSION['shoppingcart'] = array_values($_SESSION['shoppingcart']);
    }
    function confirmorder($ophaaldatum){
        global $pdo;
        if(isset($_SESSION['shoppingcart'])) {
            $persid = $_SESSION['userid'];
            $bestellingquery = $pdo->prepare("INSERT INTO bestellingen(PersoonId,Ophaaldatum,Totaalprijs)VALUES (:persid,:ophaaldatum,:totprice)");
            $succes = $bestellingquery->execute(['persid' => $persid, 'ophaaldatum' => $ophaaldatum, 'totprice' => 0]);
            $orderid = $pdo->lastInsertId();
            foreach ($_SESSION['shoppingcart'] as $cartitem) {
                $item = explode(",", $cartitem);
                $itemid = $item[0];
                $itemquant = $item[1];
                $bestellingquery = $pdo->prepare("INSERT INTO bestellingproducten(BestellingId,ProductId,Amount)VALUES (:orderid,:prodid, :amount)");
                $succes = $bestellingquery->execute(['orderid' => $orderid, 'prodid' => $itemid, 'amount' => $itemquant]);
            }
            unset($_SESSION['shoppingcart']);
            return true;
        }else{
            return false;
        }
    }
    function getshoppingcart(){
        global $pdo;
        if(isset($_SESSION['shoppingcart'])){
            $i = 0;

            if(isset($_SESSION['shoppingcart'][0])){
                foreach($_SESSION['shoppingcart'] as $cartitem){
                    $item = explode(",", $cartitem);
                    $itemid = $item[0];
                    $itemquant = $item[1];
                    $shoppingprodquery = $pdo->prepare("SELECT * FROM producten WHERE id = :prodid");
                    $shoppingprodquery->execute(['prodid' => $itemid]);
                    $shopcartres = $shoppingprodquery->fetch();
                    $shoppingcart[$i] = $shopcartres['Image'].','.$shopcartres['Productnaam'].','.$itemquant.','.$shopcartres['Prijs'].','.$i;
                    $i++;
                }
                return $shoppingcart;
            }else{
                return false;
            }


        }else{
            return false;
        }
    }

}