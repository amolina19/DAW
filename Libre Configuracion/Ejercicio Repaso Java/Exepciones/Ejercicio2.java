import java.util.*;
public class Ejercicio2 {
    
    static Scanner scanner = new Scanner(System.in);
    public static void main(String[] args) {
     
        pedirDatos();
        scanner.close();
    }

    public static void pedirDatos(){

        System.out.println("Qué deseas hacer:");
        System.out.println("1.- Introducir datos");
        System.out.println("2.- Salir del programa");
        try{
            int option = scanner.nextInt();

            switch(option){
                case 1:
                    String nombre = "";
                    int edad = 0;
                    
                    System.out.println("Introduce tu nombre, por favor:");
                    nombre = scanner.next();
                    

                    try{
                        System.out.println("Introduce tu edad, por favor:");
                        edad = scanner.nextInt();
                        System.out.println("Hola "+nombre+", el año que viene tendrás "+(edad+1)+" años.");
                    }catch(java.util.InputMismatchException e){
                        e.printStackTrace();
                        System.err.println("El valor introducido no es numérico");
                    }
                   

                    break;
                case 2:
                System.out.println("Has salido con exito");
                    break;
                default:
                    System.out.println("El programa se cerrará");
                    break;
            }
        }catch (java.util.InputMismatchException e){
            System.err.println("El valor introducido no es numérico. El programa se cerrará");
        }
    }
}
