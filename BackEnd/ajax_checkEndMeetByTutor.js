const id2 = document.querySelector('.id');
const tutorId2 = document.querySelector('.tutorId');

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../BackEndVincent/tutorGotRequest.php?id=Tutor' + tutorId2.value);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            console.log(xhr.response);
            if(xhr.response == 0){
                // alert('Meet ended by Tutor!');
                document.location.href = "../FrontEndAlvi/findpartner.php?id=" + id2.value;
            }
        }
    };
    xhr.send();
}, 500);