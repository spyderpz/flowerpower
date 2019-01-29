<?php
$customCss = "<link rel='stylesheet' href='../../view/css/registreer.css'>";
$customTitle = "Registreer";
require_once("../../view/php/partials/_adminHeader.php");
$customScripts = "";
require_once("../../view/php/partials/_menu.php");
// vragen aan jarno of dit in een js file kan zoals login
if(isset($_POST['voornaam'])){
    require_once("../../controller/php/user.php");
    $user = new user();
    $test = $user->register($_POST['voornaam'],$_POST['achternaam'],$_POST['wachtwoord'],$_POST['wachtwoordcheck'],$_POST['email'],$_POST['geboortedatum'],$_POST["postcode"],$_POST['woonplaats'],'3');
    if($test){
        echo "<script>location.href='http://localhost/home/flowerpower/view/php/login.php';</script>";
    }else{
        echo "<script>alert('email already exists');</script>";

    }

}


?>
<div class="row login-wrapper">
    <div class="img-div col-9">
    </div>
    <div class="form-div col-3">
        <form class="animated delay-05s fadeInUp" value="register" action="?" method="post">
            <div class="form-group">
                <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" class="form-control" id="voornaam" aria-describedby="emailHelp" placeholder="harry">
            </div>

            <div class="form-group">
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" class="form-control" id="achternaam" aria-describedby="emailHelp" placeholder="bloemberg">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Voorbeeld@voorbeeld.com">
            </div>
            <div class="form-group">
                <label for="geboortedatum">Geboortedatum:</label>
                <input class="form-control" name="geboortedatum" type="date" value="2011-08-19" id="geboortedatum">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" class="form-control" id="postcode" placeholder="1234 AB">
            </div>
            <div class="form-group">
                <label for="woonplaats">Woonplaats:</label>
                <input type="text" name="woonplaats" class="form-control" id="woonplaats" placeholder="Boerengat">
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoord" placeholder="******">
            </div>

            <div class="form-group">
                <label for="wachtwoordCheck">Nog een keer wachtwoord:</label>
                <input type="password" name="wachtwoordcheck" class="form-control" id="wachtwoordCheck" placeholder="******">
            </div>
            <button type="submit" class="btn btn-secondary">Registreer</button>
        </form>
    </div>
</div>
