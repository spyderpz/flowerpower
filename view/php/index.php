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


<?php
  require_once("../../view/php/partials/_footer.php");
  $customScript = "";
  require_once("../../view/php/partials/_scripts.php");
?>
