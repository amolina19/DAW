

//Variables globales para luego usarlas
var nombre = null;
var apellidos = null;
var password = null;
var enviarBtn = null;
var adminBtn = null;
var idiomaBtn = null;
var idiomaValue = 0; //Defecto sera en Español


//Función que se dispara al cargar la página
window.onload = function(){

    enviarBtn = document.getElementById("enviar");
    //Impide recargar la página por el formulario
    enviarBtn.onsubmit = function(event){
        event.preventDefault;
        return false;
    }
    enviarBtn.onclick = function(){
        //Si es verdadero Generara un botón para cambiar de idioma y el de salir
        if(esAdmin()){
            //Comprobamos que el campo de el codigo sea numeros y no nulo
            if(document.getElementById("code").value != null && isNaN(document.getElementById("code").value == false)){
                alert("Campo código solo números o vacio");
            }else{
                //Si existen los botones, que no genere nuevos, en caso contrario genera los botones
                if(document.getElementById("idiomaBtn") == null && document.getElementById("adminBtn") == null){
                    //Funcion que genera los botnes de salir y traducir
                    generateBtnSalir();
                    generateBtnTraducir();
                }
            }
        }
    }


}

//Esta función se le llamara cuando se pulse el botón de Enviar y comprobara si es correcto
function esAdmin(){
    //Comprueba que Ambos campos son correctos

    if(idiomaValue == 0){
        if(document.getElementById("password").value == 'todopoderoso' && document.getElementById("usuario").value == 'Admin'){
            //Devolverva Verdadero
            return true;
        }
    }else{

        if(document.getElementById("password").value == 'password' && document.getElementById("usuario").value == 'Administrator'){
            //Devolverva Verdadero
            return true;
        }
    }
    
    //En caso contrario sera falso
    return false;
}

//Funcion salir
function salir(){
    //Llama a la función elminar botones
    removeBtns();
}
//Función que traduce los botones y los textos
function traducir(){
    //IdiomaValue es 0, se cambiara a ingles y luego su valor a 1 y viceversa
    if(idiomaValue == 0){
        var elements = document.getElementsByTagName("p");
        elements[0].innerHTML = "Name";
        elements[1].innerHTML = "LastName";
        elements[2].innerHTML = "Verificacion Code";
        elements[3].innerHTML = "User";
        elements[4].innerHTML = "Password";
        adminBtn.value = "Exit";
        idiomaBtn.value = "cambiar a español";
        enviarBtn.value = "Send";
        idiomaValue = 1;
    }else if(idiomaValue == 1){
        var elements = document.getElementsByTagName("p");
        elements[0].innerHTML = "Nombre";
        elements[1].innerHTML = "Apellidos";
        elements[2].innerHTML = "Código de Verificacion";
        elements[3].innerHTML = "Usuario";
        elements[4].innerHTML = "Contraseña";
        adminBtn.value = "Salir";
        idiomaBtn.value = "cambiar a ingles";
        enviarBtn.value = "Enviar";
        idiomaValue = 0;
    }
}

//Funciona que genera el elemento salir, y lo añade al DOM
function generateBtnSalir(){
    adminBtn = document.createElement("input");
    adminBtn.type = "button";
    adminBtn.value = "Salir";
    adminBtn.id = "adminBtn";
    adminBtn.classList.add("ml-3");
    adminBtn.onclick = function(){
        salir();
    }
    addBtns(adminBtn);
}

//Funciona que genera el elemento traducir, y lo añade al DOM
function generateBtnTraducir(){
    idiomaBtn = document.createElement("input");
    idiomaBtn.type = "button";
    idiomaBtn.value = "cambiar a ingles";
    idiomaBtn.id = "idiomaBtn";
    idiomaBtn.classList.add("ml-3");
    idiomaBtn.onclick = function(){
        traducir();
    }
    addBtns(idiomaBtn);
}

//Añade los elementos a la clase div donde se encuentran los botones
function addBtns(btn){
    var divButtons = document.getElementById("divButtons");
    divButtons.appendChild(btn);
}

//Eliminan los botones del DOM
function removeBtns(){
    document.getElementById("idiomaBtn").remove();
    document.getElementById("adminBtn").remove();
}
