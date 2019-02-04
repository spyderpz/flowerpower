<?php
$customCss = "<link rel='stylesheet' href='../../view/css/bestellingen.css'>";
$customTitle = "Bestellingen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/bestellingen.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/bestellingen.php");
$userbestellingen = new bestellingen();
if($_SESSION['role'] == 1 ||$_SESSION['role'] ==2) {
    if (isset($_POST['allorder'])) {
        $bestellingen = $userbestellingen->getbestellingen($_SESSION['role'], true);
    } else {
        $bestellingen = $userbestellingen->getbestellingen($_SESSION['role'], false);
    }
}
if($bestellingen == false){
    echo "<div class='container'><div class='' style='margin-top: 4%; margin-bottom: 4%;'>je hebt geen bestellingen";
}else{
    foreach ($bestellingen as $bestelling){
        echo "<div class='container'><div class='' style='margin-top: 4%; margin-bottom: 4%;'><div class='bestelling' id='bestelling".$bestelling['id']."'>
              <div class='besteladdres'> Locatie: ".$bestelling['OphaalLocatie']." 	&nbsp</div><br><div class='besteldatum'>Ophaaldatum: ".$bestelling['Ophaaldatum']."&nbsp</div><div class='besteltotprijs'>   Bestellingprijs: €".$bestelling['Totprijs']."	&nbsp</div><div class='bestellingprod'><br><br>  Producten: <table border='1' class='prodtable'><tr>
            <th>Productnaam</th>
            <th>Prijs</th>
            <th>Hoeveelheid</th>
          </tr>";
        foreach($bestelling['Producten'] as $product){
            echo "
          <tr>
            <td id='".$product['prodid']."' class='".$bestelling['id']."productnaam'>".$product['productnaam']."</td>
            <td>€".$product['prijs']."</td>
            <td>".$product['hoeveelheid']."</td>
          </tr>";

        }

        echo"</table></div>
               <hr>";
        echo '<button id="'.$bestelling['id'].'" class="factuur'.$bestelling['id'].' factuur btn btn-primary">Factuur</button>';
        if($_SESSION['role'] == 1 ||$_SESSION['role'] ==2) {
            if($bestelling['status'] == 1){
                echo '<button id="'.$bestelling['id'].'" class="bestellingmade made'.$bestelling['id'].' btn btn-primary">Gemaakt</button>';
            }else if($bestelling['status'] == 2){
                echo '<button id="'.$bestelling['id'].'" class="bestellingdone done'.$bestelling['id'].' btn btn-primary">Opgehaald</button>';
            }
        }else{
        }

        echo"  </div>";
    }
    if($_SESSION['role'] == 1 ||$_SESSION['role'] ==2) {
        echo "<button class='allorders btn btn-primary' style='margin-top:2%;'>Alle bestellingen</button></div></div>";
    }
}


?>
