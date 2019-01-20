<?php
require_once("../../model/php/core.php");
class product{

    function getproducts()
    {
        global $pdo;
        $productarray = [];
        $productquery = $pdo->prepare("SELECT * FROM producten");
        $productquery->execute();
        $i = 0;
        while ($product = $productquery->fetch()) {
            $productarray[$i] = $product;
            $i++;
        }
        return($productarray);
    }
    function setproduct(){
        global $pdo;

    }


}