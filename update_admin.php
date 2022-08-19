<?php
require 'conexion.php';


$admin = $_POST['admin'];
$usuario = $_POST['usuario'];
$clave = sha1( $_POST['clave']);
$nombre_usuario = $_POST['nombre_usuario'];
$tipo_usuario = $_POST['tipo_usuario'];


$insertar ="UPDATE usuarios SET usuario='$usuario', clave='$clave', nombre_usuario='$nombre_usuario',tipo_usuario='$tipo_usuario' WHERE id_usuario = ".$admin."";

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