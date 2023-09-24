<?php
 $conexion = mysqli_connect("localhost", "root", "", "parques");
// Verificar si se recibió el ID del parque
if (isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento'];

    // Realizar la consulta a la base de datos para obtener los datos del parque
    // Reemplaza esto con tu código de conexión a la base de datos y consulta SQL
 

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener los datos del parque
    $sql = "SELECT * FROM eventos WHERE id_evento = $idEvento";

    $result = $conexion->query($sql);

    if ($result) {
        $evento = $result->fetch_assoc();
        // En este punto, $parque contiene los datos del parque en un arreglo asociativo

        // Convertir los datos a JSON y enviarlos como respuesta
        echo json_encode($evento);
    } else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID del evento no proporcionado.";
}
?>
