<!doctype html>
<html lang="en">
  <head>
    <title>Formularios 2 PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
        <div class="container" id="border">

            <h1>Elementos de entrada</h1>
            <h3>Elementos del tipo INPUT</h3>
            <form method="post" action="ejercicio2-resultados.php">
                <div>
                    <p id="encabezado">TEXT</p>
                    <p>Introduzca la cadena a buscar: <input type="text" name="texto" value="valor por defecto"></p>
                </div>
                <br>
                <div>
                    <p id="encabezado">RADIO</p>
                    <p>Sexo:
                        <input class="mr-2" type="radio" name="radiocheck" value="Mujer">Mujer
                        <input class="mr-2" type="radio" name="radiocheck" value="Hombre">Hombre
                    </p>
                </div>

                <div>
                    <p id="encabezado">CHECKBOX</p>
                    <div class="form-check">
                        <p>Extras:
                            <input type="checkbox" name="checkbox[]" value="Garaje" /> Garaje
                            <input type="checkbox" name="checkbox[]" value="Piscina" /> Piscina
                            <input type="checkbox" name="checkbox[]" value="Piscina" /> Jardín
                        </p>
                    </div>
                </div>
                <div>
                    <p id="encabezado">FILE</p>
                    <div>
                        <p>Fichero: <input type="file" class="form-control-file" name="fichero"></p>
                    </div>
                </div>

                <div>
                    <p id="encabezado">HIDDEN</p>
                </div>

                <div>
                    <p id="encabezado">PASSWORD</p>
                    <div>
                        <p>Contraseña: <input type="password" name="password"></p>
                    </div>
                </div>

                <h3>Elemento SELECT</h3>

                <div>
                    <p id="encabezado">SELECT SIMPLE</p>
                    <div>
                    <p> Color:
                        <select name="color">
                            <option value="Rojo">Rojo</option>
                            <option value="Verde">Verde</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Azul">Azul</option>
                        </select>
                    </p>
                    </div>
                </div>

                <div>
                    <p id="encabezado">SELECT MÚLTIPLE</p>
                    <p>Idiomas: 
                    <select multiple="multiple" name="idiomas[]">
                        <option value="Inglés" CHECKED>Inglés</option>
                        <option value="Francés"> Francés</option>
                        <option value="Alemán"> Alemán</option>
                        <option value="Español"> Español</option>
                        <option value="Portuges"> Portuges</option>
                    </select>
                    </p>
                </div>

                <div>
                    <p id="encabezado">Elemento TEXTAREA</p>
                    <p>Comentario: <input type="textarea" cols="30" rows="5" name="textarea" value="Este libro me parece.."></p>
                </div>
                <p>
                    <input type="submit" value="Enviar datos">
                    <input type="reset" value="Borrar datos">
                </p>
            </form>
        </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>