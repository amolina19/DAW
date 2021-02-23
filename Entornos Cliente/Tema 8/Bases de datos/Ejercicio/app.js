var indexedDB;
var database;
var insertarBtn;
var profesor;
var guardia;

window.onload = function (){

    indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    openDB();
    insertarBtn = document.getElementById("insertar");
    insertarBtn.onclick = function (){
        insertar();
    }

}

function insertar(){
    var nombre = document.getElementById("nombre").value;
    var idProfesor = document.getElementById("idprofesor").value;
    

    var item = {
        id_profesor: idProfesor,
        nombre: nombre
    };

    //alert(item.nombre+" "+item.id_profesor);
    database.then(function(db){
        var tx = db.transaction('Profesor', 'readwrite');
        var profesorDB = tx.objectStore('Profesor');
        profesorDB.put(item);
        return tx.complete;
    }).then(function() {
        alert('item updated!');
    });
      
    
    //created: new Date().getTime()
    
}

function comprobarDatos(){

    database.then(function(db) {
        var tx = db.transaction('Profesor', 'readonly');
        var store = tx.objectStore('Profesor');
        return store.openCursor();
    }).then(function() {

    });

}

function openDB(){
    database = indexedDB.open("Guardia", 1);

    database.onupgradeneeded = function (e) {
        var active = database.result;
        profesor = active.createObjectStore("Profesor", {keyPath : 'id',autoIncrement : true });
        profesor.createIndex('id_profesor', 'id_profesor', { unique : true });
        profesor.createIndex('nombre', 'nombre', { unique : false });
        profesor.createIndex('guardias', 'guardias', { unique : false });

        guardia = active.createObjectStore("Guardias", {keyPath : 'id',autoIncrement : true });
        guardia.createIndex('id_guardia', 'id_guardia', { unique : true });
        guardia.createIndex('id_profesor', 'id_profesor', { unique : false });
        guardia.createIndex('ausente', 'ausente', { unique : false });
        guardia.createIndex('fecha', 'fecha', { unique : false });
        guardia.createIndex('hora', 'hora', { unique : false });


    };

    database.onsuccess = function (e) {
        alert('Database loaded');
    };
    
    database.onerror = function (e) {
        alert('Error loading database');
    };

}