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

           var coti          = $("#cotic",parent.document);
           var numcotic      = coti[0].value;
           var elserial      = localStorage.getItem("serie");
           var serieequipo   = elserial;
           var clase         = $("#clase").val();
           var obs_clase     = $("#obs").val();
           var tension       = $("#tension").val();
           var obs_tension   = $("#obs2").val();
           var tipo          = $("#tipo").val();
           var obs_tipo      = $("#obs3").val();
           var estilo        = $("#estilo").val();
           var obs_estilo    = $("#obs4").val();
           var color         = $("#color").val();
           var obs_color     = $("#obs5").val();
           var talla         = $("#talla").val();
           var obs_tall      = $("#obs6").val();
           var longitud      = $("#longitud").val();
           var obs_longitud  = $("#obs7").val();



             $.ajax({
              
               url: '../backend/Source/registro_inspeccion.php',
               type: 'GET',
               contentType : "application/json",
               dataType : "json",
               data : {"method" : 'addiniEnsayo', 'seriale' : elserial, "clase" : clase, "obs_clase" : obs_clase, "tension" : tension, "obs_tension" : obs_tension, "tipo" : tipo, "obs_tipo" : obs_tipo , "estilo" : estilo, "obs_estilo" : obs_estilo, "color" : color, "obs_color", "talla" : talla, "obs_talla" obs_tall, "longitud" : longitud, "obs_longitud" },
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
        <form id="form" class="form form-inline" role="form">

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Corriente Diseño (kA)</label>
          <div class="col-sm-2">
            <input type="text" id="corriente" placeholder="" value="" class="form-control col-lg-4" autofocus readonly="" >
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Numero del tramo</label>
          <div class="col-sm-2">
           
          <select id="nu_tramo" >
              
              <option value="1" >1</option>
              <option value="2" >2</option>
              <option value="3" >3</option>
              <option value="4" >4</option>

          </select>

          </div>
        </div>

      
        <div class="form-group" >

        <label for="numdoc" class="control-label col-sm-4">Mordazas</label>

        <div class="col-sm-2" >

        <label class="checkbox-inline"><input type="checkbox" value="">Faltran</label>
<label class="checkbox-inline"><input type="checkbox" value="">Gricetas</label>
<label class="checkbox-inline"><input type="checkbox" value="">Roturas</label>
          

        </div>
          

        </div>


          <div class="form-group" >

        <label for="numdoc" class="control-label col-sm-4">Conectores</label>

        <div class="col-sm-2" >

        <label class="checkbox-inline"><input type="checkbox" value="">Faltran</label>
<label class="checkbox-inline"><input type="checkbox" value="">Flojos</label>
<label class="checkbox-inline"><input type="checkbox" value="">Oxidados</label>
          

        </div>
          

        </div>

          <div class="form-group" >

        <label for="numdoc" class="control-label col-sm-4">Cubierta</label>

        <div class="col-sm-2" >

        <label class="checkbox-inline"><input type="checkbox" value="">Rajado</label>
<label class="checkbox-inline"><input type="checkbox" value="">Opaca</label>
<label class="checkbox-inline"><input type="checkbox" value="">Abrasion</label>
          

        </div>
          

        </div>

          <div class="form-group" >

        <label for="numdoc" class="control-label col-sm-4">Cable</label>

        <div class="col-sm-2" >

        <label class="checkbox-inline"><input type="checkbox" value="">Aplastado</label>
<label class="checkbox-inline"><input type="checkbox" value="">Sulfatado</label>
<label class="checkbox-inline"><input type="checkbox" value="">Hilos Rotos</label>
          

        </div>
          

        </div>

</form>

</div>



</body>
</html>

