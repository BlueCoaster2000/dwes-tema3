<!DOCTYPE html>
<?php
require 'lenguajes.php';
?>
<!--<html lang="en">--->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TuNube</title>
</head>
<body>
    <nav>
        <h2>MiniMyCloud</h2>
        <?php

            if( $idioma == 'en' ){
                echo <<<END
                <a class="PaginaActual" href="index.php?idioma=$idioma"><ul>Home</ul></a>
                <a href="subir.php?idioma=$idioma"><ul>Upload</ul></a>
                <a href="Ficheros.php?idioma=$idioma"><ul>Files</ul></a>
                END;

            }else{
                echo <<<END
                <a class="PaginaActual" href="index.php?idioma=$idioma"><ul>Home</ul></a>
                <a href="subir.php?idioma=$idioma"><ul>Subir</ul></a>
                <a href="Ficheros.php?idioma=$idioma"><ul>Ficheros</ul></a>
                END;
            }
            ?>
            

                <form action="#">
                    <select name="idioma">
                        <option value="es" <?php if ($idioma == 'es') { echo 'selected'; }?>>Español</option>
                        <option value="en" <?php if ($idioma == 'en') { echo 'selected'; }?>>English</option>
                    </select>
                    <input type="submit" value="OK" />
                </form>
            </nav>
        
            

            <div class = "contenedor">
                <?php

                    echo "<h1>" . getCadena('bienvenida') . "</h1>";
                    echo "<p>".getCadena('omero')."</p>";
                    echo "<a href='/subir.php?idioma=$idioma'>".getCadena('boton')."</a>";

                ?>
    </div>
    <?php
       
       
       ?>
    <a href="subir.php"></a>

</body>
</html>