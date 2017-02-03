
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
    <script type="text/javascript" src="js/registro_puestatierra.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

       <style type="text/css">
      
      @media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:1200px;}

}

    </style>

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
      <form id="form" class="form form-inline" role="form">
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

             <select id="listClientetierra" class="form-control">
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
                <div id="act_table_cotictierra" style="width: 100%; height: 70px; overflow-y: scroll;" > </div>
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
                <th>Codigo Unico</th>
                <th>Marca Fabricante</th>
                <th>Tipo Equipo</th>
                <th>Codigo Asignado</th>



              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="5">
                  <div id="act_table_serialtierra" style="width: 100%; height: 100px; overflow-y: scroll;" > </div></td>
                </tr>
              </tbody>
            </table>


          </fieldset>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="">Ensayo Equipo  </h4>
         <label class="label label-danger"  name="num_serial" id="num_serial"> </label>
         <input type="hidden" name="num_serialequipo" id="num_serialequipo" >
      </div>
      <div class="modal-body">


            
  <div class="container">
    <div class="row">
        <div class="span12">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="active"><a href="#home" data-toggle="tab">1.   Registro de Datos al momento del Ensayo </a></li>

              
            </ul>
            
            <div class="tab-content" >

              <div class="tab-pane active" id="home" data-src="">
                  <iframe id="frameid1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="400px" src="PPpuestatierra.php"></iframe>           
                </div>
              
            </div>
        </div>
    </div>
</div>            


      </div>
      <div id="footer" class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_aceptartierra"  class="btn btn-primary pull-right">Aceptar</button>
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