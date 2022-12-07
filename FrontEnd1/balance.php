<?php
    session_id($_GET['id']);
    session_start();
    if($_SESSION['Tutor'] == null){
        header("Location: ../FrontEndAlvi/login.php");
        exit;
    }
    require_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT * FROM tutor
        WHERE TutorId = '".$_SESSION['Tutor']."'
    ";
    $row = null;
    if($resultTable = selectQuery($query)){
        $row = mysqli_fetch_assoc($resultTable);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
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
           <div class="amenu active" href="" style="margin-bottom:10px;">
                <a href="balance.php?id=<?php echo $_GET['id']?>">Balance</a>
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="reportstudent.php?id=<?php echo $_GET['id']?>">Report Student</a>
            </div>
        </div>

        <div class="content" style="padding:20px;padding-bottom: 50px; margin-bottom:5%;">
            <div>
                <center>
                <h3 style="float:center;margin-right: 10px;" class="tjudulf">
                    Balance
                </h3>
                <h2 style="float:center;margin-right: 10px;" class="tjudulz">
                    Rp<?php echo $row['TutorBalance'] ?>
                </h2>
                </center>
                <!-- <div style="float:left" class="lbl">
                    March 2022
                </div> -->


            </div>
            <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:10px;height:2px"></div>
            <!-- GARIS ^ -->
            
            <div class="flex-col" style="gap:30px; margin-top:20px">
                <div>
                    <p style="font-size:35px;font-family:tahoma;justify-content:left;color: #04A1E8;">
                        Withdrawal:
                    </p>
                </div>

                <form class="flex-col" action="../BackEndVincent/withdraw.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <table class="draw">
                        <tr>
                            <td class="aih1" style="text-align:left;">Account number</td>
                        </tr>
                        <tr>
                            <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate" name="AccountNumber"></td>
                        </tr>
                        <tr>
                            <td class="aih2" style="text-align:left;">Amount</td>
                        </tr>
                        <tr>
                            <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate" name="amount"></td>
                        </tr>
                        <tr>
                            <td class="aih3" style="text-align:left;">Password</td>
                        </tr>
                        <tr>
                            <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate" name="password" type="password"></td>
                        </tr>
                    </table>

                    <div style="margin-top: 40px; font-size: 30pt;">
                        <input type="submit" value="Process" id="submitBtn" style="display: none;">
                        <label for="submitBtn" style="cursor: pointer; color: white; background-color: #04A1E8;border: 0; width: fit-content; padding: 10px; border-radius: 20px;">
                            Process Withdraw
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>