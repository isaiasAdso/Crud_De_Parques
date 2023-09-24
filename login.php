<?php
// Iniciar la sesión
session_start();
include("php/verificacionLogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>



    <button onclick="inicio()" class="botonHome"><img src="asset/home.svg" alt="" srcset=""></button>


    <section class="contenedorForm">
    <h2>Iniciar Sesión</h2>

<form class="formulario" action="" method="POST">
    <div class="contenedorCorreo">
    <label for="usuario">Correo electronico:</label>
    <input type="email" class="inputCorreo" id="usuario" placeholder="Email" name="usuario" ></div>
    
    <div class="contenedorContraseña">
    <label for="contrasena">Contraseña:</label>
    <input type="password" class="inputContra" id="contrasena" placeholder="Password" name="contrasena" >
    </div>
    <div class="contenedorEnviar">
    <input class="inciar" type="submit" value="Iniciar Sesión" name="iniciar">
    <p>No tienes cuenta? <a href="register.html">Crea una</a></p>
    </div>
</form>

    </section>
    <script src="js/redirecciones.js"></script>
</body>
</html>