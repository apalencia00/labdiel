
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
    <script type="text/javascript" src="js/registro_inspeccion.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

    <script type="text/javascript">





    </script>

  </head>

  <body>

    <div class="container">
      <form id="form" class="form-inline" role="form">
        <h2>Inspeccion de Equipos</h2>

        <fieldset>

        <input type="hidden" name="cotic" id="cotic">

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-2">Seleccione Cliente</label>
            <div class="col-sm-2 col-xs-5">

             <select id="listCliente" class="form-control">
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
                <div id="act_table_cotic" style="width: 100%; height: 100px; overflow-y: scroll;" > </div>
              </td>
            </tr>
          </tbody>
        </table>

      </fieldset>

      <fieldset  >    



        <table  class="table table-striped">
          <thead>
            <tr >
              <th>Id Serial</th>
              <th>Marca Fabricante</th>
              <th>Tipo Equipo</th>
              <th>Codigo Asignado</th>
              


            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="5">
                <div id="act_table_serial" style="width: 100%; height: 100px; overflow-y: scroll;" > </div></td>
              </tr>
            </tbody>
          </table>

          
        </fieldset>

        <fieldset>

          <legend> 1. Datos del Equipo al momento del ingreso</legend>

          <div class="row">

            <div class="form-group">
              <label for="tipodoc" class="control-label col-sm-4">Clase</label>
              <div class="col-sm-2 col-xs-5">

               <select id="clase" class="form-control">
                <option value="0" >T </option>
                <option value="1" >NT </option>
                <option value="2" >NA </option>
              </select>
            </div>

          </div>

          <div class="form-group">
            <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
            <div class="col-sm-2 col-xs-5">

             <textarea id="obs"></textarea>
           </div>

         </div>

         <div class="form-group">


          <label for="numdoc" class="control-label col-sm-6">Tension(KV)</label>
          <div class="col-sm-2 col-xs-5">


           <select id="tension" class="form-control">
            <option value="0" >T </option>
            <option value="1" >NT </option>
            <option value="2" >NA </option>
          </select>

        </div>

      </div>

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
        <div class="col-sm-2 col-xs-5">

         <textarea id="obs2"></textarea>
       </div>

     </div>  

   </div>

   <div class="row">


    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Tipo</label>
      <div class="col-sm-2">


       <select id="tipo" class="form-control">
        <option value="0" >T </option>
        <option value="1" >NT </option>
        <option value="2" >NA </option>
      </select>

    </div>
  </div>

  <div class="form-group">
    <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
    <div class="col-sm-2 col-xs-5">

     <textarea id="obs3"></textarea>
   </div>

 </div>


 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Estilo</label>
  <div class="col-sm-2">


   <select id="estilo" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>

</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs4"></textarea>
 </div>

</div>

<div class="row">

 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Color</label>
  <div class="col-sm-2">


   <select id="color" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs5"></textarea>
 </div>

</div>

<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Talla</label>
  <div class="col-sm-2">


   <select id="talla" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs6"></textarea>
 </div>

</div>

</div>

<div class="row">

 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Longitud</label>
  <div class="col-sm-2">


   <select id="longitud" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs7"></textarea>
 </div>

</div>


</div>

</fieldset>

<fieldset>

  <legend>2. Inspeccion de condiciones del equipo</legend>

  <div class="row">

   <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Perforaciones</label>
    <div class="col-sm-2">


     <select id="perforacion" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs8"></textarea>
 </div>

</div>

<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Abrasión       
  </label>
  <div class="col-sm-2">


   <select id="abrasion" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs9"></textarea>
 </div>

</div>

</div>

<div class="row">

 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Degradación        

  </label>
  <div class="col-sm-2">


   <select id="degradacion" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs10"></textarea>
 </div>

</div>


<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Cobertura por Ozono        

  </label>
  <div class="col-sm-2">


   <select id="ozono" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs11"></textarea>
 </div>

</div>

</div>


<div class="row" >

  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Cristalizacion        

    </label>
    <div class="col-sm-2">


     <select id="cristal" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_cristal"></textarea>
 </div>

</div>


<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Quemaduras        

  </label>
  <div class="col-sm-2">


   <select id="quemadura" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_quemadura"></textarea>
 </div>

</div>

</div>

<div class="row" >

  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Contaminacion        

    </label>
    <div class="col-sm-2">


     <select id="contaminacion" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_contamiacion"></textarea>
 </div>

</div>



<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Prueba Inflado        

  </label>
  <div class="col-sm-2">


   <select id="inflado" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_inflado"></textarea>
 </div>

</div>

</div>

<div class="row" >

  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Aprueba Inspeccion Inicial        

    </label>
    <div class="col-sm-2">


     <select id="inspeccion" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_inspeccion"></textarea>
 </div>

</div>

<button type="submit" id="btn_aceptar"  class="btn btn-primary">Aceptar</button>
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