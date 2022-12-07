<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM tutor
        WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
    ";
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);

    $updateStatusQuery = "
        UPDATE tutor
        SET TutorOnlineStatus = 'Online'
        WHERE TutorId = {$row['TutorId']}
    ";
    manipulateQuery($updateStatusQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Request</title>
    <!-- <link rel="stylesheet" href="style.css?x=5"> -->
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
            <div class="amenu" style="margin-top:80px;margin-bottom:10px;">
                Account
            </div>
            <div class="amenu active" href="" style="margin-bottom:10px;">
                Create Meet
            </div>
            <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                Schedule
            </div> -->
            <div class="amenu" href="" style="margin-bottom:10px;">
                Balance
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                Report Student
            </div>
        </div>

        <div class="content">

            <table>
                <tr>
                    <td style="width:50%;padding:10px">
                        <div style="height:50px;width:100%">
                             <!-- <div class="tatas">
                               <
                             </div> -->
                             <div class="tatas" style="margin-left:10px;width:390px;font-size: 18px;">
                                <?php echo $row['TutorDuration']." Minutes (Rp".$row['TutorPrice'].")"?>
                             </div>

                        </div>
                        <div style="margin-top:10px">
                            <img src="../BackEndVincent/userProfilePictures/<?php echo $row['TutorPhoto']?>" style="width:460px">
                            <div class="cname"><?php echo $row['TutorLanguage'] ?></div>
                        </div>
                        <div style="text-align:center;font-family:tahoma;font-size:20px">
                            <?php echo $row['TutorName'] ?>
                        </div>
                        <!-- <div>
                            <table style="margin:auto">
                                <tr>
                                    <td>
                                        <img style="height:40px" src="image/star.png">
                                    </td>
                                    <td>
                                        4.9
                                    </td>
                                </tr>
                            </table>
                        </div> -->
                    </td>
                    <td style="width:50%;padding:10px;vertical-align: top;">

                        <div style="height:50px;width:100%;margin-top: 50px;">
                            <div style="width:100%;height:550px">
                                <div style="width:95%;margin-left:5%">
                                    <img src="image/request.gif" style="margin-left:80px;width:256px;margin-top:80px"/>

                                </div>
                                <table style="width:100%;margin-top: 10px;">
                                    <tr>
                                        <td style="width:100%;padding:10px;text-align: center;">
                                            <label style="font-size:30px;color:#AAAAAA">Waiting for request...</label>
                                            <br/><br/><br/><br/>
                                            <a href="../FrontEndAlvi/createmeet.php?id=<?php echo $_GET['id']?>">
                                                <div style="background-color: #FF0000;" class="tbutton">
                                                    Cancel Live
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                       </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <input type="text" value="<?php echo $_GET['id'] ?>" class='id' style="display: none;">
    <script src="../BackEndVincent/ajax_tutorGotRequest.js"></script>
</body>
</html>