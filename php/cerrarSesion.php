
<?php 
ob_start();
session_start();
error_reporting(0);
$varsesion = $_SESSION['id_usuario'];

if($varsesion == null || $varsesion = '' ){
    echo "no tiene autorización";
    die();
}
session_unset();
session_destroy();
echo "<script>window.location='../index.php';</script>";

?>