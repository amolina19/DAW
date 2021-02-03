import java.util.*;

public class Coche{

    int ruedas;
    double largo,motor,ancho,pesoTotal,pesoPlataforma;
    String color;
    boolean asientoCuero,climatizador;

    public Coche(){
        this.ruedas = 4;
        this.largo = 2000.0;
        this.ancho = 300.0;
        this.motor = 1600.0;
        this.pesoPlataforma = 500.0;
        this.color = "";
        this.pesoTotal = this.pesoPlataforma;
        this.asientoCuero = false;
        this.climatizador = false;
    }

    public String obtenerDatosCoche(){
        return "Ruedas: "+this.ruedas+" Largo: "+this.largo+" Ancho: "+this.ancho+" Motor: "+this.motor+" Peso Plataforma: "+this.pesoPlataforma+" Color: "+this.color+" Peso Total: "+this.pesoTotal+" Asiento Cuero: "+this.asientoCuero+" Climatizador: "+this.climatizador;
    }

    public void estabelecerColor(String color){
        this.color = color;
    }

    public String obtenerColor(){
        return this.color;
    }

    public void EstabrelecerAsientos(String parametro){
        if(parametro.toLowerCase().contentEquals("si")){
            this.asientoCuero = false;
        }else{
            this.asientoCuero = true;
        }
    }

    public String ObtenerAsientos(){
        if(this.asientoCuero){
            return "El coche tiene asientos de cuero";        
        }

        return "El coche tiene asientos de serie";
    }

    public void ConfiguraClimatizador(String parametro){
        if(parametro.toLowerCase().contentEquals("si")){
            this.climatizador = true;
        }else{
            this.climatizador = false;
        }
    }

    public String ObtenerClimatizador(){
        if(this.climatizador){
            return "El coche incorpora climatizador";
        }

        return "El coche incorpora aire acondicionado";
    }

    public String ObtenerPesoCoche(){
        
        if(this.asientoCuero){
            this.pesoPlataforma += 50.0;
        }

        if(this.climatizador){
            this.pesoPlataforma += 50.0;
        }

        return "El peso del coche es de "+this.pesoPlataforma+"kg";
    }

    public double PrecioCoche(){
        double precio = 16000.0;
        if(this.asientoCuero){
            precio += 2000;
        }

        if(this.climatizador){
            precio += 1000.0;
        }

        return precio;
    }

}

class PruebaCoche extends Coche{

    public PruebaCoche(){
        super();
    }
}


class Main{

    public static void main(String[] args) {
        PruebaCoche pcoche1 = new PruebaCoche();
        PruebaCoche pcoche2= new PruebaCoche();
        PruebaCoche pcoche3 = new PruebaCoche();

        pcoche1.estabelecerColor("Verde");
        pcoche2.estabelecerColor("Azul");
        pcoche3.estabelecerColor("Amarillo");

        pcoche1.EstabrelecerAsientos("No");
        pcoche2.EstabrelecerAsientos("Si");
        pcoche3.EstabrelecerAsientos("Si");

        pcoche1.ConfiguraClimatizador("Si");
        pcoche2.ConfiguraClimatizador("No");
        pcoche3.ConfiguraClimatizador("Si");

        ArrayList<PruebaCoche> arrCoches = new ArrayList<>();
        arrCoches.add(pcoche1);
        arrCoches.add(pcoche2);
        arrCoches.add(pcoche3);

        for(PruebaCoche coche:arrCoches){
            System.out.println();
            System.out.println(coche.obtenerDatosCoche());
            System.out.println(coche.ObtenerPesoCoche());
            System.out.println(coche.ObtenerAsientos());
            System.out.println(coche.ObtenerClimatizador());
            System.out.println("Precio del coche "+coche.PrecioCoche()+"€");  
        }
    }
}
