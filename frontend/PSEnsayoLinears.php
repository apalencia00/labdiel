
<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/registro_inspeccion.js" ></script>
  <script type="text/javascript" src="bootstrap/css/docs.js" ></script>
<script type="text/javascript" src="js/bootstrap-dialog.js" ></script>

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
      
      var inspeccion_eq         = $("#inspeccion").val();
      var obs_inspeccion        = $("#obs_inspeccion").val();
      var cotic                 = $("#cotic" , parent.document).val();
      var serial                = $("#num_serialequipo", parent.document).val();
 
      $.ajax({

        url: '../backend/Source/Registro_inspeccion.php',
        type: 'GET',
        contentType : "application/json",
        dataType : "json",
        data : {"method" : 'addsecondEnsayoPertigas', 'cotizacion' : cotic, 'serial' : serial, 'perforacioneq' : perforacion_eq, 'obsperforacion' : obs_perforacion, 'abrasioneq' :  abrasion_eq, 'obs_abrasion' : obs_abrasion, 'degradacioneq' : degradacion_eq, 'obsdegradacion' : obs_degradacion, 'ozonoeq' : ozono_equipo ,'obsozono' : obs_ozono,'cristaleq' : cristal_eq, 'obscristal' : obs_cristal, 'quemaduraeq' : quemadura_eq, 'obsquemadura': obs_quemadura, 'contaminacioneq' : contaminacion_eq, 'obscontaminacion' : obs_contaminacion, 'inspeccioneq' : inspeccion_eq, 'obsinspeccion' : obs_inspeccion


      },

      success: function(json)
      {

          var obj = jQuery.parseJSON(json);
          console.log(obj);
          if(obj.success){ 

          BootstrapDialog.show({
            title : 'Operacion Exitosa',
            type : BootstrapDialog.TYPE_SUCCESS,
            message: obj.root,
            buttons: [{
              label: 'Aceptar',
              action: function(dialogItself){
                dialogItself.close();
              }
            } ]
          });    


      }   else{

          BootstrapDialog.show({
            title : 'Error',
            type : BootstrapDialog.TYPE_INFO,
            message: obj.root,
            buttons: [{
              label: 'Ok',
              action: function(dialogItself){
                dialogItself.close();
              }
            } ]
          });  

         }


    },
     error : function(event){

          BootstrapDialog.show({
            title : 'Error en peticion',
            type : BootstrapDialog.TYPE_DANGER,
            message: 'Error no se pudo realizar la solicitud',
            buttons: [{
              label: 'Ok',
              action: function(dialogItself){
                dialogItself.close();
              }
            } ]
          }); 

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
                <label for="tipodoc" class="control-label col-sm-4">Costado</label>
                <div class="col-sm-6 col-xs-5">

                   <select id="costado" class="form-control">
                      <option>Seleccione</option>
                      <option>A</option>
                      <option>B1</option>
                      <option>B2</option>
                      <option>B3</option>
                      <option>B4</option>
                  </select>
              </div>
          </div> <!-- /.form-group -->

           <p>

          <br>


         <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Temperatura(°C)</label>
          <div class="col-sm-2 col-xs-5">

          <input type="text" name="temp" id="temp" class="form-control" >
      


        </div>
      </div>

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">HR(%)</label>
        <div class="col-sm-2 col-xs-5">

         <input type="text" name="hr" id="hr" class="form-control" >
       </div>

     </div>

     <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Tension de Ensayo rms (kV a.c. 60 Hz)       
      </label>
      <div class="col-sm-2 col-xs-5">

      <input type="text" name="tension" id="tension" class="form-control" >

    </div>
  </div>

  <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Corriente de Fuga       
      </label>
      <div class="col-sm-2 col-xs-5">

      <input type="text" name="fuga" id="fuga" class="form-control" >

    </div>
  </div>

  <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Tiempo(min)       
      </label>
      <div class="col-sm-2 col-xs-5">

      <input type="text" name="tiempo" id="tiempo" class="form-control" >

    </div>
  </div>

</div>






<button type="submit" id="btn_aceptar"  class="btn btn-primary pull-right">Aceptar</button>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     


</fieldset>


</form>

</div>
</body>
</html>

