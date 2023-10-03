<?php
require_once "../models/data_base.php";


// Obtén los datos del formulario
$idEvento = $_POST["idEvento"]; // El campo hidden con el ID del evento a editar
$nombre = $_POST["nombreEventoEditar"];
$tipo_evento = $_POST["tipo_eventoEventoEditar"];
$fecha_inicial = $_POST["fecha_inicialEventoEditar"];
$fecha_final = $_POST["fecha_finalEventoEditar"];
$hora_inicial = $_POST["hora_inicialEventoEditar"];
$hora_final = $_POST["hora_finalEventoEditar"];
$descripcion = $_POST["descripcionEventoEditar"];


date_default_timezone_set("America/Bogota");


// Ajusta el formato de la fecha inicial y final al formato de fecha (Y-m-d)
$fecha_inicial_dt = new DateTime($fecha_inicial);
$fecha_final_dt = new DateTime($fecha_final);

// Valida que la fecha final no sea menor que la fecha inicial
if ($fecha_final_dt < $fecha_inicial_dt) {
    echo "Error: La fecha final no puede ser menor que la fecha inicial.";
    exit;
}

// Valida que la fecha inicial no sea menor que la fecha de registro
$fecha_registro = date("Y-m-d"); // Supongamos que la fecha de registro es la fecha actual
if ($fecha_inicial_dt < new DateTime($fecha_registro)) {
    echo "Error: La fecha inicial no puede ser menor que la fecha de registro.";
    exit;
}

// Ajusta el formato de la hora al formato de 24 horas (HH:mm)
$hora_inicialN = (new DateTime($hora_inicial))->format("H:i:s");
$hora_finalN = (new DateTime($hora_final))->format("H:i:s");

// Maneja la imagen subida si es necesario (solo si se ha seleccionado una nueva imagen)
if(isset($_FILES["imagenEventoEditar"]) && $_FILES["imagenEventoEditar"]["error"] === UPLOAD_ERR_OK){
    $archivo_nombre = $_FILES["imagenEventoEditar"]["name"];
    $archivo_temporal = $_FILES["imagenEventoEditar"]["tmp_name"];
    $ruta_destino = "../imagenesEventos/" . $archivo_nombre; // Cambia "carpeta_destino" a la ruta real donde deseas guardar la imagen
    
    if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
        // Actualiza los datos en la base de datos (incluyendo la imagen si se cambió)
        $sql = "UPDATE eventos SET nombre='$nombre', descripcion='$descripcion', tipo_evento='$tipo_evento', fecha_inicial='$fecha_inicial', fecha_final='$fecha_final', hora_inicial='$hora_inicialN', hora_final='$hora_finalN', imagen='$ruta_destino' WHERE id_evento=$idEvento";

        if ($conexion->query($sql) === TRUE) {
            echo "Evento actualizado con éxito";
        } else {
            echo "Error al actualizar evento: " . $conexion->error;
        }
    } else {
        echo "Error al cargar la nueva imagen";
    }
} else {
    // Si no se seleccionó una nueva imagen, actualiza los datos sin cambiar la imagen
    $sql = "UPDATE eventos SET nombre='$nombre', descripcion='$descripcion', tipo_evento='$tipo_evento', fecha_inicial='$fecha_inicial', fecha_final='$fecha_final', hora_inicial='$hora_inicialN', hora_final='$hora_finalN' WHERE id_evento=$idEvento";

    if ($conexion->query($sql) === TRUE) {
        echo "Evento actualizado con éxito";
    } else {
        echo "Error al actualizar evento: " . $conexion->error;
    }
}
?>
