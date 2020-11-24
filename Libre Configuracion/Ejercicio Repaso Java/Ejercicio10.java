import java.util.*;

public class Ejercicio10 {
    static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        int numeros[]={8, 10, 15, 20, 21, 29, 30, 32, 40, 41};
        System.out.println(Arrays.toString(numeros));
        Arrays.sort(numeros);
        System.out.println(Arrays.toString(numeros));

        System.out.println("Introduce un valor para buscar su posicion si existe");
        int valor = scanner.nextInt();
        int posicion = Arrays.binarySearch(numeros, valor);

        if(posicion < 0){
            System.out.println("El valor no existe");
        }else{
            System.out.println("El valor existe y se encuentra en la posicion "+posicion);
        }

        int num2[] = Arrays.copyOfRange(numeros, 0, 4);
        System.out.println("Contenido de num2, después de haberlo copiado con el método: Metodo copyOf");
        System.out.println(Arrays.toString(num2));
        int num3[] = Arrays.copyOfRange(numeros, 3, 8);
        System.out.println("Contenido de num3, después de haberlo copiado con el método: Metodo copyOf");
        System.out.println(Arrays.toString(num3));
        
        System.out.println("Array convertido en cadena");
        String out = Arrays.toString(numeros);
        System.out.println(out);


    }
}
