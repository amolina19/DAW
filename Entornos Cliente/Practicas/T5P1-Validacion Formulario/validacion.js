document.cookie = "intentos=0";
enviar = document.getElementById("enviar");

var nombre = document.getElementById("fname");
var apellidos = document.getElementById("lname");

    
var nombre = document.getElementById("nombre");
var apellidos = document.getElementById("apellidos");
var edad = document.getElementById("edad");
var nif = document.getElementById("nif");
var email = document.getElementById("email");
var provincia = document.getElementById("provincia");
var fechanacimiento = document.getElementById("fechanacimiento");
var telefono = document.getElementById("telefono");
var visita = document.getElementById("horavisita");

var erroresDiv = document.getElementById("errores");

var strError = "";
var errors = new Map([
    [nombre,false],
    [apellidos,false],
    [edad,false],
    [nif,false],
    [email,false],
    [provincia,false],
    [telefono,false],
    [visita,false],
]);



window.onload = function() {

    document.getElementById("enviar").onclick = function fun() {
        check();
    }

    document.getElementById("form").onsubmit = function(event) {
        event.preventDefault();
        return false;
    }

    //Triggers
    document.getElementById("lname").onblur = function() {nombreUp()};
    document.getElementById("fname").onblur = function() {apellidoUp()};

    document.getElementById("edad").onblur = function() {edadfun()};
    
}


function nombreUp(){
    document.getElementById("fname").value = document.getElementById("fname").value.toUpperCase();
}

function apellidoUp(){
    document.getElementById("lname").value = document.getElementById("lname").value.toUpperCase();
}

function edadfun(){
    edadx = document.getElementById("edad").value;

    if(edadx == null ){
        alert("Edad nulo");
    }else{
        if(!isNaN(edadx)){
            if((edadx >0 && edadx <= 105) == false){
                document.getElementById("edad").focus();
                alert("Focused");
                errors.edad = true;
            }else{
                alert("Correct");
                errors.edad = false;
            }
        }else{
            alert("Not a number");
            errors.edad = true;
        }
    }
}

function check(){

    if(nombre.value == null){
        errors.set(nombre,true);
    }

    if(apellidos.value == null){
        errors.set(apellido,true);
    }
    
    //edadfun();
    checkErrors();
    
}

function checkErrors(){
    alert("entro en checkErrors");
    strError = "";

    for (var [key, value] of errors) {
        alert(key + ' ' + value);
        if(value == true){
            
            strError += "<div> Error en "+key.toUpperCase()+"</div>";
        }
    }
    erroresDiv.innerHTML = strError;
}


