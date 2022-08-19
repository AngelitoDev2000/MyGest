<?php
require 'conexion.php';


$habitacion = $_POST['habitacion'];
$numero_habitacion = $_POST['numero_habitacion'];
$tipo = $_POST['tipo'];
$piso = $_POST['piso'];


$insertar ="UPDATE habitaciones SET numero_habitacion='$numero_habitacion', tipo='$tipo', piso='$piso' WHERE id_habitacion = ".$habitacion."";

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