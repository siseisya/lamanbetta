<?php
include_once("dbconnect.php");
$username = $_GET['username'];
$email = $_GET['email'];
$locality = $_GET['locality'];
$type = $_GET['type'];
$description = $_GET['description'];
$colour = $_GET['colour'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE list SET colour = '$colour', locality = '$locality', description = '$description' WHERE username = '$username' AND email ='$email' AND type = '$type'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?username=".$username."&email=".$email."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>
<p>
<h2 align='center'><?php echo $username?></h2>
</p>

   <h3 align="center"><?php echo $type?> </h3>

   <body>
    <h2 align="center">Update Betta Fish</h2>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update new betta?');">
        <input type="hidden" id="username" name="username" value="<?php echo $username;?>"><br>
        <input type="hidden" id="email" name="email" value="<?php echo $email;?>"><br>
        <input type="hidden" id="type" name="type" value="<?php echo $type;?>"><br>
        <input type="hidden" name="operation" id="operation" value="update" required><br>


        <label for="locality">Locality:</label><br>
        <input type="text" id="locality" name="locality" value="<?php echo $locality;?>" required><br>

        <label for="colour">Colour of:</label><br>
        <input type="text" id="colour" name="colour" value="<?php echo $colour;?>" required><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $description;?>" required><br>

        <br>

        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="mainpage.php?username=<?php echo $username.'&email='.$email?>">Cancel</a></p>

    <div class="footer">
    <p>Author: Norfarisha Atina (261594)<br>
    <a
     href="mailto:siseisya@gmail.com">siseisya@gmail.com</a></p>

</div>
  </body>

</html>
