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
         
        $("#btnfinal").click(function(e)
{
  
  e.preventDefault();
 
  var cotic         = $("#cotic" , parent.document).val();
  var serial        = $("#num_serialequipo", parent.document).val();
  var tension       = $("#tension").val();
  var fuga          = $("#fuga").val();
  var temperatura   = $("#temperatura").val();
  var humedad       = $("#humedad").val();
  var tiempo        = $("#tiempo").val();
  var observaciones = $("#observaciones").val();



  $.ajax({
    
    url: '../backend/Source/Registro_inspeccion.php',
    type: 'GET',
    contentType : "application/json",
    dataType : "json",
    data : {"method" : 'addTercerEnsayo', 'serial' : serial, "cotizacion" : cotic,
             "tension" : tension, "fuga" : fuga, "temperatura" : temperatura, "humedad" : humedad, "tiempo" : tiempo, "observaciones" : observaciones


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

      <p> 

        <form class="form-horizontal" role="form">
         
         <div class="form-group">
          <label for="numcot" class="control-label col-sm-4">Norma Aplicable al ensayo </label>
          <div class="col-sm-6">
            <input type="text" id="documento" placeholder="" readonly="" class="form-control" autofocus>
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">
          <label for="numdoc" class="control-label col-sm-4">Tensión de ensayo AC [kV] </label>
          <div class="col-sm-6">
            
            <input type="text" name="tension" id="tension">

          </div>
        </div>

        <div class="form-group">
          <label for="numdoc" class="control-label col-sm-4">Corriente de Fuga Max [mA]       
          </label>
          <div class="col-sm-6">
            
            <input type="text" name="fuga" id="fuga">

          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">

          </div>
        </div>

        <div class="form-group">
          <label for="numdoc" class="control-label col-sm-4">TEMPERATURA[°C]              
          </label>
          <div class="col-sm-6">
            
            <input type="text" name="temperatura" id="temperatura">

          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">

          </div>
        </div>


        <div class="form-group">
          <label for="numdoc" class="control-label col-sm-4">HUMEDAD[%]            
          </label>
          <div class="col-sm-6">
            
            <input type="text" name="humedad" id="humedad">

          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">

          </div>
        </div>


        <div class="form-group">
          <label for="numdoc" class="control-label col-sm-4">TIEMPO DE ENSAYO
            [min]  
            
          </label>
          <div class="col-sm-6">
            
            <input type="text" name="tiempo" id="tiempo">

          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-9 col-sm-offset-3">

          </div>
        </div>


        <div class="form-group"> 
            
          </label>
          <div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_quemadura"></textarea>
 </div>

</div>
        </div>
        
     <button type="submit" id="btnfinal"  class="btn btn-primary pull-right">Aceptar</button>



      </form> <!-- /form -->
    </div>

  </div>
  
</body>
</html>

