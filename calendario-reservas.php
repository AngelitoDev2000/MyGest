<?php

session_start();
if (!isset($_SESSION['id_usuario'])){
header("Location: login.php");


}
$nombre_usuario = $_SESSION['nombre_usuario'];
;?>


<?php
require_once('bdd.php');


$sql = "SELECT * FROM reservas WHERE id_usuario = ".$_SESSION['id_usuario']." ";

$req = $bdd->prepare($sql);
$req->execute();

$reservas = $req->fetchAll();

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
    <!-- Bootstrap Core CSS -->
   
  
  <!-- FullCalendar -->
  <link href='assets/css/fullcalendar.css' rel='stylesheet' />
     
 
     <!-- jQuery Version 1.11.1 -->
    <script src="assets/js/jquery.js"></script>
<script  type = " text / javascript " src = " https://unpkg.com/default-passive-events " > </script >
    <!-- Bootstrap Core JavaScript -->
   
  
  <!-- FullCalendar -->
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/js/fullcalendar/fullcalendar.min.js'></script>
  <script src='assets/js/fullcalendar/fullcalendar.js'></script>
  <script src='assets/js/fullcalendar/locale/es.js'></script>
  

    
     


   


    <title>Calendario de reservas</title>
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
<div>
</div>

<div class="container">
                
                <div id="calendar" class="col-md-12 p-5">
            </div>
      
        <!-- /.row -->
     </div>
    
    
    </div>

    </div>



 
  
    <script src="assets/js/jquery.js"></script>
<script  type = " text / javascript " src = " https://unpkg.com/default-passive-events " > </script >
    <!-- Bootstrap Core JavaScript -->
   
  
  <!-- FullCalendar -->
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/js/fullcalendar/fullcalendar.min.js'></script>
  <script src='assets/js/fullcalendar/fullcalendar.js'></script>
  <script src='assets/js/fullcalendar/locale/es.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

  <script>

  $(document).ready(function() {

    var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
    
    $('#calendar').fullCalendar({
    	displayEventTime : false,
      header: {
         language: 'es',
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay',

      },
      defaultDate: yyyy+"-"+mm+"-"+dd,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id_reserva').val(event.id_reserva);
           $('#ModalEdit #title').val(event.title);
         
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($reservas as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '12:30:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '12:30:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
         
           title: '<?php echo $event['title']; ?>',
          numero_habitacion: '<?php echo $event['numero_habitacion']; ?>',
          numero_noches: '<?php echo $event['numero_noches']; ?>',
          nombre_usuario: '<?php echo $event['nombre_usuario']; ?>',
          lugar: '<?php echo $event['lugar']; ?>',
          numero_personas: '<?php echo $event['numero_personas']; ?>',
          coche: '<?php echo $event['coche']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          precio_noche: '<?php echo $event['precio_noche']; ?>',
          precio_total: '<?php echo $event['precio_total']; ?>',
          color: '<?php echo $event['color']; ?>'
        },
      <?php endforeach; ?>
      ]

    });
    
   
    
  });

</script>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

  </body>
</html>