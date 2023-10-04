<?php
session_start();
include('models/data_base.php');
if (isset($_SESSION['id_usuario'])) {
    $idUser = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$idUser'";
    $total = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($total) > 0) {
        $usuario = mysqli_fetch_assoc($total);
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
    }
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var contenedorOculto = document.querySelector(".profileUser");
        var contenedorExistente = document.querySelector(".contenedorIniciosesion");
        contenedorOculto.style.display = "flex";
        contenedorExistente.style.display = "none";
    });
</script>';
} else {
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var contenedorOculto = document.querySelector(".profileUser");
        var contenedorExistente = document.querySelector(".contenedorIniciosesion");
        contenedorOculto.style.display = "none";
        contenedorExistente.style.display = "flex"; 
    });
</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <header class="encabezado">
        <div class="contenedorIniciosesion">
            <button class="iniciarSesion" onclick="login()">Iniciar Sesión</button>
            <button class="registrarse" onclick="register()">Registrate</button>
        </div>
        <div class="profileUser">
            <article class="perfilUsuario" onclick="ventanaPerfilUsuario()"></article>
        </div>
        <div class="titulo">
            <h1> Parques Florencia</h1>
        </div>
        <div class="contenedorSearch">
            <input class="Search" type="search" name="" id="" placeholder="Buscar..">
            <button class="botonSearch"><img src="asset/search.svg" alt="" srcset=""></button>
        </div>
    </header>
    <section class="contenedorPrincipal">

        <div class="ventanaBlanca">

        </div>


        <section class="contenedorEventos">
            <header class="encabezadoEventos">
                <div class="TextEventos">
                    <a href="#">Eventos</a>
                </div>
            </header>
            <section class="contenedorDeEventos">

                <?php
                include("php/eventos.php");
                ?>
                <!-- <article class="EventoProduct" onclick="">
                    <section class="ContenedorTextEvento">
                        <header class="encabezadoProduct">
                            <div class="contenedorImg"></div>
                        </header>
                        <div class="contenedorTextTitulo">
                            <p>Parque Santander</p>
                            <br>
                            <div>Urbano</div>
                        </div>
                       
                    </section>
                    <section class="ContenedorTextoEvento">
                        <div class="decripcionEventos">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad repudiandae saepe cumque fugit pariatur quasi tenetur? Eum officiis aut laudantium, nam similique nihil non veritatis laborum iure saepe quo optio.</p>
                          
                        </div>
                    </section>
                </article> -->
            </section>
        </section>
        <section class="contenedorParques">
            <header class="encabezadoEventos">
                <div class="TextParque">
                    <a href="#">Parques</a>
                </div>
            </header>
            <section class="contenedorDeParque">
            <?php
            include("php/parques.php")
            ?>
                <!-- <div class="productParque">
                    <section class="part1parque">
                        <div class="contenedorImagenParque">
                            <img src="" alt="imagenParque" srcset="" class="imagenDeParque" />
                        </div>
                        <div class="contenedorNombreParque">
                            <div class="nombreParque">
                                <p>Nombre</p>
                                <div class="tipoParque">tipo</div>
                            </div>
                        </div>
                    </section>
                    <section class="part2parque">
                        <div class="descripcionDeparque">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam,
                            tempore deleniti illum maxime incidunt amet voluptas quod dolorum
                            corporis, dolorem beatae illo laudantium? Quod, incidunt praesentium
                            mollitia alias facilis natus.
                        </div>
                    </section>
                </div> -->

            </section>
        </section>
    </section>
    <footer class="pie">

    </footer>

    <div class="contenedorUsuario">
        <header class="encabezadoPerfilUsuario">
            <article class="ContenedorImagePerfil"></article>
        </header>
        <main class="DatosUser">
            <p><?php echo $nombre . ' ' . $apellido; ?></p>
        </main>
        <footer class="pieUser">
            <form action="php/cerrarSesion.php">
                <button type="submit" class="cancelar">Cerrar Sesion</button>
            </form>
        </footer>
    </div>





    <script src="js/redirecciones.js"></script>
    <script src="js/ventanas.js"></script>
    <script src="js/perfilUsuario.js"></script>

</body>

</html>