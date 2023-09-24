<?php

include('models/data_base.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados desde el formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correoElectronico = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $id_rol = 2;

    // Consulta para verificar si el usuario ya existe
    $consultaExistencia = "SELECT * FROM usuarios WHERE email = '$correoElectronico'";
    $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

    if (mysqli_num_rows($resultadoExistencia) > 0) {
  
        // El usuario ya existe, muestra un mensaje de error o realiza alguna acción adecuada
        echo "<script>
            toastr.options = {
                closeButton: false,
                progressBar: true,
                positionClass: 'toast-top-right',
            };

            toastr.error('El usuario con este correo electrónico ya existe.');

            setTimeout(function() {
                window.location.href = 'index.php'; // Reemplaza con la URL a la que quieras redirigir.
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>";
    } else {
        // El usuario no existe, realiza la inserción
        $consultaInsercion = "INSERT INTO usuarios (nombre, apellido, email, contraseña, id_rol) VALUES ('$nombre', '$apellido', '$correoElectronico', '$contrasena', '$id_rol')";
        $consultaTotal = mysqli_query($conexion, $consultaInsercion);
        if ($consultaTotal) {

            echo "<script>
                toastr.options = {
                    closeButton: false,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                };

                toastr.success('¡Bienvenido a nuestra página web!');

                setTimeout(function() {
                    window.location.href = 'index.php'; // Reemplaza con la URL a la que quieras redirigir.
                }, 3500);
            </script>";

            $_SESSION['id_usuario'] = $conexion -> insert_id ;
            $_SESSION['id_rol'] = 2;
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
