<?php
$customCss = "<link rel='stylesheet' href='../../view/css/bestellingen.css'>";
$customTitle = "Bestellingen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/winkelwagen.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/bestellingen.php");
$userbestellingen = new bestellingen();
$bestellingen = $userbestellingen->getbestellingen($_SESSION['role']);
if($bestellingen == false){
    echo 'je hebt geen bestellingen';
}else{
    foreach ($bestellingen as $bestelling){

        echo "<div class='bestelling'>
              <div class='besteladdres'> Locatie: ".$bestelling['OphaalLocatie']." 	&nbsp</div><br><div class='besteldatum'>Ophaaldatum: ".$bestelling['Ophaaldatum']."&nbsp</div><div class='besteltotprijs'>   Bestellingprijs: €".$bestelling['Totprijs']."	&nbsp</div><div class='bestellingprod'><br><br>  Producten: <table><tr>
            <th>Productnaam</th>
            <th>Prijs</th>
          </tr>";
        foreach($bestelling['Producten'] as $product){
            echo "
          <tr>
            <td>".$product['productnaam']."</td>
            <td>€".$product['prijs']."</td>
          </tr>";

        }

        echo"</table></div>
               <hr>";
        if($_SESSION['role'] == 1 ||$_SESSION['role'] ==2) {
            echo '<button class="bestellingdone btn btn-primary">Afgerond</button>';
        }else{
        }

        echo"  </div>";
    }
}


?>