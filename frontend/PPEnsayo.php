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

          $("#aprobar1").click(function(){


  var clase_eq        = $("#clase").val();
  var obs_clase       = $("#obs").val();
  var tension_eq      = $("#tension").val();
  var obs_tension     = $("#obs2").val();
  var tipo_eq         = $("#tipo").val();
  var obs_tipo        = $("#obs3").val();
  var estilo_eq       = $("#estilo").val();
  var obs_estilo      = $("#obs4").val();
  var color_eq        = $("#color").val();
  var obs_color       = $("#obs5").val();
  var talla_eq        = $("#talla").val();
  var obs_talla       = $("#obs6").val();
  var longitud_eq     = $("#longitud").val();
  var obs_longitud    = $("#obs7").val();
/*  var perforacion_eq    = $("#perforacion").val();
  var obs_perforacion   = $("#obs8").val();
  var abrasion_eq     = $("#abrasion").val();
  var obs_abrasion    = $("#obs9").val();
  var degradacion_eq    = $("#degradacion").val();
  var obs_degradacion   = $("#obs10").val();
  var ozono_equipo      = $("#ozono").val();
  var obs_ozono       = $("#obs11").val();
  var cristal_eq      = $("#cristal").val();
  var obs_cristal     = $("#obs_cristal").val();
  var quemadura_eq    = $("#quemadura").val();
  var obs_quemadura     = $("#obs_quemadura").val();
  var contaminacion_eq  = $("#contaminacion").val();
  var obs_contaminacion   = $("#obs_contamiacion").val();
  var inflado_eq      = $("#inflado").val();
  var obs_inflado     = $("#obs_inflado").val();
  var inspeccion_eq     = $("#inspeccion").val();
  var obs_inspeccion    = $("#obs_inspeccion").val();*/


  var cotic         = $("#cotic" , parent.document).val();
  var serial        = $("#num_serialequipo", parent.document).val();


  console.log("La cotizacion " + cotic + " El serial es " + serial);

  $.ajax({
    
    url: '../backend/Source/Registro_inspeccion.php',
    type: 'GET',
    contentType : "application/json",
    dataType : "json",
    data : {"method" : 'addiniEnsayo', 'serial' : serial, "cotizacion" : cotic,
    'clase' : clase_eq, 'obsclase' : obs_clase, 
    'tension' : tension_eq, 'obs_tension' : obs_tension,  
    'tipoeq' : tipo_eq, 'obs_tipo' : obs_tipo, 'estilo' :estilo_eq  ,'obestilo' : obs_estilo,
    'coloreq' : color_eq, 'obscolor' : obs_color,
    'tallaeq' : talla_eq, 'obstalla' : obs_talla,
    'longitudeq' : longitud_eq, 'obs_logintud' : obs_longitud
   /* 'perforacioneq' : perforacion_eq, 'obsperforacion' : obs_perforacion,
    'abrasioneq' : abrasion_eq, 'obs_abrasion' : obs_abrasion,
    'degradacioneq' : degradacion_eq, 'obsdegradacion' : obs_degradacion,
    'ozonoeq' : ozono_equipo, 'obsozono' : obs_ozono,
    'cristaleq' : cristal_eq, 'obscristal' : obs_cristal,
    'quemaduraeq' : quemadura_eq, 'obsquemadura' : obs_quemadura,
    'contaminacioneq' : contaminacion_eq, 'obscontaminacion' : obs_contaminacion,
    'infladoeq' : inflado_eq, 'obsinflado' : obs_inflado,
    'inspeccioneq' : inspeccion_eq, 'obsinspeccion' : obs_inspeccion*/  


  },
  success : function(json){

      console.log(json);

  }



          });



      
        

       });

        })

       </script>

     </head>
     <body>



      <div class="container">
        <form id="form" class="form form-inline" role="form">

        <p>

          <div class="row">

             <div class="form-group">
              <label for="tipodoc" class="control-label col-sm-6">Clase</label>
              <div class="col-sm-2 col-xs-5">

               <select id="clase" class="form-control">
                <option value="0" >T </option>
                <option value="1" >NT </option>
                <option value="2" >NA </option>
              </select>
            </div>

          </div>

          <div class="form-group">
            <label for="comment">DESC:</label>
            <textarea class="form-control" rows="2" id="obs"></textarea>
          </div>


          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-6">Tension</label>
            <div class="col-sm-2 col-xs-5">


             <select id="tension" class="form-control">
              <option value="0" >T </option>
              <option value="1" >NT </option>
              <option value="2" >NA </option>
            </select>

          </div>

        </div>

        <div class="form-group">
          <label for="comment">DESC:</label>
          <textarea class="form-control" rows="2" id="obs2"></textarea>
        </div> 


      </div>

      <p>

        <div class="row" >

          <div class="form-group">


            <label for="numdoc" class="control-label col-sm-6">Tipos</label>
            <div class="col-sm-2">


             <select id="tipo" class="form-control">
              <option value="0" >T </option>
              <option value="1" >NT </option>
              <option value="2" >NA </option>
            </select>

          </div>
        </div>

        <div class="form-group">
          <label for="comment">DESC:</label>
          <textarea class="form-control" rows="2" id="obs3"></textarea>
        </div> 

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-6">Estilo</label>
          <div class="col-sm-2 col-xs-5">


           <select id="estilo" class="form-control">
            <option value="0" >T </option>
            <option value="1" >NT </option>
            <option value="2" >NA </option>
          </select>

        </div>


      </div>

      <div class="form-group">
        <label for="comment">DESC:</label>

        <textarea class="form-control" rows="2" id="obs4"></textarea>
      </div>

    </div>

    <p>

      <div class="row">

       <div class="form-group">


        <label for="numdoc" class="control-label col-sm-6">Color</label>
        <div class="col-sm-2">


         <select id="color" class="form-control">
          <option value="0" >T </option>
          <option value="1" >NT </option>
          <option value="2" >NA </option>
        </select>


      </div>
    </div>

    <div class="form-group">
      <label for="comment">DESC:</label>

      <textarea class="form-control" rows="2" id="obs5"></textarea>
    </div>

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-6">Talla</label>
      <div class="col-sm-2 col-xs-5">


       <select id="talla" class="form-control">
        <option value="0" >T </option>
        <option value="1" >NT </option>
        <option value="2" >NA </option>
      </select>


    </div>
  </div>

  <div class="form-group">
    <label for="comment">DESC:</label>

    <textarea class="form-control" rows="2" id="obs6"></textarea>
  </div>



</div>


<p>


  <div class="row" >

    <div class="form-group">


      <label for="numdoc" class="control-label col-sm-6">Longitud</label>
      <div class="col-sm-2">


       <select id="longitud" class="form-control">
        <option value="0" >T </option>
        <option value="1" >NT </option>
        <option value="2" >NA </option>
      </select>


    </div>
  </div>

 <div class="form-group">
    <label for="comment">DESC:</label>

    <textarea class="form-control" rows="2" id="obs6"></textarea>
  </div>


 </div>

 </div>

 <button type="submit" id="aprobar1"  class="btn btn-primary pull-right">Aceptar</button>

</fieldset>

</form>

</div>



</body>
</html>

