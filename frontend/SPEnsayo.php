
<!DOCTYPE html>
<html>
<head>
  <title></title>

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

   $(document).ready(function(){

    $("#btn_aceptar").click(function()
    {

      var perforacion_eq        = $("#perforacion").val();
      var obs_perforacion       = $("#obs8").val();
      var abrasion_eq           = $("#abrasion").val();
      var obs_abrasion          = $("#obs9").val();
      var degradacion_eq        = $("#degradacion").val();
      var obs_degradacion       = $("#obs10").val();
      var ozono_equipo          = $("#ozono").val();
      var obs_ozono             = $("#obs11").val();
      var cristal_eq            = $("#cristal").val();
      var obs_cristal           = $("#obs_cristal").val();
      var quemadura_eq          = $("#quemadura").val();
      var obs_quemadura         = $("#obs_quemadura").val();
      var contaminacion_eq      = $("#contaminacion").val();
      var obs_contaminacion     = $("#obs_contamiacion").val();
      var inflado_eq            = $("#inflado").val();
      var obs_inflado           = $("#obs_inflado").val();
      var inspeccion_eq         = $("#inspeccion").val();
      var obs_inspeccion        = $("#obs_inspeccion").val();
      var cotic                 = $("#cotic" , parent.document).val();
      var serial                = $("#num_serialequipo", parent.document).val();

      

     
      
      $.ajax({

        url: '../backend/Source/Registro_inspeccion.php',
        type: 'GET',
        contentType : "application/json",
        dataType : "json",
        data : {"method" : 'addsecondEnsayo', 'cotizacion' : cotic, 'serial' : serial, 'perforacioneq' : perforacion_eq, 'obsperforacion' : obs_perforacion, 'abrasioneq' :  abrasion_eq, 'obs_abrasion' : obs_abrasion, 'degradacioneq' : degradacion_eq, 'obsdegradacion' : obs_degradacion, 'ozonoeq' : ozono_equipo ,'obsozono' : obs_ozono,'cristaleq' : cristal_eq, 'obscristal' : obs_cristal, 'quemaduraeq' : quemadura_eq, 'obsquemadura': obs_quemadura, 'contaminacioneq' : contaminacion_eq, 'obscontaminacion' : obs_contaminacion, 'infladoeq' : inflado_eq, 'obsinflado' : obs_inflado, 'inspeccioneq' : inspeccion_eq, 'obsinspeccion' : obs_inspeccion


      },

      success: function(json)
      {

        console.log(json);

      }


    });



    });

  });

</script>

</head>
<body>

  <div class="container">

    <form id="form" class="" >

      <fieldset>

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


  <label for="numdoc" class="control-label col-sm-4">Cortadura por Ozono        

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

<button type="submit" id="btn_aceptar"  class="btn btn-primary pull-right">Aceptar</button>
</div>



</fieldset>


</form>

</div>
</body>
</html>

