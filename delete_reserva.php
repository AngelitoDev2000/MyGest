<?php
require 'conexion.php';


$reserva = $_GET['reserva'];

$insertar = "DELETE FROM reservas WHERE id_reserva=".$reserva."";

$query = mysqli_query($conection,$insertar);

if($query){
	echo "<script> alert('correcto');
	location.href = 'reservas.php';
	</script>";
}else{
	echo "<script> alert('incorrecto');
	
	</script>";
}

?>