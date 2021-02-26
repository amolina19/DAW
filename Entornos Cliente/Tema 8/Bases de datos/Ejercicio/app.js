var indexedDB;
var database;
var insertarProfe;
var profesor;

var limpiarTodo;

var guardia;
var insertarGuard;

window.onload = function (){

    indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    database = openDB();
    insertarProfe = document.getElementById("insertarProfe");
    insertarProfe.onclick = function (){
        insertar(database);
        updateTables();
    }
    insertarGuard = document.getElementById("insertarGuardia");
    insertarGuard.onclick = function (){
        insertarGuardia(database);
        updateTables();
    }

    limpiarTodo = document.getElementById("limpiar");
    limpiarTodo.onclick = function(){
        limpiar();
    }
    updateTables();

}

function limpiar(){
    limpiarProfesor();
    limpiarGuardia();
}

function limpiarProfesor(){
    document.getElementById("profesor").value = "";
    document.getElementById("nombre").value = "";
}

function limpiarGuardia(){
    document.getElementById("idprofesorguardia").value = "";
    document.getElementById("ausente").value = "";
    document.getElementById("horaguardia").value = "";
    document.getElementById("fechaguardia").value = "";
    document.getElementById("idguardia").value = "";
}

function updateTables(){
    generateProfesorTable();
    generateGuardiaTable();
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

function insertarGuardia(database){
    var idGuardia = document.getElementById("idguardia").value;
    var idProfesor = document.getElementById("idprofesorguardia").value;
    var ausente = document.getElementById("ausente").value;
    var fecha = document.getElementById("fechaguardia").value;
    var hora = document.getElementById("horaguardia").value;
    
    var item = {
        id_guardia: idGuardia,
        id_profesor: idProfesor,
        ausente: ausente,
        fecha: fecha,
        hora: hora
    };

    var active = database.result;
    var request = active.transaction(["Guardias"], "readwrite");
    var objectStore =  request.objectStore("Guardias");
    objectStore.add(item);

}

function insertarGuardias(database){
    var guardias = [
        {id_guardia: 1,id_profesor: 2, ausente: true, fecha: "11/5/2020", hora: 3},
        {id_guardia: 2,id_profesor: 1, ausente: false, fecha: "9/3/2020", hora: 2},
        {id_guardia: 3,id_profesor: 3, ausente: false, fecha: "11/2/2020", hora: 4},
        {id_guardia: 4,id_profesor: 3, ausente: true, fecha: "4/1/2020", hora: 1},
        {id_guardia: 5,id_profesor: 1, ausente: false, fecha: "18/3/2020", hora: 1},
        {id_guardia: 6,id_profesor: 2, ausente: false, fecha: "7/4/2020", hora: 4},
        {id_guardia: 7,id_profesor: 1, ausente: true, fecha: "14/9/2020", hora: 5},
        {id_guardia: 8,id_profesor: 4, ausente: false, fecha: "21/11/2020", hora: 6},
        {id_guardia: 9,id_profesor: 2, ausente: false, fecha: "12/12/2020", hora: 5},
        {id_guardia: 10,id_profesor: 4, ausente: true, fecha: "16/10/2020", hora: 6}
    ];

    var database = indexedDB.open("Guardia", 1);
    database.onsuccess = function(event) {
        var active = database.result;
        var request = active.transaction(["Guardias"], "readwrite");
        var objectStore =  request.objectStore("Guardias");
        for(i=0;i<guardias.length;i++){
            objectStore.add(guardias[i]);
        }
    }
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

function generateGuardiaTable(idProfesor){
    //alert(idProfesor);
    var database = indexedDB.open("Guardia", 1);
        database.onsuccess = function(event) {
        var db = event.target.result;
        var data = db.transaction(["Guardias"], "readonly");
        var objectStorage = data.objectStore("Guardias");
        var elements = [];

        objectStorage.openCursor().onsuccess = function (e) {
                        
            var result = e.target.result;
            if (result === null) {
                return;
            }
            //
            
            //alert(result);
            elements.push(result.value);
            result.continue();
            
        };

        data.oncomplete = function() {
                        
            var outerHTML = "";
            outerHTML += "<table>";
            outerHTML += "<th>Ausente</th><th>Fecha</th><th>Hora</th>";
            outerHTML += "<tr>";
            for (var key in elements) {

                if(elements[key].id_profesor == idProfesor){
                    if(elements[key].ausente == true){
                        outerHTML += "<td> SI </td>";
                    }else{
                        outerHTML += "<td> NO </td>";
                    }
                    outerHTML += "<td> "+ elements[key].fecha +"</td>";
                    outerHTML += "<td> "+ elements[key].hora +"</td>";
                    outerHTML += "</tr>";  
                }
                                     
            }
            outerHTML += "</table>";
            
            elements = [];
            document.getElementById("guardias").innerHTML = outerHTML;
        };
    };
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
        outerHTML += "<table>";
        outerHTML += "<th>ID</th><th>Profesor</th><th>Guardias</th>";
        outerHTML += "<tr>";
        for (var key in elements) {
            outerHTML += "<td> "+ elements[key].id_profesor +"</td>";
            outerHTML += "<td> "+ elements[key].nombre +"</td>";
            if(elements[key].guardias == undefined && elements[key].nombre != undefined){
                outerHTML += "<td> <button onclick='generateGuardiaTable(this.id);' id='"+elements[key].id_profesor+"'>Visualizar</button></td>";
            }
            outerHTML += "</tr>";                       
        }
        outerHTML += "</table>";
        
        elements = [];
        document.getElementById("profesor").innerHTML = outerHTML;
    };
};
}
