<?php 

    $cann = mysqli_connect('localhost' , 'root' ,'' , 'gallery_db');
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lOGIN</title>
</head>
<body>
    <form  method="post">
        <input type="text" name="username" placeholder="Enter your password">
        <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br>
        <button type="submit">Log in</button>
    </form>
</body>
</html>