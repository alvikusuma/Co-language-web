<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM tutor
        WHERE CONCAT('Tutor', CAST(TutorId AS CHAR)) = '".$_GET['id']."'
    ";
    $resultTable = selectQuery($query);
    $row = mysqli_fetch_assoc($resultTable);

    echo $row['RequestId'];
?>