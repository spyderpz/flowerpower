<?php
require_once("../../model/php/core.php");

if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
        echo "<div class='container'>
            <div class='col-sm-4 product-wrapper'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>Producttitle:<textarea id='addproducttitle' rows='1' cols='30'></textarea></div>
                    <div class='panel-body'>image link:<textarea id='addproductimage' rows='1' cols='30'></textarea></div>
                    <div class='panel-footer'>Productbeshrijving:<textarea id='addproductdesc' rows='1' cols='30'></textarea></div>
                </div>
            </div>
        </div>";
    }else{
        echo 'you shall not pass';
    }
}else{
    echo 'YOU SHALL NOT PASS';
}
