import java.io.EOFException;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.ArrayList;

public class Tarea4{

    static String PATH = System.getProperty("user.home") + "/Escritorio/objetos.txt";
    static ArrayList<Empleado> empleados = new ArrayList<Empleado>();
    public static void main(String[] args) {
        empleados.add(new Empleado("Juan",1500,10,3,2021));
        empleados.add(new Empleado("Maria",1800,15,2,2019));
        empleados.add(new Empleado("Antonio",1250,4,4,2021));
        empleados.add(new Empleado("Pepe",1300,6,11,2020));
        empleados.add(new Empleado("Juan",1340,8,7,2020));
        empleados.add(new Empleado("Jose",1780,24,6,2014));
        empleados.add(new Empleado("Miguel",1800,18,3,2021));
        empleados.add(new Empleado("Ana",1400,30,6,2020));

        boolean leer = true;
        try{

            FileOutputStream fileOut = new FileOutputStream(PATH);
            ObjectOutputStream objectOut = new ObjectOutputStream(fileOut);

            for(Empleado empleado:empleados){
                objectOut.writeObject(empleado);
            }
            
            System.out.println("Los objetos se han escrito correctamente");
            objectOut.close();
            fileOut.close();

            FileInputStream fi = new FileInputStream(new File(PATH));
            ObjectInputStream oi = new ObjectInputStream(fi);
            
            while(leer){

                try{
                    Empleado empleado = (Empleado) oi.readObject();
                    System.out.println(empleado.obtenerNombre()+" "+empleado.obtenerSueldo()+" "+empleado.obtenerFecha());
                }catch (EOFException e) {
                    break;
                }           
            }
            oi.close();
            fi.close();

        }catch(IOException ioe){
            ioe.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }



        
        
    }
}