<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM student
        WHERE StudentId = '".$_GET['studentId']."'
    ";
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);
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
            <img src="Image/logo.png" style="height:40px;width:40px;" alt="sds">
        </div>
    </div>
    <div class="menuflex">
        <div class="menu">
            <div class="amenu" style="margin-top:80px;margin-bottom:10px;">
                Account
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                Create Meet
            </div>
           <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                Schedule
           </div> -->
           <div class="amenu" href="" style="margin-bottom:10px;">
                Balance
            </div>
            <div class="amenu active" href="" style="margin-bottom:10px;">
                Report Student
            </div>
        </div>

        <div class="content">

            <table>
                <tr>
                    <td style="width:50%;padding:10px">
                        <div style="height:50px;width:100%">
                            <a href="../FrontEndAlvi/reportstudent.php?id=<?php echo $_GET['id']?>">
                                <div class="tatas">
                                    <
                                </div>
                            </a>
                             <div class="tatas" style="margin-left:10px;width:390px;font-size: 18px;">
                                Report Student
                             </div>

                        </div>
                        <div style="margin-top:10px">
                            <img src="../BackEndVincent/userProfilePictures/<?php echo $row['StudentPhoto']?>" style="width:460px">
                            <!-- <div class="cname">English</div> -->
                        </div>
                        <div style="text-align:center;font-family:tahoma;font-size:20px">
                            <?php echo $row['StudentName'] ?>
                        </div>
                    </td>
                    <td style="width:50%;padding:10px;vertical-align: top;">

                    <form action="" method="post">
                        <div style="height:50px;width:100%;margin-top: 50px;">
                            <div style="width:100%;height:550px">
                                <h3 class="tjudul">Comment</h3>
                                <input style="padding: 10px; height:200px;margin-top:10px;width:100%;border-radius:10px" type="text">
                                <br/><br/>
                                <div>

                                    <h3 style="float:left" class="tjudul">Evidence</h3>
                                    <img style="float:left;height:30px;margin-left:20px" src="image/attach.png">
                                </div>
                                <input style="padding: 10px; height:150px;margin-top:10px;width:100%;border-radius:10px" type="text">
                                <br/><br/>
                                <div>
                                    <a href="../FrontEndAlvi/reportstudent.php?id=<?php echo $_GET['id']?>">
                                        <div class="tbutton" style="cursor: pointer; width:150px;float:right;background-color: #FF0000;">
                                            <center>
                                                Send Report
                                            </center>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    </td>
                </tr>
            </table>

        </div>
    </div>

</body>
</html>