const chatContainer = document.querySelector('.chatContainer');
const id = document.querySelector('.id');
const tutorId = document.querySelector('.tutorId');

setInterval(()=>{
    console.log('OK3');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../BackEndVincent/studentMessage.php?id=' + id.value + '&tutorId=' + tutorId.value);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            chatContainer.innerHTML = xhr.response;
        }
    };
    xhr.send();
}, 500);