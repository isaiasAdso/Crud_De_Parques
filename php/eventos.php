<?php
$conexion = mysqli_connect("localhost", "root", "", "parques");

$sql = "SELECT eventos.*, tipoevento.nombre AS nombre_tipoevento
        FROM eventos 
        INNER JOIN tipoevento ON eventos.tipo_evento = tipoevento.id_tipoevento";
$resultado = $conexion->query($sql);


while ($data = $resultado->fetch_assoc()) {

if($data['id_evento']==1){
// NADA
}else{
    echo '<article class="EventoProduct" onclick="">
    <section class="ContenedorTextEvento">
        <header class="encabezadoProduct">
            <div class="contenedorImg">
            <img src="imagenesEventos/' . $data['imagen'] . '" alt="" srcset="" id="ImgEventoProduct">
            </div>
        </header>
        <div class="contenedorTextTitulo">
            <p>' . $data['nombre'] . '</p>
            <br>
            <div>'  . $data['nombre_tipoevento'] . '</div>
        </div>
       
    </section>
    <section class="ContenedorTextoEvento">
        <div class="decripcionEventos">
            <p>' . $data['descripcion'] . '</p>
        </div>
    </section>
</article>';
}

   
}
?>