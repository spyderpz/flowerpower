<?php
var_dump($_POST);
$customCss = "<link rel='stylesheet' href='../../view/css/addProduct.css'> <link rel='stylesheet' href='../../view/plugins/dropzone/dropzone.css'>";
$customTitle = "Producten toevoegen";
require_once("../../view/php/partials/_adminHeader.php");
$customScripts = " <script src='../../view/plugins/dropzone/dropzone.js' charset='utf-8'></script> <script src='../../view/js/dropzone.js' charset='utf-8'></script>";
require_once("../../view/php/partials/_menu.php");

?>

<?php
require_once("../../model/php/core.php");

if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 1 || $_SESSION['role'] == 2){
        echo "<div class='container'>
        <div class='row'>
        <h2 class='title-page col-12'>Product toevoegen</h2>
            <div class='col-6 product-wrapper'>
                <div class='border-box'>
                <div class='form-group'>
                <form action='../../controller/php/product.php' method='post' enctype='multipart/form-data'>
                  <div class='form-group'>
                    <label for='addproducttitle'>Producttitle:</label>
                    <input id='addproducttitle' name='producttitle' class='form-control'>
                  </div>
                  <label for='addproductimage'>Afbeelding:</label>
  
                      <input name='picture' type='file' />
  
                  <br>
                  <div class='form-group'>
                    <label for='addproductdesc'>Productbeshrijving:</label>
                    <textarea id='addproductdesc' name='productbeschrijving' class='form-control' rows='1' cols='30'></textarea>
                  </div>
                  <div class='form-group'>
                    <label for='addproductprijs'>Prijs:</label>
                    <textarea id='addproductprijs' name='productprijs' class='form-control' rows='1' cols='1'></textarea>
                  </div>
                  <button type='submit' class='btn btn-secondary'>Toevoegen</button>
                  </form>
                </div>
                </div>
                </div>
            </div>
        </div>";
    }else{
        echo 'you shall not pass';
    }
}else{
    echo 'YOU SHALL NOT PASS';
}

?>
