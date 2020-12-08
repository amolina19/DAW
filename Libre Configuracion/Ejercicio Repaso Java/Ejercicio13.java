class PruebaCuenta{

    public static void main(String[] args) {
        Cuenta cuenta1 = new Cuenta("Paco",50000.0);
        Cuenta cuenta2 = new Cuenta("Juan");
        cuenta1.establecerNombre("Miguel");
        cuenta2.establecerSaldo(30000.0);
        cuenta1.ingresar(500.0);
        cuenta2.retirar(2000.0);
        cuenta1.obtenerSaldo();
        cuenta2.obtenerSaldo();
        cuenta1.obtenerNombre();
        System.out.println(cuenta1.toString());
        System.out.println(cuenta2.toString());
        
    }
}

class Cuenta{

    String titular;
    Double cantidad;

    public Cuenta(String titular){
        this.titular = titular;
        this.cantidad = 0.0;
    }

    public Cuenta(String titular, Double cantidad){
        this.titular = titular;
        this.cantidad = cantidad;
    }

    public void establecerNombre(String nombre){
        this.titular = nombre;
    }

    public String obtenerNombre(){
        return this.titular;
    }

    public void establecerSaldo(Double saldo){
        this.cantidad = saldo;
    }

    public Double obtenerSaldo(){
        return this.cantidad;
    }

    public void ingresar(Double saldo){
        this.cantidad += saldo;
    }

    public void retirar(Double saldo){
        this.cantidad -= saldo;
    }

    public String toString(){
        return "Titular: "+this.titular+" Cantidad: "+this.cantidad;
    }
}