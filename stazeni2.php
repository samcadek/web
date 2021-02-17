<?php
session_start();
echo $_SESSION["text"];
header('Content-Disposition: attachment; filename="Image.doc"');
unlink($_SESSION["nazev"]);
session_destroy();

?>