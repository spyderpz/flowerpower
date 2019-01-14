<?php
  $customCss = "<link rel='stylesheet' href='../../view/css/login.css'>";
  $customTitle = "Login";
  require_once("../../view/php/partials/_adminHeader.php");
  require_once("../../view/php/partials/_menu.php");
?>
<div class="row login-wrapper">
  <div class="img-div col-9">
  </div>
  <div class="form-div col-3">
    <form value="login" action="index.php" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Voorbeeld@voorbeeld.com">
        <small id="emailHelp" class="form-text text-muted">We delen je email adress niet aan de russen.</small>
      </div>
      <div class="form-group">
        <label for="wachtwoord">Wachtwoord</label>
        <input type="password" class="form-control" id="wachtwoord" placeholder="******">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php
  $customScript = "";
  require_once("../../view/php/partials/_scripts.php");
?>
