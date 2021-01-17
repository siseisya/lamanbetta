<?php
include_once("dbconnect.php");

$username = $_POST['username'];
$email = $_POST['email'];
$fishid = $_POST['fishid'];
$type = $_POST['type'];
$locality = $_POST['locality'];
$colour = $_POST['colour'];
$description = $_POST['description'];

if(!empty($_FILES['uploaded_file'])){
  $path = "tryimages/";
  //$path = $path . basename( $_FILES['uploaded_file']['name']);
  $path = $path .$type.'.jpg';
   if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
      try {
        $sql = "INSERT INTO list ( type, locality, colour, description, username, email)
        VALUES ( '$type', '$locality', '$colour', '$description', '$username', '$email')";
          // use exec() because no results are returned
          $conn->exec($sql);
          echo "<script> alert('Registration Success')</script>";
          echo "<script> window.location.replace('mainpage.php?username=".$username."&email=".$email."') </script>;";
      } catch(PDOException $e) {
          echo "<script> alert('Registration Error')</script>";
          echo "<script> window.location.replace('index.html') </script>;";
      }
      $conn = null;
   
   }else{
        echo "<script> alert('Image upload error')</script>";
        echo "<script> window.location.replace('index.html') </script>;";
   }
}
?>
