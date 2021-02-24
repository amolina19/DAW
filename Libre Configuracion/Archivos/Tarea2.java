import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;


public class Tarea2 {

    static String PATH = System.getProperty("user.home") + "/Escritorio/";

    public static void main(String[] args) {
        File file = new File(PATH + "ficherotexto.txt");
        FileWriter fw;
        FileReader fr;
        String aux = "";
        System.out.println(file.getAbsolutePath());

        try {
            if(!file.exists()) {
                file.createNewFile();
            }
            fw = new FileWriter(file);
            fw.write("Vamos a construir un fichero de salida de texto . \n");
            fr = new FileReader(file);
            aux += getText(fr);
            aux += "Clase Segundo de Aplicaciones WEB Curso 2020-2021. \n";
            fw.write(aux);
            aux += getText(fr);
            aux += "Estamos a últimos de Febrero, el curso está cerca de acabarse. \n";
            fw.write(aux);
            fw.close();
            fr.close();
            System.out.println(getText(fr));
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        
    }

    public static String getText(FileReader fr){
        String output = "";
        int i;
        try {
            i = fr.read();
            while(i != -1){
                output += (char) i;
                i = fr.read();
            }
            
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        
        return output;
        
    }
}
