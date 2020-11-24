import java.util.Scanner;

public class Ejercicio8 {
    
    static Scanner scanner = new Scanner(System.in);
    static int[] arrayNumeros;
    static int[] oldArray;
    public static void main(String[] args) {

        
        System.out.println("Introduce los elementos que tendra el array");
        int elementos = scanner.nextInt();
        if(elementos >= 15 && elementos <= 20){
            arrayNumeros = new int[elementos];
        }else{
            boolean arrayBoolean = false;
            do{
                System.out.println("Introduce un valor entre 15 y 20 (incluidos)");
                elementos = scanner.nextInt();
                if(elementos >= 15 && elementos <= 20){
                    arrayBoolean = true;
                    arrayNumeros = new int[elementos];
                }
            }while(!arrayBoolean);
        }

        for(int i=0;i<arrayNumeros.length;i++){
            System.out.println("Introduce un elemento en la posicion "+i+" del array");
            int numero = scanner.nextInt();
            rellenarArrayUsuario(numero, i);
        }

        boolean menu = true;
        do{
            menu = menu();
        }while(!menu);

        //mostrarArray();
        //nPositivos();
        //IntercambiaPosiciones();
        //ordenarArrayAscendente(arrayNumeros);
        //ordenarArrayDescendente(arrayNumeros);
        //MostrarArrayDesdePosicion();


        scanner.close();
        
    }

    public static void rellenarArrayUsuario(int numero,int pos){
        arrayNumeros[pos] = numero;
    }

    public static void mostrarArray(){
        for(int i=0;i< arrayNumeros.length;i++){
            System.out.println("Valor "+arrayNumeros[i]+" pos "+i);
        }
    }

    public static void nPositivos(){
        int nPositivos = 0;
        for(int i=0;i< arrayNumeros.length;i++){
            
            if(arrayNumeros[i] > 0){
                nPositivos++;
            }
        }
        String porcentaje = String.valueOf(((100*nPositivos)/arrayNumeros.length));
        System.out.println("El porcentaje numeros positivos es "+porcentaje);

    }

    public static void IntercambiaPosiciones(){

        System.out.println("Intercambia posiciones del array");
        System.out.println("Introduce primera posicion");
        int pos1 = scanner.nextInt();
        System.out.println("Introduce segunda posicion");
        int pos2 = scanner.nextInt();

        oldArray = new int[arrayNumeros.length];
        System.arraycopy(arrayNumeros,0,oldArray,0,arrayNumeros.length);

        if(pos1 > arrayNumeros.length || pos2 > arrayNumeros.length){
            System.out.println("Debes introducir posiciones menores que "+arrayNumeros.length);
            boolean posiciones = false;
            do{
                System.out.println("Vuelve a introducir la primera posicion");
                pos1 = scanner.nextInt();

                System.out.println("Vuelve a introducir la segunda posicion");
                pos2 = scanner.nextInt();

                if(pos1 < arrayNumeros.length && pos2 < arrayNumeros.length){
                    //IntercambiaPosiciones();
                    posiciones = true;
                }else{
                    System.out.println("Las posiciones son demasiado grandes, tienen que ser menos a "+arrayNumeros.length);
                }
            }while(!posiciones);
        }

        int numeropos1 = arrayNumeros[pos1];
        int numeropos2 = arrayNumeros[pos2];
        arrayNumeros[pos1] = numeropos2;
        arrayNumeros[pos2] = numeropos1;

        System.out.println("Antiguo Array");
        for(int i=0;i<oldArray.length;i++){
            System.out.print(" "+oldArray[i]);
        }
        System.out.println();

        System.out.println("Nuevo Array");
        for(int i=0;i<arrayNumeros.length;i++){
            System.out.print(" "+arrayNumeros[i]);
        }

        System.out.println();
    }


    public static void ordenarArrayAscendente(int[] array){

        int numaux;
        for(int i=0;i<array.length;i++){

            for(int j=i+1;j<array.length;j++){

                if(array[i] >= array[j]){
                    numaux = array[i];
                    array[i] = array[j];
                    array[j] = numaux;
                }
            }
        }

        System.out.println("Mostrando Orden ArraysAscendente");

        for(int i=0;i<array.length;i++){
            System.out.print(array[i]+" ");
        }
        System.out.println();
    }

    public static void ordenarArrayDescendente(int[] array){
        int numaux;
        for(int i=0;i<array.length;i++){

            for(int j=i+1;j<array.length;j++){

                if(array[i] <= array[j]){
                    numaux = array[j];
                    array[j] = array[i];
                    array[i] = numaux;
                }
            }
        }
        System.out.println("Mostrando Orden ArrayDescendente");
        for(int i=0;i<array.length;i++){
            System.out.print(array[i]+" ");
        }
        System.out.println();
    }

    public static void MostrarArrayDesdePosicion(){
        System.out.println("Introduce una posición para mostar el array desde una posición");
        int pos = scanner.nextInt();
        System.out.println("Mostrando Array desde posición");
        for(int i=pos;i<arrayNumeros.length;i++){
            System.out.print(arrayNumeros[i]+" ");
        }

        for(int i=0;i<pos;i++){
            System.out.print(arrayNumeros[i]+" ");
        }
    }

    public static boolean menu(){
        
        //MENU
        System.out.println();
        System.out.println("1.- Mostrar Array");
        System.out.println("2.- Mostrar nPositivos");
        System.out.println("3.- Intercambiar Posiciones");
        System.out.println("4.- Ordenar Array Ascandente");
        System.out.println("5.- Ordenar Array Descendente");
        System.out.println("6.- Mostrar Array desde posición");
        System.out.println("7.- Salir del menú");
        System.out.println();

        int opcion = 0;
        boolean repetir = false;
        do{
            opcion = scanner.nextInt();

            if(opcion < 1 || opcion > 7){
                repetir = true;
                opcion = scanner.nextInt();
            }

        }while(repetir);
    
        switch(opcion){
            case 1:
                mostrarArray();
                break;
            case 2:
                nPositivos();
                break;
            case 3:
                IntercambiaPosiciones();
                break;
            case 4:
                ordenarArrayAscendente(arrayNumeros);
                break;
            case 5:
                ordenarArrayDescendente(arrayNumeros);
                break;
            case 6:
                MostrarArrayDesdePosicion();
                break;
            case 7:
                System.out.println("Has cerrado el menú");
                return true;
        }
        return false;
    }
}
