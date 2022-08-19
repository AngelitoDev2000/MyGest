<?php
require 'conexion.php';


$admin = $_GET['admin'];

$insertar = "DELETE FROM usuarios WHERE id_usuario=".$admin."";

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