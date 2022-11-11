<!DOCTYPE html>
<html lang="en">
    <?php
    require 'lenguajes.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Subir</title>
    </head>
    <body>
    <nav>
            <h2>MiniMyCloud</h2>
            <?php

                if( $idioma == 'en' ){
                    echo <<<END
                    <a href="index.php?idioma=$idioma"><ul>Home</ul></a>
                    <a href="subir.php?idioma=$idioma"><ul>Upload</ul></a>
                    <a class="PaginaActual" href="Ficheros.php?idioma=$idioma"><ul>Files</ul></a>
                    END;

                }else{
                    echo <<<END
                    <a href="index.php?idioma=$idioma"><ul>Home</ul></a>
                    <a href="subir.php?idioma=$idioma"><ul>Subir</ul></a>
                    <a class="PaginaActual"href="Ficheros.php?idioma=$idioma"><ul>Ficheros</ul></a>
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
        
        <div class="pdfs">
        <?php
             echo "<h1>".getCadena('h1urfi')."</h1><br/>";
            $todosFicheros = scandir('./ficheros');
            $ficherosPDF = [];
            $ficherosJPG = [];
            $ficherosPNG = [];
            $ficherosGIF = [];
            if ($todosFicheros !== false) {
                foreach ($todosFicheros as $fic) {
                    if (pathinfo($fic, PATHINFO_EXTENSION) == 'pdf') {
                        $ficherosPDF[] = "./ficheros/$fic";
                    }else if(pathinfo($fic, PATHINFO_EXTENSION) == 'jpg'){
                        $ficherosJPG[] = "./ficheros/$fic";
                    }else if(pathinfo($fic, PATHINFO_EXTENSION) == 'png'){
                        $ficherosPNG[] = "./ficheros/$fic";
                    }else if(pathinfo($fic, PATHINFO_EXTENSION) == 'gif'){
                        $ficherosGIF[] = "./ficheros/$fic";
                    }
                }
            }
            
            foreach ($ficherosPDF as $fic) {
                echo "<a href='$fic' target='_blank'>$fic</a><br/><br/>";
            }
            echo "<h1>".getCadena('h1urimg')."</h1><br/>";
            echo "<div class='display_container'>";

            foreach ($ficherosJPG as $fic) {
                echo "<a href='$fic' target='_blank'><img src='$fic'></a><br/><br/>";
            }

            foreach ($ficherosPNG as $fic) {
                echo "<a href='$fic' target='_blank'><img src='$fic'></a><br/><br/>";
            }
            
            foreach ($ficherosPNG as $fic) {
                echo "<a href='$fic' target='_blank'><img src='$fic'></a><br/><br/>";
            }
            foreach ($ficherosGIF as $fic) {
                echo "<a href='$fic' target='_blank'><img src='$fic'></a><br/><br/>";
            }

            
            echo"</div>";
        ?>
            
        </div>
    </body>
</html>