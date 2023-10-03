<?php
require_once "../models/data_base.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_atraccion = $_POST["valorIdAtraccion"]; // Asegúrate de tener el id de la atracción que estás editando
    $nombre = $_POST["nombre"];
    $tipoAtraccion = $_POST["tipoAtraccion"];
    $descripcion = $_POST["descripcion"];

    // Verificar si se ha enviado un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Carpeta donde se guardarán las imágenes
        $carpeta_destino = '../imagenesAtraccion';

        // Obtener información del archivo subido
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];

        // Generar un nombre único para el archivo
        $nombre_unico = uniqid() . '_' . $nombre_archivo;

        // Mover el archivo a la carpeta de destino
        $rutaDestino = $carpeta_destino . '/' . $nombre_unico;

        if (move_uploaded_file($ruta_temporal, $rutaDestino)) {
            $ruta_imagen = $rutaDestino;
        } else {
            echo "Error al cargar la imagen";
            exit; // Termina el script si hay un error con la imagen
        }
    }

    // Consulta SQL para actualizar datos en la tabla
    $sql = "UPDATE atracciones SET nombre = '$nombre', descripcion = '$descripcion', tipo_atraccion = '$tipoAtraccion'";

    // Si se cargó una nueva imagen, actualizar la ruta de la imagen
    if (isset($ruta_imagen)) {
        $sql .= ", imagen = '$ruta_imagen'";
    }

    // Agrega la condición WHERE para actualizar la atracción específica
    $sql .= " WHERE id_atraccion = $id_atraccion";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Atracción actualizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
} else {
    echo "Error en la solicitud";
}
?>
