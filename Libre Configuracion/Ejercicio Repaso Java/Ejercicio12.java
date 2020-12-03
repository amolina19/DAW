public class Ejercicio12{

    public static void main(String[] args) {

        String cadena = "Estoy utilizando cadenas de texto";
        String cadena2 = cadena.substring(6,cadena.length());
        System.out.println(cadena2);
        String cadena3 = cadena.substring(15, 23);
        System.out.println(cadena3);
        StringBuilder stringtemporal = new StringBuilder();
        stringtemporal.append(cadena);
        stringtemporal = stringtemporal.reverse();
        System.out.print(stringtemporal);

    }
}