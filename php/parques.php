<?php
    $conexion = mysqli_connect("localhost", "root", "", "parques");

    $sql = "SELECT parques.*, tipoparque.nombre AS TipoDeparque
    FROM parques
    INNER JOIN tipoparque ON parques.tipo_parque = tipoparque.id_tipo";

    $resultado = $conexion->query($sql);


    while($datos = $resultado->fetch_assoc()){
        echo '
        <div class="productParque">
        <section class="part1parque">
            <div class="contenedorImagenParque">
                <img src="imagenesParques/' . $datos["imagen"] . '" alt="imagenParque" srcset="" class="imagenDeParque" />
            </div>
            <div class="contenedorNombreParque">
                <div class="nombreParque">
                    <p>' . $datos["nombre"] . '</p>
                    <div class="tipoParque">' . $datos["TipoDeparque"] . '</div>
                </div>
            </div>
        </section>
        <section class="part2parque">
            <div class="descripcionDeparque">
            ' . $datos["descripcion"] . '
            </div>
        </section>
    </div>
        ';
    }
?>