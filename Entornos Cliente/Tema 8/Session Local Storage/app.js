
var session;
var local;
var button;

window.onload = function(){

    checkStorage();

    session = document.getElementById("session");
    local = document.getElementById("local");
    button = document.getElementById("button");
    //session.innerHTML = sessionStorage.getItem("contador");
    //local.innerHTML = localStorage.getItem("contador");

    session.innerHTML = sessionStorage.contador;
    local.innerHTML = localStorage.contador;

    button.onclick = function(){
        sessionStorage.contador = parseInt(sessionStorage.getItem("contador"))+1;
        localStorage.contador = parseInt(localStorage.getItem("contador"))+1;

        //sessionStorage.contador = parseInt(sessionStorage.contador) +1;
        //localStorage.contador = parseInt(sessionStorage.contador) +1;
        session.innerHTML = sessionStorage.getItem("contador");
        local.innerHTML = localStorage.getItem("contador");
    }
    
}


function checkStorage(){
    if(!localStorage.contador){
        //localStorage.setItem("contador",0);
        localStorage.contador = 0;
    }

    if(!sessionStorage.contador){
        //sessionStorage.setItem("contador",0);
        sessionStorage.contador = 0;
    }
}
