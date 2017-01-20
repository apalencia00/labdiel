
<?php 

error_reporting(E_ALL);

require_once '../backend/Model/Modulo.php';

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

  $usuario = $_SESSION['admon_mod'];
  #$datos_mod = json_decode($usuario,true);

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
      <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.css">
      <script src="../node_modules/jquery/dist/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/registro_equipos.js" ></script>
      <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

      <script type="text/javascript" src="js/bootstrap-dialog.js" ></script>

     <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

  </head>

  <body>

    <div class="container">
        <form class="form-horizontal" id="form" role="form" >
            <h2>Registro Precios</h2>

            <div class="form-group">
                <label for="tipee" class="control-label col-sm-4">Tipo Equipo</label>
                <div class="col-sm-6">

                   <select id="tipo" class="form-control">
                      <option>Seleccione Tipo</option>
                  </select>
              </div>
          </div> <!-- /.form-group -->

          <div class="form-group">
            <label for="numdoc" class="control-label col-sm-4"> Precio</label>
            <div class="col-sm-6">
                <input type="text" id="precio" placeholder="Precio" class="form-control" autofocus>
                <span class="help-block"></span>
            </div>
        </div>
        

                                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="button" id="btn_reg" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

 


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