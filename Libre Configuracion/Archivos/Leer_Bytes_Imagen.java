import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;

public class Leer_Bytes_Imagen {

    static String PATH = "Libre Configuracion/Archivos/";
    static FileInputStream fis;
    static FileOutputStream fos;
    static File file;
    static int bytes[];

    public static void main(String[] args) {

        try {
            file = new File(PATH + "imagen.png");
            fis = new FileInputStream(file);
            leerImagen(fis);
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
    }

    public static void leerImagen(FileInputStream fis) {
        
        try {
            fos = new FileOutputStream(System.getProperty("user.home")+"/Escritorio/manosunidas.png");
            int i;
            bytes = new int[(int) file.length()];
            int count = 0;
            while((i = fis.read()) != -1){
                System.out.print((char) i);
                bytes[count] = i;
                count++;
                //fos.write(i);
            }

            for(int x = 0; x < bytes.length;x++){
                fos.write(bytes[x]);
            }
            fis.close();
            fos.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
        
    }
}