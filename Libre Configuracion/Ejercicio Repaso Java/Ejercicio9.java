import java.util.*;
public class Ejercicio9 {
    static int primero[][] = new int[3][6];
    static int segundo[][] = new int[3][6];
    static int suma[][] = new int[3][6];
    static Scanner scanner = new Scanner(System.in);
    static Random random = new Random();
    public static void main(String[] args) {
        
        primerArray();
        segundoArray();
        suma(suma);
        mostrar();

        scanner.close();
    }

    public static void primerArray(){

        for(int i=0;i<primero.length;i++){

            for(int j=0;j<primero[0].length;j++){
                System.out.println("Introduce un valor en la posicion "+i+" "+j);
                int valor = scanner.nextInt();
                primero[i][j] = valor;
            }
        }
    }

    public static void segundoArray(){

        for(int i=0;i<segundo.length;i++){

            for(int j=0;j<segundo[0].length;j++){
                int valor = random.nextInt(20-(-20)) + (-20);
                //System.out.println(valor);
                segundo[i][j] = valor;
            }
        }
    }

    public static void suma(int array[][]){

        for(int i=0;i<suma.length;i++){

            for(int j=0;j<suma[0].length;j++){
                suma[i][j] =  primero[i][j] + segundo[i][j]; 
            }
        }
    }

    public static void mostrar(){
        //Primer array
        System.out.println("Mostrando primer Array Multimensional");
        for(int i=0;i<primero.length;i++){
            for(int j=0;j<primero[0].length;j++){
                
                System.out.print(" "+primero[i][j]);
            }
            System.out.println();
        }
        System.out.println();

        System.out.println("Mostrando segundo Array Multimensional");
        for(int i=0;i<segundo.length;i++){
            for(int j=0;j<segundo[0].length;j++){
                
                System.out.print(" "+segundo[i][j]);
            }
            System.out.println();
        }
        System.out.println();

        System.out.println("Mostrando Array Suma");
        for(int i=0;i<suma.length;i++){
            for(int j=0;j<suma[0].length;j++){
                System.out.print(" "+suma[i][j]);
            }
            System.out.println();
        }
        System.out.println();

    }
}
