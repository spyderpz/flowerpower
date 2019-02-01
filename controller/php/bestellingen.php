<?php
require_once("../../model/php/core.php");

class bestellingen{

    function getbestellingen($rol){
        global $pdo;
        if($rol == 1 || $rol == 2){
            $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen WHERE Ophaaldatum > CURRENT_DATE()");
            $bestellingquery->execute();
            $x = 0;
            while ($row = $bestellingquery->fetch()){
                $productinfo = $this->getbestellingprods($row['id']);
                $bestellingen[$x]['Ophaaldatum'] = $row['Ophaaldatum'];
                $bestellingen[$x]['OphaalLocatie'] = $row['OphaalLocatie'];
                $bestellingen[$x]['Totprijs'] = $row['Totaalprijs'];
                $i = 0;
                foreach($productinfo[$row['id']] as $product){
                    $bestellingen[$x]['Producten'][$i]['productnaam'] = $product['Productnaam'];
                    $bestellingen[$x]['Producten'][$i]['prijs'] = $product['Prijs'];
                    $i++;
                }
                $x++;
            }
            if(isset($bestellingen)){
                return $bestellingen;
            }else{
                return false;
            }
        }else{
            $userid = $_SESSION['userid'];
            $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen WHERE persoonid = :userid AND Ophaaldatum > CURRENT_DATE()");
            $bestellingquery->execute(['userid' => $userid]);
            $x = 0;
            while ($row = $bestellingquery->fetch()){
                $productinfo = $this->getbestellingprods($row['id']);
                $bestellingen[$x]['Ophaaldatum'] = $row['Ophaaldatum'];
                $bestellingen[$x]['OphaalLocatie'] = $row['OphaalLocatie'];
                $bestellingen[$x]['Totprijs'] = $row['Totaalprijs'];
                $i = 0;
                foreach($productinfo[$row['id']] as $product){
                    $bestellingen[$x]['Producten'][$i]['productnaam'] = $product['Productnaam'];
                    $bestellingen[$x]['Producten'][$i]['prijs'] = $product['Prijs'];
                    $i++;
                }
                $x++;
            }
            if(isset($bestellingen)){
                return $bestellingen;
            }else{
                return false;
            }
        }


    }
    function getbestellingprods($bestellingid){
        global $pdo;
        $bestelprodquery = $pdo->prepare("SELECT * FROM bestellingproducten WHERE BestellingId = :bestelid");
        $bestelprodquery->execute(['bestelid' => $bestellingid]);
        $y = 0;
        while ($row = $bestelprodquery->fetch()){
            $productinfoquery = $pdo->prepare("SELECT * FROM producten WHERE id = :prodid");
            $productinfoquery->execute(['prodid' => $row['ProductId']]);
            $productinfores = $productinfoquery->fetch();
            $bestellingen[$bestellingid][$y] = $productinfores;
                $y++;
        }


        return $bestellingen;
    }

}