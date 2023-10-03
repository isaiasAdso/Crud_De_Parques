<?php
require_once "models/data_base.php";
$sql = "SELECT id_atraccion, nombre, descripcion, tipo_atraccion FROM atracciones";
$resultado = $conexion->query($sql);

while ($datos = $resultado->fetch_assoc()) {
    $tipo_atraccion = $datos["tipo_atraccion"];

    if ($tipo_atraccion !== null) {
        $consulta = "SELECT nombre FROM tipoatraccion WHERE id_tipo = $tipo_atraccion";
        $resultadoAtraccion = $conexion->query($consulta);

        if ($resultadoAtraccion->num_rows > 0) {
            $filaAtraccion = $resultadoAtraccion->fetch_assoc();
            $tipoDeAtraccion = $filaAtraccion["nombre"];
        }
    }

    // Output HTML with PHP values using echo
    echo '<div class="tabla-fila" data-id="' . $datos["id_atraccion"] . '">';
    echo '<div class="tabla-columna idAtraccion idAtraccion2">' . $datos["id_atraccion"] . '</div>';
    echo '<div class="tabla-columna nombreAtraccion nombreAtraccion2">' . $datos["nombre"] . '</div>';
    echo '<div class="tabla-columna descripcionAtraccion descripcionAtraccion2">' . $datos["descripcion"] . '</div>';
    echo '<div class="tabla-columna TipoAtraccion TipoAtraccion2">' . $tipoDeAtraccion . '</div>';
    echo '<div class="tabla-columna AccionesAtracciones AccionesAtracciones2">';
    echo '<img src="asset/edit.svg" alt="" srcset="" onclick="AbrirEditarAtraccion(' . $datos["id_atraccion"] . ')">';
    echo '<img src="asset/delete.svg" alt="" onclick="">';
    echo '<input type="hidden" name="" value="">';
    echo '</div>';
    echo '</div>';
}
?>