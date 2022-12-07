<?php
    include_once "../FrontEndAlvi/functions.php";
    insertChatFromTutor($_POST);
    header("Location: ../FrontEndExcel/ChatStudent.php?id=".$_GET['id']."&studentId=".$_GET['studentId']);
?>