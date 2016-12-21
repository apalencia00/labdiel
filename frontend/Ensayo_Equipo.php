
<?php 

error_reporting(E_ALL);

require_once '../backend/Model/Modulo.php';

session_start(); 


if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

  $usuario = $_SESSION['admon_mod'];
  $datos_mod = json_decode($usuario,true);

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
    <script type="text/javascript" src="js/registro_ensayo_equipo.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

  </head>

  <body>

    <div class="container">
      <form class="form form-inline" role="form" id="form">
        <h2>Ensayo Equipos</h2>

        <div class="row">

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-2">Seleccione Cliente</label>
            <div class="col-sm-2 col-xs-5">

             <select id="listCliente" class="form-control">
              <option>Seleccione </option>
            </select>
          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Documento/NIT</label>
          <div class="col-sm-8 col-xs-5">
            <input type="text" id="docu" placeholder="Documento/NIT" class="form-control col-lg-4" autofocus>

          </div>
        </div>

         <div class="form-group">

            <input type="hidden" id="idrevision" >
          </div>
          
        </div>

      
      <fieldset class="the-fieldset">

        <legend class="the-legend">Detalle Cliente</legend>


        <div class="row">

         <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Fecha Solicitud</label>
          <div class="col-sm-4 col-xs-5">
            <input type="text" id="fecha" placeholder="" value="<?php echo date('Y-m-d') ?>" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Documento/NIT</label>
          <div class="col-sm-4 col-xs-5">
            <input type="text" id="docu" placeholder="" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Cliente</label>
          <div class="col-sm-4 col-xs-5">
            <input type="text"  id="nombre" placeholder="" class="form-control col-lg-4" autofocus>
          </div>

        </div>

      </div>

      <div class="row">

       <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4">Tel. Contacto</label>
        <div class="col-sm-4 col-xs-5">
          <input type="text"  id="tele" placeholder="Telefono Contacto" class="form-control col-lg-4" autofocus>

        </div>

      </div>

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">Seleccione Ciudad</label>
        <div class="col-sm-4 col-xs-5">

         <select id="ciudad" class="form-control">
          <option>Seleccione </option>
        </select>
      </div>

    </div>



  </div>

  <div class="row">

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Correo Electronico</label>
      <div class="col-sm-4 col-xs-5">
        <input type="text"  id="email" placeholder="example@example.co" class="form-control col-lg-4" autofocus>

      </div>

    </div>

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Direccion</label>
      <div class="col-sm-4 col-xs-5">
        <input type="text"  id="dire" placeholder="" class="form-control col-lg-4" autofocus>

      </div>

    </div>



  </div>



  <div class="row" >
    
      <div class="form-group">

  <label class="control-label col-sm-4"> Lugar de ejecución   </label>
  
  <div class="radio col-sm-4 col-xs-5">
    <label><input type="radio" name="ejecucion" value="0" checked="checked">Laboratorio</label>
  </div>
  <div class="radio col-sm-4 col-xs-8">
    <label><input type="radio" name="ejecucion" value="1">Instalacion Externa</label>
  </div>



  </div>

  <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Direccion Revision</label>
      <div class="col-sm-4 col-xs-5">
        <input type="text"  id="direrev" placeholder="" disabled="disabled" class="form-control col-lg-4" autofocus>

      </div>

  </div>

</br>

</fieldset>

</br>

<div class="row">

<div class="form-group">
  <div class="col-sm-2 col-sm-offset-1">
    <button type="submit" id="addensayo"  class="btn btn-primary">Aceptar</button>
  </div>
</div>

</div>

</br>

<fieldset  >

<div class="row">

 <legend>Detalle Ensayo Ensayar</legend>

 <div class="form-group">
  <label for="tipodoc" class="control-label col-sm-2">Clase Equipo</label>
  <div class="col-sm-2">

   <select id="tipoequipo" class="form-control">
    <option>Seleccione Equipo</option>
  </select>
</div>

</div>


<div class="form-group">
  <div class="col-sm-2 col-sm-offset-3">
    <button type="submit" id="adddetalleensayo"  class="btn btn-primary">Agregar</button>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-4 col-sm-offset-10">
    <button type="submit" class="btn btn-danger">PDF</button>
  </div>
</div>

</div>

</fieldset>

<table id="mytable" class="table table-striped">
  <thead>
    <tr>
      
      <th>Equipo</th>
      <th>Codigo Equipo</th>
      <th>Cantidad</th>
      <th>Cliente</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <tbody id="tbody">
          <tr>
            <td colspan="5">
              <div id="act_table" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
            </tr>

          </tbody>
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