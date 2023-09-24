<?php
require_once "../models/data_base.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Consulta SQL para insertar datos en la tabla
            $sql = "INSERT INTO atracciones (nombre, descripcion, tipo_atraccion, imagen) VALUES ('$nombre' , '$descripcion', '$tipoAtraccion', '$ruta_imagen')";

            // Ejecutar la consulta
            if ($conexion->query($sql) === TRUE) {
                echo "Atracción agregada con éxito";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
        } else {
            echo "Error al cargar la imagen";
        }
    } else {
        echo "No se ha enviado ninguna imagen o ocurrió un error al cargarla";
    }
} else {
    echo "Error en la solicitud";
}
?>
