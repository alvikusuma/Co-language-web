const container = document.querySelector(".grid");
const id = document.querySelector(".id");

setInterval(()=>{
    // console.log("OK1");
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../BackEndVincent/searchOnlineTutor.php?id=' + id.value);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            container.innerHTML = xhr.response;
        }
    };
    xhr.send();
}, 500);