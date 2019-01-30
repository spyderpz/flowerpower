<?php
$customCss = "<link rel='stylesheet' href='../../view/css/addMedewerker.css'>";
$customTitle = "Medewerker toevoegen";
require_once("../../view/php/partials/_adminHeader.php");

$customScripts = "<script src='../../controller/js/addmedewerker.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");
require_once("../../controller/php/winkelwagen.php");
$winkelwagen = new winkelwagen();
$winkelwagen->getshoppingcart();
?>
