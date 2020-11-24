

public class Ejercicio1{

    public static void main(String args[]){

       
        for(int i=0;i<1;i++){
            Ejercicio1Print();
        }
        

    }


    public static void Ejercicio1Print(){

        String res = "Estuve en ";
        double ale;
        int max = 15;
        int min = -5;
        int CONSTANTE = 4;

        
        ale = Math.random()*(max-min)+min;
        System.out.println("El primer número aleatorio es "+ale);

        if(ale >= CONSTANTE){
            res += "Varsovia";
        }else{
            res += "Budapest";
        }

        //System.out.println(res);

        ale = Math.random()*(12-0)+0;
        System.out.println("El segundo número aleatorio es "+ale);

        if(ale >= 0 && ale < 4){
            res += " y hacía frio.";
        }else if(ale >= 4 && ale <= 8){
            res += " y hacía calor.";
        }else{
            res += " y estaba nublado.";
        }
        System.out.println(res+"\n");
    }

}