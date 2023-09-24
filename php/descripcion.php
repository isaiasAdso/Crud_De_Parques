<?php 


$conexion = mysqli_connect("localhost", "root", "", "parques");
// Verificar si se recibió el valor "parqueId" a través de POST
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor de "parqueId"
    $idParque = $_POST['idParque'];
    $sql = "SELECT * FROM parques WHERE id_parques = $idParque";
    
    // Ejecuta la consulta SQL
    $resultado = mysqli_query($conexion, $sql);

    // Verifica si la consulta se ejecutó correctamente
    if ($resultado) {
        // Obtiene los datos del parque
        $fila = mysqli_fetch_assoc($resultado);

        // Comprueba si se encontró un parque con ese ID
        if ($fila) {
            // La descripción del parque se encuentra en $fila['descripcion']
            $descripcion = $fila['descripcion'];
            $nombre = $fila['nombre'];

            // Mostrar la descripción en la estructura HTML
            echo '<div class="contenedorTextDescrip">';
            echo '<header><h3>Parque '. $nombre .'</h3></header>';
            echo '<p>' . $descripcion . '</p>';
            echo '</div>';
        } else {
            // No se encontró un parque con ese ID
            echo "No se encontró un parque con el ID: " . $idParque;
        }
    } else {
        // Manejo de errores si la consulta SQL falla
        echo "Error en la consulta SQL: " . mysqli_error($conexion);
    }
} else {
    // Si no se recibió "parqueId" en POST, puedes manejarlo aquí
    echo "No se ha recibido el ID del parque.";
}
?>
