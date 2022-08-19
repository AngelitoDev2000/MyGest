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
 

    <title>Huespedes</title>
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
  

   <form action="buscar_huespedes.php" method="get" class="form-inline position-relative my-2 d-inline-block">
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar clientes" aria-label="Buscar reservas hoy" id="busqueda" name="busqueda">
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
            
          <h4 class="text-left"> Huespedes </h4>
          </div>
    
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active " id="poke-tab" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-12">
                              <nav class="navbar navbar">         
                                 
                          
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
  <h4 class="text-left"> Datos de clientes</h4></br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
  
      <th scope="col">Nombre del cliente</th>
      <th scope="col">Numero de habitacion</th>
      <th scope="col">Lugar de origen</th>
   
      
      
    </tr>
  </thead>
<?php

$sql2="SELECT nombre_usuario, numero_habitacion, lugar FROM reservas WHERE  id_usuario = ".$_SESSION['id_usuario']."";
$result2 = mysqli_query($conection,$sql2);
while ($mostrar= mysqli_fetch_array($result2)){
 ?>
  <tbody>
   <tr>
  <th scope="row"><?php echo $mostrar['nombre_usuario']?></th> 	
<td><?php echo $mostrar['numero_habitacion']?></td>
<td><?php echo $mostrar['lugar']?></td>
</tr>
    
  </tbody>
  <?php
}
?>
</table>
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