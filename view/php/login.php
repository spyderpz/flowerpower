<?php
$customCss = "<link rel='stylesheet' href='../../view/css/login.css'>";
$customTitle = "Login";
require_once("../../view/php/partials/_adminHeader.php");
$customScripts = "";
require_once("../../view/php/partials/_menu.php");
//dit doen we nu hier met posts maar zou ook met js kunnen als jarno dit gebruikt voor de parsly;
if(isset($_POST['email'])){
    require_once("../../controller/php/user.php");
    $user = new user();
    $loggedsucces = $user->login($_POST['email'],$_POST['wachtwoord']);
    if($loggedsucces){
        echo "<script>location.href='../../view/php/index.php';</script>";
    }

}
?>
<div class="row login-wrapper">
    <div class="img-div col-9">
    </div>
    <div class="form-div col-3">
        <form class="animated delay-05s fadeInUp" value="login" action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Voorbeeld@voorbeeld.com">
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoord" placeholder="******">
            </div>
            <button type="submit" class="btn btn-secondary">Login</button>
            <small id="emailHelp" class="form-text text-muted">Heb je nog geen account? <a href="register.php">Klik hier.</a>  </small>
        </form>
    </div>
</div>
