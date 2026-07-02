<?php 
$cann = mysqli_connect('localhost' , 'root' , '' , 'castdb');

if(!$cann){
    die("Connection Failed");
}

$error = false;
$lack = '';



if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($_POST['username']) || empty($_POST['password'])){

        $error = true;
        $lack = 'You cant leave input empty.';



    }

    if(!$error){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($cann , $sql);

        $row = mysqli_fetch_assoc($result);

        if($row && $password == $row['password']){

            header("location: ../home/home.php");
            exit();

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CAST</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="body">
    <form  method="post">
        <h1>LOG IN</h1>
        <input type="text" placeholder="Enter username" name="username"> 
        <br>
        <input type="password" placeholder="Enter password" name="password"> 
        <br>
        <p><?php echo $lack; ?></p>
        <button type="submit">LOGIN</button>
        
    </form>
    </div>
</body>
</html>