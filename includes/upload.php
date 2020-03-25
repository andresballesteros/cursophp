<?php

//var_dump($_FILES['file']);

$directorio = "../uploads/";

$archivo = $directorio . basename($_FILES['file']['name']);
$tipoArchivo =  strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
$validarImagen = getimagesize($_FILES['file']['tmp_name']);

if ($validarImagen) {
    $size = $_FILES['file']['size'];
    if ($size > 500000) {
        echo "El archivo debe ser menor a 500 KB";
    } else {
        if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg") {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                echo "Archivo cargado de forma correcta";
            } else {
                echo "Ocurrio un error al cargar el archivo";
            }
        } else {
            echo "Solo se admiten archivos JPG/JPEG";
        }
    }
} else {
    echo "El documento no es una imagen";
}
