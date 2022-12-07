const chatContainer = document.querySelector(".chatContainer");
const id2 = document.querySelector(".id");
const studentId = document.querySelector(".studentId");

setInterval(()=>{
    console.log("OK4");
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../BackEndVincent/tutorMessage.php?id=' + id2.value + '&studentId=' + studentId.value);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            chatContainer.innerHTML = xhr.response;
        }
    };
    xhr.send();
}, 500);