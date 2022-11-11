<!DOCTYPE html>
<html lang="en">
<?php
require 'lenguajes.php';
?>
 <?php
        function formulario(){
            echo '<div class="form2">';
            echo "<h1>" . getCadena('subirh2') . "</h1>";
            echo "<label>".getCadena('nfi')."</label>";
            echo <<<END
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input name="nombre_fichero" type="text">
                    <input name="fichero_usuario" type="file">
            END;
            echo '<input type="submit" id="botonForm" value='.getCadena('bfi').' >';
            echo "</form>";
            echo '</div>';
        }
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
                <a class="PaginaActual" href="subir.php?idioma=$idioma"><ul>Upload</ul></a>
                <a href="Ficheros.php?idioma=$idioma"><ul>Files</ul></a>
                END;

            }else{
                echo <<<END
                <a href="index.php?idioma=$idioma"><ul>Home</ul></a>
                <a class="PaginaActual"href="subir.php?idioma=$idioma"><ul>Subir</ul></a>
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
    <?php
    /*
        echo "<h1>" . getCadena('subirh2') . "</h1>";
        echo '<form action="#" method="POST" class="form2">';
        echo "<label>".getCadena('nfi')."</label>";
        echo '<input type="text" name="nombreFichero">';
        echo "<label>".getCadena('sfi')."</label>";
        echo '<input type="file" name="fichero_usuario" id="fichero_usuario">';
        echo '<input type="submit" id="botonForm" value='.getCadena('bfi').' >';
        echo "</form>";
      */
        

      /*  if ($_FILES && isset($_FILES['fichero_usuario']) &&
    $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK &&
    $_FILES['fichero_usuario']['size'] > 0) {

       $rutaFicheroDestino = './ficheros/' . basename($_FILES['fichero_usuario']['name']);
        $seHaSubido = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $rutaFicheroDestino);
    
        if ($seHaSubido) {
            echo "<p>Fichero $rutaFicheroDestino subido correctamente</p>";
        } else {
            echo "<p>No se ha subido el fichero</p>";
        }
    }

    
*/
        //Si no hay post mostramos el formulario
        if(!$_POST==" " || $_FILES ==" "){
            formulario();
        }

        if ($_FILES && isset($_FILES['fichero_usuario']) &&
        $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK &&
        $_FILES['fichero_usuario']['size'] > 0) {
        
        $ext = pathinfo($_FILES['fichero_usuario']['name'],PATHINFO_EXTENSION);
        $extPermitidas = ['png','jpg','gif','pdf'];
        //var_dump($ext);

        $nombreUsuario = htmlspecialchars( $_POST['nombre_fichero']);
        //var_dump($nombreUsuario);
        if( !empty( $nombreUsuario ) ){
            if(in_array($ext,$extPermitidas)){
            $_FILES['fichero_usuario']['name'] = $nombreUsuario . "." . $ext;
            var_dump($_FILES['fichero_usuario']['name']);
            $rutaFicheroDestino = './ficheros/' . basename($_FILES['fichero_usuario']['name']);
            
            $seHaSubido = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $rutaFicheroDestino);
            
            
            
            if ($seHaSubido) {
                echo "<p>Fichero $rutaFicheroDestino subido correctamente</p>";
                echo'<a class="PaginaActual" href="subir.php?idioma='.$idioma.'">Subir otro enlace</a>';
            } else {
                echo "<p>No se ha subido el fichero</p>";
            }
        
        }else{
            echo<<<END
            
            <script>alert("Tipo de Archivo No Permitido");</script>
            END;
            
        }
    }
    }
    
    ?>
    
</body>
</html>