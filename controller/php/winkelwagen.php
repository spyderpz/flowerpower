<?php
require_once("../../model/php/core.php");

class winkelwagen{

    function cancelorder($itemid){
        unset($_SESSION['shoppingcart'][$itemid]);
        $_SESSION['shoppingcart'] = array_values($_SESSION['shoppingcart']);
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