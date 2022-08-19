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
        
<link rel="stylesheet" href="assets/css/style.css">
   
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
 

    <title>Habitaciones</title>
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
          <a href="huespedes.php" class="d-block text-light p-3"><i class="icon ion-md-home mr-2 lead"></i>Huespedes</a>

      </div>
    </div>

    <div  class="w-100 bg-light-blue">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php 

$busqueda = strtolower($_REQUEST ['busqueda']);
if(empty($busqueda))
{
  header("Location: habitaciones-panel.php ");
}

 ?>  


  <form action="buscar_habitaciones.php" method="get" class="form-inline position-relative my-2 d-inline-block">
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar habitacion" aria-label="Buscar habitacion" id="busqueda" name="busqueda" value="<?php echo $busqueda; ?>">
      <button class="btn btn-search position-absolute" type="submit" value="buscar"><i class="icon ion-md-search"></i></button>
    </form>








  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       
    </center>
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
      <div class="container-fluid ">
        <div class="row">
          
        </div>
      </div>
    </section>
  
  </div>
  
  <div id="content" class="container-fluid border-bottom "></br>
    <table class="table table-dark">
      <div>
      <thead>
        <div>
          <div>
            
          <h4 class="text-left"> Habitaciones </h4>
          </div>
    
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active " id="poke-tab" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-12">
                              <nav class="navbar navbar">         
                                  <button type="button" class="btn bg-success" data-toggle="modal" data-target="#ModalAdd">Nueva habitacion 
</button>
                          
                              </nav>
                             
</div>
</div>
</div>
</div>

  </div>
</div>
</thead>
</div>
</table>

</div>

<div class="container-fluid p-3" id="scroll"> 
  <h4 class="text-left"> Detalles de la Habitacion</h4></br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
  
      <th scope="col">Numero de habitacion</th>
      <th scope="col">Tipo de habitacion</th>
      <th scope="col">Piso de la habitacion</th>
      <th scope="col">Imagen de la habitacion</th>
      
      
    </tr>
  </thead>
<?php

$sql2="SELECT * FROM habitaciones WHERE (numero_habitacion like '%$busqueda%' OR 
 tipo like '%$busqueda%' OR 
 piso like '%$busqueda%' 
 ) AND id_usuario = ".$_SESSION['id_usuario']."";
$result2 = mysqli_query($conection,$sql2);
while ($mostrar= mysqli_fetch_array($result2)){
 

  if ($mostrar['foto'] != 'img_habitacion.png') {
    $foto = 'imag/'.$mostrar['foto'];
  }else{
    $foto = 'imag/error/'.$mostrar['foto'];
  }
?>
  <tbody>
   <tr>
  <th scope="row"><?php echo $mostrar['numero_habitacion']?></th>   
<td><?php echo $mostrar['tipo']?></td>
<td><?php echo $mostrar['piso']?></td>
<td class="img_habitacion"><img src="<?php echo $foto?>"></td>

<td> <a class="btn btn-warning" href="edit_habitacion.php?habitacion=<?php echo $mostrar['id_habitacion']?>">Editar</a> </td>
<td> <a class="btn btn-danger" href="delete_habitacion.php?habitacion=<?php echo $mostrar['id_habitacion']?>">Eliminar</a> </td>
</tr>
    
  </tbody>
  <?php
}
?>
</table>
</div>


</div>
</div>

<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="add_habitacion.php" enctype="multipart/form-data">
      
        <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AGREGAR HABITACION</h4>
        </div>
        <div class="modal-body" >
        
          <div class="form-group" >
          <label for="numero_habitacion" class="col-sm-2 control-label">NUMERO DE HABITACION</label>
          <div class="col-sm-10">
            <input type="number" name="numero_habitacion" class="form-control" id="numero_habitacion" placeholder="NUMERO DE HABITACION">
          </div>
          </div>
          <div class="form-group">
          <label for="tipo" class="col-sm-2 control-label">TIPO DE HABITACION</label>
          <div class="col-sm-10">
            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="TIPO DE HABITACION">
          </div>
          </div>
          <div class="form-group">
          <label for="piso" class="col-sm-2 control-label">Piso de la habitacion</label>
          <div class="col-sm-10">
            <input type="number" name="piso" class="form-control" id="piso" placeholder="Piso de la habitacion">
          </div>
          </div>
          <div class="photo">
  <label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto notBlock">X</span>
        <label for="foto"></label>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
</div>
         
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
      </form>
      </div>


    </div>
    </div>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"

        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
         <script src="assets/js/functions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
  </body>
</html>