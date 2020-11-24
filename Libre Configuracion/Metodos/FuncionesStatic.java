import java.util.*;
public class FuncionesStatic{


    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Double> numeros = new ArrayList<>();
        System.out.println("Introduce el primer número");
        numeros.add(scanner.nextDouble());
        System.out.println("Introduce el segundo número");
        numeros.add(scanner.nextDouble());
        System.out.println("Introduce el tercer número");
        numeros.add(scanner.nextDouble()); 
        System.out.println("Introduce el cuarto número");
        numeros.add(scanner.nextDouble()); 

        System.out.println("El maximo de todos los números es "+maximo(numeros));
        System.out.println("El mínimo de todos los números es "+minimo(numeros));
        System.out.println("La media de todos los números es "+media(numeros));
        System.out.println("La raiz cuadrada del primer número es "+raiz(numeros.get(0)));
        System.out.println("El cubo del segundo número es "+cubo(numeros.get(1)));
        scanner.close();
    }

    private static double maximo(ArrayList<Double> numeros) {

        double max = numeros.get(0);

        for(double num:numeros){
            if(max<num){
                max = num;
            }
        }
        return max;
    }

    private static double minimo(ArrayList<Double> numeros){

        double min = numeros.get(0);

        for(double num:numeros){
            if(min > num){
                min = num;
            }
        }

        return min;
    }

    private static double media(ArrayList<Double> numeros){

        double total = 0;
        for(double num:numeros){
            total += num;
        }

        return total/numeros.size();
    }

    private static double raiz(double num){

        return Math.sqrt(num);
    }

    private static double cubo(double num){

        return Math.pow(num,3);
    }
}
