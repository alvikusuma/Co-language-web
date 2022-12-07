<?php
    session_id($_GET['id']);
    session_start();
    if($_SESSION['Tutor'] == null){
        header("Location: ../FrontEndAlvi/login.php");
        exit;
    }

    include_once "../FrontEndAlvi/functions.php";
    if(!empty($_POST)){
        if(empty($_POST['price']) || empty($_POST['duration'])){
            echo "<script>
                alert('Price and Duration Must Not Empty!');
            </script>";
        }
        else{
            $query = "
                UPDATE tutor
                SET TutorPrice = ".$_POST['price'].", TutorDuration = ".$_POST['duration']."
                WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
            ";
            manipulateQuery($query);
            header("Location: TeacherRequest.php?id=".$_GET['id']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Meet</title>
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
            <img src="Image/logo.png" style="height:40px;width:40px;" alt="sds">
        </div>
    </div>
    <div class="menuflex">
        <div class="menu">
            <div class="amenu" style="margin-top:80px;margin-bottom:10px;">
                Account
            </div>
            <div class="amenu active" style="margin-bottom:10px;">
                Create Meet
            </div>
           <!-- <div class="amenu" href="" style="margin-bottom:10px;">
                Schedule
           </div> -->
           <div class="amenu" style="margin-bottom:10px;">
                Balance
            </div>
            <div class="amenu" style="margin-bottom:10px;">
                Report Student
            </div>
        </div>

        <form action="" method="POST">
            <div class="content" style="padding:20px;">
                <div class="flex-col">
                    <div>
                        <h3 style="float:left;margin-right: 10px;" class="tjudulf">
                            Live Class Info
                        </h3>
                        <!-- <img src="image/add.png" style="float:left"/> -->
        
        
                    </div>
                    <div style="width:100%;background-color:#DDDDDD;margin-top:10px;margin-bottom:10px;height:2px"></div>
                    <!-- <table style="width:100px">
                        <tr>
                            <td class="cjtgl">Day</td>
                            <td class="cjtgl">Month</td>
                            <td class="cjtgl">Year</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="cjtgl2"><input style="height:30px;width:30px;" class="iptDate"/></td>
                            <td class="cjtgl2"><input style="height:30px;width:30px;" class="iptDate"/></td>
                            <td class="cjtgl2"><input style="height:30px;width:60px;" class="iptDate"/></td>
                            <td class="cjtgl2">
                                <img src="image/dpicker.png">
                            </td>
                        </tr>
                    </table> -->
        
        
                    <table style="margin-top:30px;">
                        <tr>
                            <td class="cjtgl" style="text-align: left;width:180px">Price (Rupiah)</td>
                            <td class="cjtgl" style="text-align: left">Duration (Minutes)</td>
                        </tr>
                        <tr>
                            <td class="cjtgl2" style="text-align: left"><input name="price" style="height:30px;width:180px;padding:5px 10px;" class="iptDate"/></td>
                            <td class="cjtgl2" style="text-align: left"><input name="duration" style="height:30px;width:180px;padding:5px 10px;" class="iptDate"/></td>
                        </tr>
                    </table>

                    <div id="converter" class="tbutton" style="width: fit-content; margin-top: 20px; cursor: pointer; background-color: yellow; color: black;">
                        <center>
                            Money Convertion Info
                            <script>
                                const clicked = document.querySelector("#converter");
                                clicked.addEventListener("click", function(){
                                    window.open("https://www.google.com/search?q=convert+rp");
                                });
                            </script>
                        </center>
                    </div>
        
                    <!-- <table style="margin-top:30px;">
                        <tr>
                            <td class="cjtgl" style="text-align: left;width:180px">Payment Method</td>
                        </tr>
                        <tr>
                            <td class="cjtgl2" style="text-align: left">
                                <select style="height:30px;width:180px;" class="iptDate">
                                    <option value="">Mandiri</option>
                                    <option value="">BCA</option>
                                </select>
                            </td>
                        </tr>
                    </table> -->
                </div>
                
                <div class="flex-row" style="margin-top: 40px;">
                    <a href="../FrontEndAlvi/createmeet.php?id=<?php echo $_GET['id']?>">
                        <div class="tbutton" style="width:150px;background-color: #fa0000;">
                            <center>
                                Cancel
                            </center>    
                        </div>
                    </a>
                    <input type="submit" id="submitBtn" style="display: none;">
                    <label for="submitBtn" class="tbutton" style="width:150px;background-color: #04A1E8; cursor: pointer;">
                        <center>
                            Done
                        </center>
                    </label>
                </div>
            </div>
        </form>
    </div>
    <script>
        const clicked = document.querySelector("#converter");
        clicked.addEventListener("click", function(){
            window.open("https://www.google.com/search?q=convert+rp");
        });
    </script>

</body>
</html>