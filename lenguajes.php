<?php

$idioma = 'es';


if ($_GET && isset($_GET['idioma'])) {

    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';

}


$cadenas = [

    'bienvenida' => [

        'es' => 'Bienvenid@ a MiniMyCloud',

        'en' => 'Welcome to MiniMyCloud'

    ],
    'omero' => [
        'es' => 'Desde aquí puedes administrar tus ficheros',
        'en' => 'Here you can administrate your files'
    ],
    'boton' =>[
        'es' => 'Empieza a subir ficheros',
        'en' => 'Start uploading your files '
    ],
    'subirh2' => [

        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',

        'en' => 'Upload PDF files or GIF, PNG and JPEG images'

    ],
    //nombre fichero
    'nfi' => [

        'es' => 'Nombre del Fichero:',

        'en' => 'File Name: '

    ],
    //select fichero
    'sfi' => [

        'es' => 'Selecciona un Fichero:',

        'en' => 'Select a File : '

    ],
    //button fichero
    'bfi' => [

        'es' => 'Subir',

        'en' => 'Upload'

    ],
    'h1urfi' => [

        'es' => 'Tus Ficheros',

        'en' => 'Your Files'

    ],
    'h1urimg' => [

        'es' => 'Tus Imagenes',

        'en' => 'Your Images'

    ]


];


function getCadena(string $id): string

{

    global $idioma, $cadenas;


    if (isset($cadenas[$id])) {

        return $cadenas[$id][$idioma];

    } else {

        return "Error interno: la cadena identificada con $id no existe";

    }

}