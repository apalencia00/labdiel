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

      $("#btnfinal").click(function(e)
      {

        e.preventDefault();

        var cotic         = $("#cotic" , parent.document).val();
        var serial        = $("#num_serialequipo", parent.document).val();
        var tempi1        = $("#temp1").val();
        var tempi2        = $("#temp2").val();
        var tempi3        = $("#temp3").val();
        var tempi4        = $("#temp4").val();
        var tempi5        = $("#temp5").val();
        var tempi6        = $("#temp6").val();
        var tempi7        = $("#temp7").val();
        var tempi8        = $("#temp8").val();
        var tempi9        = $("#temp9").val();
        var tmp_ambiente  = $("#tmp_ambiente").val();
        var humedad       = $("#humedad").val();
        var tension       = $("#tension").val();
        var tiempo        = $("#tiempo").val();

        console.log(tempi1);

        $.ajax({

          url: '../backend/Source/Registro_inspeccion.php',
          type: 'GET',
          contentType : "application/json",
          dataType : "json",
          data : {"method" : 'addTercerEnsayoPertigas', 'serial' : serial, "cotizacion" : cotic, "tempi1" : tempi1,
                                 "tempi2" : tempi2,    
                                 "tempi3" : tempi3,      
                                 "tempi4" : tempi4,      
                                 "tempi5" : tempi5,      
                                 "tempi6" : tempi6,       
                                 "tempi7" : tempi7,      
                                 "tempi8" : tempi8,       
                                 "tempi9" : tempi9,       
                                 "tmp_ambiente"  : tmp_ambiente,
                                 "humedad"  : humedad,    
                                 "tension"  : tension,    
                                 "tiempo"   : tiempo    


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
            title : 'Errr en Peticion',
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
     <h4>Registro Inicial Temperatura</h4>
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

        <input placeholder="Temperatura Inicial 1" type="text" name="temp1" id="temp1" class="form-control" autofocus>
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 2" type="text" name="temp2" id="temp2" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 3" type="text" name="temp3" id="temp3" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 4" type="text" name="temp4" id="temp4" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 5" type="text" name="temp5" id="temp5" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 6" type="text" name="temp6" id="temp6" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 7" type="text" name="temp7" id="temp7" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 8" type="text" name="temp8" id="temp8" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4"> </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Inicial 9" type="text" name="temp9" id="temp9" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4">Temperatura Ambiente </label>
      <div class="col-sm-6">

        <input placeholder="Temperatura Ambiente [°C " type="text" name="tmp_ambiente" id="tmp_ambiente" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>


    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4">Humedad </label>
      <div class="col-sm-6">

        <input placeholder="Humedad Relativa" type="text" name="humedad" id="humedad" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>


    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4">Tension de Ensayo </label>
      <div class="col-sm-6">

        <input placeholder="Tension de Ensayo [Kv" type="text" name="tension" id="tension" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>

    <div class="form-group">
      <label for="numdoc" class="control-label col-sm-4">Tiempo </label>
      <div class="col-sm-6">

        <input placeholder="Tiempo de ensayo [min" type="text" name="tiempo" id="tiempo" class="form-control" autofocus>
        <span class="help-block"></span>

      </div>
    </div>


    <button type="submit" id="btnfinal"  class="btn btn-primary pull-right">Aceptar</button>

  </form>
  
</body>
</html>

