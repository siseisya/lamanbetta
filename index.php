<?php
include_once("dbconnect.php");

$username = $_POST['username'];
$password = sha1($_POST['password']);
$email = $_POST['email'];
$address = $_POST['address'];

if(!empty($_FILES['uploaded_file'])){
  $path = "profileimages/";
  //$path = $path . basename( $_FILES['uploaded_file']['name']);
  $path = $path .$username.'.jpg';
   if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
      try {
          $sql = "INSERT INTO users( username, email, password, address )
          VALUES ('$username', '$email', '$password', '$address')";
          // use exec() because no results are returned
          $conn->exec($sql);
          echo "<script> alert('Registration Success')</script>";
          echo "<script> window.location.replace('login.html') </script>;";
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