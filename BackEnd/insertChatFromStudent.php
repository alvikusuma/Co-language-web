<?php
    include_once "../FrontEndAlvi/functions.php";
    insertChatFromStudent($_POST);
    header("Location: ../FrontEndExcel/ChatTeacher.php?id=".$_GET['id']."&tutorId=".$_GET['tutorId']);
?>