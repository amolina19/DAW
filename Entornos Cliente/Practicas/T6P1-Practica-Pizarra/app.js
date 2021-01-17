window.onload = function() {
    //Al iniciar creara un panel de tablas con celdas dinamicamente
    panel();
    //Seleciona el color del pincel, con el elemento que contenga la clase seleccionado
    seleccionado();
}
    //Variable global que controlara el estado del pincel
    var pincel = false;

    function panel(){

        //Creo las tablas
        const zonadibujo = document.getElementById("zonadibujo");
        const table = document.createElement("table");
        //Añadimos la tabla al div de zonadibujo
        zonadibujo.appendChild(table);

        //Con un bucle iremos creando las filas
        for(i=0;i<30;i++){

            //Creo el elemento tr para la fila
            var tr = document.createElement("tr");
            //Aqui le asigno un id a cada elemento por individual en este caso solo la fila
            tr.id = "tr"+i;
            tr.border = "1px solid black";
            //Le asigno la clase tablerodibujo para que existan espacios y bordes en la tabla
            tr.classList.add("tablerodibujo");

            //Con este bucle iremos creando las columnas
            for(j=0;j<30;j++){

                //Creo el elemento td para la columna
                var td = document.createElement("td");
                //Aqui le asigno un id a cada elemento por individual, pero con el id de la fila y la columna
                td.id = "td"+i+j;
                td.innerHTML = "";
                //Añadimos la columna a la fila.
                tr.appendChild(td);
                
                //Cada elemento que se crea va a tener un evento registrado para pintar esa celda.
                td.onmouseover = function() {
                    //Si el pincel esta activo, la celda obtendra el color de la paleta.
                    if(pincel == true){
                        //El evento puede enviar el id del objeto que hemos seleccionado con this.id para que podamos desde el DOM manejarlo mejor.
                        obtenerColor(this.id);
                    }
                }

                //Cada elemento que se crea va a tener un evento para que cuando se pinche en alguna de ellas se active o desactive el pincel
                td.onmousedown = function(){
                    if(!pincel){
                        pincel = true;
                        document.getElementById("pincel").innerHTML = "Estado del pincel - ACTIVADO";
                    }else{
                        pincel = false;
                        document.getElementById("pincel").innerHTML = "Estado del pincel - DESACTIVADO";
                    }
                }
            }
            //Añadimos las filas a la tabla
            table.appendChild(tr);

        }
    }

    function obtenerColor(id){
        //la variable color almacena en un array los objetos que contengan la clase seleccionado, con ello podemos obtener la clase del color que esta seleccionado actualmente,
        //Solo tendremos un elemento en el array por que previamente hemos utiilizado seleccionarColorPincel() y seleccionado() utilizando el inidice 0.
        var color = document.getElementsByClassName("seleccionado");
        var idColor = color[0].id;
        //Obtendremos el id del elemento mediante la class seleccionado, todos los elementos de la paleta tienen un id unico
        var element = document.getElementById(id);
        
        //Si la paleta de color seleccionada es el color6, se eliminara el atributo class de los elementos pintados.
        if(idColor == "color6"){
            element.removeAttribute("class");
        }else{
            document.getElementById(id).classList.add(idColor);
        }
    }

    //Esta funcion se le pase por argumento la clase que deseamos eliminar de todos los elementos
    function eliminarClases(classname){

        var elements = document.getElementsByClassName("seleccionado");
        for(i=0;i<elements.length;i++){
            elements[i].classList.remove("seleccionado");
        }
    }

    function seleccionarColorPincel(classID){
        //Al seleccionar un pincel, se usa la funcion eliminar clases para elminar todas las clases que tengan seleccionado.
        eliminarClases("seleccionado");
        //Con la variable classID es el id de la paleta que recogemos para agregarle en la clase seleccionado.
        var pincel = document.getElementById(classID);
        pincel.classList.add("seleccionado");
    }

    function seleccionado(){
        //Recogemos todos los elementos que contengan la clase pincel para añadirle eventos al pinchar sobre ellos para seleccionar un color
        var colores = document.getElementsByClassName("pincel");
        for(i=0;i<colores.length;i++){
            colores[i].onclick = function(){
                //El id que le insertaremos a la funcion para asignarle el seleccionado cuando se pincha sobre el.
                seleccionarColorPincel(this.id);
            }
        }
    }
