<?php

class winkelwagen{

    function cancelorder(){

    }

    function getshoppingcart(){
        global $pdo;
        if(isset($_SESSION['shoppingcart'])){
            $i = 0;
            foreach($_SESSION['shoppingcart'] as $cartitem){
                $item = explode(",", $cartitem);
                $itemid = $item[0];
                $itemquant = $item[1];
                $shoppingprodquery = $pdo->prepare("SELECT * FROM producten WHERE id = :prodid");
                $shoppingprodquery->execute(['prodid' => $itemid]);
                $shopcartres = $shoppingprodquery->fetch();
                $shoppingcart[$i] = $shopcartres['Image'].','.$shopcartres['Productnaam'].','.$itemquant.','.$shopcartres['Prijs'];
                $i++;
            }
            return $shoppingcart;

        }else{
            echo 'je winkelwagen is leeg';
        }
    }

}