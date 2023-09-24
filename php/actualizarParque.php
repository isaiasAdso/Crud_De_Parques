<?php
require_once "../models/data_base.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $nombreParqueEditado = $_POST["nombreparqueEditado"];
    $tipoParqueEditado = $_POST["tipo_parqueEditado"];
    $ubicacionParqueEditada = $_POST["ubicacionparqueEditada"];
    $tipoAtraccionEditada = $_POST["tipo_atraccionEditada"];
    $tipoEventoEditado = $_POST["tipo_eventoEditado"];
    $descripcionParqueEditada = $_POST["descripcionparqueEditada"];
    
    $idParque = $_POST['idparque']; // Supongo que tienes un campo oculto en tu formulario que almacena el ID del parque a editar

    // Verificar si se ha enviado una nueva imagen
    if (isset($_FILES['imagenEditada']) && is_uploaded_file($_FILES['imagenEditada']['tmp_name'])) {
        // Carpeta donde se guardarán las imágenes
        $carpeta_destino = '../imagenesParques/';

        // Obtener información del archivo subido
        $nombre_archivo = $_FILES['imagenEditada']['name'];
        $ruta_temporal = $_FILES['imagenEditada']['tmp_name'];

        // Generar un nombre único para el archivo
        $nombre_unico = uniqid() . '_' . $nombre_archivo;

        // Mover el archivo a la carpeta de destino
        $ruta_destino = $carpeta_destino . $nombre_unico;

        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            // Insertar la ruta en la base de datos
            $ruta_imagen = $ruta_destino;
            $sql = "UPDATE parques SET nombre='$nombreParqueEditado', tipo_parque='$tipoParqueEditado', ubicacion='$ubicacionParqueEditada', imagen='$ruta_imagen', id_atraccion='$tipoAtraccionEditada', id_evento='$tipoEventoEditado', descripcion='$descripcionParqueEditada' WHERE id_parques='$idParque'";

            if ($conexion->query($sql) === TRUE) {
                echo "¡El parque se ha actualizado correctamente!";
            } else {
                echo "Error al actualizar el parque en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Error al mover el archivo a la carpeta de destino.";
        }
    } else {
        // Si no se envió una nueva imagen, actualiza los datos sin cambiar la imagen
        $sql = "UPDATE parques SET nombre='$nombreParqueEditado', tipo_parque='$tipoParqueEditado', ubicacion='$ubicacionParqueEditada', id_atraccion='$tipoAtraccionEditada', id_evento='$tipoEventoEditado', descripcion='$descripcionParqueEditada' WHERE id_parques='$idParque'";

        if ($conexion->query($sql) === TRUE) {
            echo "¡El parque se ha actualizado correctamente!";
        } else {
            echo "Error al actualizar el parque en la base de datos: " . $conexion->error;
        }
    }
}
?>
