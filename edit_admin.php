<?php

session_start();
if (!isset($_SESSION['id_usuario'])){
header("Location: login.php");


}
$nombre_usuario = $_SESSION['nombre_usuario'];
;?>

<?php 

require 'conexion.php';

 ?>
<!doc<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">





    <title>Administrador De Usuarios</title>
  </head>
  <body>
  <div class="d-flex">
    <div id="sidebar-container" class="bg-dark">
      <div class="logo">
        <h4 class="text-light font-weight-bold">MYGEST</h4>
      </div>
      <div class="menu">
          
      </div>
    </div>

    <div  class="w-100 bg-light-blue">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline position-relative my-2 d-inline-block">
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar Usuario" aria-label="Buscar Usuario">
      <button class="btn btn-search position-absolute" type="submit"><i class="icon ion-md-search"></i></button>
    </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-md-person mr-2  lead"></i>
          <?php echo "$nombre_usuario";?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          
           <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>  
  
  </div>
</nav>

<div id="content">
  <section>
    <div class="container-fluid p-1">
      <div class="row">
        
      </div>
    </div>
  </section>

</div>

<div id="content" class="container-fluid hab"></br>
  <table class="table table-dark">
    <div>
    <thead>
      <div>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
       
        <li class="nav-item">
          <a class="nav-link" id="user" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Administrador de Usuarios</a>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active " id="poke-tab" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-12">
              <nav class="navbar navbar-dark bg-dark">          
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminusuario">Nuevo usuario
</button>
            
              </nav>
<div class="container ">
<?php
require 'conexion.php';


$admin = $_GET['admin'];

$sql="SELECT * FROM usuarios WHERE id_usuario = ".$admin."";
$result = mysqli_query($conection,$sql);
while ($mostrar= mysqli_fetch_array($result)){
?>

  <form class="form-horizontal" method="POST" action="update_admin.php">
        <input type="hidden" value="<?php echo $mostrar['id_usuario'] ?>" name="admin">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDITAR USUARIO </h4>
        </div>
        <div class="modal-body">
        
          
          </div>
          <div class="form-group">
          <label for="numero_de_usuario" class="col-sm-2 control-label">Nombre de usuario</label>
          <div class="col-sm-10">
            <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $mostrar['usuario'] ?>" placeholder="Nombre del usuario">
          
          <div class="form-group">
          <label for="clave" class="col-sm-2 control-label">clave</label>
          <div class="col-sm-10">
            <input type="password" name="clave" class="form-control" id="clave" value="<?php echo $mostrar['clave'] ?>" placeholder="Clave de acceso">
          </div>
          </div>
          <div class="form-group">
          <label for="correo_usuario" class="col-sm-2 control-label">Correo Usuario</label>
          <div class="col-sm-10">
            <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" value="<?php echo $mostrar['nombre_usuario'] ?>" placeholder="Correo del usuario">
          </div>
          </div>
          <div class="form-group">
          <label for="tipo_usuario" class="col-sm-2 control-label">tipo usuario?</label>
          <div class="col-sm-10">
            <input type="number" name="tipo_usuario" class="form-control" id="tipo_usuario" value="<?php echo $mostrar['tipo_usuario'] ?>" placeholder="Tipo de usuario">
          </div>
        </div>
    
        <div class="modal-footer">
            <a class="btn btn-danger" href="administrador.php">Cerrar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
  

<?php
}
?>

</div>



  

</div>
    </div>

 






   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
  </body>
</html>

