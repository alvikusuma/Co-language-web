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
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);

    if(empty($_POST['AccountNumber']) || empty($_POST['amount']) || empty($_POST['password'])){
        echo "
        <script>
            alert('All field must not empty!');
            document.location.href = '../FrontEndAlvi/balance.php?id=".$_GET['id']."';
        </script>";
    }
    if($_POST['password'] === $row['TutorPassword']){
        if($_POST['amount'] > 0 && $_POST['amount'] <= $row['TutorBalance']){
            $query = "
                UPDATE tutor
                SET TutorBalance = {$row['TutorBalance']} - {$_POST['amount']}
                WHERE TutorId = {$_SESSION['Tutor']};
            ";
            manipulateQuery($query);

            echo "
            <script>
                alert('Withdraw Success!');
                document.location.href = '../FrontEndAlvi/balance.php?id=".$_GET['id']."';
            </script>";
        }
        else if($_POST['amount'] > $row['TutorBalance']){
            echo "
            <script>
                alert('Balance does not enough!');
                document.location.href = '../FrontEndAlvi/balance.php?id=".$_GET['id']."';
            </script>";
        }
        else{
            echo "
            <script>
                alert('Amount must greater than 0!');
                document.location.href = '../FrontEndAlvi/balance.php?id=".$_GET['id']."';
            </script>";
        }
    }
    else{
        echo "
        <script>
            alert('Wrong Password!');
            document.location.href = '../FrontEndAlvi/balance.php?id=".$_GET['id']."';
        </script>";
    }
?>