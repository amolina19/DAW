public class Binario {
    

    public static void main(String[] args) {
        binario(127);
    }

    public static void binario(int decimal){
        boolean finished = false;
        int aux = decimal;
        String chain = "";

        do{
            chain += aux % 2;
            //System.out.println(aux);
            if(aux < 2){
                finished = true;
            }
            aux = aux/2;
        }while(!finished);

        System.out.println(new StringBuilder(chain).reverse().toString());
    }
}
