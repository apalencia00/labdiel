
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
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_equipos_cliente.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>


  </head>

  <body>

    <div class="container">
      <form class="form-horizontal" id="form" role="form">
        <h2>Registro Equipos Cliente</h2>

        <div class="row"  >

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-4">Seleccione Cliente</label>
            <div class="col-sm-2">

             <select style="width:auto;" id="listCliente" class="form-control">
              <option>Seleccione </option>
            </select>
          </div>

        </div>



        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4"> No. Documento/NIT</label>
          <div class="col-sm-2">
            <input type="text" id="docu" placeholder="Documento/NIT" class="form-control" autofocus>
            <span class="help-block"></span>
          </div>

        </div>

       

      </div>

      <p>

        <fieldset class="the-fieldset">



          <legend class="the-legend">Registrar Equipos</legend>

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-4">Tipo Equipo</label>
            <div class="col-sm-2">

             <select id="tipo_equipo"  class="form-control" style="width:auto;" >
              <option>Seleccione Equipo</option>
            </select>
          </div>

        </div>  


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Codigo Producto</label>
          <div class="col-sm-8">
            <input type="text"  id="cod_producto" placeholder="Codigo Producto" class="form-control col-lg-100" autofocus>
          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Nombre Equipo</label>
          <div class="col-sm-8">
            <input type="text"  id="nomb_equipo" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>

          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Marca Equipo</label>
          <div class="col-sm-8">
            <input type="text"  id="marca" placeholder="Marca Equipo" class="form-control col-lg-100" autofocus>

          </div>

        </div>  





      </fieldset>

      <div class="form-group">
        <div class="col-sm-2 col-sm-offset-3">
          <button type="submit" id="submit" class="btn btn-primary btn-block">Añadir</button>
        </div>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Cod. Equipo</th>
            <th>Descripcion</th>
            <th>Cliente</th>

          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
            <td colspan="3">
              <div id="act_table" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
            </tr>

          </tbody>
        </table>

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