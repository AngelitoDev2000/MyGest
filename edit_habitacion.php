<?php 

session_start();


$nombre_usuario = $_SESSION['nombre_usuario'];


 ?>
<!doctype html>
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





    <title>Editar habitacion</title>
  </head>
  <body>
  <div class="d-flex">
    <div id="sidebar-container" class="bg-dark">
      <div class="logo">
        <h4 class="text-light font-weight-bold">MYGEST</h4>
      </div>
      <div class="menu">
         <h4 class=" text-light p-3 ">Panel de control</h4>
          <a href="panel_control.php" class="d-block text-light p-3"><i class="icon ion-md-stats mr-2 lead"></i>Status de habitaciones</a>
          <a href="reservas.php" class="d-block text-light p-3"><i class="icon ion-md-book mr-2 lead"></i>Reservas</a>
          <a href="calendario-reservas.php" class="d-block text-light p-3"><i class="icon ion-md-calendar mr-2 lead"></i>Calendario</a>
          <a href="habitaciones-panel.php" class="d-block text-light p-3"><i class="icon ion-md-home mr-2 lead"></i>Habitaciones</a>
          <a href="huespedes.php" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i>Huespedes</a>

      </div>
    </div>

    <div  class="w-100 bg-light-blue">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline position-relative my-2 d-inline-block">
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar habitacion" aria-label="Buscar habitacion">
      <button class="btn btn-search position-absolute" type="submit"><i class="icon ion-md-search"></i></button>
    </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-md-person mr-2  lead"></i>
          <?php echo "$nombre_usuario";?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
         
          <a class="dropdown-item" href="login.html">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>  
  </div>
</nav>
<div class="container p-5">
<?php
require 'conexion.php';


$habitacion = $_GET['habitacion'];

$sql="SELECT * FROM habitaciones WHERE id_habitacion = ".$habitacion."";
$result = mysqli_query($conection,$sql);
while ($mostrar= mysqli_fetch_array($result)){
?>

  <form class="form-horizontal" method="POST" action="update_habitacion.php">
        <input type="hidden" value="<?php echo $mostrar['id_habitacion'] ?>" name="habitacion">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDITAR HABITACION </h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="numero_habitacion" class="col-sm-2 control-label">Numero de habitación</label>
          <div class="col-sm-10">
            <input type="number" name="numero_habitacion" class="form-control" id="numero_habitacion" value="<?php echo $mostrar['numero_habitacion'] ?>" placeholder="Numero Habitacion">
          </div>
          </div>
          <div class="form-group">
          <label for="tipo" class="col-sm-2 control-label">Tipo Habitacion</label>
          <div class="col-sm-10">
            <input type="text" name="tipo" class="form-control" id="tipo" value="<?php echo $mostrar['tipo'] ?>" placeholder="Tipo de habitacion">
          </div>
          </div>
          <div class="form-group">
          <label for="piso" class="col-sm-2 control-label">Piso</label>
          <div class="col-sm-10">
            <input type="number" name="piso" value="<?php echo $mostrar['piso'] ?>" class="form-control" id="piso" placeholder="Numero de piso">
          </div>
          </div>
         
          
    
        <div class="modal-footer">
            <a class="btn btn-danger" href="habitaciones-panel.php">Cerrar</a>
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












