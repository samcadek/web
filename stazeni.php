<?php
session_start();
echo $_GET["heslo"];
header('Content-Disposition: attachment; filename="Image.doc"');
unlink($_SESSION["nazev"]);
session_destroy();

?>