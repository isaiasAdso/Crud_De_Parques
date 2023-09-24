<?php
require_once "models/data_base.php";
$sql = "SELECT id_parques, nombre, tipo_parque, ubicacion, id_atraccion, id_evento, descripcion FROM parques";
$result = $conexion->query($sql);
$consulta = "";

while ($row = $result->fetch_assoc()) {
    $idEvento = $row['id_evento'];
    $idAtraccion = $row['id_atraccion'];
    $tipo_parque = $row['tipo_parque'];

    if ($tipo_parque !== null) {
        // Realiza una consulta para obtener el nombre del evento
        $consulta = "SELECT nombre FROM tipoparque WHERE id_tipo = $tipo_parque";
        $resultadoparque = $conexion->query($consulta);

        if ($resultadoparque->num_rows > 0) {
            $filaparque = $resultadoparque->fetch_assoc();
            $nombreTipoParque = $filaparque['nombre'];
        }
    }
    if ($idEvento !== null) {
        // Realiza una consulta para obtener el nombre del evento
        $consulta = "SELECT nombre FROM eventos WHERE id_evento = $idEvento";
        $resultadoEvento = $conexion->query($consulta);

        if ($resultadoEvento->num_rows > 0) {
            $filaEvento = $resultadoEvento->fetch_assoc();
            $nombreEvento = $filaEvento['nombre'];
        }
    }
    if ($idAtraccion !== null) {
        // Realiza una consulta para obtener el nombre del evento
        $consulta = "SELECT nombre FROM atracciones WHERE id_atraccion = $idAtraccion";
        $resultadoAtraccion = $conexion->query($consulta);

        if ($resultadoAtraccion->num_rows > 0) {
            $filaAatraccion = $resultadoAtraccion->fetch_assoc();
            $nombreAtraccion = $filaAatraccion['nombre'];
        }
    }
    echo '<div class="tabla-fila" data-id="' . $row['id_parques'] . '">';
    echo '<div class="tabla-columna idParque">' . $row['id_parques'] . '</div>';
    echo '<div class="tabla-columna nombreParque">' . $row['nombre'] . '</div>';
    echo '<div class="tabla-columna tipoDeParque">' .$nombreTipoParque. '</div>';
    echo '<div class="tabla-columna ubicacionParque">' . $row['ubicacion'] . '</div>';
    echo '<div class="tabla-columna atraccionParque">' . $nombreAtraccion . '</div>';
    echo '<div class="tabla-columna eventoParque">' . $nombreEvento . '</div>';
    echo '<div class="tabla-columna descripcionParque"><button class="verDescrip" type="submit" onclick="AbrirDescripcion(' . $row['id_parques'] . ')">Ver</button></div>';
    echo '<div class="tabla-columna acciones">';
    echo '<img src="asset/edit.svg" alt="" srcset="" onclick="abrirEditarParque(' . $row['id_parques'] . ')">';
    echo '<img src="asset/delete.svg" alt="" onclick="AbrirEliminarParque(' . $row['id_parques'] . ')">';
    echo '<input type="hidden" name="id_parque" value="' . $row['id_parques'] . '">';
    echo '</div>';
    echo '</div>';
}
?>

