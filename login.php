<?php 

require "conexion.php"; 
session_start();

if ($_POST){

  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];

  $sql= "SELECT `id_usuario`, `usuario`, `clave`, `nombre_usuario`, `tipo_usuario` FROM `usuarios` WHERE usuario = '$usuario'";

  $resultado = $conection->query($sql);
  $num = $resultado->num_rows;

  if ($num>0){

$row = $resultado->fetch_assoc();
$password_bd= $row['clave'];
$pass_c = sha1($clave);

if($password_bd == $pass_c){


 $_SESSION['id_usuario'] = $row['id_usuario'];
  $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
  
  $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
 if(isset($_SESSION['tipo_usuario'])){

  switch (($_SESSION['tipo_usuario'])) {
    case 'value':
      case 1:
      header("Location: administrador.php ");

      break;
       case 2:
      header("Location: panel_control.php ");

      break;
    
    default:
     
  }
 }
  



}else{


  echo "<script> alert('La contraseña no coincide');
  location.href = 'login.php';
  </script>";
}



  }else{
echo "<script> alert('No existe el usuario');
  location.href = 'login.php';
  </script>";

  }
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-dark">
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
		
		</div>
		<div class="login-content">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<img src="img/avatar.svg">
				<h2 class="title text-light">MYGEST</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 class="text-light">Nombre de usuario</h5>
                    <input type="text" class="input text-light" id="usuario"name="usuario" aria-describedby="emailHelp">
           		   		
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5 class="text-light">Contraseña</h5>

           		    	<input type="password" class="input text-light" name="clave" id="clave">
            	</div>
            	</div>
            	<input type="submit" class="btn text-light" value="INGRESAR">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
