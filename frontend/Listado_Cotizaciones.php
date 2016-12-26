
<?php 

error_reporting(E_ALL);

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
    <script type="text/javascript" src="js/registro_equipos_aprobados.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

  </head>

  <body>

    <div class="container">
      <form id="form" class="form-horizontal" role="form">
        <h2>Cotizaciones Cliente</h2>

        <fieldset>

       


        <table id="dataTable" class="table table-striped">
          <thead>
            <tr id="row">

              <th>Cotizacion</th>
              <th>Fecha Creacion</th>

              <th>Cliente</th>

            </tr>
          </thead>
          <tbody id="mybody">
            <tr>
              <td colspan="5" id="rowd">
                <div id="act_table_cotic" style="width: 100%; height: 200px; overflow-y: scroll;" > </div>
              </td>
            </tr>
          </tbody>
        </table>

      </fieldset>




      <fieldset  >    

        <legend> Inventario Ensayo Cliente </legend>



        <table  class="table table-striped">
          <thead>
            <tr >

              <th>Codigo Equipo</th>
              <th>Tipo Equipo</th>
              <th>Cantidad</th>


            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="5">
                <div id="act_table" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
              </tr>
            </tbody>
          </table>

        </fieldset>

       
          <button type="button" id="generar" class="btn btn-primary">Aprobar</button>
        </form> <!-- /form -->

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