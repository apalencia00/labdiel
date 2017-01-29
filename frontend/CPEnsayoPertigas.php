  <!DOCTYPE html>
  <html>
  <head>
    <title></title>

    <style type="text/css">

      .divide {
        border-right:1px solid #ccc;
        padding-right:10px;
        margin-right:-10px;
      }


    </style>

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

      $("#btnfinal_ensayo").click(function(e)
      {

        e.preventDefault();

        var cotic         = $("#cotic" , parent.document).val();
        var serial        = $("#num_serialequipo", parent.document).val();
        var tempf1        = $("#tempf1").val();
        var tempf2        = $("#tempf2").val();                  
        var tempf3        = $("#tempf3").val();      
        var tempf4        = $("#tempf4").val();      
        var tempf5        = $("#tempf5").val();      
        var tempf6        = $("#tempf6").val();                      
        var tempf7        = $("#tempf7").val();
        var tempf8        = $("#tempf8").val();                              
        var tempf9        = $("#tempf9").val();    
        var obs           = $("#obs").val();

        $.ajax({

          url: '../backend/Source/Registro_inspeccion.php',
          type: 'GET',
          contentType : "application/json",
          dataType : "json",
          data : {"method" : 'addCuartoEnsayoPertigas', 'serial' : serial, "cotizacion" : cotic, "tempf1" : tempf1, "tempf2" : tempf2, "tempf3" : tempf3, "tempf4" : tempf4, "tempf5" : tempf5, "tempf6" : tempf6, "tempf7" : tempf7, "tempf8" : tempf8, "tempf9" : tempf9, "obs" : obs
                         
        },

        success: function(json)
        {

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
            title : 'Error de Peticion',
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

  <form>
   <h4>Registro Final Temperatura</h4>
   <div class="form-group">
    <label for="numcot" class="control-label col-sm-4">Norma Aplicable al ensayo </label>
    <div class="col-sm-6">
      <input type="text" id="documento" placeholder="" readonly="" class="form-control" autofocus>
      <span class="help-block"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 1" type="text" name="tempf1" id="tempf1" class="form-control" autofocus>
      <span class="help-block"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 2" type="text" name="tempf2" id="tempf2" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 3" type="text" name="tempf3" id="tempf3" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 4" type="text" name="tempf4" id="tempf4" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 5" type="text" name="tempf5" id="tempf5" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 6" type="text" name="tempf6" id="tempf6" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 7" type="text" name="tempf7" id="tempf7" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 8" type="text" name="tempf8" id="tempf8" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">
    <label for="numdoc" class="control-label col-sm-4"> </label>
    <div class="col-sm-6">

      <input placeholder="Temperatura Final 9" type="text" name="tempf9" id="tempf9" class="form-control" autofocus>
      <span class="help-block"></span>

    </div>
  </div>

  <div class="form-group">

    <textarea placeholder="Observacion" class="form-control" rows="2" id="obs"></textarea>
  </div> 

  <button type="submit" id="btnfinal_ensayo"  class="btn btn-primary pull-right">Aceptar</button>

</form>

</body>
</html>

