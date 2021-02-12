import java.util.*;
public class Ejercicio1Exepciones {
    static Scanner scanner = new Scanner(System.in);
    static int[] enteros = new int[10];

    public static void main(String[] args) {
        
        try{
            System.out.println("Introduce la posicion donde introducir el primer número");
            int pos = scanner.nextInt();
            enteros[pos] = 5;
            System.out.println("Introduce la posicion donde introducir el segundo número");
            pos = scanner.nextInt();
            enteros[pos] = 5;
            System.out.println("Introduce la posicion donde introducir el tercer número");
            pos = scanner.nextInt();
            enteros[pos] = 5;
        }catch(IndexOutOfBoundsException ioobe){
            //ioobe.printStackTrace();
            System.err.println("Fuera del index del array. No existe.");
        }
        

        scanner.close();
    }
}
