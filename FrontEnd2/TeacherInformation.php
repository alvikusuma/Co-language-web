<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM tutor
        WHERE TutorId = '".$_GET['tutorId']."'
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
    <title>Teacher Information</title>
    <link rel="stylesheet" href="style.css?x=5">
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
                            <a href="../FrontEndAlvi/findpartner.php?id=<?php echo $_GET['id'] ?>">
                                <div class="tatas">
                                <
                                </div>
                            </a>
                             <div class="tatas" style="margin-left:10px;width:390px;font-size: 18px;">
                                Teacher Information (<?php echo $row['TutorName'];?>)
                             </div>

                        </div>
                        <div style="margin-top:10px">
                            <img src="../BackEndVincent/userProfilePictures/<?php echo $row['TutorPhoto']?>" style="width:460px">
                            <div class="cname"><?php echo $row['TutorLanguage']?></div>
                        </div>
                        <div style="text-align:center;font-family:tahoma;font-size:20px">
                            <!-- TutorName -->
                        </div>
                        <div>
                            <table style="margin:auto">
                                <tr>
                                    <td>
                                        <!-- <img style="height:40px" src="image/star.png"> -->
                                    </td>
                                    <td>
                                        <!-- 4.9 -->
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="width:50%;padding:10px;vertical-align: top;">

                        <a href="ReportTutor.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>">
                            <img style="float:right" src="image/error.png">
                        </a>
                        <div style="height:50px;width:100%;margin-top: 50px;">
                            <div style="width:100%;height:550px">
                                <h3>Decription</h3>
                                <div style="width:95%;margin-left:5%">
                                    <table style="width:100%">
                                        <tr>
                                            <td>
                                                Age
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                23 years old
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Citizenship
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                Italia
                                            </td>
                                        </tr>
                                    </table>
                                    <label>Bio</label>
                                    <p style="margin-left:10px">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in rutrum ipsum. Nunc non erat nisi. Vivamus ex urna, rhoncus pharetra mattis et, varius sit amet magna. Sed nec mauris vitae libero rutrum efficitur. Integer hendrerit, diam sit amet dignissim consectetur, orci nulla scelerisque urna, imperdiet sagittis lectus ligula quis ante. Quisque at auctor est. Nulla blandit neque risus, sit amet molestie felis tristique at. Etiam finibus, ligula at vehicula imperdiet, elit erat scelerisque lorem, vitae sagittis urna augue ac ex. Etiam posuere fringilla tellus id molestie. Duis efficitur pulvinar dolor vitae lobortis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla eu leo vulputate, vestibulum magna quis, aliquet quam.
                                    </p>
                                </div>
                                <h3 style="margin-top:10px">Experiences</h3>
                                <div style="width:95%;margin-left:5%">
                                    <table style="width:100%">
                                        <tr>
                                            <td>
                                                Teach Hours
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                51.5 Hours
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Student Taught
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                23 Student
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <h3 style="margin-top:10px">Transaction Info</h3>
                                <div style="width:95%;margin-left:5%">
                                    <table style="width:100%">
                                        <tr>
                                            <td>
                                                Meet Duration
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                <?php echo $row['TutorDuration']." Minutes";?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Price
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td>
                                                <?php echo "Rp".$row['TutorPrice'];?>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </td>
                </tr>
            </table>
            
            <table style="width:100%;margin-top: 0px;">
                <tr>
                    <td style="width:80%;padding:10px">
                    <a href="../FrontEndAlvi/payment.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>">
                        <div class="tbutton">
                            <center>
                                Request Live Chat
                            </center>
                        </div>
                    </a>
                    </td>
                    <!-- <td style="width:20%;padding:10px">
                        <img src="image/sms.png">
                    </td> -->
                </tr>
            </table>
        </div>
    </div>
</body>
</html>