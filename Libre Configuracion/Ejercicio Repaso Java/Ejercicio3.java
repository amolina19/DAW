public class Ejercicio3 {
    
    public static void main(String args[]){

        Ejercicio3Print();

    }

    public static void Ejercicio3Print(){
        int min = 10;
        int max = 19;

        int x = (int)(Math.random()*10+10);
        //System.out.println("OUTPUT x :"+x);

        for(int i=min;i<=max;i++){

            if(i==x){
                System.out.print("** ");
            }else{
                System.out.print(i+" ");
            }

            if(i==max){
                System.out.println();
            }
           
        }

        boolean found = false;
        for(int i=min;i<=max && !found;i++){

            if(i==x){
                System.out.print(" "+i+" ");
                found = true;
                System.out.print("----> aquí va el "+x);
            }else if(i==(x-1)){
                System.out.print("--");
            }else{
                System.out.print("---");
            }
        }

        System.out.print("\nLos 5 números posteriores son: ");
        for(int i=x+1;i<=(x+5);i++){
            System.out.print(i+" ");
        }

        System.out.print("\nLos 5 números anteriores son: ");
        for(int i=x-1;i>=(x-5);i--){
            System.out.print(i+" ");
        }

    }

    /*
    OUTPUT
    10 11 12 13 14 15 ** 17 18 19
    ------------------ 16 --> aquí va el 16
    Los 5 números posteriores son: 17 18 19 20 21
    Los 5 números anteriores son: 15 14 13 12 11 
    */
}
