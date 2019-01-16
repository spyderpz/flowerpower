<?php
$customCss = "<link rel='stylesheet' href='../../view/css/registreer.css'>";
$customTitle = "Registreer";
require_once("../../view/php/partials/_adminHeader.php");
require_once("../../view/php/partials/_menu.php");
?>
<div class="row login-wrapper">
    <div class="img-div col-9">
    </div>
    <div class="form-div col-3">
        <form class="animated delay-05s fadeInUp" value="register" action="login.php" method="post">
            <div class="form-group">
                <label for="voornaam">Voornaam:</label>
                <input type="text" class="form-control" id="voornaam" aria-describedby="emailHelp" placeholder="harry">
            </div>
            <div class="form-group">
                <label for="achternaam">Achternaam:</label>
                <input type="text" class="form-control" id="achternaam" aria-describedby="emailHelp" placeholder="bloemberg">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Voorbeeld@voorbeeld.com">
            </div>
            <div class="form-group">
                <label for="geboortedatum">Geboortedatum:</label>
                <input class="form-control" type="date" value="2011-08-19" id="geboortedatum">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input type="text" class="form-control" id="postcode" placeholder="******">
            </div>
            <div class="form-group">
                <label for="woonplaats">Woonplaats:</label>
                <input type="text" class="form-control" id="woonplaats" placeholder="******">
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" class="form-control" id="wachtwoord" placeholder="******">
            </div>
            <div class="form-group">
                <label for="wachtwoordCheck">Nog een keer wachtwoord:</label>
                <input type="password" class="form-control" id="wachtwoordCheck" placeholder="******">
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </div>
</div>

<?php
$customScript = "";
require_once("../../view/php/partials/_scripts.php");
?>
