<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM Student
        WHERE StudentId = ".$_GET['studentId']."
    ";
    $resultTable = selectQuery($query);
    $rowStudent = mysqli_fetch_assoc($resultTable);

    $query = "
        SELECT *
        FROM tutor
        WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
    ";
    $resultTable = selectQuery($query);
    $rowTutor = mysqli_fetch_assoc($resultTable);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Student</title>
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
                        <div style="height:50px;width:100%" class="countdownInformation">
                            <div class="tatas" id="count"></div>
                            
                             <div class="tatas" style="margin-left:10px;width:390px;font-size: 18px;">
                                Student Information
                             </div>

                        </div>
                        <div style="margin-top:10px">
                            <img src="../BackEndVincent/userProfilePictures/<?php echo $rowStudent['StudentPhoto']?>" style="width:100%">
                            <!-- <div class="cname">English</div> -->
                        </div>
                        <div style="text-align:center;font-family:tahoma;font-size:20px">
                            <?php echo $rowStudent['StudentName'] ?>
                        </div>
                    </td>
                    <td style="width:50%;padding:10px;vertical-align: top;">
                        <div style="height:50px;width:100%">
                            <div class="tatas" style="width:460px;border-radius:20px 20px 0px 0px">
                              Chat
                            </div>
                            <div style="width:100%;background-color:#fefae5;height:550px;">
                                <div class="chatContainer" style="height:490px;">
                                    <?php
                                        include_once "../BackEndVincent/tutorMessage.php";
                                    ?>
                                    <!-- <div class="cenemy">
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
                                    <input type="text" value="<?php echo $_GET['id'] ?>" class='id' style="display: none;">
                                    <input type="text" value="<?php echo $_GET['studentId'] ?>" class='studentId' style="display: none;">
                                    <script src="../BackEndVincent/ajax_chatInTutor.js"></script>
                                </div>
                                <div style="width:440px;padding:10px">
                                    <form action="../BackEndVincent/insertChatFromTutor.php?id=<?php echo $_GET['id'].'&studentId='.$_GET['studentId'] ?>" method="POST">
                                        <input style="padding:8px;border-radius:8px;width:100%" placeholder="Type a message.." type="text" name="tutorChat" autofocus>
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
    <script src="../BackEndVincent/ajax_endMeet.js"></script>
    <script>
        const count = document.querySelector("#count");
        if(localStorage.getItem("timer<?php echo $rowTutor['TutorId']?>")){
            time = localStorage.getItem("timer<?php echo $rowTutor['TutorId']?>");
        }
        else{
            time = <?php echo $rowTutor['TutorDuration']?> * 60;
        }
        temp_time = time;
        hour = Math.floor(temp_time/3600);
        temp_time %= 3600;
        minute = Math.floor(temp_time/60);
        temp_time %= 60;
        second = temp_time % 60;

        interval = setInterval(()=>{
            count.innerHTML = hour+":"+minute+":"+second;
            if(time <= 0){
                window.clearInterval(interval);
                localStorage.removeItem("timer<?php echo $rowTutor['TutorId']?>");
                count.innerHTML = '<a href="../BackEndVincent/endMeet.php?id='+"<?php echo $_GET['id'].'&studentId='.$_GET['studentId'] ?>"+'"><div style="margin: 0; background-color: #e80404; color:white;">End Meet</div></a>';
            }
            else{
                time -= 1;
                second -= 1;
                if(second < 0 && minute == 0 && hour > 0){
                    second = minute = 59;
                    hour -= 1;
                }
                else if(second < 0 && minute > 0){
                    second = 59;
                    minute -= 1;
                }
                
                localStorage.setItem("timer<?php echo $rowTutor['TutorId']?>", time);
            }
        }, 1000);
        // interval = setInterval(()=>{
        //     // console.log(second);
        //     second -= 1;
        //     if(second < 0 && minute == 0 && hour > 0){
        //         second = minute = 59;
        //         hour -= 1;
        //     }
        //     else if(second < 0 && minute > 0){
        //         second = 59;
        //         minute -= 1;
        //     }
        //     else if(second < 0 && minute == 0 && hour == 0){
                
        //     }

        //     if(second >= 0){
        //         count.innerHTML = hour+":"+minute+":"+second;
        //     }
        // }, 100);
    </script>
</body>
</html>