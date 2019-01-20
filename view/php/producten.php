<?php
  $customCss = "<link rel='stylesheet' href='../../view/css/producten.css'>";
  $customTitle = "Producten";
  require_once("../../view/php/partials/_header.php");
  require_once("../../view/php/partials/_menu.php");
  require_once("../../controller/php/product.php");
  $products = new product();
  $productarray = $products->getproducts();
  foreach($productarray as $product){
    echo "<div class='container'>
            <div class='col-sm-4 product-wrapper'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>".$product['Productnaam']."</div>
                    <div class='panel-body'><img src='".$product['Image']."' class='img-responsive' style='width:100%' alt='Image'></div>
                    <hr>
                    <div class='panel-footer'>".$product['Omschrijving']."</div>
                </div>
            </div>
        </div>";
  }
?>

<?php
  require_once("../../view/php/partials/_footer.php");
?>
