<?php

class winkelwagen{

    function cancelorder(){

    }

    function getshoppingcart(){
        if(isset($_SESSION['shoppingcart'])){
            var_dump($_SESSION['shoppingcart']);

        }else{
            echo 'je winkelwagen is leeg';
        }
    }

}