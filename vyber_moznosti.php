<?php
echo $_GET['volba'];
if ($_GET['volba'] == "home") {
	echo "string";
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<script>
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x !== "") {
    alert("Name must be filled out");
    return false;
  }
}
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Výběr šifry</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="?volba=home">Caesar</a>
    <a href="?volba=about">Aes</a>
    <a href="?volba=contact">Triple Des</a>
  </div>
</div>
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
<form name="myForm" action="" onsubmit="return validateForm()" method="post">
  Name: <input type="text" name="fname">
  <input type="submit" value="Submit">
</form>
<button class="btn"><i class="fa fa-download"></i> Download</button>
</body>
</html>