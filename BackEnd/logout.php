<?php
    session_id($_GET['id']);
    session_start();
    session_destroy(); //yg di destroy hanya session_id terkait aja (kalo ga pake session_id, semua session di destroy)
    header("Location: ../FrontEndAlvi/login.php");
?>
