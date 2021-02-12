import java.util.*;
public class Ejercicio1{

    static Scanner scanner = new Scanner(System.in);
    public static void main(String[] args) {
        

        try{
            System.out.println("Introduce un número");
            double number = scanner.nextDouble();
            if((number % 2) == 0){
                System.out.println("El número es par");
            }else{
                System.out.println("El número es impar");
            }
        }catch (java.util.InputMismatchException e){
            System.err.println("El valor introducido no es numérico. El programa se cerrará");
        }
        scanner.close();
    }
}