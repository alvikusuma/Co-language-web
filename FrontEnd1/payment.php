<?php
    include_once "functions.php";
    $query = "
        SELECT * FROM tutor
        WHERE TutorId = ".$_GET['tutorId'];
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- <link rel="stylesheet" href="style.css?x=6"> -->
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
                Account
            </div>
            <div class="amenu active" style="margin-bottom:10px;">
                Find Partner
            </div>
           <div class="amenu" style="margin-bottom:10px;">
                Report Partner
           </div>
           <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                Balance
            </div>
            <div class="amenu" href="" style="margin-bottom:10px;">
                Report Student
            </div> -->
        </div>

        <div class="content" style="padding:20px;">
                <div>
                   <center>
                    <h3 style="float:center;margin-right: 10px;" class="tjudulf">
                        Payment
                    </h3>
                   </center>
                    <!-- <div style="float:left" class="lbl">
                        March 2022
                    </div> -->


                </div>
                <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:10px;height:2px"></div>
                
                <div style="width: 100%">
                    <div style="width:40%;float:left;text-align: center;">
                        <label style="font-size:40px;font-family:tahoma;color: gray;">
                        Total Payment
                        </label>
                        <br>
                        <br>
                        <br>
                        <div class="testing">
                            <label for="" style="color:gray;">BANK MANDIRI</label>
                            <br>
                            <br>
                            <label for="" style="margin-left: 200px;font-size:x-large;color: #04A1E8;">082218239503024234</label>
                            <br>
                            <br>
                            <label for="">Payment Step:</label>
                            <br>
                            <br>
                            <div class="step">
                            <div class="step-1">
                                <p>1. Open M-banking on your smartphone</p>
                                <p>2. Enter the payment menu</p>
                                <p>3. Choose the payment type</p>
                                <p>4. Input virtual number</p>
                                <p>5. Made a payment</p>
                            </div>
                            <div class="bush">
                                <br>
                                <a href="../FrontEndExcel/TeacherInformation.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>">
                                    <button class="cancel" style="cursor: pointer;">CANCEL</button>
                                </a>
                                <a href="../FrontEndExcel/ChatTeacher.php?id=<?php echo $_GET['id'].'&tutorId='.$_GET['tutorId'] ?>">
                                    <button class="done" style="cursor: pointer;">DONE</button>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- <div style="float:left;width:2px;background-color:#DDDDDD;height:100px">
                    </div> -->
                    <div style="width:50%;float:right;text-align: center;margin-left: 10px;">
                        <br/>
                        <label style="font-size:20px;font-family:tahoma;justify-content:right">
                            Rp<?php echo $row['TutorPrice']?>
                        </label>
                        <br/>
                        <!-- <label style="font-size:15px;font-family:tahoma;color:#AAAAAA;">
                           09:00 - 11:00 GMT +7
                        </label> -->
                    </div>
                    <div>
                        <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:400px;height:0"></div>
                    </div>
                </div>
                
        </div>
    </div>

</body>
</html>