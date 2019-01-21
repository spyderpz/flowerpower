<?php
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
                <form action=''>
                  <div class='form-group'>
                    <label for='addproducttitle'>Producttitle:</label>
                    <input id='addproducttitle' class='form-control'>
                  </div>
                  <label for='addproductimage'>Afbeelding:</label>
                  <div id='fileInput' class='dropzone'>
                    <div class='fallback'>
                      <input name='file' type='file' multiple />
                    </div>
                  </div>
                  <br>
                  <div class='form-group'>
                    <label for='addproductdesc'>Productbeshrijving:</label>
                    <textarea id='addproductdesc' class='form-control' rows='1' cols='30'></textarea>
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
