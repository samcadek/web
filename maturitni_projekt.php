<!--
<http://localhost/maturitni_projekt.php
-->
<!DOCTYPE html>
<html>
<body>
<h1>My first PHP page</h1>

<?php


$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
$password_plain = 'samuel';
echo $password_plain . "<br>";

$password_encrypted = my_encrypt($password_plain, $key);
$password_encrypted2 = urlencode($password_encrypted);
echo $password_encrypted . "<br>";

echo "<a href=\stazeni.php?heslo=$password_encrypted2>".$password_encrypted.'</a>'."<br>";
$password_decrypted = my_decrypt($password_encrypted, $key);


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
$filename = "image.doc";    
$fp = fopen($filename, "r");//open file in read mode    
  
$contents = fread($fp, filesize($filename));//read file    

$text = fread($fp,filesize("image.doc"));
#posun pismenek
$cipherText = Encipher($text, 3);
$plainText = Decipher($cipherText, 3);
$cipherText2 = urlencode($cipherText);
echo "<a href=\stazeni.php?heslo=$cipherText2>"."xd".'</a>'."<br>"; 
echo "<br>";
echo "<br>";
echo $contents;   
echo Decipher($contents, 3); 
fclose($fp);//close file  
?> 
<form action="upload2.php" method="post" enctype="multipart/form-data" name="cookie">
  desifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<form action="upload3.php" method="post" enctype="multipart/form-data" name="cookie">
  sifrovani:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Submit" name="submit">
</form> 
</body>
</html>
