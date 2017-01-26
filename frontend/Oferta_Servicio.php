 
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_cotizacion.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

    <style type="text/css">



    </style>

  </head>

  <body>

    <div class="container">
      <form id="form" class="form form-inline" role="form">
        <h2>Cotizacion </h2> 

        <div class="row">

        <div class="form-group">
          <label for="tipodoc" class="control-label col-sm-2">Seleccione Cliente</label>
          <div class="col-sm-2 col-xs-5">

           <select id="listCliente" class="form-control">
            <option value="0" >Seleccione </option>
          </select>
        </div>

      </div>

      <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4"> No. Documento/NIT</label>
        <div class="col-sm-2">
          <input type="text" id="busqueda" placeholder="Documento/NIT" class="form-control" autofocus>
          <span class="help-block"></span>
        </div>
      </div>

      </div>



      <fieldset class="the-fieldset">

        <legend class="the-legend">Detalle Cliente</legend>

        <div class="row">

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Nro. Cotizacion</label>
          <div class="col-sm-2">
            <input type="text" id="nocotic" placeholder="" value="" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>

 <div class="form-group">

            <input type="hidden" id="idrevision" >
          </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Fecha Cotizacion</label>
          <div class="col-sm-2">
            <input type="text" id="fecba_act" placeholder="" value="<?php echo date('Y-m-d') ?>" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Documento/NIT</label>
          <div class="col-sm-2">
            <input type="text" id="docu" placeholder="" class="form-control col-lg-100" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>

        </div>

        <div class="row">

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Nombre Cliente</label>
          <div class="col-sm-4 col-xs-5">
            <input type="text"  id="nombre" placeholder="" class="form-control col-lg-100" autofocus>
          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Telefono Contacto</label>
          <div class="col-sm-4 col-xs-5">
        <input type="text"  id="tele" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>

          </div>

        </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Persona Contacto</label>
          <div class="col-sm-4 col-xs-5">
            <input type="text"  id="persona" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>

          </div>

        </div>

        </div>

        <div class="row">

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Correo Electronico</label>
          <div class="col-sm-4">
            <input type="text"  id="email" placeholder="example@example.co" class="form-control col-lg-100" autofocus>

          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Direccion</label>
          <div class="col-sm-4">
            <input type="text"  id="dire" placeholder="" class="form-control col-lg-100" autofocus>

          </div>

        </div>

        </div>


      </fieldset>

      <fieldset  >

       <legend>Detalle Equipos Cotizados</legend>



       <label> Desea Continuar ?  </label>
       <input type="checkbox" id="checkdetalle" disabled data-toggle="toggle">



       <table id="tbl1" class="table table-striped">
        <thead>
          <tr>

            <th>Codigo Equipo</th>
            <th>Tipo Equipo</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            

          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
            <td colspan="5">
              <div id="act_table" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
            </tr>

          </tbody>
        </table>



<div class="row">

        <div class="form-group">
  <div class="col-sm-2 col-sm-offset-3">
    <button type="submit" id="aprobar"  class="btn btn-primary">Aceptar</button>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-4 col-sm-offset-10">
    <button type="submit" id="genped" class="btn btn-danger">PDF</button>
  </div>
</div>

</div>
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