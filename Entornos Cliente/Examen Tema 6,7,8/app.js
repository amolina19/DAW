//Variables globales de objetos document.
var info;
var nombre;
var guardar;
var borrar;
var borrarBlock = false;
//Evento que salta al cargar la página de manera automática.
window.onload = function(){

    //Asignamos las variables a los objetos document
    info = document.getElementById("info");
    nombre = document.getElementById("nombre");
    guardar = document.getElementById("guardar");
    borrar = document.getElementById("borrar");

    //variable aux exists que devuelve true o false, si en el localStorage existe el nombre.
    var exists = checkStorage();

    //Condicion que en caso de existir, Saldra un mensaje u otro.
    if(exists){
        info.innerHTML = "¡Ey! ya te conozco.. Hola "+localStorage.getItem("nombre");
        nombre.setAttribute("placeholder","Por si quieres cambiar de nombre "+localStorage.getItem("nombre"));
    }else{
        info.innerHTML = "¡Vaya, no sé cómo te llamas!, Escribe debajo tu nombre";
    }

    //Evento click del objeto guardar, al pulsar el boton comprueba que el campo no este vacio, en caso de no estar vacio guardara el nuevo nombre en el localStorage y llamara al alert avisandonos.
    guardar.onclick = function(){
        if(nombre.value != ""){
            localStorage.setItem("nombre",nombre.value);
            nombreGuardado();
        }else{
            alert("El campo nombre esta vacio, rellenalo");
        }
    }

    //Evento click del objeto borrar, al puslar el boton creara elementos y los añadira al dom del objeto form.
    borrar.onclick = function(){
        //Este condicional esta puesto para que solamente el código se ejecute una vez y no mas veces, para no generar más elementos
        if(borrarBlock == false){
            borrarBlock = true;

            //Crea los elementos y dandoles atributos.
            var info2 = document.createElement("div");
            info2.classList.add("info");
            var warning = document.createElement("div");
            var buttonDelete = document.createElement("input");
            buttonDelete.classList.add("info");
    
            info2.innerHTML = "Segunda oportunidad";
            warning.innerHTML = "Si deseas borrar todos los datos localStorage(para probar esta página como si fuera la primera vez), pulsa el siguiente botón y luego recarga la página";
            buttonDelete.value = "Borrar todos los datos guardados";
            buttonDelete.setAttribute("type","submit");
            
            //Definimos el click del boton de borrar todos los datos guardados, que borrara nombre de localStorage
            buttonDelete.onclick = function(){
                localStorage.removeItem("nombre");
            }
    
            //Se le asigna al form los 3 elementos que hemos creado.
            document.getElementById("form").appendChild(info2);
            document.getElementById("form").appendChild(warning);
            document.getElementById("form").appendChild(buttonDelete)
        }
    }

}

//Se llama a la función una vez que se inserte el nombre en el localStorage
function nombreGuardado(){
    alert("Encantado de conocerte "+localStorage.getItem("nombre")+". He guardado tu nombre. Recarga la página para comprobarlo");
}

//Comprueba en el localStorage si existe el nombre, en caso de no existir se crea un item nombre con valor vacio. En caso de existir no se hace nada, por que ya esta creado el item anteriormente.
function checkStorage(){
    if(!localStorage.nombre){
        localStorage.setItem("nombre","");
        return false;
    }
    return true;
}