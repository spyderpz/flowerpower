<?php
require_once("../../view/php/menu.php");

?>

<html>
<form value="login" action="index.php" method="post">
    E-mail:<br>
    <input type="text" name="email" placeholder="someone@something.com">
    <br>
    Wachtwoord:<br>
    <input type="text" name="wachtwoord" value="*********">
    <br><br>
    <input type="submit" value="Submit">
</form>
</html>
<?php


?>