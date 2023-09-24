<?php

include('models/data_base.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

$correoElectronico = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$consulta = "SELECT * FROM usuarios WHERE email = '$correoElectronico' AND  contraseña = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);


if(mysqli_num_rows($resultado) > 0){
    $usuario = mysqli_fetch_assoc($resultado);
    $id_usuario = $usuario['id_usuario'];
    $rol = $usuario['id_rol'];
          // Iniciar la sesión
          $_SESSION['id_usuario'] = $id_usuario;
          $_SESSION['id_rol'] = $rol;

    if ($rol == 1) {
        echo "<script>window.location='panelControl.php?id_usuario=$id_usuario';</script>";
    }else {
        echo "<script>window.location='index.php?id_usuario=$id_usuario';</script>";
    }
}
else{
    echo "el usuario no existe";
}

}


?>