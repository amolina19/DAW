public class Ejercicio2 {


    public static void main(String args[]){
        Ejercicio2Print();
    }

    public static void Ejercicio2Print(){

        int limit = 10;
        String cadena = "";
        int izquierdo = 0;
        int derecho = 0;

        int asteriscos = (int)Math.round(Math.random()*5);

        if(!((asteriscos % 2) == 0)){ // En caso de que los asteriscos no sean valores simetricos o pares como 1,3 o 5, sino salta al else
            limit = limit - asteriscos;
            //Izquierdo coge el valor  dividido de limit ya restado a los asteriscos que sobran para rellenar los >> y los << 
            //al ser los asteriscos impares los >> tendra que ser sumado al a izquierda y el derecho los que quedan para ser rellenado.
            izquierdo = limit /2;
            derecho = izquierdo;
            izquierdo++;

        //Funciona el else cuando los asteriscos son simetricos, los asteriscos se restan al limite y las variables derecha e izquierda recogen el mismo valor
        }else{

            limit = limit - asteriscos;
            int simetricos = limit/2;
            izquierdo = simetricos;
            derecho = simetricos;
            //System.out.println("Simetricos "+simetricos);

        }

        for(int i=0;i<izquierdo;i++){
            cadena +=">";
        }

        for(int i=0;i<asteriscos;i++){
            cadena +="*";
        }

        for(int i=0;i<derecho;i++){
            cadena +="<";
        }
        
        System.out.println(cadena);

    }
    
}
