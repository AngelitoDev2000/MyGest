<?php
require 'conexion.php';



$usuario = $_POST['usuario'];
$clave = sha1( $_POST['clave']);

$nombre_usuario = $_POST['nombre_usuario'];
$tipo_usuario = $_POST['tipo_usuario'];


$insertar ="INSERT INTO usuarios VALUES ( null,'$usuario', '$clave', '$nombre_usuario', '$tipo_usuario')";

$query = mysqli_query($conection,$insertar);

if($query){


	
	echo "<script> alert('correcto');
	location.href = 'administrador.php';
	</script>";
}else{
	echo "<script> alert('incorrecto');
	
	</script>";
}
?>