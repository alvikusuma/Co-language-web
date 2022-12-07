<?php
    include_once "../FrontEndAlvi/functions.php";
    $query = "
        SELECT *
        FROM message
        WHERE (CONCAT('Tutor', CAST(SenderId AS CHAR)) = '".$_GET['id']."'
        AND ReceiverId = ".$_GET['studentId']."
        AND SenderType = 'Tutor')
        OR (SenderId = ".$_GET['studentId']."
        AND CONCAT('Tutor', CAST(ReceiverId AS CHAR)) = '".$_GET['id']."'
        AND SenderType = 'Student')
    ";
    $resultTable = selectQuery($query);
    $script = "";
    while($rowMessage = mysqli_fetch_assoc($resultTable)){
        if($rowMessage['SenderType'] == 'Tutor'){
            $script .= '
            <div class="cenemy">
                '.$rowMessage['Message'].'
            </div>';
        }
        else if($rowMessage['SenderType'] == 'Student'){
            $script .= '
            <div class="cself">
                '.$rowMessage['Message'].'
            </div>';
        }
    }
    echo $script;
?>