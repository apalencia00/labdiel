
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

     
      var cotic  = $("#cotic" , parent.document).val();
      var serial = $("#num_serialequipo", parent.document).val();
      
 
      $.ajax({

        url: '../backend/Source/Registro_inspeccion.php',
        type: 'GET',
        contentType : "application/json",
        dataType : "json",
        data : {"method" : 'addsecondEnsayoPertigas', 'cotizacion' : cotic, 'serial' : serial,


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
                      <option value="A"  >A</option>
                      <option value="B1" >B1</option>
                      <option value="B2" >B2</option>
                      <option value="B3" >B3</option>
                      <option value="B4" >B4</option>
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

