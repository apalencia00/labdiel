
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

    <style type="text/css">

      .the-legend {
        border-style: none;
        border-width: 0;
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 0;
      }
      .the-fieldset {
        border: 2px groove threedface #444;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
      }

    </style>


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
      <form class="form-horizontal" id="form" role="form">
        <h2>Registro Equipos</h2>

        <fieldset class="the-fieldset">

         
         

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-4">Descripcion</label>
            <div class="col-sm-8">
              <input type="text"  id="desc" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>

            </div>

          </div>

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-4">Clase Equipo</label>
            <div class="col-sm-8">
              
              <select id="claseeq" class="form-control">
                
                <option value="-1" >Seleccione</option>

              </select>

            </div>

          </div> 

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-4">Unidad Equipo</label>
            <div class="col-sm-8">
              
              <select id="unidad" class="form-control">
                  <option value="-1" >Seleccione</option>
                  <option value="1">Unidad</option>
                  <option value="2">Par</option>

              </select>

            </div>

          </div> 

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-4">Procedimiento Equipo</label>
            <div class="col-sm-8">
              
              <select id="procedimiento" class="form-control">
                <option value="-1" >Seleccione</option>
                
              </select>

            </div>

          </div> 


          <button type="submit" id="submit" class="btn btn-primary btn-block">Registrar</button>

  


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