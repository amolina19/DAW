import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

public class Tarea1 {

    static String PATH = "Libre Configuracion/Archivos/";
    public static void main(String[] args) {
        File file = new File(PATH+"ejemplo1.txt");
        System.out.println(file.getAbsolutePath());
        FileReader reader;
        try {
            reader = new FileReader(file);
            if (file.exists()) {
                int i = reader.read();
                while (i != -1) {
                    System.out.print((char) i);
                    i = reader.read();
                }
            }
            reader.close();
            System.out.println();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        
        
    }
}
