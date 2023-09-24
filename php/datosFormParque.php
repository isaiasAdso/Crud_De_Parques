<?php

// documento para insertar parques

require_once "../models/data_base.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $tipoParque = $_POST['tipo_parque'];
    $ubicacion = $_POST['ubicacion'];
    $atraccion = $_POST['atraccion'];
    $evento = $_POST['evento'];
    $descripcion = $_POST['descripcion'];

    // Verificar si se ha enviado un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Carpeta donde se guardarán las imágenes
        $carpeta_destino = '../imagenesParques/';

        // Obtener información del archivo subido
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];

        // Generar un nombre único para el archivo
        $nombre_unico = uniqid() . '_' . $nombre_archivo;

        // Mover el archivo a la carpeta de destino
        $ruta_destino = $carpeta_destino . $nombre_unico;

        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            // Insertar la ruta en la base de datos
            $ruta_imagen = $ruta_destino;
            $sql = "INSERT INTO parques (nombre, tipo_parque, ubicacion , imagen, id_atraccion, id_evento, descripcion) 
                    VALUES ('$nombre', '$tipoParque', '$ubicacion', '$ruta_imagen', '$atraccion', '$evento', '$descripcion')";

            if ($conexion->query($sql) === TRUE) {
                echo "¡El parque se ha agregado correctamente!";
            } else {
                echo "Error al agregar el parque en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Error al mover el archivo a la carpeta de destino.";
        }
    } else {
        echo "No se ha enviado un archivo o hubo un error en la carga.";
    }
}
?>
