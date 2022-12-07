<?php
    function connectDB(){
        $databaseConnection = mysqli_connect('localhost', 'root', '', 'co_language');
        return $databaseConnection;
    }

    function selectQuery($query):mysqli_result{ 
        $databaseConnection = connectDB();
        return mysqli_query($databaseConnection, $query);
    }

    function manipulateQuery($query){ 
        $databaseConnection = connectDB();
        mysqli_query($databaseConnection, $query) or die(mysqli_error($databaseConnection));
    }

    function signup($input){ //fitur unique belum ada
        $name = $input['name'];
        $email = $input['email'];
        $pass = $input['pass'];
        $repeatpass = $input['repeatpass'];
        $phone = $input['phone'];
        $language = $input['language'];
        if(!empty($input['tutor'])){
            $tutor = $input['tutor'];
        }
        else{
            $tutor = null;
        }
        if(!empty($input['student'])){
            $student = $input['student'];
        }
        else{
            $student = null;
        }
        // $tutor = $input['tutor'];
        // $student = $input['student'];
        // var_dump($input['student']);
        // if(in_array("tutor", $input)){
        //     $tutor = $input['tutor'];
        //     $student = null;
        // }
        // else{
        //     $tutor = null;
        //     $student = $input['student'];
        // }

        // var_dump($input);
        // var_dump($input['tutor']);
        // die;

        // var_dump($_FILES);

        if(empty($name) || empty($email) || empty($pass) || empty($repeatpass) || empty($phone) || empty($language) || (empty($tutor) && empty($student)) || $_FILES['picture']['error'] == 4){
            echo "<script>
                alert('All Field cannot be empty!');
                document.location.href = 'signup.php';
            </script>";
        }
        else if($pass !== $repeatpass){
            echo "<script>
                alert('Password and Repeat Password does not match!');
                document.location.href = 'signup.php';
            </script>";
        }

        // var_dump($_FILES);
        // var_dump($_FILES['picture']);
        $pictureSavePath = uniqid();
        $pictureSavePath .= '.';
        $extension = explode('.', $_FILES['picture']['name']);
        // var_dump($extension);
        $extension = end($extension);
        // var_dump($extension);
        $extension = strtolower($extension);
        // var_dump($extension);
        $pictureSavePath .= $extension;
        move_uploaded_file($_FILES['picture']['tmp_name'], "../BackEndVincent/userProfilePictures/".$pictureSavePath);

        if($tutor != null){ //registrasi sebagai tutor
            $query = "
                INSERT INTO tutor
                VALUES('', '$name', '$email', '$pass', '$phone', 0, '$language', 'Offline', 0, 0, '$pictureSavePath', 0)
            ";
            manipulateQuery($query);
            echo "<script>
                alert('Sign Up as Tutor Success');
                document.location.href = 'login.php';
            </script>";
        }
        else if($student != null){ //registrasi sebagai student
            $query = "
                INSERT INTO student
                VALUES('', '$name', '$email', '$pass', '$phone', '$pictureSavePath')
            ";
            manipulateQuery($query);
            echo "<script>
                alert('Sign Up as Student Success');
                document.location.href = 'login.php';
            </script>";
        }
    }

    function login($input){
        $email = $input['email'];
        $pass = $input['pass'];

        $query = "
            SELECT * FROM tutor
            WHERE TutorEmail = '$email'
        ";
        $resultTable = selectQuery($query);
        if($row = mysqli_fetch_assoc($resultTable)){
            if($row['TutorPassword'] !== $pass){
                echo "<script>
                    alert('Email or Password is wrong!');
                    document.location.href = 'login.php';
                </script>";
            }
            else{
                $id = $row['TutorId'];
                $formattedId = 'Tutor'.$id;
                session_id($formattedId);
                session_start();
                $_SESSION['Tutor'] = $id;
                // session_write_close();
                echo "<script>
                    alert('Success Login as Tutor');
                    document.location.href = 'createmeet.php?id=$formattedId';
                </script>";
            }
        }
        else{
            $query = "
                SELECT * FROM student
                WHERE StudentEmail = '$email'
            ";
            $resultTable = selectQuery($query);
            if($row = mysqli_fetch_assoc($resultTable)){
                if($row['StudentPassword'] !== $pass){
                    echo "<script>
                        alert('Email or Password is wrong!');
                        document.location.href = 'login.php';
                    </script>";
                }
                else{
                    $id = $row['StudentId'];
                    $formattedId = 'Student'.$id;
                    session_id($formattedId);
                    session_start();
                    $_SESSION['Student'] = $id;
                    echo "<script>
                        alert('Success Login as Student');
                        document.location.href = 'findpartner.php?id=$formattedId';
                    </script>";
                }
            }
            else{
                echo "<script>
                    alert('Email not exist!');
                    document.location.href = 'login.php';
                </script>";
            }
        }
    }

    function showOnlineTutor($urlGet){
        $query = "
            SELECT * FROM tutor
            WHERE TutorOnlineStatus = 'Online'
        ";
        $resultTable = selectQuery($query);
        if($resultTable == null){
            echo 'There is no tutor online!';
        }
        while($row = mysqli_fetch_assoc($resultTable)){
            echo '
            <a href="../FrontEndExcel/TeacherInformation.php?id='.$urlGet['id'].'&tutorId='.$row['TutorId'].'">
                <div class="tutorFrame">
                    <img src="../BackEndVincent/userProfilePictures/'.$row['TutorPhoto'].'" alt="">
                    <p>'.$row['TutorName'].'</p>
                    <p>'.$row['TutorLanguage'].'</p>
                    <p>'.$row['TutorDuration']." Minutes (Rp".$row['TutorPrice'].')</p>
                </div>
            </a>';
        }
    }

    function showAllTutor($urlGet){    
        $query = "
            SELECT * FROM tutor
        ";
        $resultTable = selectQuery($query);
        while($row = mysqli_fetch_assoc($resultTable)){
            if($row['TutorOnlineStatus'] == 'Online'){
                echo '
                <a href="../FrontEndExcel/ReportTutor.php?id='.$urlGet['id'].'&tutorId='.$row['TutorId'].'">
                    <div class="tutorFrame">
                        <img src="../BackEndVincent/userProfilePictures/'.$row['TutorPhoto'].'" alt="">
                        <p>'.$row['TutorName'].'</p>
                        <p>'.$row['TutorLanguage'].'</p>
                    </div>
                </a>';
            }
            else{
                echo '
                <a href="../FrontEndExcel/ReportTutor.php?id='.$urlGet['id'].'&tutorId='.$row['TutorId'].'">
                    <div class="tutorFrame" style="opacity:0.5;">
                        <img src="../BackEndVincent/userProfilePictures/'.$row['TutorPhoto'].'" alt="">
                        <p>'.$row['TutorName'].'</p>
                        <p>'.$row['TutorLanguage'].'</p>
                    </div>
                </a>';
            }
        }
    }

    function showAllStudent($urlGet){    
        $query = "
            SELECT * FROM student
        ";
        $resultTable = selectQuery($query);
        while($row = mysqli_fetch_assoc($resultTable)){
            echo '
            <a href="../FrontEndExcel/ReportStudent.php?id='.$urlGet['id'].'&studentId='.$row['StudentId'].'">
                <div class="tutorFrame">
                    <img src="../BackEndVincent/userProfilePictures/'.$row['StudentPhoto'].'" alt="">
                    <p>'.$row['StudentName'].'</p>
                </div>
            </a>';
        }
    }

    function insertChatFromStudent($data){
        $chat = $data['studentChat'];

        $query = "
            INSERT INTO message
            VALUES('', RIGHT('".$_GET['id']."', CHAR_LENGTH('".$_GET['id']."') - 7), '".$_GET['tutorId']."', '$chat', 'Student')
        ";
        manipulateQuery($query);
    }

    function insertChatFromTutor($data){
        $chat = $data['tutorChat'];

        $query = "
            INSERT INTO message
            VALUES('', RIGHT('".$_GET['id']."', CHAR_LENGTH('".$_GET['id']."') - 5), '".$_GET['studentId']."', '$chat', 'Tutor')
        ";
        manipulateQuery($query);
    }
?>