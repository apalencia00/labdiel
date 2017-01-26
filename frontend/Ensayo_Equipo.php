
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_ensayo_equipo.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>
    <script type="text/javascript" src="js/bootstrap-dialog.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

  </head>

  <body>

    <div class="container">

      <form class="form form-inline" role="form" id="form">

        <fieldset  >

          <legend>Ensayo Equipo</legend>


          <div class="row">

            <div class="form-group">
              <label for="tipodoc" class="control-label col-sm-2">Cliente</label>
              <div class="col-sm-4 col-xs-5">

               <select id="listCliente" class="form-control">
                <option>Seleccione </option>
              </select>
               <span class="help-block"></span>
            </div>

          </div>

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-4">Documento</label>
            <div class="col-sm-8 col-xs-5">
              <input type="text" id="docu" placeholder="Documento/NIT" class="form-control col-lg-4" autofocus>

            </div>
             <span class="help-block"></span>
          </div>

          <div class="form-group">
            <div class="col-sm-8 col-xs-5">
            <input type="hidden" id="idrevision" >
            </div>
            </div>

        </div>

        <div class="row">

         <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Solicitud</label>
          <div class="col-sm-2 col-xs-5">
            <input type="text" id="fecha" placeholder="" value="<?php echo date('Y-m-d') ?>" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Documento</label>
          <div class="col-sm-2 col-xs-5">
            <input type="text" id="docu" placeholder="" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Cliente</label>
          <div class="col-sm-2 col-xs-5">
            <input type="text"  id="nombre" placeholder="" class="form-control col-lg-4" autofocus>
             <span class="help-block"></span>
          </div>

        </div>

      </div>

      <div class="row">

       <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4">Telefono</label>
        <div class="col-sm-2 col-xs-5">
          <input type="text"  id="tele" placeholder="Telefono Contacto" class="form-control col-lg-4" autofocus>
          <span class="help-block"></span>

        </div>

      </div>

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">Ciudad</label>
        <div class="col-sm-2 col-xs-5">

         <select id="ciudad" class="form-control col-lg-4">
          <option>Seleccione </option>
        </select>
        <span class="help-block"></span>
      </div>

    </div>

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Email</label>
      <div class="col-sm-2 col-xs-5">
        <input type="text"  id="email" placeholder="example@example.co" class="form-control col-lg-4" autofocus> 
        <span class="help-block"></span>

      </div>

    </div>



  </div>

  <div class="row">



    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Direccion</label>
      <div class="col-sm-2 col-xs-5">
        <input type="text"  id="dire" placeholder="" class="form-control col-lg-4" autofocus>
         <span class="help-block"></span>

      </div>

    </div>





  </div>



  <div class="row" >

   <div class="form-group">

    <div class="radio col-sm-8 col-xs-5">
      <label><input type="radio" name="ejecucion" value="0" checked="checked">Ejecucion Laboratorio</label>
    </div>

    <div class="radio col-sm-8 col-xs-5">
      <label><input type="radio" name="ejecucion" value="1">Ejecucion Externa</label>
    </div>

<span class="help-block"></span>

  </div>



  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Revision</label>
    <div class="col-sm-8 col-xs-5">
      <input type="text"  id="direrev" placeholder="" disabled="disabled" class="form-control col-lg-6" autofocus>

    </div>

  </div>

</div>


<div class="row">

  <div class="form-group">
    <div class="col-sm-2 col-sm-offset-1">
      <button type="submit" id="addensayo"  class="btn btn-primary">Aceptar</button>
    </div>
  </div>

</div>


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

<div class="form-group" >

  <label for="cant" class="control-label col-sm-4">Cantidad</label>
  <div class="col-sm-2" >

    <input class="form-control" type="text" name="cantidad" id="cantidad">

  </div>

</div>


</div>


<div class="row">

  <div class="form-group">
    <div class="col-sm-2 col-sm-offset-1">
      <button type="submit" id="adddetalleensayo"  class="btn btn-primary">Agregar</button>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-2 col-sm-offset-1">
      <button type="submit" class="btn btn-danger">PDF</button>
    </div>
  </div>

</div>


<table id="mytable" class="table table-striped">
  <thead>
    <tr>

      <th>Equipo</th>
      <th>Codigo Equipo</th>
      <th>Cantidad</th>
      <th>N° Revision</th>
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