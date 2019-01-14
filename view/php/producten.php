<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../../view/css/main.css">
    <link rel="stylesheet" href="../../view/css/producten.css">
    <title>Flower Power | Producten</title>
  </head>
  <body>
    <?php
    require_once("../../view/php/partials/_menu.php");
    require_once ("../../controller/php/product.php");
    require_once("../../view/php/partials/_header.php");
    $product = new product();
    $product->getproducts();

    ?>

  <div class="container">

    <div class="row">

      <div class='col-sm-4 product-wrapper'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>Mooi bloempje</div>
          <div class='panel-body'><img src='../../model/img/bloemen/roze.jpg' class='img-responsive' style='width:100%' alt='Image'></div>
          <hr>
          <div class='panel-footer'>een heel mooi bloemje koop heb maar</div>
        </div>
      </div>



    </div>
  </div>

  <?php
  require_once("../../view/php/partials/_footer.php");
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
