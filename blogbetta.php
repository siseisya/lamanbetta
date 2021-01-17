<?php
session_start();
include_once("dbconnect.php");
$username = $_GET['username'];
$email= $_GET['email'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$stmt = $conn->prepare($sql );
$stmt->execute();
$users = $stmt->fetchAll(); 

//echo "<p>Welcome " . $_SESSION["username"] . ".<br></p>";

 echo "<p align='center'><a href='mainpage.php?username=".$username."&email=".$email."'>Back</a></p>";
    ?>

<!DOCTYPE html>
<html>
<title>Blog post</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">


<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="splenden.jpg" alt="Nature" style="width:50%">
    <div class="w3-container">
      <h3><b>Malaysia Wild Betta Standards</b></h3>
      <h5>Title description, <span class="w3-opacity">April 7, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Betta Splenden adalah spesies terawal diklasifikasikan oleh seorang itchytologst bernama Charles Tate pada 1909.
          Nama Splenden juga digunapakai untuk merujuk kepada Splenden Group dan Spleden Complex</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
  <img src="mahacai.jpg" alt="Norway" style="width:50%">
    <div class="w3-container">
      <h3><b>Malaysia Wild Betta Standards</b></h3>
      <h5>Title description, <span class="w3-opacity">April 2, 2014</span></h5>
    </div>

    <div class="w3-container">
      <p>Betta Mahachaiensis diklarifikasikan pada tahun 2012. Habitat spesises ini yang terletak di pinggir Bangkok mendedahkan spesies ini kepada kepupusan.
         Diberi nama sempena tempat habitatnya iaitu Mahacai</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
        </div>
      </div>
    </div>
  </div>
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->

<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="profileimages/<?php echo $username?>.jpg" style="width:100%">
    <div class="w3-container w3-white">
  <table>
      <tr><td> Username : <?php echo $username?> </td></tr>
      <tr><td> Email : <?php echo $email?> </td> </tr>
</table>
    </div>
  </div><hr>
 
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p>Author: Norfarisha Atina (261594)<br>
  <a href="mailto:siseisya@gmail.com">siseisya@gmail.com</a></p>

</footer>

</body>
</html>
