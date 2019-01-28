<?php
require_once("../../model/php/core.php");
if(isset($_POST['producttitle'])){
    $product = new product();
    $product->setproduct($_POST['producttitle'],$_POST['productbeschrijving'],' 	../../model/img/bloemen/'.$_FILES['picture']['name'],$_POST['productprijs']);
    echo "<script>location.href='http://localhost/home/flowerpower/view/php/index.php';</script>";
}

class product{

    function getproducts()
    {
        global $pdo;
        $productarray = [];
        $productquery = $pdo->prepare("SELECT * FROM producten");
        $productquery->execute();
        $i = 0;
        while ($product = $productquery->fetch()) {
            $productarray[$i] = $product;
            $i++;
        }
        return($productarray);
    }
    function setproduct($productnaam,$omschrijving,$image,$prijs){
        global $pdo;
        $message = $this->uploadfile();
        if($message){
            $productnamequery = $pdo->prepare("SELECT * FROM producten WHERE Productnaam = :productnaam");
            $productnamequery->execute(["productnaam" => $productnaam]);
            if($productnamequery->fetch()){
                return 'a product with that name already exists';
            }else{
                $setproductquery = $pdo->prepare("INSERT INTO producten(Productnaam,Omschrijving,Image,Prijs)VALUES (:productnaam,:omschrijving,:image,:prijs)");
                $succestest = $setproductquery->execute(['productnaam' => $productnaam, 'omschrijving' => $omschrijving, 'image' => $image, 'prijs' => $prijs]);
                return true;
            }
        }else{
            return $message; 
        }

    }
    function uploadfile(){
        $target_dir = "../../model/img/bloemen/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["picture"]["tmp_name"]);
            if($check !== false) {
                return "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                return "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            return "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["picture"]["size"] > 500000) {
            return "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                return true;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }



    }

}