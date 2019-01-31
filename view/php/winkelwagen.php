<?php
$customCss = "<link rel='stylesheet' href='../../view/css/winkelwagen.css'>";
$customTitle = "Medewerker toevoegen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/winkelwagen.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/winkelwagen.php");
$winkelwagen = new winkelwagen();
$cartprods = $winkelwagen->getshoppingcart();
if($cartprods == false){
    echo 'je winkelwagen is leeg';
}else{
    foreach ($cartprods as $prod){
        $product = explode(",", $prod);
        echo "<div class='row cartitem'>
                        <div class='cartimage'><img src='".$product[0]."' class='img-responsive' style='width:100%' alt='Image' onerror='imgError(this);'></div>
                        <div class='carttitle'>".$product[1]."</div><div class='prodamount'>Hoeveelheid: ".$product[2]."</div><div class='productprijs'>TotaalPrijs:".$product[3]*$product[2]."<div class='singleprice'>Per artikel:".$product[3]."</div></div><button id='".$product[4]."' class='btn btn-primary deleteprod'>Delete</button>
                        <hr>
                   </div>";
    }
}
?>
<form class="animated delay-05s fadeInUp" value="Bestel" action="javascript::" method="post">
    <div class="form-group">
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
