<?php
require_once("../../model/php/core.php");
require('../../view/plugins/PDF/fpdf.php');


class PDF extends FPDF
{
// Page header
    function BasicTable($prodids){
        //Koptekst
        $header[0] = 'Productnaam';
        $header[1] = 'Prijs';
        $header[2] = 'Hoeveelheid';
        foreach($header as $col){
            $this->Cell(40,7,$col,1);
        }
        $this->Ln();
        //Gegevens
        foreach($prodids as $prodid) {
            $prodarr = getprodinfo($prodid);
            $this->Cell(40,6,$prodarr['Productnaam'],1);
            $this->Cell(40,6,$prodarr['Prijs'],1);
            $this->Cell(40,6,$prodarr['amount'],1);
            $this->Ln();
        }
    }
    function Header(){
        // Logo
        $this->Image('../../model/img/logo/logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Factuur',0,0,'C');
        $this->Cell(80);
        $this->SetFont('Arial','',12);

        $this->Cell(-30,10,'Factuur-nummer: '.$_SESSION['bestelnmr'],0,0,'C');

        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        $this->SetY(-100);
        $this->SetFont('Arial','',18);
        // Page number
        $this->Cell(0,10,'Totaalprijs :'.$_SESSION['totprijs'],0,0,'C');
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
//
if(isset($_SESSION['factuur'])){
    if($_SESSION['factuur']){
        $userarr = getuserinfo($_SESSION['bestelnmr']);

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',20);
        $pdf->Cell(0,10,'Klantnaam:  '.$userarr['voornaam'].' '.$userarr['achternaam'],0,1);
        $pdf->SetFont('Times','',18);
        $pdf->Cell(0,10,'Locatie:  '.$userarr['ophaallocatie'],0,1);
        $pdf->Cell(0,10,'Ophaaldatum:  '.$userarr['ophaaldatum'],0,1);

        $pdf->SetFont('Times','',12);
        $pdf->BasicTable($_SESSION['prodids']);


        $pdf->Output();
        $_SESSION['factuur'] = false;
    }else{
        echo 'cant acces this page';
    }
}else{
    echo 'cant aes this page';
}



function getuserinfo($bestelnmr){
    global $pdo;
    $userarr = [];
    $useridquery = $pdo->prepare("SELECT * FROM bestellingen WHERE id = :orderid");
    $useridquery->execute(['orderid' => $bestelnmr]);
    $useridres = $useridquery->fetch();
    if ($useridres) {
        $userquery = $pdo->prepare("SELECT Voornaam,Achternaam,Email FROM personen WHERE id = :userid");
        $userquery->execute(['userid' => $useridres['PersoonId']]);
        $userres = $userquery->fetch();
        if ($userres) {
            $userarr['voornaam'] = $userres['Voornaam'];
            $userarr['achternaam'] = $userres['Achternaam'];
            $userarr['email'] = $userres['Email'];
            $userarr['totprijs'] = $useridres['Totaalprijs'];
            $userarr['ophaaldatum'] = $useridres['Ophaaldatum'];
            $userarr['ophaallocatie'] = $useridres['OphaalLocatie'];
            return $userarr;
        } else {
            return false;
        }
    }else{
        return false;
    }
}
function getprodinfo($prodid){
    global $pdo;
    $prodquery = $pdo->prepare("SELECT * FROM producten WHERE id = :prodid");
    $prodquery->execute(['prodid' => $prodid]);
    $prodress = $prodquery->fetch();
    $amountquery = $pdo->prepare("SELECT * FROM bestellingproducten WHERE bestellingId = :bestelnmr AND ProductId =:prodid");
    $amountquery->execute([ 'bestelnmr' => $_SESSION['bestelnmr'],'prodid' => $prodid]);
    $amountress = $amountquery->fetch();
    $prodress['amount'] = $amountress['Amount'];
    return $prodress;
}
// Instanciation of inherited class

?>