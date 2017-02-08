
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


    <style type="text/css">

      fieldset.scheduler-border {
        border: 0px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
      }

      legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;

      }

    </style>

  </head>

  <body>

    <div class="container">

      <form class="form form-inline" role="form" id="form">


       <div class="form-group">

        <input type="hidden" id="idrevision" >

      </div>

      <fieldset class="scheduler-border">

        <legend>Criterio de Busqueda</legend>

        <div class="row">

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-4">Seleccione Cliente</label>
            <div class="col-sm-2">

             <select id="listCliente" class="form-control">
              <option>Seleccione </option>
            </select>
            <span class="help-block"></span>
          </div>

        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Documento</label>
          <div class="col-sm-2">
            <input type="text" id="docu" placeholder="Documento/NIT" class="form-control col-lg-4" autofocus>
            <span class="help-block"></span>
          </div>

        </div>


      </div>

    </fieldset>

    <div class="row">

     <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Solicitud</label>
      <div class="col-sm-2">
        <input type="text" id="fecha" placeholder="" value="<?php echo date('Y-m-d') ?>" class="form-control col-lg-4" autofocus readonly="" >
        <span class="help-block"></span>
      </div>
    </div>


    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Documento</label>
      <div class="col-sm-2">
        <input type="text" id="docu" placeholder="" class="form-control col-lg-4" autofocus readonly="" >
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Nombre Cliente</label>
      <div class="col-sm-2">
        <input type="text"  id="nombre" placeholder="" class="form-control col-lg-4" autofocus>
        <span class="help-block"></span>
      </div>

    </div>

  </div>



  <div class="row">

   <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Telefono</label>
    <div class="col-sm-2">
      <input type="text"  id="tele" placeholder="Telefono Contacto" class="form-control col-lg-4" autofocus>
      <span class="help-block"></span>

    </div>

  </div>

  <div class="form-group">
    <label for="tipodoc" class="control-label col-sm-4">Ciudad Origen</label>
    <div class="col-sm-2">

     <input class="form-control col-lg-4" type="text" name="ciudad" id="ciudad" >
     <span class="help-block"></span>
   </div>

 </div>



</div>

<div class="row">

 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Email</label>
  <div class="col-sm-2">
    <input type="text"  id="email" placeholder="example@example.co" class="form-control col-lg-4" autofocus> 
    <span class="help-block"></span>

  </div>

</div>



<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Direccion</label>
  <div class="col-sm-2">
    <input type="text"  id="dire" placeholder="" class="form-control col-lg-4" autofocus>
    <span class="help-block"></span>

  </div>

</div>





</div>



<div class="row" >

 <div class="form-group">

  <div class="radio col-sm-8">
    <input type="radio" name="ejecucion" value="0" checked="checked">Ejecucion Laboratorio
    <span class="help-block"></span>
  </div>

  <div class="radio col-sm-8">
    <input type="radio" name="ejecucion" value="1">Ejecucion Externa
    <span class="help-block"></span>
  </div>



</div>



<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Revision</label>
  <div class="col-sm-8">
    <input type="text"  id="direrev" placeholder="" disabled="disabled" class="form-control col-lg-6" autofocus>

  </div>

</div>

</div>





<div class="text-right">
  <button type="submit" id="addensayo"  class="btn-info btn">Aceptar</button>
</div>



<div class="row">

 <div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Equipo</label>
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

<div class="form-group">
  <div class="col-sm-4">
    <button type="submit" id="adddetalleensayo"  class="btn btn-primary">Agregar</button>
    <span class="help-block"></span>
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