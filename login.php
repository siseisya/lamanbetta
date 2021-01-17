<?php
session_start();
include_once("dbconnect.php");
$username = $_POST['username'];
$password = sha1($_POST['password']);

  try {
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();  

    if ($count > 0){
        foreach($users as $users) {
            $username = $users['username'];
            $email = $users['email'];
        } 
        setcookie("timer", "10s", time()+100000,"/");

        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('mainpage.php?username=".$username."&email=".$email."') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

  $conn = null;
?>