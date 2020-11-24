public class Ejercicio4 {
    
    public enum Curso{
        INFANTIL,PRIMARIA,SECUNDARIA,DESCONOCIDO
    }
    
    public enum Para{
        NIÑO,NIÑA
    }

    
    public static void main(String[] args) throws Exception {
        // Your code here!
        Curso curso;
        Para para = null;
        double precio = 0;
        int edad = (int)Math.round(Math.random()*20);
        int genero = (int)Math.round(Math.random());
        
        switch(edad){
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                curso = Curso.INFANTIL;
                break;
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
                curso = Curso.PRIMARIA;
                break;
            case 12:
            case 13:
            case 14:
            case 15:
                curso = Curso.SECUNDARIA;
                break;
            default:
                curso = Curso.DESCONOCIDO;
                break;
        }
        
        switch(genero){
            case 0:
                para = Para.NIÑO;
                break;
            case 1:
                para = Para.NIÑA;
                break;
        }
        
        
            
        if(curso == Curso.INFANTIL){
            precio = 100;
        }
        
        if(curso == Curso.PRIMARIA){
            
            if(para == Para.NIÑO){
                precio = 126;
            }else if (para == Para.NIÑA){
                precio = 124;
            }
        }else if(curso == Curso.SECUNDARIA){
            precio = 143;
        }
        
        System.out.println("Edad :"+edad);
        System.out.println("Genero :"+genero);
        
        if(curso != Curso.DESCONOCIDO){
            System.out.println("El uniforme de "+curso+" para "+para+" es de "+precio);
        }else{
            System.out.println("Etapa educativa desconocida");
        }
        
    }
    
    
}
