<?php
  $customCss = "<link rel='stylesheet' href='../../view/css/home.css'>";
  $customTitle = "Home";
  require_once("../../view/php/partials/_header.php");
  require_once("../../view/php/partials/_menu.php");
  require_once("../../controller/php/user.php");

  if(isset($_POST['email'])){
    echo "hoi";
    $user = new user();
    $test = $user->login($_POST['email'],$_POST['wachtwoord']);
    echo $test;
  }
?>

<div class="container">
  <div class="row">
    <div class="col-6 text-wrapper">
      <p>Welkom op de website van FlowerPower, wij verkopen bloemen die u kunt ophalen op bestelling. Sinds kort hebben wij een 4e locatie en wij vonden het tijd om een website op te richten. Wij doen niet aan bezorgen het enige dat wij doen is uw bestelling klaarmaken op locatie zodat u het gemakkelijk op kunt halen. Als u een account aanmaakt kunt u bloemen in uw winkelmand stoppen en een bestelling klaarmaken. </p>
    </div>
    <div class="col-6 img-wrapper animated slow fadeIn">
      <img src="../../model/img/locaties/winkel4.png" alt="Nieuwe locatie">
    </div>
  </div>
</div>

<?php
  require_once("../../view/php/partials/_footer.php");
  $customScript = "";
  require_once("../../view/php/partials/_scripts.php");
?>
