<?php
require_once("../../model/php/core.php");
require_once("../../view/php/partials/_scripts.php");
require_once("../../controller/php/user.php");
require_once("../../controller/php/gebruiker.php");

?>
<script src="../../controller/js/logout.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Flower Power</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="producten.php">Producten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="winkelwagen.php">Winkelwagen</a>
        </li>
<!--           logged in check -->
          <?php
          if(isset($_SESSION['loggedin'])) {
              if ($_SESSION['role'] == 1 ) {
                  require_once("../../controller/php/medewerker.php");
                  require_once("../../controller/php/admin.php");
                  $user = new admin();

                  echo "<li class='nav-item'>
                       <a class='nav-link' href='addproduct.php'>Product toevoegen</a>
                   </li>";
                  echo "<li class='nav-item'>
                       <a class='nav-link' href='addmedewerker.php'>Mederwerker toevoegen</a>
                   </li>";
                  echo "<li class='nav-item'>
                       <a class='nav-link' href='bestellingen.php'>Bestellingen</a>
                   </li>";
              } elseif ($_SESSION['role'] == 2) {
                  require_once("../../controller/php/medewerker.php");
                  $user = new medewerker();
                  echo "<li class='nav-item'>
                       <a class='nav-link' href='addproduct.php'>Product toevoegen</a>
                   </li>";
                  echo "<li class='nav-item'>
                       <a class='nav-link' href='bestellingen.php'>Bestellingen</a>
                   </li>";
              } else{
              }
              if ($_SESSION['loggedin']) {
                  echo "<li class='nav-item'>
                       <a class='nav-link logout' href='javascript:;'>Logout</a>
                   </li>";
              } else {
                  echo "<li class='nav-item'>
                       <a class='nav-link' href='login.php'>Login</a>
                   </li>";
              }
          }else{
              echo "<li class='nav-item'>
                       <a class='nav-link' href='login.php'>Login</a>
                   </li>";
          }
          ?>
      </ul>
    </span>
    </div>
</nav>
