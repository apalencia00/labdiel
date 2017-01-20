
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
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_equipos_ensayados.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

    <script type="text/javascript">

    


    </script>

  </head>

  <body>

    <div class="container">
      <form id="form" class="form form-inline" role="form">
        <h2>Reporte Puesta Tierra</h2>

        <fieldset>

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-2">Seleccione Cliente</label>
            <div class="col-sm-2 col-xs-5">

             <select id="listCliente" class="form-control">
              <option value="0" >Seleccione </option>

            </select>
          </div>

        </div>

         <div class="form-group">
            <label for="coti" class="control-label col-sm-6"># Cotizacion</label>
            <div class="col-sm-2 col-xs-5">

            <input type="text" name="ncotic" id="ncotic" class="form-control" autofocus>

          
          </div>

        </div>



        <table id="dataTable" class="table table-striped">
          <thead>
            <tr >

              <th>#</th>
              <th>Cotizacion</th>
              <th>Fecha Creacion</th>

              <th>Cliente</th>

            </tr>
          </thead>
          <tbody >
            <tr>
              <td colspan="5">
                <div id="act_table_cotic" style="width: 100%; height: 100px; overflow-y: scroll;" > </div>
              </td>
            </tr>
          </tbody>
        </table>

      </fieldset>

      <fieldset  >    

        <legend> Equipos Ensayados </legend>

        <table  class="table table-striped">
          <thead>
            <tr >

              <th>Codigo Asignado</th>
              <th>Tipo Equipo</th>
              <th>Categoria</th>


            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="3">
                <div id="act_table_equipos" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
              </tr>
            </tbody>
          </table>

              
          
        </fieldset>

         
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