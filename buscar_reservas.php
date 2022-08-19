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





    <title>Reservas</title>
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
  header("Location: reservas.php ");
}

 ?>

  <form class="form-inline position-relative my-2 d-inline-block" action="buscar_reservas.php" method="get" >
      
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar reserva" aria-label="Buscar reserva" id="busqueda" value="<?php echo $busqueda; ?>">
      
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
      <div class="container-fluid p-1">
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
            
          <h3 class="text-left"> Reservas </h3>
          </div>
    
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active " id="poke-tab" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-12">
                              <nav class="navbar navbar">					
                                  <button type="button" class="btn text-light bg-success" data-toggle="modal" data-target="#ModalAdd">Nueva reserva
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

<div class="container-fluid p-3"> 

  <h4 class="text-left"> Detalles de las reservas </h4></br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Nombre de Evento</th>
      <th scope="col">Numero de habitacion</th>
      <th scope="col">Numero de noches</th>
      <th scope="col">Nombre del cliente</th>
      <th scope="col">Lugar de origen</th>
      <th scope="col">Numero de personas</th>
      <th scope="col">¿Trae vehiculo?</th>
      <th scope="col">Fecha de entrada</th>
      <th scope="col">Fecha salida</th>
      <th scope="col">Precio por noche</th>
      <th scope="col">Precio total</th>
      
    </tr>
  </thead>
<?php

//$sql= "SELECT COUNT(*) as 'Total registros' FROM reservas
//WHERE 
//(numero_habitacion like '%m%' OR 
 //nombre_usuario like '%m%' OR 
 //lugar like '%m%' 
 //) AND id_usuario = ".$_SESSION['id_usuario'].""

 $sql="SELECT * FROM reservas WHERE (numero_habitacion like '%$busqueda%' OR 
 nombre_usuario like '%$busqueda%' OR 
 lugar like '%$busqueda%' 
 ) AND id_usuario = ".$_SESSION['id_usuario']." ";
$result = mysqli_query($conection,$sql);
$sql2="SELECT * FROM habitaciones WHERE id_usuario = ".$_SESSION['id_usuario']."";
$result2 = mysqli_query($conection,$sql2);

while ($mostrar= mysqli_fetch_array($result)){
?>
  <tbody>
    <tr>
  <td><?php echo $mostrar['title']?></td>
<td><?php echo $mostrar['numero_habitacion']?></td>
<td><?php echo $mostrar['numero_noches']?></td>
<td><?php echo $mostrar['nombre_usuario']?></td>
<td><?php echo $mostrar['lugar']?></td>
<td><?php echo $mostrar['numero_personas']?></td>
<td><?php echo $mostrar['coche']?></td>
<td><?php echo $mostrar['start']?></td>
<td><?php echo $mostrar['end']?></td>
<td><?php echo $mostrar['precio_noche']?></td>
<td><?php echo $mostrar['precio_total']?></td>



<td> <a class="btn text-light bg-info" href="edit_reserva.php?reserva=<?php echo $mostrar['id_reserva']?>">Editar</a> </td>
<td> <a class="btn btn-danger" href="delete_reserva.php?reserva=<?php echo $mostrar['id_reserva']?>">Eliminar</a> </td>
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
      <form class="form-horizontal" method="POST" action="guardar_reservas.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AGREGAR RESERVA</h4>
        </div>
        <div class="modal-body">
          
        
          <div class="form-group">
          <label for="numero_habitacion" class="col-sm-2 control-label">Numero de Habitacion</label>
          <div class="col-sm-10">
            <select name="numero_habitacion" class="form-control">
              <option value="" selected="">eliga una opcion</option>
<?php while ($mostrar2= mysqli_fetch_array($result2)){ ?>
              <option value="<?php echo $mostrar2['numero_habitacion'];?>"><?php echo $mostrar2['numero_habitacion'];?></option>
<?php } ?>
            </select>
          </div>
          </div>
           <div class="form-group">
          <label for="title" class="col-sm-2 control-label">titulo</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="titulo">
          </div>
          </div>
          <div class="form-group">
          <label for="numero_noches" class="col-sm-2 control-label">Numero de Noches</label>
          <div class="col-sm-10">
            <input type="number" name="numero_noches" class="form-control" id="numero_noches" placeholder="numero de noches">
          </div>
          </div>
          <div class="form-group">
          <label for="nombre_usuario" class="col-sm-2 control-label">Nombre de Usuario</label>
          <div class="col-sm-10">
            <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Nombre de cliente">
          </div>
          </div>
          <div class="form-group">
          <label for="lugar" class="col-sm-2 control-label">Lugar de origen</label>
          <div class="col-sm-10">
            <input type="text" name="lugar" class="form-control" id="lugar" placeholder="Lugar de origen">
          </div>
          </div>
          <div class="form-group">
          <label for="numero_personas" class="col-sm-2 control-label">Numero de personas</label>
          <div class="col-sm-10">
            <input type="number" name="numero_personas" class="form-control" id="numero_personas" placeholder="Numero de personas">
          </div>
          </div>
          <div class="form-group">
          <label for="coche" class="col-sm-2 control-label">¿Tiene Coche?</label>
          <div class="col-sm-10">
            <input type="text" name="coche" class="form-control" id="coche" placeholder="trae coche">
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="start" class="form-control" id="start" >
          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="datetime-local" name="end" class="form-control" id="end" >
          </div>
          </div>
          <div class="form-group">
          <label for="precio_noche" class="col-sm-2 control-label">Precio por noche</label>
          <div class="col-sm-10">
            <input type="number" name="precio_noche" class="form-control" id="precio_noche" placeholder="Precio por noche">
          </div>
          </div>
          <div class="form-group">
          <label for="precio_total" class="col-sm-2 control-label">Precio total</label>
          <div class="col-sm-10">
            <input type="number" name="precio_total" class="form-control" id="precio_total" placeholder="Cantidad total">
          </div>
          </div>

          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
                    <option value="">Seleccionar</option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
  </body>
</html>