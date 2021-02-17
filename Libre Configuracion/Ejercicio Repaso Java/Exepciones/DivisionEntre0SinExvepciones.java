import java.util.*;

public class DivisionEntre0SinExvepciones {
    static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        

        try{
            System.out.println("Introduce el dividendo");
            int diviendo = scanner.nextInt();

            System.out.println("Introduce el denominador");
            int divisor = scanner.nextInt();
            
            int result = division(diviendo,divisor);
        if(result != 0){
            System.out.println(diviendo+" / "+divisor+" = "+result);
        }
        }catch(java.util.InputMismatchException e){
            System.err.println("Excepcion capturada: java.util.InputMismatchException");
            System.err.println("Los datos a introducir deben ser números enteros");
        }

        scanner.close();
    }


    public static int division(int dividendo, int divisor){
        int resultado = 0;
        try{
            resultado =  dividendo/divisor;
        }catch(ArithmeticException e){
            System.err.println("Excepcion capturada: java.lang.ArithmeticException: / by zero");
            System.err.println("EL divisor no puede ser 0");
            return 0;
        }

        return resultado;
        
    }
}
