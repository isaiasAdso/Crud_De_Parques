<?php
    require_once "models/data_base.php";
    $sql = "SELECT id_evento, nombre, descripcion, tipo_evento, fecha_inicial, fecha_final, hora_inicial, hora_final FROM eventos";
    $resultado = $conexion->query($sql);
    $consulta = "";

    while($datos = $resultado->fetch_assoc()){

        $tipo_evento = $datos['tipo_evento'];
        if($tipo_evento !== null){
            $consulta = "SELECT nombre FROM tipoevento WHERE id_tipoevento = $tipo_evento";
            $resultadoEvento = $conexion->query($consulta);

            if($resultadoEvento->num_rows > 0){
                $filaEvento = $resultadoEvento->fetch_assoc();
                $tipoDeEvento = $filaEvento['nombre'];
            }
        }

        echo '<div class="tabla-fila" data-id="">';
        echo '<div class="tabla-columna idEvento">' . $datos['id_evento'] . '</div>';
        echo '<div class="tabla-columna nombreEvento">' . $datos['nombre'] . '</div>';
        echo '<div class="tabla-columna tipoDeEvento">' . $tipoDeEvento . '</div>';
        echo '<div class="tabla-columna fechaInicialEvento">' . $datos['fecha_inicial'] . '</div>';
        echo '<div class="tabla-columna fechaFinalEvento">' . $datos['fecha_final'] . '</div>';
        echo '<div class="tabla-columna HoraIncial">' . $datos['hora_inicial'] . '</div>';
        echo '<div class="tabla-columna HoraFinal">' . $datos['hora_final'] . '</div>';
        echo '<div class="tabla-columna acciones">';
        echo '<img src="asset/edit.svg" alt="" srcset="" onclick="abrirEditarEvento(' . $datos['id_evento'] . ')">';
        echo '<img src="asset/delete.svg" alt="" onclick="abrirEliminarEvento(' . $datos['id_evento'] . ')">';
        echo '</div>';
        echo '</div>';
    }
?>