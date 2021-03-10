import java.util.GregorianCalendar;
import java.io.Serializable;
import java.util.*;
//Me hace falta para implementar la interfaz Serializable.


//para poder utilizar la clase Date, que se encuentra en el paquete java.util.
//Con el tipo Date almaceno una fecha, igual que con el tipo String almaceno una cadena.
public class Empleado implements Serializable
{
	//Define la clase Empleado que tendrá las variables de instancia:nombre, sueldo y fecha alta.
	//Además tendrá el método subirSueldo para incrementar el sueldo de un empleado.
	private String nombre;
	private double sueldo;
	private Date altaContrato;
	
	public Empleado (String nombre, double sueldo, int agno, int mes, int dia)
	{
		this.nombre=nombre;
		this.sueldo=sueldo;
		
		/*Utilizamos La clase GregorianCalendar para construir  una fecha,
		 * con el día del mes, el mes y el año que le pasamos.
		 * Por lo tanto creo un objeto calendario de esta clase para crearme una fecha.
		 * Hay que mirar en la api de java, la clase y sus constructores.
		 * Esta clase, toma Enero como el mes número 0.*/
		GregorianCalendar calendario = new GregorianCalendar (agno, mes-1, dia);
		altaContrato=calendario.getTime();
		//el método getTime de la clase GregorianCalendar, me devuelve una fecha de tipo Date.
		
	}
	public String obtenerNombre()
	{
		return nombre;
	}
	public void establecerNombre(String nombre)
	{
		this.nombre=nombre;
	}
	public double obtenerSueldo()
	{
		return sueldo;
	}
	public void establecerSueldo(double sueldo)
	{
		this.sueldo=sueldo;
	}
	public Date obtenerFecha()
	{
		return altaContrato;
	}
	public void establecerFecha(Date t)
	{
		altaContrato=t;
	}
	public void SubeSueldo(double porcentaje)
	{
		double aumento=(sueldo*porcentaje)/100;
		sueldo+=aumento;
		
	}
}