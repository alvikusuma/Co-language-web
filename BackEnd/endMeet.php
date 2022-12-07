<?php
    include_once "../FrontEndAlvi/functions.php";
    if(!empty($_GET['studentId'])){ //dari sisi Tutor
        $query = "
            UPDATE tutor
            SET RequestId = 0, TutorOnlineStatus = 'Online'
            WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
        ";
        manipulateQuery($query);
        $query = "
            SELECT * FROM tutor
            WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
        ";
        $resultTable = selectQuery($query);
        $row = mysqli_fetch_assoc($resultTable);
        header("Location: ../FrontEndExcel/TeacherRequest.php?id=Tutor".$row['TutorId']);
    }
    else if(!empty($_GET['tutorId'])){ //dari sisi Student
        $query = "
            UPDATE tutor
            SET RequestId = 0, TutorOnlineStatus = 'Online'
            WHERE TutorId = ".$_GET['tutorId']."
        ";
        manipulateQuery($query);
        header("Location: ../FrontEndAlvi/findpartner.php?id=".$_GET['id']);
    }
?>