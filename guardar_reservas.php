<?php
require 'conexion.php';
session_start();

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
$id_usuario = $_SESSION['id_usuario'];


$insertar ="INSERT INTO reservas VALUES ( null,'$title','$numero_habitacion', '$numero_noches', '$nombre_usuario', '$lugar', '$numero_personas', '$coche', '$start', '$end', '$precio_noche', '$precio_total', '$color','$id_usuario')";

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