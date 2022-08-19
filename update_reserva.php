<?php
require 'conexion.php';


$reserva = $_POST['reserva'];
$title = $_POST['title'];
$numero_habitacion = $_POST['numero_habitacion'];
$numero_noches = $_POST['numero_noches'];
$nombre_usuario = $_POST['nombre_usuario'];
$lugar = $_POST['lugar'];
$numero_personas = $_POST['numero_personas'];
$coche = $_POST['coche'];
$start = $_POST['start'];
$end = $_POST['end'];
$precio_noche = $_POST['precio_noche'];
$precio_total = $_POST['precio_total'];
$color = $_POST['color'];



$insertar ="UPDATE reservas SET title='$title',numero_habitacion='$numero_habitacion', numero_noches='$numero_noches', nombre_usuario='$nombre_usuario', lugar='$lugar', numero_personas='$numero_personas', coche='$coche', start='$start', end='$end', precio_noche='$precio_noche', precio_total='$precio_total', color='$color' WHERE id_reserva = ".$reserva."";

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