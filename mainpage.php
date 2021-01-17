<?php
session_start();
include_once("dbconnect.php");
$username = $_GET['username'];
$email= $_GET['email'];


// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head><link rel='stylesheet'href='styles.css'></head>";
echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>";

echo "<p>Welcome " . $_SESSION["username"] . ".<br></p>";
if (isset($_SESSION["username"])){


if (isset($_COOKIE["timer"])){
//delete operation

  if (isset($_GET['operation'])) {
    $type = $_GET['type'];

    try {
      $sql = "DELETE FROM list WHERE username='$username' AND type= '$type'";
      $conn->exec($sql);
      echo "<script> alert('Delete Success')</script>";
    } catch(PDOException $e) {
      echo "<script> alert('Delete Error')</script>";
    }
  }
  
try {

    $sql= "SELECT * FROM list WHERE username = '$username' AND email='$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $list = $stmt->fetchAll();
    // $stmt ->execute();
    
    echo "<p><h1 align='center'>Your Current Betta Collections</h1></p>";
    echo "<table border ='1' align='center'>
    <tr>

        <th>Fish Id</th>
        <th>Type</th>
        <th>Locality</th>
        <th>Colour</th>
        <th>Description</th>
        <th>Operations</th>
    
    </tr>";
    
    foreach($list as $list) {
        echo "<tr>";
        echo "<td>".$list['fishid'] . "</td>";
        //echo "<td> <img src='tryimages/$type.jpg' width='100' height='100'> </td>";
        echo "<td>".$list['type'] . "</td>";
        echo "<td>".$list['locality'] . "</td>";
        echo "<td>".$list['colour'] . "</td>";
        echo "<td>".$list['description'] . "</td>";
        echo "<td><a href='mainpage.php?username=".$username."&email=".$email."&type=".$list['type']."&operation=del'>Delete</a><br>
            <a href='update.php?username=".$username."&email=".$email."&type=".$list['type']."&colour=".$list['colour']."&description=".$list['description']."&locality=".$list['locality']."'>Update</a></td>";
        
            echo "</tr>";
    }
    echo "</table>";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    }else{
      echo "<script> alert('Timer expired!!!')</script>";
      echo "<script> window.location.replace('index.html') </script>;";
    }
    }else{
      echo "<script> alert('Session Expired!!!')</script>";
      echo "<script> window.location.replace('index.html') </script>;";
    }
    
    $conn = null;

 
    //echo "<p align='center'><a href='blogbetta.php?username=".$username."&email=".$email."'>Blog all Listing</a></p>";
    //echo "<p align='center'><a href='tryinsert.html'>Insert New Betta</a></p>";
    //echo "<p align='center'><a href='profile.php?username=".$username."&email=".$email."'>Profile</a></p>";
   // echo "<p align='center'><a href='login.html'>Logout</a></p>";

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="blog.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
</head>

<br></br>


<div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a class="w3-button w3-block w3-black" href="mainpage.php?username=<?php echo $username.'&email='.$email?>">HOME</a>
    </div>

    <div class="w3-col s3">
      <a  class="w3-button w3-block w3-black" href="profile.php?username=<?php echo $username.'&email='.$email?>">Profile</a>
    </div>

    <div class="w3-col s3">
      <a class="w3-button w3-block w3-black" href="tryinsert.html?username=<?php echo $username.'&email='.$email?>" >Insert Betta</a>
    </div>

    <div class="w3-col s3">
      <a class="w3-button w3-block w3-black" href="blogbetta.php?username=<?php echo $username.'&email='.$email?>" >BlogPost</a>
    </div>

  </div>

  <br><br>
  
  <div class="w3-col s3">
      <a class="w3-button w3-block w3-black" href="login.html">Logout</a>
    </div>


<br><br>

<br><br>

<div class="footer">
    <p>Author: Norfarisha Atina (261594)<br>
    <a
     href="mailto:siseisya@gmail.com">siseisya@gmail.com</a></p>
</div>


</body>
</html>