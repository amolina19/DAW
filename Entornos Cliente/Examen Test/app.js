
var nombre = null;
var password = null;
var buttonSend = null;
var languange = 0;

window.onload = function(){

    nombre = document.getElementById("nombre");
    password = document.getElementById("password");
    buttonSend = document.getElementById("enviar");
    
    buttonSend.onclick = function (){
        if(isAnAdmin()){
            var buttonAdmin = document.createElement("input");
            buttonAdmin.value = "Idioma";
            buttonAdmin.id = "adminbtn";
            buttonAdmin.setAttribute("type","submit");
            buttonAdmin.onclick = function(){
                changeLanguge();
            }
            buttonAdmin.classList.add("mt-5");
            document.getElementById("form").appendChild(buttonAdmin);
        }
    }

    document.getElementById("form").onsubmit = function(event) {
        event.preventDefault();
        return false;
    }
}

function isAnAdmin(){

    if(nombre.value.toLocaleLowerCase() == "admin" && password.value == 'todopoderoso'){
        return true;
    }
    return false;
}

function changeLanguge(){
    if(languange == 0){
        var elementsp = document.getElementsByTagName("p");
        elementsp[0].innerHTML = "Name";
        elementsp[1].innerHTML = "Password";
        var elementsBtn = document.getElementsByTagName("input");
        elementsBtn[2].value = "Send";
        elementsBtn[3].value = "Language"; 
        languange = 1;
    }else if(languange == 1){
        var elementsp = document.getElementsByTagName("p");
        elementsp[0].innerHTML = "Nombre";
        elementsp[1].innerHTML = "Contraseña";
        var elementsBtn = document.getElementsByTagName("input");
        elementsBtn[2].value = "Enviar";
        elementsBtn[3].value = "Idioma"; 
        languange = 0;
    }
    
}