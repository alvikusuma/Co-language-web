<?php
    require_once "functions.php";
    if(isset($_POST['submitButton'])){
        signup($_POST);
        // header("Location: login.php");
    }
    // else{
    //     echo "<script>alert('ERROR');</script>";
    // }
    // $resultTable = selectQuery("SELECT TutorId AS id FROM tutor UNION SELECT StudentId FROM student");
    // $count = 1;
    // while(($row = mysqli_fetch_assoc($resultTable)) == true){
    //     echo '<h2>'.$row['id'].'</h2>';
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, Code!</title>
    <!-- <link rel="stylesheet" href="signup.css"> -->
    <style>
    <?php 
            include_once "signup.css";
        ?>
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    
</head>
<body>
   <div class="overlay"></div>
   <form action="" method="post" class="box" enctype="multipart/form-data">
       <div class="header">
           <h2 class="tes">Sign Up Your Account</h2>
       </div>
       <div class="login-area">
            <input type="text" class="username" placeholder="Full Name" name="name">
            <input type="text" class="username" placeholder="Email" name="email">
            <input type="password" class="password" placeholder="Password" name="pass">
            <input type="password" class="password" placeholder="Repeat Password" name="repeatpass">
            <input type="text" class="username" placeholder="Phone Number" name="phone">
            <input type="text" class="username" placeholder="Language" name="language">
            <input type="file" name="picture" id="picture">
            <label for="picture" style="cursor: pointer;">
                <p class="username" placeholder="">Profile Picture (Square Ratio)</p>
            </label>
            <br>
            <input type="radio" name="tutor"> Tutor
            <input type="radio" name="student"> Student
            <input type="submit" value="Sign Up" class="submit" name="submitButton">
            <a href="login.php">Login Here</a>
       </div>
   </form>
</body>
</html>