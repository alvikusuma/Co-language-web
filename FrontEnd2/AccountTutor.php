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
    <title>Account Tutor</title>
    <!-- <link rel="stylesheet" href="style.css?x=4"> -->
    <style>
        <?php 
            include_once "style.css";
        ?>
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="Image/logo.png" style="height:40px;width:40px;" alt="sds">
        </div>
    </div>
    <div class="menuflex">
        <div class="menu">
                <div class="amenu active" style="margin-top:80px;margin-bottom:10px;">
                    <a href="AccountTutor.php?id=<?php echo $_GET['id']?>">Account</a>
                </div>
                <div class="amenu" href="" style="margin-bottom:10px;">
                    <a href="../FrontEndAlvi/createmeet.php?id=<?php echo $_GET['id']?>">Create Meet</a>
                </div>
               <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                    <a href="../BackEndVincent/logout.php?id=<?php echo $_GET['id']?>">Schedule</a>
               </div> -->
               <div class="amenu" href="" style="margin-bottom:10px;">
                    <a href="../FrontEndAlvi/balance.php?id=<?php echo $_GET['id']?>">Balance</a>
                </div>
                <div class="amenu" href="" style="margin-bottom:10px;">
                    <a href="../FrontEndAlvi/reportstudent.php?id=<?php echo $_GET['id']?>">Report Student</a>
                </div>

        </div>

        <div class="content">
            <table>
                <tr>
                    <td style="width:60%">
                        <p id="profile" style="float:left;font-family:tahoma;font-weight:bold;color:#0397e2">Profile</p>
                        <!-- <img class="profilepicture" style="height:40px;width:40px;margin-top:15px;margin-left:20px;float:left;margin-left:10px" src="Image/edit.png" alt="error picture"> -->

                        <div class="isi" style="width:100%">
                            <div class="data">
                                <p class="plabel">Username</p>
                                <p class="plabel">Email</p>
                                <p class="plabel">Phone Number</p>
                                <p class="plabel">Status</p>
                            </div>
                            <div class="value">
                                <p class="plabel2"><?php echo $row["TutorName"]?></p>
                                <p class="plabel2"><?php echo $row["TutorEmail"]?></p>
                                <p class="plabel2"><?php echo $row["TutorPhone"]?></p>
                                <p class="plabel2">Tutor</p>
                            </div>
                        </div>

                    </td>
                    <td style="text-align:right">
                        <img style="width: 100%;" src="../BackEndVincent/userProfilePictures/<?php echo $row['TutorPhoto']?>" style="float:right">
                    </td>


                </tr>
            </table>
            <div style="width:100%;">
                <div style="float:right">
                    <a href="../BackEndVincent/logout.php?id=<?php echo $_GET['id']?>">
                        <p class="clogout">Logout</p>
                        <img class="ilogout" src="Image/logout.png">
                    </a>
                </div>
            </div>


        </div>
    </div>

</body>
</html>