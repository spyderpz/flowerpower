<?php
$customCss = "<link rel='stylesheet' href='../../view/css/addMedewerker.css'>";
$customTitle = "Medewerker toevoegen";
require_once("../../view/php/partials/_adminHeader.php");
$customScripts = "";
require_once("../../view/php/partials/_menu.php");

?>

<?php
require_once("../../model/php/core.php");
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
echo'
        <div class="row login-wrapper">
        <h2 class="title-page col-12">Medewerker toevoegen</h2>
        <div class="form-div col-4">
        <div class="border-box">
            <form class="" value="addmedewerker" action="?" method="post">
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
                    <label for="rol">Functie:</label>
                     <select name="rolId">
                      <option value="3">Klant</option>
                      <option value="2">Medewerker</option>
                      <option value="1">Admin</option>
                    </select>
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
                </div>
            </form>
            </div>
        </div>
        </div>';

    }else{
        echo 'you shall not pass';
    }
}else{
    echo 'YOU SHALL NOT PASS';
}
?>
