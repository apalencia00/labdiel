
<?php 

error_reporting(0);

require_once '../backend/Model/Modulo.php';


if(!isset($_SESSION)) 
{ 
  session_start(); 
}

if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {


  $usuario = $_SESSION['admon_mod'];
  
  $us = $usuario[0]['nusuario'];
  

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>:: Laboratorio Dielectrico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>


    <script type="text/javascript">

      function callPaget(page){

        if(page != ""){

          window.frames[0].location.href = page;
        }
      }

      function CerrarSesion(){

        var r = confirm("¿Desea cerrar sesión?");
        if (r == true) {

         $.ajax({ url: "../back-end/Source/CerrarSession.php", 
           type: "GET",
           contentType: "application/json",
           dataType: 'json',
           data: {}, 

           success: function(json){

             var res = json.success;                     
             
             if(res){
              window.location = '../index.php';
            }else{
              alert(json.root[0].mensaje);
            }

          }

        });

       } else {
        alert("Error al intentar cerrar sesión");
      }

      

    }

  </script>

</head>
<body onload="javascript:callPaget('<?php echo "Estadistico.php?" ?>')" >

 <div class="container">

  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Labs.| Dielectrico</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
         <li><a href="#" onClick="callPaget('Estadistico.php')">Estadistico</a></li>

         <?php            

         $mod = new Modulo();

         foreach ($mod->getModule() as $v) {  ?>
         <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $v['ID_MODULE'] ?>"> <?php echo $v['MODULOS'] ?> <span class="caret"></span></a>
           <ul class="dropdown-menu">

            <?php

            foreach ($mod->getSubMenu($us,$v['ID_MODULE']) as $s) {  ?>
            <li><a href="#" onclick="callPaget('<?php echo $s['mod'] ?>')" ><?php echo $s['MODULO']  ?></a></li> 

            <?php } ?>


          </ul>
          </li>
          <?php }  ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./" onclick="CerrarSesion();" >Salir <span class="sr-only">(current)</span></a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

      <iframe frameborder="0" align="top" scrolling="no" width="100%" height="1000px" target="_parent" name="servicio" id="servicio" ></iframe>   

    </div>

  </div> <!-- /container -->



</body>


</html>

<?php }
else{

  header("Location: 500.php");

  unset($_SESSION['admon_mod']);
  
        // DESTROY COOKIE
  if (isset($_COOKIE['key'])) {
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/');

  }


} ?>