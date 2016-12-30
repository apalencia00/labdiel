
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
    <script type="text/javascript" src="js/registro_inspeccion.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

    <script type="text/javascript">

    $('#myTabs').bind('show', function(e) {  

    paneID = $(e.target).attr('href');
    src = $(paneID).attr('data-src');
    // if the iframe hasn't already been loaded once
    if($(paneID+" iframe").attr("src")=="")
    {
        $(paneID+" iframe").attr("src",src);
    }

});



    </script>

  </head>

  <body onload="">

    <div class="container">
      <form id="form" class="form-inline" role="form">
        <h2>Inspeccion de Equipos</h2>

        <fieldset>

           <div class="form-group">
            <label for="coti" class="control-label col-sm-6">Cotizacion</label>
            <div class="col-sm-2 col-xs-5">
          <input type="text" name="cotic" id="cotic">

          </div>

          </div>

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-2">Seleccione Cliente</label>
            <div class="col-sm-2 col-xs-5">

             <select id="listCliente" class="form-control">
              <option value="0" >Seleccione </option>
            </select>
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
                <div id="act_table_cotic" style="width: 100%; height: 70px; overflow-y: scroll;" > </div>
              </td>
            </tr>
          </tbody>
        </table>

      </fieldset>

      <p>

        <fieldset  >    

          <div class="form-group">
            <label for="coti" class="control-label col-sm-6">Codigo Equipo</label>
            <div class="col-sm-2 col-xs-5">

              <input type="text" name="codequipo" id="codequipo" class="form-control" autofocus>


            </div>

          </div>

          <table  class="table table-striped">
            <thead>
              <tr >
                <th>Id Serial</th>
                <th>Marca Fabricante</th>
                <th>Tipo Equipo</th>
                <th>Codigo Asignado</th>



              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="5">
                  <div id="act_table_serial" style="width: 100%; height: 100px; overflow-y: scroll;" > </div></td>
                </tr>
              </tbody>
            </table>


          </fieldset>

  <div class="container">
    <div class="row">
        <div class="span12">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="active"><a href="#home" data-toggle="tab">1.   Registro de Datos al momento del Ensayo </a></li>
             
            </ul>
            
            <div class="tab-content" >
              <div class="tab-pane active" id="home" data-src="">
                  <iframe frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="400px" src="PPpuestatierra.php"></iframe>           
                </div>
              
            </div>
        </div>
    </div>
</div>



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