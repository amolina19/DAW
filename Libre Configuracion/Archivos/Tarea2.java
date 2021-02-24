import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class Tarea2 {

    static String PATH = "Libre Configuracion/Archivos/";
    static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        FileWriter fw;
        try {
            fw = new FileWriter(PATH + "ejemplo2.txt");
            System.out.println("Escribe una cadena para el fichero");
            String cadena = scanner.nextLine();
            fw.write(cadena);
            fw.close();
            scanner.close();
            System.out.println("Se ha escrito correctamente");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        
    }
}
