var indexedDB;
var database;
var insertarBtn;
var profesor;
var guardia;

window.onload = function (){

    indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    database = openDB();
    insertarBtn = document.getElementById("insertar");
    insertarBtn.onclick = function (){
        insertar(database);
    }
    generateProfesorTable();

}

function insertar(database){
    var nombre = document.getElementById("nombre").value;
    var idProfesor = document.getElementById("idprofesor").value;
    
    var item = {
        id_profesor: idProfesor,
        nombre: nombre
    };

    var active = database.result;
    var request = active.transaction(["Profesor"], "readwrite");
    var objectStore =  request.objectStore("Profesor");
    objectStore.add(item);
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

    return database;

}

function generateProfesorTable(){


    var database = indexedDB.open("Guardia", 1);
        database.onsuccess = function(event) {
        var db = event.target.result;
        var data = db.transaction(["Profesor"], "readonly");
        var objectStorage = data.objectStore("Profesor");
        var elements = [];

        objectStorage.openCursor().onsuccess = function (e) {
                        
            var result = e.target.result;
            if (result === null) {
                return;
            }
            
            elements.push(result.value);
            result.continue();
            
        };

        data.oncomplete = function() {
                        
            var outerHTML = "";
            for (var key in elements) {
                
                outerHTML += "<table>";
                outerHTML += "<th>ID</th><th>Profesor</th><th>Guardias</th>";
                outerHTML += "<tr>";
                outerHTML += "<td> "+ elements[key].id_profesor +"</td>";
                outerHTML += "<td> "+ elements[key].nombre +"</td>";
                if(elements[key].guardias == undefined){
                    outerHTML += "<td>Sin Guardias</td>";
                }else{
                    outerHTML += "<td> "+ elements[key].guardias +"</td>";
                }
                outerHTML += "</tr>";                       
            }
            outerHTML += "</table>";
            
            elements = [];
            document.getElementById("profesor").innerHTML = outerHTML;
        };
    };
}

function generateGuardiaTable(){

}
