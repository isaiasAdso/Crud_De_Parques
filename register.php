<?php
// Iniciar la sesión
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- alertas toast -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Registrate</title>
</head>

<body>
    <button onclick="inicio()" class="botonHome"><img src="asset/home.svg" alt="" srcset=""></button>
    <section class="contenedorForm">
        <h2>Registrarse</h2>

        <form class="formulario" action="" method="POST">

            <div class="contenedorCorreo">
                <label for="usuario">Nombre:</label>
                <input type="text" class="inputCorreo" id="usuario" placeholder="Nombre" name="nombre" required>
            </div>

            <div class="contenedorCorreo">
                <label for="usuario">Apellido:</label>
                <input type="text" class="inputCorreo" id="usuario" placeholder="Apellido" name="apellido" required>
            </div>

            <div class="contenedorCorreo">
                <label for="usuario">Correo electronico:</label>
                <input type="email" class="inputCorreo" id="usuario" placeholder="Email" name="usuario" required>
            </div>

            <div class="contenedorContraseña">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="inputContra" id="contrasena" name="contrasena" required>
            </div>

            <div class="contenedorEnviar">
                <input class="inciar" type="submit" value="Registrarse">
                <p>¿No tienes cuenta? <a href="#">Inicia sesión</a></p>
            </div>
        </form>
        <?php
        include("php/verificacionRegister.php");
        ?>
    </section>

    <script src="js/redirecciones.js"></script>
</body>


</html>