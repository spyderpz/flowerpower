<?php
$customCss = "<link rel='stylesheet' href='../../view/css/winkelwagen.css'>";
$customTitle = "Medewerker toevoegen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/addmedewerker.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/winkelwagen.php");
$winkelwagen = new winkelwagen();
$cartprods = $winkelwagen->getshoppingcart();
foreach ($cartprods as $prod){
    $product = explode(",", $prod);
    echo "<div class='row cartitem'>
                    
                        <div class='cartimage'><img src='".$product[0]."' class='img-responsive' style='width:100%' alt='Image' onerror='imgError(this);'></div>
                        <div class='carttitle'>".$product[1]."</div><div class='prodamount'>Hoeveelheid: <input type='number' value='".$product[2]."' min='1' max='100'></div><div class='productprijs'>Prijs:".$product[3]*$product[2]."</div>
                        <hr>
                   </div>";
}

?>
