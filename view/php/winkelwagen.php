<?php
$customCss = "<link rel='stylesheet' href='../../view/css/winkelwagen.css'>";
$customTitle = "Winkelwagen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/winkelwagen.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/winkelwagen.php");
$winkelwagen = new winkelwagen();
$cartprods = $winkelwagen->getshoppingcart();
$totalprice = 0;
if($cartprods == false){
    echo 'je winkelwagen is leeg';
}else{
    foreach ($cartprods as $prod){
        $product = explode(",", $prod);
        echo "<div class='cartitem'>
                        <div class='cartimagediv'><img src='".$product[0]."' class='img-responsive cartimage' style='width:100%' alt='Image' onerror='imgError(this);'></div>
                        <div class='carttitle'><h2>".$product[1]."</h2></div><div class='prodamount'><h4>Hoeveelheid: ".$product[2]."</h4></div><div class='productprijs'><h4>TotaalPrijs: €".$product[3]*$product[2]."<div class='singleprice'>Per artikel: €".$product[3]."</div></div></h4><button id='".$product[4]."' class='btn btn-primary deleteprod'>Delete</button>
                        <hr>
                   </div>";
        $totalprice += $product[3] *$product[2];
    }
}
?>
<form class="animated delay-05s fadeInUp" value="Bestel" action="javascript::" method="post">
    <div class="form-group">
        <div class="totalprice">Totaale prijs: €<?php echo $totalprice ?></div>
        <label for="orderdate">Ophaaldatum:</label>
        <input type="date"  class="form-control" id="orderdate">
    </div>
    <div class="form-group">
        <label for="locatie">Locatie</label>
        <select name="location" id="orderlocation">
            <option value="karspellaan">Karspellaan 21</option>
            <option value="flevostraat">Flevostraat 95</option>
            <option value="snavelkavel">Snavelkavel 34</option>
            <option value="berenspel">Berenspel 98</option>
        </select>

    </div>
    <button type="submit" class="btn btn-secondary bestelbtn">Bestel</button>
</form>
