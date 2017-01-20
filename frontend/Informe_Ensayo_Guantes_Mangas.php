
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

  </head>

  <body>

    <div class="container">
      <form id="form" class="form form-inline" role="form">
        <h2>Reporte laboratorios</h2>

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

        <p>

           
          <div class="form-group">
          
            <label for="coti" class="control-label col-sm-6">Fecha Consulta</label>
            <div class='input-group date' id='datetimepicker1'>

              <input type='text' class="form-control" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>

            <div class='input-group date' id='datetimepicker2'>

              <input type='text' class="form-control" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>

          </div>


     
        <script type="text/javascript">
           
        </script>


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
                <div id="act_table_cotic" style="width: 100%; height: 400px; overflow-y: scroll;" > </div>
              </td>
            </tr>
          </tbody>
        </table>

      </fieldset>

  

     

         
        </form> <!-- /form -->

      </div>
   <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Informes</h4>
            </div>
            <div class="modal-body">

              
               <div class="row">

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                    <img id="genpdfproteccion_guantes" data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Equipos Guantes</h4>
                  </a>
                </div>

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                    <img id="genpdfproteccion_mantas" data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Equipos Mantas</h4>
                  </a>
                </div>

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                  <img id="genpdfproteccion_calzado" data-src="..." alt="..."
                    img data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Equipos Calzado</h4>
                  </a>
                </div>

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                  <img id="genpdfproteccion_puestatierra" data-src="..." alt="..." 
                     data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Puesta Tierra</h4>
                  </a>
                </div>


            

          </div>

            <div class="row">

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                  <img id="genpdfproteccion_linear" data-src="..." alt="..."
                    data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Linears</h2>
                  </a>
                </div>
                
                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                    <img id="genpdfproteccion_elevacion" data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Equipos Elevacion</h2>
                  </a>
                </div>

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                    <img id="genpdfpertigas" data-src="..." alt="..." src="images/pdf.jpg">
                    <h4>Equipos Pertigas</h2>
                  </a>
                </div>

                <div class="col-sm-6 col-md-3">
                  <a href="#" class="thumbnail">
                    <img data-src="..." alt="..." src="images/pdf.jpg">
                  </a>
                </div>


            

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