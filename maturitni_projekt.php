<!--
<http://localhost/maturitni_projekt.php
-->
<!DOCTYPE html>
<html>
<body>
<h1>My first PHP page</h1>

<?php

#aes
function encrypt($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    return $iv . $hash . $ciphertext;
}

function decrypt($ivHashCiphertext, $password) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $password, true);

    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;

    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}
$encrypted = encrypt('zprava', 'password'); // this yields a binary string
echo $encrypted;
echo "<br>";
echo decrypt($encrypted, 'password');
// decrypt($encrypted, 'wrong password') === null

#triple des
$data = "ahoj";
$method = "DES-EDE3";
$key = "17839778773fadde0066e4578710928988398877bb123789";
$options = 0;

// transform the key from hex to string
$key = pack("H*", $key);

// encrypt
$enc = openssl_encrypt($data, $method, $key, $options);
// decrypt
$dec = openssl_decrypt($enc, $method, $key, $options);

echo "plain: ".$data." encrypted: ".$enc." decrypted: ".$dec;


#caeserova sifra
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

#a href na stazeni



#nahrani souboru na sifrovani

#zobrazeni obsahu dokumentu a nasledne rozsifrovani
$filename = "image2.doc";    
$fp = fopen($filename, "r");//open file in read mode    
  
$contents = fread($fp, filesize($filename));//read file    

$text = fread($fp,filesize("image2.doc"));
#posun pismenek
$cipherText = Encipher($text, 3);
$plainText = Decipher($cipherText, 3);
$cipherText2 = urlencode($cipherText); 
echo "<br>";
echo "<br>";
echo $contents;   
echo Decipher($contents, 3); 
fclose($fp);//close file  
?> 

<form action="upload2.php" method="post" enctype="multipart/form-data" name="cookie">
  ceasar: desifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<form action="upload3.php" method="post" enctype="multipart/form-data" name="cookie">
  sifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Submit" name="submit">
</form> 
<form action="upload4.php" method="post" enctype="multipart/form-data" name="cookie">
   aes: desifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<form action="upload5.php" method="post" enctype="multipart/form-data" name="cookie">
  sifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Submit" name="submit">
</form>
<form action="upload6.php" method="post" enctype="multipart/form-data" name="cookie">
  triple des: desifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<form action="upload7.php" method="post" enctype="multipart/form-data" name="cookie">
  sifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Submit" name="submit">
</form>

</body>
</html>
