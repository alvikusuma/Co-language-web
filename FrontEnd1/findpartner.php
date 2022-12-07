<?php
    session_id($_GET['id']);
    session_start();
    if($_SESSION['Student'] == null){
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
    <title>Find Partner</title>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- can't used in php -->

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
                <a href="../FrontEndExcel/AccountStudent.php?id=<?php echo $_GET['id']?>">Account</a>
            </div>
            <div class="amenu active" href="" style="margin-bottom:10px;">
                Find Partner
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                    <a href="reportpartner.php?id=<?php echo $_GET['id']?>">Report Partner</a>
            </div>
            <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                Balance
            </div>
            <div class="amenu active" href="" style="margin-bottom:10px;">
                Report Student
            </div> -->
        </div>

        <div class="content" style="padding:20px;">
            <div>
                <center>
                    <h3 style="float:center;margin-right: 10px;" class="tjudulf">
                        Find Partner
                    </h3>
                    <!-- <h2 style="float:center;margin-right: 10px;color: white;" class="tjudulz">
                        Rp. 70.000,00-
                    </h2> -->
                </center>
                <!-- <div style="float:left" class="lbl">
                    March 2022
                </div> -->
                <input class="id" style="display: none;" value="<?php echo $_GET['id'] ?>">
                <?php include_once 'functions.php';?>
                <div class="grid">
                        <!-- showOnlineTutor($_GET); -->
                </div>
            </div>
        </div>
    </div>

    <script src="../BackEndVincent/ajax_findTutor.js"></script>
</body>
</html>