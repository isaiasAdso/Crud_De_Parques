<?php
// Reemplaza con tu lógica de conexión a la base de datos si es necesario
require_once "../models/data_base.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEvento = $_POST["idEvento"];

    $sql = "DELETE FROM eventos WHERE id_evento = $idEvento";

    if($conexion->query($sql) === TRUE){
        echo "El evento fue eliminado Correctamente";
    } else{
        echo "El error al eliminar el evento en la base de datos" . $conexion->error;
    } 
}else {
    echo "ID de evento no proporcionado";
}
// Cerrar la conexión a la base de datos
$conexion->close();

?>