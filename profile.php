<?php
include_once("dbconnect.php");
$email= $_GET['email'];
$username = $_GET['username']; 

$sql = "SELECT * FROM users WHERE username = '$username'";
$stmt = $conn->prepare($sql );
$stmt->execute();
$users = $stmt->fetchAll(); 

echo "<p><h1 align='center'>Your Profile</h1></p>";
echo "<table border='1' align='center'>";

 foreach($users as $users) {
    echo "<tr><td> <img src='profileimages/$username.jpg' width='400' height='300'> </td></tr>";
    echo "<tr><td>".$users['username']."</td></tr>";
    echo "<tr><td>".$users['email']."</td></tr>";
    echo "<tr><td>".$users['address']."</td></tr>"; 
    echo "<tr><td>".$users['timereg']."</td></tr>"; 
 }
 
 echo "</table>";

 echo "<p align='center'><a href='mainpage.php?username=".$username."&email=".$email."'>Back</a></p>";
 //echo "<p align='center'><a href='profile.php?username=".$username."&email=".$email."'>Profile</a></p>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
<div class="footer">
    <p>Author: Norfarisha Atina (261594)<br>
    <a
     href="mailto:siseisya@gmail.com">siseisya@gmail.com</a></p>


</div>
  </body>

</html>