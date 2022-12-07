<?php
    session_id($_GET['id']);
    session_start();
    if($_SESSION['Tutor'] == null){
        die;
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Student</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        <?php 
            include_once "style.css";
        ?>
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.png" style="height:40px;width:40px;" alt="sds">
        </div>
    </div>
    <div class="menuflex">
        <div class="menu">
            <div class="amenu" style="margin-top:80px;margin-bottom:10px;">
                <a href="../FrontEndExcel/AccountTutor.php?id=<?php echo $_GET['id']?>">Account</a>
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="createmeet.php?id=<?php echo $_GET['id']?>">Create Meet</a>
            </div>
            <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="../BackEndVincent/logout.php<?php echo $_GET['id']?>">Schedule</a>
            </div> -->
            <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="balance.php?id=<?php echo $_GET['id']?>">Balance</a>
            </div>
            <div class="amenu active" href="" style="margin-bottom:10px;">
                <a href="reportstudent.php?id=<?php echo $_GET['id']?>">Report Student</a>
            </div>
        </div>

        <div class="content" style="padding:20px;">
            <div>
                <center>
                <h3 style="float:center;margin-right: 10px;" class="tjudulf">
                    Report Student
                </h3>
                <!-- <h2 style="float:center;margin-right: 10px;color: white;" class="tjudulz">
                    Rp. 70.000,00-
                </h2> -->
                </center>
                <!-- <div style="float:left" class="lbl">
                    March 2022
                </div> -->
                <div class="grid">
                    <?php
                        include_once 'functions.php';
                        showAllStudent($_GET);
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>