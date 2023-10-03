<?php
// Reemplaza con tu lógica de conexión a la base de datos si es necesario
require_once "../models/data_base.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAtraccion = $_POST["idatraccionEliminar"];

    $sql = "DELETE FROM atracciones WHERE id_atraccion = $idAtraccion";

    $resultado = $conexion->query($sql);

    if($resultado === TRUE){
        echo "Atraccion eliminada correctamente";
    } else {
        echo "Error al eliminar Atracción: " . $conexion->error;
    }

} else{
    echo "ID NO PROPORCIONADO";
}
$conexion->close();
?>