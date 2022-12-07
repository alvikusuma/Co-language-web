<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM message
        WHERE (CONCAT('Student', CAST(SenderId AS CHAR)) = '".$_GET['id']."'
        AND ReceiverId = ".$_GET['tutorId']."
        AND SenderType = 'Student')
        OR (SenderId = ".$_GET['tutorId']."
        AND CONCAT('Student', CAST(ReceiverId AS CHAR)) = '".$_GET['id']."'
        AND SenderType = 'Tutor')
    ";
    $resultTable = selectQuery($query);
    $script = "";
    while($rowMessage = mysqli_fetch_assoc($resultTable)){
        if($rowMessage['SenderType'] == 'Student'){
            $script .= '
            <div class="cenemy">
                '.$rowMessage['Message'].'
            </div>';
        }
        else if($rowMessage['SenderType'] == 'Tutor'){
            $script .= '
            <div class="cself">
                '.$rowMessage['Message'].'
            </div>';
        }
    }
    echo $script;
?>