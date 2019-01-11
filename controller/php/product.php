<?php
require_once("../../model/php/core.php");
class product{

    function getproducts(){
        global $pdo;
        $productarray = [];
        $productquery = $pdo->prepare("SELECT * FROM producten");
        $productquery->execute();
        while($product = $productquery->fetch()){
            var_dump($product);

        }

    }

}