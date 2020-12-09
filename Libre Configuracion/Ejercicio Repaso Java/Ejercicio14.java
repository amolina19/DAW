class UsoTrabajador {
    
    public static void main(String[] args) {
        Trabajador trabajador1 = new Trabajador("Carlos","Plaza Delgado");
        trabajador1.DevuelveDatos();

        Trabajador trabajador2 = new Trabajador("Loli","López García");
        trabajador2.CambiaSeccion(Seccion.FIOLOGIA);
        System.out.println(trabajador2.DevuelveDatos());
        System.out.println("El proximo id del trabajador es "+Trabajador.obtenerIdSiguiente());

        Trabajador trabajador3 = new Trabajador("Milagros"," García Fernandez");
        trabajador3.CambiaSeccion(Seccion.COMERCICAL);
        System.out.println(trabajador3.DevuelveDatos());

        Trabajador trabajador4 = new Trabajador("Enrique","Alonso Gómez");
        System.out.println(trabajador4.DevuelveDatos());
        System.out.println("El proximo id del trabajador es "+Trabajador.obtenerIdSiguiente());

        System.out.println("\n Fin del programa");



        
    }
}

enum Seccion{
    DSOFTWARE,COMERCICAL,MARKETING,SOPORTE,FIOLOGIA
}

class Trabajador{

    private String nombre;
    private String apellidos;
    private Seccion seccion;
    private Integer id;
    private static Integer totalIds = 0;

    public Trabajador(String nombre,String apellidos){
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.id = totalIds;
        totalIds += 1;
        
    }

    public static Integer obtenerIdSiguiente(){
        return totalIds + 1;
    }

    public void CambiaSeccion(Seccion seccion){
        this.seccion = seccion;
    }

    public String DevuelveDatos() {
        String datos = "ID: "+this.id+" Nombre: "+this.nombre+" Apellidos: "+this.apellidos+" Seccion: ";
        if(this.seccion != null){
            datos += this.seccion;
        }else{
            datos += " Sin definir";
        }
        return datos;
    }
}
