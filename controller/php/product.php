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
    function setproduct($productnaam,$omschrijving,$image,$prijs){
        global $pdo;

        $productnamequery = $pdo->prepare("SELECT * FROM producten WHERE Productnaam = :productnaam");
        $productnamequery->execute(["productnaam" => $productnaam]);
        if($productnamequery->fetch()){
            $setproductquery = $pdo->prepare("INSERT INTO producten(Productnaam,Omschrijving,Image,Prijs)VALUES (:productnaam,:omschrijving,:image,:prijs)");
            $succestest = $setproductquery->execute(['productnaam' => $productnaam, 'omschrijving' => $omschrijving, 'image' => $image, 'prijs' => $prijs]);
            return true;
        }else{
            return false;
        }
    }


}