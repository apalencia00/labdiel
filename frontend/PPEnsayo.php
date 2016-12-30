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
               data : {"method" : 'addiniEnsayo', 'seriale' : elserial, "clase" : clase, "obs_clase" : obs_clase, "tension" : tension, "obs_tension" : obs_tension, "tipo" : tipo, "obs_tipo" : obs_tipo , "estilo" : estilo, "obs_estilo" : obs_estilo, "color" : color, "obs_color" : obs_color, "talla" : talla, "obs_talla" : obs_tall, "longitud" : longitud, "obs_longitud" :  ''},
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

