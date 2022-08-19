<?php 

session_start();


$nombre_usuario = $_SESSION['nombre_usuario'];


 ?>

<!doctype html>
<html lang="en">
  <head><meta charset="euc-jp">
    <!-- Required meta tags -->
    
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

<style>
    #scroll2{
        border:0px solid;
        height:750px;
        width:1000px;
        overflow-y:scroll;
      
    }
     </style>



    <title>Editar Reserva</title>
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
<div class="container">

<?php
require 'conexion.php';


$reserva = $_GET['reserva'];

$sql="SELECT * FROM reservas WHERE id_reserva = ".$reserva."";
$result = mysqli_query($conection,$sql);
while ($mostrar= mysqli_fetch_array($result)){
?>

  <form class="form-horizontal" method="POST" action="update_reserva.php" >
        <input type="hidden" value="<?php echo $mostrar['id_reserva'] ?>" name="reserva">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDITAR RESERVA</h4>
        </div>
        <div class="modal-body" id="scroll" >
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titulo de reserva</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $mostrar['title'] ?>" placeholder="titulo">
          </div>
          </div>
          <div class="form-group col-md-6">
          <label for="numero_habitacion" class="col-sm-2 control-label">Numero de habitacion</label>
          <div class="col-sm-10">
            <input type="text" name="numero_habitacion" class="form-control" id="numero_habitacion" value="<?php echo $mostrar['numero_habitacion'] ?>" placeholder="Nombre/Numero Habitacion">
          </div>
          </div>
          <div class="form-group">
          <label for="numero_noches" class="col-sm-2 control-label">Numero de coches</label>
          <div class="col-sm-10">
            <input type="number" name="numero_noches" class="form-control" id="numero_noches" value="<?php echo $mostrar['numero_noches'] ?>" placeholder="numero de noches">
          </div>
          </div>
          <div class="form-group">
          <label for="nombre_usuario" class="col-sm-2 control-label">Nombre de usuario</label>
          <div class="col-sm-10">
            <input type="text" name="nombre_usuario" value="<?php echo $mostrar['nombre_usuario'] ?>" class="form-control" id="nombre_usuario" placeholder="Nombre de cliente">
          </div>
          </div>
          <div class="form-group">
          <label for="lugar" class="col-sm-2 control-label">Lugar de origen</label>
          <div class="col-sm-10">
            <input type="text" name="lugar" value="<?php echo $mostrar['lugar'] ?>" class="form-control" id="lugar" placeholder="Lugar de origen">
          </div>
          </div>
          <div class="form-group">
          <label for="numero_personas" class="col-sm-2 control-label">Numero de personas</label>
          <div class="col-sm-10">
            <input type="number" name="numero_personas" class="form-control" id="numero_personas" value="<?php echo $mostrar['numero_personas'] ?>" placeholder="Numero de personas">
          </div>
          </div>
          <div class="form-group">
          <label for="coche" class="col-sm-2 control-label">¿Tiene coche?</label>
          <div class="col-sm-10">
            <input type="text" value="<?php echo $mostrar['coche'] ?>" name="coche" class="form-control" id="coche" placeholder="trae coche">
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Fecha inicial</label>
          <div class="col-sm-10">
            <input type="datetime-local" value="<?php echo $mostrar['start'] ?>" name="start" class="form-control" id="start" >
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Fecha final</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="end" value="<?php echo $mostrar['end'] ?>" class="form-control" id="end" >
          </div>
          </div>
          <div class="form-group">
          <label for="precio_noche" class="col-sm-2 control-label">Precio por noche</label>
          <div class="col-sm-10">
            <input type="number" value="<?php echo $mostrar['precio_noche'] ?>" name="precio_noche" class="form-control" id="precio_noche" placeholder="Precio por noche">
          </div>
          </div>
          <div class="form-group">
          <label for="precio_total" class="col-sm-2 control-label">Precio total</label>
          <div class="col-sm-10">
            <input type="number" value="<?php echo $mostrar['precio_total'] ?>" name="precio_total" class="form-control" id="precio_total" placeholder="Cantidad total">
          </div>
          </div>

          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <?php
                switch ($mostrar['color']) {
                  case '#0071c5':
                    $color = "Azul obscuro";
                    break;
                  case '#40E0D0':
                    $color = "Turquesa";
                    break;
                  case '#008000':
                    $color = "Verde";
                    break;
                  case '#FFD700':
                    $color = "Amarillo";
                    break;
                  case '#FF8C00':
                    $color = "Naranja";
                    break;
                  case '#FF0000':
                    $color = "Rojo";
                    break;

                  case '#000':
                    $color = "Negro";
                    break;
                  default:
                    $color = "";
                    break;
                }
              ?>

              <option value="<?php echo $mostrar['color'] ?>"><?php echo $color; ?></option>


              <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
              <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
              <option style="color:#000;" value="#000">&#9724; Negro</option>
              
            </select>
          </div>
        </div>
        </div>
        <div class="modal-footer">
        <a class="btn btn-danger" href="reservas.php">Cerrar</a>
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












