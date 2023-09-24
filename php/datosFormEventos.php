<?php
require_once "../models/data_base.php";

// Obtén los datos del formulario
$nombre = $_POST["nombre"];
$tipo_evento = $_POST["tipo_evento"];
$fecha_inicial = $_POST["fecha_inicial"];
$fecha_final = $_POST["fecha_final"];
$hora_inicial = $_POST["hora_inicial"];
$hora_final = $_POST["hora_final"];
$descripcion = $_POST["descripcion"];
date_default_timezone_set("America/Bogota");
// Valida que la fecha inicial no sea menor que la fecha de registro
$fecha_registro = date("Y-m-d"); // Supongamos que la fecha de registro es la fecha actual
if ($fecha_inicial < $fecha_registro) {
    echo "Error: La fecha inicial no puede ser menor que la fecha de registro.";
    exit;
}

// Valida que la fecha final no sea menor que la fecha inicial
if ($fecha_final < $fecha_inicial) {
    echo "Error: La fecha final no puede ser menor que la fecha inicial.";
    exit;
}

// Ajusta el formato de la hora al formato de 24 horas (HH:mm)
$hora_inicialN = date("H:i:s", strtotime($hora_inicial));
$hora_finalN = date("H:i:s", strtotime($hora_final));

// Maneja la imagen subida si es necesario
if(isset($_FILES["imagen"])){
    $archivo_nombre = $_FILES["imagen"]["name"];
    $archivo_temporal = $_FILES["imagen"]["tmp_name"];
    $ruta_destino = "../imagenesEventos/" . $archivo_nombre; // Cambia "carpeta_destino" a la ruta real donde deseas guardar la imagen
    
    if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
        // Inserta los datos en la base de datos
        $sql = "INSERT INTO eventos (nombre, descripcion, tipo_evento, fecha_inicial, fecha_final, hora_inicial, hora_final, imagen) VALUES ('$nombre', '$descripcion', '$tipo_evento', '$fecha_inicial', '$fecha_final', '$hora_inicialN', '$hora_finalN', '$ruta_destino')";

        if ($conexion->query($sql) === TRUE) {
            echo "Evento agregado con éxito";
        } else {
            echo "Error al insertar evento: " . $conexion->error;
        }
    } else {
        echo "Error al cargar la imagen";
    }
} else {
    echo "No se ha enviado ninguna imagen o ocurrió un error al cargarla";
}
?>
