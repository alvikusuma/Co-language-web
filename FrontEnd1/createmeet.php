<?php
    session_id($_GET['id']);
    session_start();
    if($_SESSION['Tutor'] == null){
        header("Location: login.php");
        exit;
    }
    
    $updateStatusQuery = "
        UPDATE tutor
        SET TutorOnlineStatus = 'Offline', TutorDuration = 0, TutorPrice = 0
        WHERE TutorId = {$_SESSION['Tutor']}
    ";
    include_once "functions.php";
    manipulateQuery($updateStatusQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create meet</title>
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
            <div class="amenu active" href="" style="margin-bottom:10px;">
                <a href="createmeet.php?id=<?php echo $_GET['id']?>">Create Meet</a>
            </div>
           <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="../BackEndVincent/logout.php?id=<?php echo $_GET['id']?>">Schedule</a>
           </div> -->
           <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="balance.php?id=<?php echo $_GET['id']?>">Balance</a>
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                <a href="reportstudent.php?id=<?php echo $_GET['id']?>">Report Student</a>
            </div>
        </div>

        <div class="content" style="padding:20px;">
                <div>
                   <center>
                    <h3 style="float:center;margin-right: 10px;" class="tjudulf">
                        Create Meet
                    </h3>
                    <!-- <h2 style="float:center;margin-right: 10px;color: white;" class="tjudulz">
                        Rp. 70.000,00-
                    </h2> -->
                   </center>
                    <!-- <div style="float:left" class="lbl">
                        March 2022
                    </div> -->


                </div>
                <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:10px;height:2px"></div>
                
                <div style="width: 100%">
                    <div style="width:40%;float:left;text-align: center;">
                        <!-- <label style="font-size:40px;font-family:tahoma;color: black;font-weight: lighter;">
                        History:
                        </label> -->
                        <br>
                        <div class="testing">
                            <!-- <label for="" style="color:gray;">20/12/2002 Vincent Jonathan RP. 20.000</label>
                            <br>
                            <label for="" style="color:gray;">20/12/2002 Vincent Jonathan RP. 20.000</label>
                            <br>
                            <label for="" style="color:gray;">BANK MANDIRI</label>
                            <br>

                            <br>
                            <label for="">Payment Step:</label>
                            <br>
                            <br> -->
                        <!-- <div class="step">
                            <div class="step-1">
                                <img src="img/e3feb005c7be486dbed5e1aa032a4dbb 1.png" alt="">
                            </div>
                            <table class="but1">
                                <tr>
                                    <td>
                                        <div style="color: white;background-color: #04A1E8;border: 0; width: fit-content; padding: 10px;">For future</div>
                                    </td>
                                </tr>
                            </table> -->
                            <!-- <div class="bush">
                                <br>
                                <a href=""><div class="done">DONE</div></a>
                            </div> -->
                        </div>
                        </div>
                    </div>
                    <!-- <div style="float:left;width:2px;background-color:#DDDDDD;height:100px">
                    </div> -->

                    <div class="ash" style="width:100%;float:right;text-align: center;">
                        <div>
                            <img src="img/Red_circle 1.gif" alt="">
                        </div>
                        <div style="margin-left:30px;">
                            <a href="../FrontEndExcel/MeetInfo.php?id=<?php echo $_GET['id']?>">
                                <div style="color: white;background-color: #04A1E8;border: 0; width: fit-content; padding: 20px; font-size: 30pt; border-radius: 20px;">Live Now</div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="with" style="width:100%;float:right;text-align: center;margin-left: 10px;">
                        <br>
                        <br>
                        <div class="ash">
                            <label style="font-size:35px;font-family:tahoma;justify-content:left;color: #04A1E8;">
                                <img src="img/Red_circle 1.gif" alt="">
                            </label>
                            <br>
                            <br>
                            
                            <div>
                                <label style="font-size:35px;font-family:tahoma;justify-content:left;color: #04A1E8;">
                                    Withdrawal:
                                </label> -->

                                <!-- <table class="draw">
                                    <tr>
                                        <td class="aih1" style="text-align:left;">Account number</td>
                                    </tr>
                                    <tr>
                                        <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate"></td>
                                    </tr>
                                    <tr>
                                        <td class="aih2" style="text-align:left;">Amount</td>
                                    </tr>
                                    <tr>
                                        <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate"></td>
                                    </tr>
                                    <tr>
                                        <td class="aih3" style="text-align:left;">Password</td>
                                    </tr>
                                    <tr>
                                        <td class="cjgt2" style="text-align: left"><input style="height:30px;width:250px;" class="iptDate"></td>
                                    </tr>
                                </table>
                                <table class="but2">
                                    <tr>
                                        <td>
                                            <a href="../FrontEndExcel/MeetInfo.php?id=(echo $_GET'id')">
                                                <div style="color: white;background-color: #04A1E8;border: 0; width: fit-content; padding: 10px;">Live Now</div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        
                        <br>
                        <label style="font-size:15px;font-family:tahoma;color:#AAAAAA;">
                           09:00 - 11:00 GMT +7
                        </label>
                    </div>-->

                    <div>
                        <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:400px;height:0"></div>
                    </div>
                </div>
                
        </div>
    </div>

</body>
</html>