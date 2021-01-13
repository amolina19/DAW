import java.util.*;

class Jugador{


    private String nombre;
    private int edad;
    private String DNI;
    private char sexo;
    private double peso;
    private double altura;


    public Jugador(){
        this.nombre = "";
        this.edad = 0;
        this.DNI = this.generaDNI();
        this.sexo = 'M';
        this.peso = 0.0;
        this.altura = 0;
    }

    public Jugador(String nombre, int edad, char sexo){
        this.nombre = nombre;
        this.edad = edad;
        this.sexo = sexo;
        this.DNI = this.generaDNI();
        this.peso = 0.0;
        this.altura = 0;
    }

    public Jugador(String nombre, int edad, char sexo, double peso, double altura){
        this.nombre = nombre;
        this.edad = edad;
        this.sexo = sexo;
        this.DNI = this.generaDNI();
        this.peso = peso;
        this.altura = altura;
    }

    public double calcularIMC(){

       double value = (this.altura*this.altura)/this.peso;

       if(value < 20){
           return -1;
       }else if(value >= 20 && value <= 25){
           return 0;
       }else{
           return 1;
       }
    }

    public boolean esMayorDeEdad(){
        if(this.edad >= 18){
            return true;
        }else{
            return false;
        }
    }

    private void comprobarSexo(char sexo){

        if(sexo != 'M' || sexo != 'H'){
            sexo = 'H';
        }else{
            if(sexo != 'H'){
                this.sexo = 'H';
            }else{
                this.sexo = 'M';
            }
        }
    }

    private String generaDNI(){
        String numberStr = "";
        for(int i=0;i<8;i++){
           double number = Math.random() * (9 - 0 + 1) + 0;
           numberStr += String.valueOf((int) number);
        }

        return numberStr;
    }

    public String toString(){
        return "Nombre: "+this.nombre+" Edad: "+this.edad+" DNI: "+this.DNI+" Sexo: "+this.sexo+" Peso: "+this.peso+" Altura: "+this.altura;
    }

    public String getNombre(){
        return this.nombre;
    }

    public void setNombre(String nombre){
        this.nombre = nombre;
    }

    public int getEdad(){
        return this.edad;
    }

    public void setEdad(int edad){
        this.edad = edad;
    }

    public char getSexo(){
        return this.sexo;
    }

    public void setSexo(char sexo){
        this.sexo = sexo;
    }

    public double getPeso(){
        return this.peso;
    }

    public void setPeso(double peso){
        this.peso = peso;
    }

    public double getAltura(){
        return this.altura;
    }

    public void setAltura(double altura){
        this.altura = altura;
    }


}

class PruebaJugador{

    public static void main(String[] args) {
        
        Scanner scanner = new Scanner(System.in);
      
        System.out.println("Introduce los datos del primer Jugador");
        System.out.println("Introduce el nombre");
        String nombre = scanner.nextLine();
        System.out.println("Introduce el edad");
        int edad = scanner.nextInt();
        System.out.println("Introduce el Sexo");
        char sexo =  scanner.next().charAt(0);
        System.out.println("Introduce el peso");
        double peso = scanner.nextDouble();
        System.out.println("Introduce el altura");
        double altura = scanner.nextDouble();

        Jugador jd1 = new Jugador(nombre,edad,sexo,peso,altura);

        System.out.println("Introduce los datos del segundo Jugador");
        System.out.println("Introduce el nombre");
        scanner.nextLine();
        nombre = scanner.nextLine();
        
        System.out.println("Introduce el edad");
        edad = scanner.nextInt();
        System.out.println("Introduce el Sexo");
        sexo =  scanner.next().charAt(0);

        Jugador jd2 = new Jugador(nombre,edad,sexo);
        Jugador jd3 = new Jugador();

        jd3.setNombre("Juan");
        jd3.setEdad(25);
        jd3.setSexo('M');
        jd3.setPeso(85.0);
        jd3.setAltura(1.83);

        ArrayList<Jugador> jugadores = new ArrayList<Jugador>();

        jugadores.add(jd1);
        jugadores.add(jd2);
        jugadores.add(jd3);

        for(Jugador jug:jugadores){
            double imc = jug.calcularIMC();
            if( imc == 0){
                System.out.println(jug.getNombre()+" No tiene el peso ideal");
            }else if(imc == 1){
                System.out.println(jug.getNombre()+" Tiene sobrepeso");
            }else{
                System.out.println(jug.getNombre()+" Tiene el peso ideal");
            }
        }

        for(Jugador jug:jugadores){
            if(jug.esMayorDeEdad()){
                System.out.println(jug.getNombre()+ " Es mayor de edad");
            }else{
                System.out.println(jug.getNombre()+ " Es menor de edad");
            }
        }

        for(Jugador jug:jugadores){
            System.out.println(jug.toString());
        }
        scanner.close();
    }
}
