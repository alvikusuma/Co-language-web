const id = document.querySelector(".id");

setInterval(()=>{
    console.log("OK2");
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../BackEndVincent/tutorGotRequest.php?id=' + id.value);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            if(xhr.response != 0){
                document.location.href = '../FrontEndExcel/ChatStudent.php?id=' + id.value + '&studentId=' + xhr.response;
            }
            // else{
            //     document.location.href = '../FrontEndExcel/TeacherRequest.php?id=' + id.value;
            // }
        }
    };

    xhr.send();
}, 500);