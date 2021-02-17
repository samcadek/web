<?php
session_start();
$result = uniqid();    
$_SESSION["symbol"] = $result;
$target_dir = "uploads5/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file2 = $target_dir . $_SESSION["symbol"].basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION["nazev"] = $target_file2;
//$target_file2 = $target_dir . $_SESSION["symbol"].basename($_FILES["fileToUpload"]["name"]);
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$method = "DES-EDE3";
$key = "17839778773fadde0066e4578710928988398877bb123789";
$options = 0;
$key = pack("H*", $key);
$filename = $target_file2;   
$fp = fopen($filename, "r");//open file in read mode    
$contents = fread($fp, filesize($filename));//read file 
$text = fread($fp, filesize($filename));
$dec = openssl_decrypt($contents, $method, $key, $options);
$enc = openssl_encrypt($dec, $method, $key, $options);
$_SESSION["text"] = $dec;
header("Location: /stazeni2.php");
fclose($fp);
?>