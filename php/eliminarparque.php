<?php
// Reemplaza con tu lógica de conexión a la base de datos si es necesario
require_once "../models/data_base.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_Parque = $_POST['idParque'];

        // Consulta SQL para eliminar el parque
        $sql = "DELETE FROM parques WHERE id_parques = $id_Parque";

        if ($conexion->query($sql) === TRUE) {
            echo "El parque se ha eliminado correctamente.";
        } else {
            echo "Error al eliminar el parque en la base de datos: " . $conexion->error;
        }
    } else {
        echo "ID del parque no proporcionado.";
    
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
