
<?php 

error_reporting(E_ALL);

require_once '../backend/Model/Modulo.php';

session_start(); 


if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

  $usuario = $_SESSION['admon_mod'];
  $datos_mod = json_decode($usuario,true);

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
    <script type="text/javascript" src="js/registro_equipos_aprobados.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

  </head>

  <body>

    <div class="container">
      <form id="form" class="form-horizontal" role="form">

        <h2>Programacion Equipos</h2>

        <fieldset  >    

         <table class="table table-striped">
          <thead>
            <tr>

              <th>Codigo Equipo</th>
              <th>Tipo Equipo</th>
              <th>Cantidad</th>
              <th>Cliente</th>

            </tr>
          </thead>
           <tbody>
      <tr>
        <td data-toggle="modal" id="myclass" data-id="GA001" data-target="#myModal"  scope="row" >GA001</td>
        <td>MANGAS DIELECTRICAS</td>
        <td></td>
      </tr>
      
    </tbody>
          </table>

        </fieldset>


        <button type="button" id="generar" class="btn btn-primary">Generar</button>
      </form> <!-- /form -->

    </div>

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Procedimientos Equipos</h4>
      </div>
      <div class="modal-body">
         </div>
      <div class="modal-footer">
        
        1. Desconecte el Equipo de la corriente.

        2. Contecte a la corriente.
        
      </div>
    </div>
  </div>
</div>

    
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