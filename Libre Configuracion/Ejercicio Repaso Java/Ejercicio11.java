import java.util.*;
public class Ejercicio11{
    static Scanner scanner = new Scanner(System.in);
    public static void main(String[] args) {

        String persona1 = pedirNombre();
        String persona2 = pedirNombre();

        System.out.println(persona1+": tiene "+persona1.length()+" caracteres");
        System.out.println(persona2+": tiene "+persona2.length()+" caracteres");

        if(persona1.contentEquals(persona2)){
            System.out.println("Los dos nombres son iguales teniendo en cuenta las mayusculas");
        }else{
            System.out.println("Los dos nombres no son iguales teniendo en cuenta las mayusculas");
        }

        if(persona1.equalsIgnoreCase(persona2)){
            System.out.println("Los dos nombres son iguales sin tener en cuenta las mayusculas");
        }else{
            System.out.println("Los dos nombres no son iguales sin tener en cuenta las mayusculas");
        }

        System.out.println(persona1+" tiene "+contar_blancos(persona1)+" espacios en blanco");
        System.out.println(persona2+" tiene "+contar_blancos(persona2)+" espacios en blanco");

        contar_caracter(persona1);
        
    }

    public static String pedirNombre(){

        String out = "";
        System.out.println("Introduce el nombre");
        String nombre = scanner.nextLine();
        System.out.println("Introduce el primer apellido");
        String ap1 = scanner.nextLine();
        System.out.println("Introduce el segundo apellido");
        String ap2 = scanner.nextLine();

        out = nombre+" "+ap1+" "+ap2;
        return out;
    }

    public static int contar_blancos(String cadena){

        int cont = 0;
        for(int i=0;i<cadena.length();i++){
            if(cadena.charAt(i) == ' '){
                cont++;
            }
        }

        return cont;
    }

    public static void contar_caracter(String cadena){
        
        System.out.println("Nombre: "+cadena);
        for(int i=0;i<cadena.length();i++){
            System.out.println("Posicion "+(i+1)+": "+cadena.charAt(i));
        }
    }
}