<?php
require_once "../models/data_base.php";


 // Obtiene los datos del formulario
 $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $email = $_POST["email"];
 $contrasena = $_POST["contrasena"];
 $rol = 2;

 if (empty($nombre) || empty($apellido) || empty($email) || empty($contrasena)) {
    echo "Por favor, complete todos los campos.";
} else {
      // Prepara la consulta SQL para insertar los datos
      $sql = "INSERT INTO usuarios (nombre, apellido, email, contraseña, id_rol) VALUES ('$nombre', '$apellido', '$email', '$contrasena', '$rol')";
      if ($conexion->query($sql) === TRUE) {
        echo "Usuario agregado con éxito.";
    } else {
        echo "Error al agregar el usuario: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
}


?>