

//Variables que usaremos mas tarde de manera global
var nombre,apellidos,edad,nif,email,provincia,fechanacimiento,telefono,visita,erroresDiv,intentos,intentosnum=0;

window.onload = function() {
    
    //Al cargar la pagina la funcion onload asignara las variables con los elementos del DOM
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

    //Eventos de botones que ejecutaran funciones
    document.getElementById("enviar").onclick = function fun() {
        checkForm();
    }

    //Evento que limpia el formulario, limpiando los errores y los campos.
    document.getElementById("limpiar").onclick = function fun() {
        limpiar();
    }

    //Evento de formulario para cancelar el envio
    document.getElementById("form").onsubmit = function(event) {
        event.preventDefault();
        return false;
    }

    //Triggers o eventos sobre los inputs de los elementos, que se encargaran de validar si esta correcto o no lo que esta en el
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


//Función que comprueba si el formulario esta listo para enviarse.
function checkForm(){

    //Compruebo que el elemento de errores no contenga ningun hijo en el DOM de errores de p de advertencia.
    if(!document.getElementById("errores").hasChildNodes()){
        //Compruebo si existe algun campo vacio para proceder a que el usuario acepte o no el envio del formulario.
        if(!isCamposVacios()){
            var value = window.confirm("¿Seguro que quieres enviar el formulario?");
            //Si value es true en la ventana de confirmacion, el formulario se limpiara y se le dira al usuario que se envio correctamente.
            if(value){
                limpiar();
                window.alert("Has enviado el formulario");
            }
            //En caso de que exista algun campo que no cumpla los requisitos, se le aumentaran los intentos y se le informara al usuario.
        }else{
            window.alert("Campos vacios!!");
            aumentoIntentos();
        }
        //En caso de que existan errores en el hijo del DOM, con los p de advertencia, se le aumentan los intentos
    }else{
        //Se aumentan los intentos
        aumentoIntentos();
    }
}


//Función que comprueba si algun campo esta vacio, todos los elementos contienen una clase llamada campo para obtenerlos del DOM, si existe algun campo que esta vacio devolvera true y si no false.
function isCamposVacios(){

    var campos = document.getElementsByClassName("campo");

    for(i=0;i<campos.length;i++){

        //En campos que pueden estar null o la cadena no tener longitud
        if(campos[i].value == null){
            return true;
        }
        
        if(campos[i].value.length == 0){
            return true;
        }
        //Para comprobar el campo de provincia
        if(campos[i].value == -1){
            return true;
        }
    }
    return false;
}

//Funciones createError y eliminateError se usan dentro de funciones onfocusout comprobando si es correcto o no lo introducido, disparando eventos cuando el usuario introduce un texto y mostrando errores
//Debajo del formulario siendo el formulario mas dinámico.

//Función que crea un elemento p con la clase errores, mostrandose en rojo, el argumento es el nodo Element de donde se origino el error, para crear un error con su id, apellidos-error
function createError(node){
    var docerror = document.getElementById("errores");
    var nodeDel = document.getElementById(node.id+"-error");

    //En caso de contener ese error, no entrara en el if y no elementos de errores duplicados
    if(docerror.contains(nodeDel) == false){
        var elementp = document.createElement("p");
        elementp.classList.add("errores");
        elementp.id = node.id+"-error";
        elementp.innerHTML = " Error en "+node.id.toUpperCase();
        docerror.appendChild(elementp);
    }
}
    
//Función que elmina el error del arbol del DOM con la id del nodo + -error, apellidos-error
function eliminateError(node){
    document.getElementById(node.id+"-error").remove();
}

//Función que elimina los hijos p del DOM cogiendo los elementos con la clase errores. 
function delLogErrors(){

    var logErrors = document.getElementsByClassName("errores");

    for(i=0;i<logErrors.length;i++){
        logErrors[i].remove();
    }
}
 //Los campos que contengan errores estan en rojo previamente, con esto se le elimina la clase error y deja de estar en rojo
function cleanInputErrors(){
    var clean = document.getElementsByClassName("error");
    for(i=0;i<clean.length;i++){
        clean[i].classList.remove("errores");
    }
}

//Función que limpia el formulario dejando todos los campos en null.
function limpiar(){
    nombre.value = null;
    apellidos.value = null;
    edad.value = null;
    nif.value = null;
    provincia.value = null;
    fechanacimiento.value = null;
    telefono.value = null;
    visita.value = null;
    //Funcion para limpiar los campos.
    cleanInputErrors();
    //Función que elimina todos los errores que se le muestran al usuario debajo.
    delLogErrors();
    //Desenfoca cualquier campo y lo enfoca al body
    document.body.focus();
}

//Función que se dispara al dejar el input del nombre, que comprueba si es nulo o no dinámicamente.
function nombreUp(){
    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(nombre.value.length == 0){
        document.getElementById("nombre").classList.add("error");
        nombre.focus();
        createError(nombre);
    //Si el campo deja de estar vacio, se eliminarán los errores que pudiese contener.
    }else{
        nombre.value = nombre.value.toUpperCase();
        document.getElementById("nombre").classList.remove("error");
        eliminateError(nombre);
    }
}

//Función que se dispara al dejar el input del apellido, que comprueba si es nulo o no dinámicamente.
function apellidoUp(){

    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(apellidos.value.length == 0){
        apellidos.focus();
        document.getElementById("apellidos").classList.add("error");
        createError(apellidos);
    }else{
    //Si el campo deja de estar vacio, se eliminarán los errores que pudiese contener.
        apellidos.value = apellidos.value.toUpperCase();
        document.getElementById("apellidos").classList.remove("error");
        eliminateError(apellidos);
    }
}


//Función que se dispara al dejar el input de la edad, que comprueba si es nulo o no, y comprobando que se introduce entre un rango dinámicamente.
function edadfun(){

    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(edad.value == null ){
        createError(edad);
    }else{
        //Comprueba si el valor introducido es un número
        if(!isNaN(edad.value)){
            //Comprueba si el valor comprende entre 0 y 105.
            if((edad.value > 0 && edad.value <= 105) == false){
                edad.focus();
                document.getElementById("edad").classList.add("error");
                createError(edad);
             //Si el campo deja de estar vacio, se eliminarán los errores que pudiese contener.
            }else{
                document.getElementById("edad").classList.remove("error");
                eliminateError(edad);
            }
        //Si el campo no es un numero, se creará un error y se enfocará en el campo.
        }else{
            document.getElementById("edad").classList.add("error");
            edad.focus();
            createError(edad);
        }
    }
}

//Función que se dispara al dejar el input del nif, que comprueba si es nulo o no, y comprobando que cumple una expresion regular dinámicamente.
function niffun(){

    var express = "^[0-9]{8}[-]{1,1}[A-Z]{1,1}$";
    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(nif.value.length == 0){
        nif.classList.add("error");
        nif.focus();
        createError(nif);
    //Si el nif coincide con la expresion regular, se eliminarán los errores que pudiese contener.
    }else if(nif.value.match(express)){
        eliminateError(edad);
        nif.classList.remove("error");
    //En caso de no conincidir con la expresión regular se creará un error y se enfocará en el campo.
    }else{
        nif.classList.add("error");
        nif.focus();
        createError(nif);
    }
}

//Función que se dispara al dejar el input del email, que comprueba si es nulo o no, y comprobando que cumple una expresion regular dinámicamente.
function emailfun(){
    var express = "[a-zA-Z0-9]{2,63}@[a-zA-Z0-9-]{2,63}[.]{1,1}[a-zA-Z]{2,63}";
    var valueEmail = email.value;
    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(valueEmail.length == 0){
        email.focus();
        document.getElementById("email").classList.add("error");
        createError(email);
    //Si el email coincide con la expresion regular, se eliminarán los errores que pudiese contener.
    }else if(valueEmail.match(express)){
        eliminateError(email);
        document.getElementById("email").classList.remove("error");
    //En caso de no conincidir con la expresión regular se creará un error y se enfocará en el campo.
    }else{
        email.focus();
        createError(email);
        document.getElementById("email").classList.add("error");
    }
}

//Función que se dispara al dejar el input de la provincia, que comprueba si es nulo o no.
function provinciafun(){
    //El primer valor del campo del a provincia es -1 o vacio, si es -1, se creará un error y se enfocará en el campo.
    if(provincia.value == -1){
        provincia.classList.add("error");
        provincia.focus();
        createError(provincia);
     //Si el campo deja de estar vacio, se eliminarán los errores que pudiese contener.
    }else{
        provincia.classList.remove("error");
        eliminateError(provincia);
    }
}


//Función que se dispara al dejar el input de la fecha nacimineto, que comprueba si es nulo o no, y comprobando que cumple una expresion regular dinámicamente.
function fechanacfun(){

    var express = "^[0-9]{4}[-]{1,1}[0-9]{2}[-]{1,1}[0-9]{2}$";
     //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(fechanacimiento.value == null){
        createError(fechanacimiento);
        fechanacimiento.classList.add("error");
        fechanacimiento.focus();
    //Si la fecha de nacimiento coincide con la expresion regular, se eliminarán los errores que pudiese contener.
    }else if(fechanacimiento.value.match(express)){
        eliminateError(fechanacimiento);
        fechanacimiento.classList.remove("error");
    //En caso de no conincidir con la expresión regular se creará un error y se enfocará en el campo.
    }else{
        createError(fechanacimiento);
        fechanacimiento.classList.add("error");
        fechanacimiento.focus();
    }
}

//Función que se dispara al dejar el input del teléfono, que comprueba si es nulo o no, y comprobando que cumple una expresion regular dinámicamente.
function telefonofun(){
    
    var expres = "^[0-9]{9}$"
    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(telefono.value.length == 0){
        telefono.classList.add("error");
        telefono.focus();
        createError(telefono);
    //Si el télefono coincide con la expresion regular, se eliminarán los errores que pudiese contener.
    }else if(telefono.value.match(expres)){
        telefono.classList.remove("error");
        eliminateError(telefono);
    //En caso de no conincidir con la expresión regular se creará un error y se enfocará en el campo.
    }else{
        telefono.classList.add("error");
        telefono.focus();
        createError(telefono);
    }
}

//Función que se dispara al dejar el input de la visita, que comprueba si es nulo o no, y comprobando que cumple una expresion regular dinámicamente.
function horafun(){

    var express = "^[0-9]{2}[:]{1}[0-9]{2}$";
    //Si esta vacio el campo, se creará un error y se enfocará en el campo.
    if(visita.value.length == 0){
        visita.classList.add("error");
        visita.focus();
        createError(visita);
    //Si la hora coincide con la expresion regular, se eliminarán los errores que pudiese contener.
    }else if(visita.value.match(express)){
        visita.classList.remove("error");
        eliminateError(visita);
    //En caso de no conincidir con la expresión regular se creará un error y se enfocará en el campo.
    }else{
        visita.classList.add("error");
        visita.focus();
        createError(visita);
    }
}


//Función que introduce a la cookie un valor por argumento, el nombre, su valor y cuando tiempo de vida tiene
function setCookie(name, value, daysToLive) {
    var cookie = name + "=" + encodeURIComponent(value);
    if(typeof daysToLive === "number") {
        cookie += "; max-age=" + (daysToLive*24*60*60);
        document.cookie = cookie;
    }
}

//Función que recoge el valor de la cookie introduciendo el nombre.
function getCookie(name) {
    var cookieArr = document.cookie.split(";");
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if(name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Devuelve nulo si no encuentra el valor.
    return null;
}

//Función que aumenta el número de intentos, dandole valor intentos a la cookie +1 y mostrando en el formulario el número de intentos.
function aumentoIntentos(){
    intentosnum++;
    setCookie("intentos",intentosnum,1);
    document.getElementById("intentos").innerHTML = "Numero de intentos: "+getCookie("intentos");
}
