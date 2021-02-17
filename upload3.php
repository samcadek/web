<?php
#upload z w3schools https://www.w3schools.com/php/php_file_upload.asp (potom jeste upravim tohle je jen kvuli tomu sifrovani)
session_start();
$result = uniqid();   
$_SESSION["symbol"] = $result;

$target_dir = "uploads2/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file2 = $target_dir . $_SESSION["symbol"].basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$_SESSION["nazev"] = $target_file2;


// Check if file already exists
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


//echo $_FILES["fileToUpload"]["name"];
function Cipher($ch, $key)
{
    if (!ctype_alpha($ch))
        return $ch;

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}
function Encipher($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cipher($ch, $key);

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}

$filename = $target_file2;   
$fp = fopen($filename, "r");//open file in read mode    
  
$contents = fread($fp, filesize($filename));//read file    
$text = fread($fp,filesize($filename));
$cipherText = Encipher($text, 3);
$plainText = Decipher($cipherText, 3);
$cipherText2 = urlencode($cipherText);
$m = Encipher($contents, 3);   
header("Location: /stazeni.php?heslo=$m");
fclose($fp);
?>
