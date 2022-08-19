<?php
require 'conexion.php';


$habitacion = $_GET['habitacion'];

$insertar = "DELETE FROM habitaciones WHERE id_habitacion=".$habitacion."";

$query = mysqli_query($conection,$insertar);

if($query){
	echo "<script> alert('correcto');
	location.href = 'habitaciones-panel.php';
	</script>";
}else{
	echo "<script> alert('incorrecto');
	
	</script>";
}

?>