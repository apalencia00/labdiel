
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
    <script type="text/javascript" src="js/registro_pertigas.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <style type="text/css">
      
      @media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:1200px;}

}

    </style>

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

             <select id="listClientepertigas" class="form-control">
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
                <div id="act_table_coticpertigas" style="width: 100%; height: 200px; overflow-y: scroll;" > </div>
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
                 <th>Codigo Asignado</th> 
                <th>Marca Fabricante</th>
                <th>Tipo Equipo</th>
               



              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="5">
                  <div id="act_table_serialpertigas" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
                </tr>
              </tbody>
            </table>


          </fieldset>

          <!--

  <div class="container">
    <div class="row">
        <div class="span12">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="active"><a href="#home" data-toggle="tab">1.   Registro de Datos al momento del Ensayo </a></li>
              <li><a href="#dpa" data-toggle="tab">2. Inspeccion de condiciones del equipo</a></li>
              <li><a href="#rn" data-toggle="tab">3. Registro de Datos al momento del Ensayo </a></li>
            </ul>
            
            <div class="tab-content" >
              <div class="tab-pane active" id="home" data-src="">
                  <iframe id="frameid1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="400px" src="PPEnsayo.php"></iframe>           
                </div>
              <div class="tab-pane" id="dpa" data-src="">
                  <iframe frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="500px"  src="SPEnsayo.php"></iframe>
                </div>
              <div class="tab-pane" id="rn" data-src="">
                  <iframe class="embed-responsive-item" width="100%" height="500px" src="TPEnsayo.php"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
                </div>
            </div>
        </div>
    </div>
</div>

-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="">Ensayo Equipo  </h4>
         <label class="label label-info"  name="num_serial" id="num_serial"> </label>
         <input type="hidden" name="num_serialequipo" id="num_serialequipo" >
      </div>
      <div class="modal-body">
            
             <div class="container">
    <div class="row">
        <div class="span12">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="active"><a href="#home" data-toggle="tab">1.Datos al momento del Ingreso </a></li>
              <li><a href="#dpa" data-toggle="tab">2. Inspeccion de condiciones del equipo</a></li>
              <li><a href="#rn" data-toggle="tab">3.1 Registro de Medicines al momento del Ensayo </a></li>

              <li><a href="#rna" data-toggle="tab">3.2 Medicines al momento del Ensayo </a></li>
            </ul>
            
            <div class="tab-content" >
              <div class="tab-pane active" id="home" data-src="">
                  <iframe id="frameid1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="400px" src="PPEnsayoPertigas.php"></iframe>           
                </div>
              <div class="tab-pane" id="dpa" data-src="">
                  <iframe frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="embed-responsive-item" width="100%" height="500px"  src="SPEnsayoPertigas.php"></iframe>
                </div>
              <div class="tab-pane" id="rn" data-src="">
                  <iframe class="embed-responsive-item" width="100%" height="500px" src="TPEnsayoPertigas.php"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
                </div>

                 <div class="tab-pane" id="rna" data-src="">
                  <iframe class="embed-responsive-item" width="100%" height="500px" src="CPEnsayoPertigas.php"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
                </div>

            </div>
        </div>
    </div>
</div>            


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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