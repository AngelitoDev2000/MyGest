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
  


 <form action="buscar_admin.php" method="get" class="form-inline position-relative my-2 d-inline-block">
      <input class="form-control mr-sm-2 " type="search" placeholder="Buscar cliente" aria-label="Buscar cliente" id="busqueda" name="busqueda">
      <button class="btn btn-search position-absolute" type="submit" value="buscar"><i class="icon ion-md-search"></i></button>
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


<div id="content" class="container-fluid border-bottom "></br>
    <table class="table table-dark">
      <div>
      <thead>
        <div>
          <div>
            
          <h4 class="text-left"> ADMINISTRADOR DE USUARIOS </h4>
          </div>
    
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active " id="poke-tab" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-12">
                              <nav class="navbar navbar">         
                                  <button type="button" class="btn bg-success" data-toggle="modal" data-target="#adminusuario">Nuevo cliente
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
							
								
   
        
       <div class="container-fluid p-1"> 
  <h4 class="text-left"> Lista de Administradores</h4></br> 
<table class="table table-striped table-dark">
  <thead>
    <tr>   
 <th scope="col">Id Usuario</th>
      <th scope="col">Nombre de usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Tipo de usuario</th>
    </tr>
  </thead>
<?php

$sql="SELECT * FROM usuarios";
$result = mysqli_query($conection,$sql);
while ($mostrar= mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $mostrar['id_usuario']?></td>
<td><?php echo $mostrar['usuario']?></td>
<td><?php echo $mostrar['clave']?></td>
<td><?php echo $mostrar['nombre_usuario']?></td>


<td> <a class="btn bg-info" href="edit_admin.php?admin=<?php echo $mostrar['id_usuario']?>">Editar</a> </td>
<td> <a class="btn btn-danger" href="delete_admin.php?admin=<?php echo $mostrar['id_usuario']?>">Eliminar</a> </td>
</tr>
<?php
}
?>
</tbody>
  </table>
</div>
  
<div class="modal fade" id="adminusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="add_admin.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AGREGAR Usuario</h4>
        </div>
        <div class="modal-body">
        
       
          </div>
          <div class="form-group">
          <label for="numero_de_usuario" class="col-sm-2 control-label">Nombre de usuario</label>
          <div class="col-sm-10">
            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Nombre del usuario">
          
          <div class="form-group">
          <label for="clave" class="col-sm-2 control-label">clave</label>
          <div class="col-sm-10">
            <input type="password" name="clave" class="form-control" id="clave" placeholder="Clave de acceso">
          </div>
          </div>
          <div class="form-group">
          <label for="correo_usuario" class="col-sm-2 control-label">Correo Usuario</label>
          <div class="col-sm-10">
            <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Correo del usuario">
          </div>
          </div>
          <div class="form-group">
          <label for="tipo_usuario" class="col-sm-2 control-label">tipo usuario?</label>
          <div class="col-sm-10">
            <input type="number" name="tipo_usuario" class="form-control" id="tipo_usuario" placeholder="Tipo de usuario">
          </div>
          </div>
          
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" action="add_admin.php">Guardar</button>
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