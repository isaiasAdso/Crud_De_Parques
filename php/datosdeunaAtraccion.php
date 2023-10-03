<?php
 $conexion = mysqli_connect("localhost", "root", "", "parques");
 if(isset($_POST['idAtraccion'])){
    $idAtraccion = $_POST['idAtraccion'];

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM atracciones WHERE id_atraccion = $idAtraccion";
    $resultado = $conexion->query($sql);

    if($resultado){
        $datosAtraccion = $resultado->fetch_assoc();

        echo json_encode($datosAtraccion);
    }else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
    }
    $conexion->close();
 }else {
    echo "ID del evento no proporcionado.";
}
?>