
var nombre,apellidos,edad,nif,email,provincia,fechanacimiento,telefono,visita,erroresDiv,intentos,intentosnum=0;

window.onload = function() {
        
    nombre = document.getElementById("nombre");
    apellidos = document.getElementById("apellidos");
    edad = document.getElementById("edad");
    nif = document.getElementById("nif");
    email = document.getElementById("email");
    provincia = document.getElementById("provincia");
    fechanacimiento = document.getElementById("fechanacimiento");
    telefono = document.getElementById("telefono");
    visita = document.getElementById("horavisita");

    intentos = document.getElementById("intentos");
    erroresDiv = document.getElementById("errores");

    //Butons
    document.getElementById("enviar").onclick = function fun() {
        checkForm();
    }

    document.getElementById("limpiar").onclick = function fun() {
        limpiar();
    }

    document.getElementById("form").onsubmit = function(event) {
        event.preventDefault();
        return false;
    }

    //Triggers
    nombre.onfocusout = function() { nombreUp(); }
    apellidos.onfocusout = function() { apellidoUp(); }
    edad.onfocusout = function() { edadfun(); }
    email.onfocusout = function() { emailfun(); }
    telefono.onfocusout = function() { telefonofun(); }
    nif.onfocusout = function () { niffun(); }
    provincia.onfocusout = function() { provinciafun(); }
    fechanacimiento.onfocusout = function() { fechanacfun(); }
    visita.onfocusout = function() { horafun(); }
}

function checkForm(){

    if(!document.getElementById("errores").hasChildNodes()){
        if(!isCamposVacios()){
            var value = window.confirm("¿Seguro que quieres enviar el formulario?");
            if(value){
                limpiar();
                window.alert("Has enviado el formulario");
            }
        }else{
            window.alert("Campos vacios!!");
            aumentoIntentos();
        }
        
    }else{
        aumentoIntentos();
    }
}

function isCamposVacios(){

    var campos = document.getElementsByClassName("campo");

    for(i=0;i<campos.length;i++){
        if(campos[i].value == null){
            return true;
        }

        if(campos[i].value.length == 0){
            return true;
        }

        if(campos[i].value == -1){
            return true;
        }
    }
    return false;
}

function createError(node){
    var docerror = document.getElementById("errores");
    var nodeDel = document.getElementById(node.id+"-error");

    if(docerror.contains(nodeDel) == false){
        var elementp = document.createElement("p");
        elementp.classList.add("errores");
        elementp.id = node.id+"-error";
        elementp.innerHTML = " Error en "+node.id.toUpperCase();
        docerror.appendChild(elementp);
    }
}
    

function eliminateError(node){
    document.getElementById(node.id+"-error").remove();
}

function delLogErrors(){

    var logErrors = document.getElementsByClassName("errores");

    for(i=0;i<logErrors.length;i++){
        logErrors[i].remove();
    }
}

function limpiar(){
    nombre.value = null;
    apellidos.value = null;
    edad.value = null;
    nif.value = null;
    provincia.value = null;
    fechanacimiento.value = null;
    telefono.value = null;
    visita.value = null;

    var clean = document.getElementsByClassName("error");

    for(i=0;i<clean.length;i++){
        clean[i].classList.remove("errores");
    }
    delLogErrors();
    document.body.focus();
}

function nombreUp(){

    if(nombre.value.length == 0){
        document.getElementById("nombre").classList.add("error");
        nombre.focus();
        errors[1][0] = true;
    }else{
        nombre.value = nombre.value.toUpperCase();
        document.getElementById("nombre").classList.remove("error");
    }
}

function apellidoUp(){

    if(apellidos.value.length == 0){
        apellidos.focus();
        document.getElementById("apellidos").classList.add("error");
        createError(apellidos);
    }else{
        apellidos.value = apellidos.value.toUpperCase();
        document.getElementById("apellidos").classList.remove("error");
        eliminateError(apellidos);
    }
}

function edadfun(){

    if(edad.value == null ){
        //alert("Edad nulo");
        createError(edad);
    }else{
        if(!isNaN(edad.value)){
            if((edad.value > 0 && edad.value <= 105) == false){
                edad.focus();
                document.getElementById("edad").classList.add("error");
                createError(edad);
            }else{
                
                document.getElementById("edad").classList.remove("error");
                eliminateError(edad);
            }
        }else{
            document.getElementById("edad").classList.add("error");
            eliminateError(edad);
        }
    }
}

function niffun(){

    var express = "^[0-9]{8}[-]{1,1}[A-Z]{1,1}$";

    if(nif.value.length == 0){
        nif.classList.add("error");
        nif.focus();
        createError(nif);
    }else if(nif.value.match(express)){
        eliminateError(edad);
        nif.classList.remove("error");
    }else{
        nif.classList.add("error");
        nif.focus();
        createError(nif);
    }
}

function emailfun(){
    var express = "[a-zA-Z0-9]{2,63}@[a-zA-Z0-9-]{2,63}[.]{1,1}[a-zA-Z]{2,63}";
    var valueEmail = email.value;
    if(valueEmail.length == 0){
        email.focus();
        document.getElementById("email").classList.add("error");
        createError(email);
    }else if(valueEmail.match(express)){
        eliminateError(email);
        document.getElementById("email").classList.remove("error");
    }else{
        email.focus();
        createError(email);
        document.getElementById("email").classList.add("error");
    }
}

function provinciafun(){
    if(provincia.value == -1){
        provincia.classList.add("error");
        provincia.focus();
        createError(provincia);
    }else{
        provincia.classList.remove("error");
        eliminateError(provincia);
    }
}

function fechanacfun(){

    var express = "[0-9]{2}[-]{1,1}[0-9]{2}[-]{1,1}[0-9]{4}";
    alert(fechanacimiento.value);
    if(fechanacimiento.value == null){
        createError(fechanacimiento);
        fechanacimiento.classList.add("error");
        fechanacimiento.focus();
    }else if(fechanacimiento.value.match(express)){
        eliminateError(fechanacimiento);
        fechanacimiento.classList.remove("error");
    }else{
        createError(fechanacimiento);
        fechanacimiento.classList.add("error");
        fechanacimiento.focus();
    }
}

function telefonofun(){
    
    var expres = "^[0-9]{9}$"
    if(telefono.value.length == 0){
        telefono.classList.add("error");
        telefono.focus();
        createError(telefono);
    }else if(telefono.value.match(expres)){
        telefono.classList.remove("error");
        eliminateError(telefono);
    }else{
        telefono.classList.add("error");
        telefono.focus();
        createError(telefono);
    }
}

function horafun(){

    var express = "^[0-9]{2}[:]{1}[0-9]{2}$";
    
    if(visita.value.length == 0){
        visita.classList.add("error");
        visita.focus();
        createError(visita);
    }else if(visita.value.match(express)){
        visita.classList.remove("error");
        eliminateError(visita);
    }else{
        visita.classList.add("error");
        visita.focus();
        createError(visita);
    }
}

function setCookie(name, value, daysToLive) {
    // Encode value in order to escape semicolons, commas, and whitespace
    var cookie = name + "=" + encodeURIComponent(value);
    
    if(typeof daysToLive === "number") {
        /* Sets the max-age attribute so that the cookie expires
        after the specified number of days */
        cookie += "; max-age=" + (daysToLive*24*60*60);
        
        document.cookie = cookie;
    }
}

function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

function aumentoIntentos(){
    intentosnum++;
    setCookie("intentos",intentosnum,1);
    document.getElementById("intentos").innerHTML = "Numero de intentos: "+getCookie("intentos");
}
