
var info;
var nombre;
var guardar;
var borrar;
var borrarBlock = false;
window.onload = function(){

    info = document.getElementById("info");
    nombre = document.getElementById("nombre");
    guardar = document.getElementById("guardar");
    borrar = document.getElementById("borrar");

    var exists = checkStorage();

    if(exists){
        info.innerHTML = "¡Ey! ya te conozco.. Hola "+localStorage.getItem("nombre");
        nombre.setAttribute("placeholder","Por si quieres cambiar de nombre "+localStorage.getItem("nombre"));
    }else{
        info.innerHTML = "¡Vaya, no sé cómo te llamas!, Escribe debajo tu nombre";
    }

    guardar.onclick = function(){
        if(nombre.value != ""){
            localStorage.setItem("nombre",nombre.value);
            nombreGuardado();
        }else{
            alert("El campo nombre esta vacio, rellenalo");
        }
    }

    borrar.onclick = function(){

        if(borrarBlock == false){
            borrarBlock = true;
            var info2 = document.createElement("div");
            info2.classList.add("info");
            var warning = document.createElement("div");
            var buttonDelete = document.createElement("input");
            buttonDelete.classList.add("info");
    
            info2.innerHTML = "Segunda oportunidad";
            warning.innerHTML = "Si deseas borrar todos los datos localStorage(para probar esta página como si fuera la primera vez), pulsa el siguiente botón y luego recarga la página";
            buttonDelete.value = "Borrar todos los datos guardados";
            buttonDelete.setAttribute("type","submit");
    
            buttonDelete.onclick = function(){
                localStorage.removeItem("nombre");
            }
    
            document.getElementById("form").appendChild(info2);
            document.getElementById("form").appendChild(warning);
            document.getElementById("form").appendChild(buttonDelete)
        }
    }

}

function nombreGuardado(){
    alert("Encantado de conocerte "+localStorage.getItem("nombre")+". He guardado tu nombre. Recarga la página para comprobarlo");
}

function checkStorage(){
    if(!localStorage.nombre){
        localStorage.setItem("nombre","");
        return false;
    }
    return true;
}