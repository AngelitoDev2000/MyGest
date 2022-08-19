<?php
require 'conexion.php';
session_start();

$numero_habitacion = $_POST['numero_habitacion'];
$tipo = $_POST['tipo'];
$piso = $_POST['piso'];
$id_usuario = $_SESSION['id_usuario'];
$foto = $_FILES['foto'];
$nombre_foto = $foto['name'];
$type = $foto['type'];
$url_temp = $foto['tmp_name'];
$imghabitacion = 'img_habitacion.png';

if($nombre_foto != '')
{

	$destino = 'imag/';
	$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
	$imghabitacion = $img_nombre.'.jpg';
	$src = $destino.$imghabitacion;


}


echo $insertar ="INSERT INTO habitaciones VALUES ( null,'$numero_habitacion', '$tipo', '$piso','$id_usuario','$imghabitacion')";

$query = mysqli_query($conection,$insertar);

if($query){
 if($nombre_foto != '')
{
move_uploaded_file($url_temp,$src);

}


	echo "<script> alert('correcto');
	location.href = 'habitaciones-panel.php';
	</script>";
}else{
	echo "<script> alert('incorrecto');
	
	</script>";
}

?>