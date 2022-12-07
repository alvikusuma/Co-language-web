<?php
    require_once "functions.php";
    if(isset($_POST['submitButton'])){
        login($_POST);
    }
    // else{
    //     echo "<script>alert('ERROR');</script>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, Code!</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
   <div class="overlay"></div>
   <form action="" method="post" class="box">
       <div class="header">
           <h2 class="tes">Login To Your Account</h2>
       </div>
       <div class="login-area">
           <input type="text" class="username" placeholder="Email" name="email">
           <input type="password" class="password" placeholder="Password" name="pass">
           <input type="submit" value="Login" class="submit" name="submitButton">
           <a href="#">Forgot Password?</a>
           <a href="signup.php">Not Yet Sign Up?</a>
       </div>
   </form> 
</body>
</html>