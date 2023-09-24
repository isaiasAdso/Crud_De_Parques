<?php
 $conexion = mysqli_connect("localhost", "root", "", "parques");
// Verificar si se recibió el ID del parque
if (isset($_POST['idParque'])) {
    $idParque = $_POST['idParque'];

    // Realizar la consulta a la base de datos para obtener los datos del parque
    // Reemplaza esto con tu código de conexión a la base de datos y consulta SQL
 

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener los datos del parque
    $sql = "SELECT * FROM parques WHERE id_parques = $idParque";

    $result = $conexion->query($sql);

    if ($result) {
        $parque = $result->fetch_assoc();
        // En este punto, $parque contiene los datos del parque en un arreglo asociativo

        // Convertir los datos a JSON y enviarlos como respuesta
        echo json_encode($parque);
    } else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID del parque no proporcionado.";
}
?>
