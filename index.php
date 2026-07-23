<?php 

    $cann = mysqli_connect('localhost' , 'root' , '' , 'gallery_db');

    if(!$cann){
        die("Connection Failed");
    }

    $error = false;
    $lack = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_FILES['profile_path']['name']) || empty($_POST['username']) || empty($_POST['password'])){

            $error = true;
            $lack = "You need to input these information to continue";

        }

        if(!$error){


        $profile_path = $_FILES['profile_path']['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
            $sql = "INSERT INTO users (profile_path, username, password)
            VALUES ('$profile_path' , '$username' , '$password')";

        mysqli_query($cann , $sql);

        header("Location: login.php");
        exit();

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
  
<form  method="post" enctype="multipart/form-data">

    <label for="profile_path">Upload a photo</label>
    <input type="file" name="profile_path">
    <input type="text" name="username" placeholder="Create a username">
    <br>
    <input type="password" name="password" placeholder="Create a password">
    <button type="submit">Submit</button>
</form>

</body>
</html>