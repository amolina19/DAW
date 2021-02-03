////////////////////////////////////////////////////////////////////
// Cuando el documento esté cargado llamamos a la función iniciar().
////////////////////////////////////////////////////////////////////
crearEvento(window,"load",iniciar);
/////////////////////////////////////////////////////////


function iniciar()
{
	// Creamos un objeto XHR.
	miXHR = new XMLHttpRequest();
	
	// Cargamos los datos XML de forma asíncrona.
	// En este caso ponemos una página PHP que nos devuelve datos en formato XML
	// pero podríamos poner también el nombre de un fichero XML directamente: catalogo.xml
	// Se adjunta ejemplo de fichero XML.
	//cargarAsync("datosjson.php");
	cargarAsync("http://localhost:3000/Entornos%20Cliente/Practicas/T7P1%20Implementaci%C3%B3n%20de%20ejercicio%20de%20AJAX/datosjson.php");
}

/////////////////////////////////////////////////////////
// Función cargarAsync: carga el contenido de la url
// usando una petición AJAX de forma ASINCRONA.
/////////////////////////////////////////////////////////
function cargarAsync(url) 
{ 
	if (miXHR) 
	{	
		// Activamos el indicador Ajax antes de realizar la petición.
		document.getElementById("indicador").innerHTML="<img src='ajax-loader.gif'/>";
		
		//Si existe el objeto  miXHR
		miXHR.open('GET', url, true); //Abrimos la url, true=ASINCRONA 
		//miXHR.responseType = 'json';
		
		// En cada cambio de estado(readyState) se llamará a la función estadoPeticion
		miXHR.onreadystatechange = estadoPeticion;
	
		// Hacemos la petición al servidor. Como parámetro: null ya que los datos van por GET
		miXHR.send();
	}
}

/////////////////////////////////////////////////////////
// Función estadoPeticion: será llamada a cada cambio de estado de la petición AJAX
// cuando la respuesta del servidor es 200(fichero encontrado) y el estado de
// la solicitud es 4, accedemos a la propiedad responseText
/////////////////////////////////////////////////////////
function estadoPeticion()
{
	if (this.readyState==4 && this.status == 200)
	{
		// Los datos JSON los recibiremos como texto en la propiedad this.responseText
		
		// Con la función eval() evaluaremos ese resultado para convertir a objetos y variables el string que estamos recibiendo en JSON.
		// Lo que recibimos en formato JSON es un string que representa un array [ ... ] que contiene objetos literales {...},{...},... 
		/* Ejemplo: [ {"id":"2","nombrecentro":"IES A Piringalla","localidad":"Lugo","provincia":"Lugo","telefono":"982212010","fechavisita":"2010-11-26","numvisitantes":"85"} , {"id":"10","nombrecentro":"IES As Fontiñas","localidad" : ..... } ]  */
		
		// Asignamos a la variable resultados la evaluación de responseText

		//console.log(this.responseText);
		//var resultados=eval('('+this.responseText+')');
		//ar response = this.responseText;
		
		//var resultados = eval ("(" + this.responseText + ")");
		
		var resultados = eval ("(" + this.responseText + ")")
		//var resultados = this.responseText;
		//console.log(resultados);
		//var resultados = JSON.parse(this.responseText);

		texto = "<table border=1><tr><th>Nombre Centro</th><th>Localidad</th><th>Provincia</th><th>Telefono</th><th>Fecha Visita</th><th>Numero Visitantes</th></tr>";
		// Hacemos un bucle para recorrer todos los objetos literales recibidos en el array resultados y mostrar su contenido.
		for (var i=0; i < resultados.length; i++) 
		{
			console.log(resultados[i]);
			objeto = resultados[i];
			texto+="<tr><td>"+objeto[1]+"</td><td>"+objeto[2]+"</td><td>"+objeto[3]+"</td><td>"+objeto[4]+"</td><td>"+objeto[5]+"</td><td>"+objeto[6]+"</td></tr>";
		}
	
		// Desactivamos el indicador AJAX cuando termina la petición
		document.getElementById("indicador").innerHTML="";
		
		// Imprimimos la tabla dentro del contenedor resultados.
		document.getElementById("resultados").innerHTML=texto;
	}
}