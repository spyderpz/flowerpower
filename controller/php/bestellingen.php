<?php
require_once("../../model/php/core.php");

class bestellingen{

    function getbestellingen($rol,$all){
        global $pdo;
        if($rol == 1 || $rol == 2){
            if($all){
                $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen");
                $bestellingquery->execute();
            }else{

                $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen WHERE Ophaaldatum > CURRENT_DATE() AND Status <= 2");
                $bestellingquery->execute();
            }


            $x = 0;
            while ($row = $bestellingquery->fetch()){
                $productinfo = $this->getbestellingprods($row['id']);
                $bestellingen[$x]['id'] = $row['id'];
                $bestellingen[$x]['Ophaaldatum'] = $row['Ophaaldatum'];
                $bestellingen[$x]['OphaalLocatie'] = $row['OphaalLocatie'];
                $bestellingen[$x]['Totprijs'] = $row['Totaalprijs'];
                $bestellingen[$x]['status'] = $row['Status'];
                $i = 0;
                foreach($productinfo[$row['id']] as $product){
                    $bestellingen[$x]['Producten'][$i]['productnaam'] = $product['Productnaam'];
                    $bestellingen[$x]['Producten'][$i]['prijs'] = $product['Prijs'];
                    $bestellingen[$x]['Producten'][$i]['hoeveelheid'] = $product['Amount'];

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
            if($all){
                $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen ");
                $bestellingquery->execute();
            }else{
                $bestellingquery = $pdo->prepare("SELECT * FROM bestellingen WHERE persoonid = :userid AND Ophaaldatum > CURRENT_DATE() AND Status <= 2");
                $bestellingquery->execute(['userid' => $userid]);
            }


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
                    $bestellingen[$x]['Producten'][$i]['hoeveelheid'] = $product['Amount'];

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
            $productinfores['Amount'] = $row['Amount'];
            $bestellingen[$bestellingid][$y] = $productinfores;
            $y++;
        }


        return $bestellingen;
    }

}