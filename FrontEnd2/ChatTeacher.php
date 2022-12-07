<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM tutor
        WHERE TutorId = ".$_GET['tutorId']."
    ";
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);

    session_id($_GET['id']);
    session_start();
    $query = "
        UPDATE tutor
        SET RequestId = ".$_SESSION['Student']."
        WHERE TutorId = ".$_GET['tutorId']
    ;
    
    manipulateQuery($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Teacher</title>
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
                <div class="amenu" style="margin-top:80px;margin-bottom:10px;">
                    Account
                </div>
                <div class="amenu active" href="" style="margin-bottom:10px;">
                    Find Partner
                </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                    Report Partner
            </div>
        </div>

        <div class="content">
            <table>
                <tr>
                    <td style="width:50%;padding:10px">
                        <div style="height:50px;width:100%">
                            <!-- <a href="../BackEndVincent/endMeet.php?id="> -->
                                <div id="end" class="tatas" style="background-color: #e80404; cursor: pointer;">
                                End Meet
                                </div>
                            <!-- </a> -->
                             <div class="tatas" style="margin-left:10px;width:auto;font-size: 18px;">
                                Teacher Information
                             </div>

                        </div>
                        <div style="margin-top:10px">
                            <img src="../BackEndVincent/userProfilePictures/<?php echo $row['TutorPhoto']?>" style="width:100%">
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
                        <div style="height:50px;width:100%">
                            <div class="tatas" style="width:460px;border-radius:20px 20px 0px 0px">
                              Chat
                            </div>
                            <div style="width:100%;background-color:#fefae5;height:550px;">
                                <div class="chatContainer" style="height:490px;">
                                    <?php
                                        include_once "../BackEndVincent/studentMessage.php";
                                    ?>
                                    <!-- <div class="cenemy">
                                        aasdasd asdasdasd asdasdas dasd asd adsasd asdsad
                                    </div>
                                    <div class="cenemy">
                                        aasdasd asdasdasd asdasdas dasd asd adsasd asdsad
                                    </div>
                                    <div class="cself">
                                        aasdasd asdasdasd asdasdas dasd asd adsasd asdsad
                                    </div>
                                    <div class="cenemy">
                                        aasdasd asdasdasd asdasdas dasd asd adsasd asdsad
                                    </div>
                                    <div class="cself">
                                        aasdasd asdasdasd asdasdas dasd asd adsasd asdsad
                                    </div> -->
                                </div>
                                <div style="width:440px;padding:10px">
                                    <form action="../BackEndVincent/insertChatFromStudent.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>" method="POST">
                                        <input style="padding:8px;border-radius:8px;width:100%" placeholder="Type a message.." type="text" name="studentChat" autofocus>
                                    </form>
                                </div>
                            </div>

                       </div>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    <input type="text" value="<?php echo $_GET['id'] ?>" class='id' style="display: none;">
    <input type="text" value="<?php echo $_GET['tutorId'] ?>" class='tutorId' style="display: none;">
    <script src="../BackEndVincent/ajax_chatInStudent.js"></script>
    <script src="../BackEndVincent/ajax_checkEndMeetByTutor.js"></script>
    <script>
        const endMeet = document.querySelector("#end");
        endMeet.addEventListener('click', function(){
            document.location.href = "../BackEndVincent/endMeet.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>";
        });
    </script>
</body>
</html>