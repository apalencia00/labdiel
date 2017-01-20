     <!DOCTYPE html>
     <html>
     <head>
       <title></title>

       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.css">
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

          $("#aprobar1").click(function(){

            var tramo         = $("#nu_tramo").val();
            var tension       = $("#tension").val();
            var obs_tension   = $("#obs2").val();
            var color         = $("#color").val();
            var obs_color     = $("#obs5").val();
            var longitud      = $("#longitud").val();
            var obs_longitud  = $("#obs6").val();
            var cotic         = $("#cotic" , parent.document).val();
            var serial        = $("#num_serialequipo", parent.document).val();

            console.log(serial);

            $.ajax({

              url: '../backend/Source/Registro_inspeccion.php',
              type: 'GET',
              contentType : "application/json",
              dataType : "json",
              data : {"method" : 'addiniEnsayoPertigas', 'serial' : serial, "cotizacion" : cotic, "tension" : tension, "obs_tension" : obs_tension, "color" : color,"obs_color" : obs_color, "longitud" : longitud, "obs_longitud" : obs_longitud

            },
            success : function(json){

                var obj = jQuery.parseJSON(json);
          console.log(obj);
          if(obj.success){ 

          BootstrapDialog.show({
            title : 'Operacion Exitosa',
            type : BootstrapDialog.TYPE_SUCCESS,
            message: obj.mensaje,
            buttons: [{
              label: 'Aceptar',
              action: function(dialogItself){
                dialogItself.close();
              }
            } ]
          });    

         }else{

          BootstrapDialog.show({
            title : 'Error',
            type : BootstrapDialog.TYPE_INFO,
            message: obj.mensaje,
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
            title : 'Error en Peticion',
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

        })

      </script>

    </head>
    <body>



      <div class="container">
        <form id="form" class="form form-horizontal" role="form">

          <p>

            <div class="form-group">


              <label for="numdoc" class="control-label col-sm-4">N° tramo</label>
              <div class="col-sm-2">

                <select id="nu_tramo" class="form-control" >

                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>

                </select>

              </div>
            </div>

            <div class="row">

              <div class="form-group">


                <label for="numdoc" class="control-label col-sm-4">Tension</label>
                <div class="col-sm-2">


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

