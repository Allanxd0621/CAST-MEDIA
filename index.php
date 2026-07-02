<?php 

$cann = mysqli_connect("localhost" , "root" , "" , "castdb");

if(!$cann){
    die("Connection Failed");
}


$error = false;
$lack = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

  

        if(empty($_POST['username']) || empty($_POST['password']) || empty($_FILES['profilePfp']['name'])){

            $lack =  'inputs cannot be empty.';
            $error = true;

        }

    

    if(!$error){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $profilePfp = $_FILES['profilePfp']['name']; 
        // IMPORTANT! ['name'] arun ang ma send sa sql kay ang file name sa input

    $sql = "INSERT INTO users (username , password , img_path) 
                    VALUES ('$username' , '$password' , '$profilePfp')";

    mysqli_query($cann , $sql);

    header("Location: ../login/login.php");
    exit();

     }

} 

   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up CAST</title>

   <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="body">
        <form method="post" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <input type="text" name="username" placeholder="Enter a name"> <br>
            <input type="password" name="password" placeholder="Create a password">
            <br> <br>

         
           

            <div class="signup2">
                <h2>Enter profile picture</h2>
                <input type="file"  name="profilePfp">
            </div>

            <p><?php echo $lack; ?></p>

            <button type="submit">Create Account</button>
        </form>

    </div>

   
</body>
</html>