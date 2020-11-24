import java.util.*;
;public class Ejercicio7 {
    static Scanner scanner = new Scanner(System.in);
    public static void main(String[] args) {
        menu();
        scanner.close();
    }

    public static void menu(){
        System.out.println();
        System.out.println("1.-Descompones un número (entre 1 y 9999) en unidades de millar, centenas, decemas y unidades");
        System.out.println("2.-Calcular la hipotenusa de un triángulo rectángulo");
        System.out.println("3.-Calcular el área de la circunferencia.");
        System.out.println("4.-Salir.");
        System.out.println();
        System.out.println("Introduce Opción:[1-4]:");
       
        int opcion = 0;

        do{

            try{
                opcion = scanner.nextInt();
                pedir_opcion(opcion);
            }catch(Exception e){
                //e.getStackTrace();
                System.err.println("Solo se pueden introducir números");
                System.out.println("Introduce un número");
                scanner.next();
                opcion = scanner.nextInt();
                opcion = pedir_opcion(opcion);
            }
            
        }while(opcion != 4);
        //scanner.close();
    }

    public static int pedir_opcion(int opcion){

        switch(opcion){
            case 1:
                System.out.println("Introduce el número a descomponer");
                int numero = scanner.nextInt();
                descompon_numero(numero);
                menu();
                break;
            case 2:
                System.out.println("Introduce el primer cateto");
                double cateto1 = scanner.nextDouble();
                System.out.println("Introduce el segundo cateto");
                double cateto2 = scanner.nextDouble();
                System.out.println("La hipotenusa de ambos catetos es "+(int)hipotenusa(cateto1,cateto2));
                menu();
                break;
            case 3:
                System.out.println("Introduce el radio");
                double radio = scanner.nextDouble();
                System.out.println("La circunferencia del radio es "+(int)calcular_area_circunferencia(radio));
                menu(); 
                break;
            case 4:
                System.out.println("Has salido correctamente");
                return 4;
            default:
                System.err.println("Solo números entre 1 y 4");
                menu();
        }
        return 0;
    }

    public static void descompon_numero(int numero){
        if(numero > 9999 && numero < 1){
            System.out.println("Solo se pueden números entre 1 y 9999");
            menu();
        }else{
            String numStr = String.valueOf(numero);
            switch(numStr.length()){
                case 1:
                    System.out.println("Tiene "+numStr.subSequence(0, 1)+" Unidad");
                    break;
                case 2:
                    System.out.println("Tiene "+numStr.subSequence(0, 1)+" Decenas");
                    System.out.println("Tiene "+numStr.subSequence(1, 2)+" Unidades");
                    break;
                case 3:
                    System.out.println("Tiene "+numStr.subSequence(0, 1)+" Centenas");
                    System.out.println("Tiene "+numStr.subSequence(1, 2)+" Decenas");
                    System.out.println("Tiene "+numStr.subSequence(2, 3)+" Unidades");
                    break;
                case 4:
                    System.out.println("Tiene "+numStr.subSequence(0, 1)+" Millares");
                    System.out.println("Tiene "+numStr.subSequence(1, 2)+" Centenas");
                    System.out.println("Tiene "+numStr.subSequence(2, 3)+" Decenas");
                    System.out.println("Tiene "+numStr.subSequence(3, 4)+" Unidades");
                    break;
            } 
        }
        menu();
    }

    public static double hipotenusa(double cateto1,double cateto2){
            cateto1 = Math.pow(cateto1, 2);
            cateto2 = Math.pow(cateto2, 2);
            double hipotenusa = cateto1+cateto2;
            return Math.sqrt(hipotenusa);
    }

    public static double calcular_area_circunferencia(double radio){
        return (Math.PI* Math.pow(radio, 2));
    }
    
}
