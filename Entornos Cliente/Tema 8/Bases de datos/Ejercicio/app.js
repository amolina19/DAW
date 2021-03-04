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
    insertarGuardias(database);

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
}

function insertarGuardia(database){

    let dialogo = confirm("¿Quieres asignar la guardia a un profesor?");
    var idGuardia = Number(document.getElementById("idguardia").value);
    var ausente = document.getElementById("ausente").value;

    if(ausente == "true"){
        ausente = true;
    }else{
        ausente = false
    }
    var fecha = document.getElementById("fechaguardia").value;
    var hora = Number(document.getElementById("horaguardia").value);

    if(dialogo){
        let id = prompt("Introduce el ID del profesor a asignar");
        var item = {
            id_guardia: idGuardia,
            id_profesor: id,
            ausente: ausente,
            fecha: fecha,
            hora: hora
        };
    }else{
        var item = {
            id_guardia: idGuardia,
            id_profesor: undefined,
            ausente: ausente,
            fecha: fecha,
            hora: hora
        };
    }
    

    var active = database.result;
    var request = active.transaction(["Guardias"], "readwrite");
    var objectStore =  request.objectStore("Guardias");
    objectStore.add(item);

}

function insertarGuardias(database){
    var guardias = [
        {id_guardia: 0,id_profesor: 5, ausente: false, fecha: "14/5/2020", hora: 3},
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
        profesor = active.createObjectStore("Profesor", {keyPath : 'id_profesor',autoIncrement : true });
        profesor.createIndex('id_profesor', 'id_profesor', { unique : true });
        profesor.createIndex('nombre', 'nombre', { unique : false });
        profesor.createIndex('guardias', 'guardias', { unique : false });

        guardia = active.createObjectStore("Guardias", {keyPath : 'id_guardia',autoIncrement : true });
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

function nGuardiasProfesores(id_profesor){
    var hechas = 0;
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
            elements.push(result.value);
            result.continue();
            
        };
        data.oncomplete = function() {
            let value = 0;
            for (var key in elements) {

                guardia = {
                    id_guardia: elements[key].id_guardia,
                    id_profesor: elements[key].id_profesor,
                };
                if(id_profesor == guardia.id_profesor){
                    value += Number(1);
                }
            }
            hechas = value;
            document.getElementById("gpid-"+id_profesor).innerHTML = hechas;
        };
    }
}

function generateGuardiaTable(idProfesor){
   
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
            elements.push(result.value);
            result.continue();
            
        };

        data.oncomplete = function() {
            let nguardiashechas = 0;
            var outerHTML2 = "";
            var outerHTML = "";

            outerHTML2 += "<table>";
            outerHTML2 += "<th>ID Guardia</th><th>Ausente</th><th>Fecha</th><th>Hora</th>";
            outerHTML2 += "<tr>";

            outerHTML += "<table>";
            outerHTML += "<th>ID Guardia</th><th>Fecha</th><th>Hora</th><th></th>";
            outerHTML += "<tr>";
            
            for (var key in elements) {

                guardia = {
                    id_guardia: elements[key].id_guardia,
                    id_profesor: elements[key].id_profesor,
                    ausente: elements[key].ausente,
                    fecha: elements[key].fecha,
                    hora: elements[key].hora
                };

                if(guardia.id_profesor == idProfesor){
                    
                    outerHTML += "<td> "+ guardia.id_guardia +"</td>";
                    
                    outerHTML += "<td> "+ guardia.fecha +"</td>";
                    outerHTML += "<td> "+ guardia.hora +"</td>";
                    if(guardia.id_profesor == undefined){
                        outerHTML += "<td><input type='submit' value='Asignar Profesor' id='" + guardia.id_guardia +"' onclick='updateGuardia(this.id);'></td>";
                    }
                    
                    outerHTML += "</tr>";  

                    
                }else{

                    outerHTML2 += "<td> "+ guardia.id_guardia +"</td>";
                    if(guardia.ausente == true){
                        outerHTML2 += "<td> SI </td>";
                    }else{
                        outerHTML2 += "<td> NO </td>";
                    }
                    outerHTML2 += "<td> "+ guardia.fecha +"</td>";
                    outerHTML2 += "<td> "+ guardia.hora +"</td>";
                    outerHTML2 += "</tr>"; 
                }
                                    
            }
            
            outerHTML += "</table>";
            outerHTML2 += "</table>";
            elements = [];
            document.getElementById("guardianoasignada").innerHTML = outerHTML2;
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
            var profeID = "";
            outerHTML += "<table>";
            outerHTML += "<th>ID</th><th>Profesor</th><th>Visualizar</th><th>Realizadas</th>";
            outerHTML += "<tr>";
            for (var key in elements) {

                let profesor = {
                    id_profesor: elements[key].id_profesor,
                    nombre: elements[key].nombre,
                    guardias: undefined
                }
                profeID = profesor.id_profesor;

                outerHTML += "<td> "+ profesor.id_profesor +"</td>";
                outerHTML += "<td> "+ profesor.nombre +"</td>";
                if(profesor.nombre != undefined && profesor.nombre != ""){
                    outerHTML += "<td> <button onclick='generateGuardiaTable(this.id);' id='"+profesor.id_profesor+"'>Visualizar</button></td>";
                }
                outerHTML += "<td id='gpid-"+profesor.id_profesor+"'></td>";
                outerHTML += "</tr>";
                document.getElementById("profesor").innerHTML = outerHTML;
                nGuardiasProfesores(profeID);                       
            }
            outerHTML += "</table>";
            elements = [];
            document.getElementById("profesor").innerHTML = outerHTML;
        };
    };
}

function updateGuardia(idGuardiaUpdate){
    alert(idGuardiaUpdate);
    let profesorID = prompt("Introduce el ID de profesor para asignar la guardia");

    let guardia = null;
    var database = indexedDB.open("Guardia", 1);
        database.onsuccess = function(event) {
        var db = event.target.result;
        var data = db.transaction(["Guardias"], "readwrite");
        var objectStorage = data.objectStore("Guardias");
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
            for (var key in elements) {

                guardia = {
                    id_guardia: elements[key].id_guardia,
                    id_profesor: elements[key].id_profesor,
                    ausente: elements[key].ausente,
                    fecha: elements[key].fecha,
                    hora: elements[key].hora
                };

                if(guardia.id_guardia == idGuardiaUpdate){
                    
                    guardia.id_profesor = profesorID;
                    //alert(guardia.id_profesor);
                    
                }     
            }
        };
        objectStorage.put(JSON.stringify(guardia));
    }

   
}

function obtenerGuardiasDeProfesores(){

    var elementos = document.querySelectorAll('[id^=gpid]');
    alert(elementos.length);
    for(i=0; i<elementos.length;i++){
        console.log(elementos[i]);
    }
}
