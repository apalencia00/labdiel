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

          $("#btn_aceptartierras").click(function(){

            console.log("wuapea");

           var cotic          = $("#cotic",parent.document).val();
           var serial        = $("#num_serialequipo", parent.document).val();

           //console.log(coti + serial);

           var corriente     = $("#corriente").val();
           var nu_tramo      = $("#nu_tramo").val();

           console.log(corriente + nu_tramo);
// ------------------ MORDAZAS ----------------------------

          mordaza = document.getElementsByName("mordazaz");
          var vmordaza = [] ;

          for (var i = 0; i < mordaza.length; i++) {
                
                if(mordaza[i].checked ){
                    
                    vmordaza.push(mordaza[i].value);
                }else{
                  vmordaza.push(0);
                }
          }

          
          console.log(vmordaza);
           

           // ------------------ CONECTORES ----------------------------

          conector = document.getElementsByName("conector");
          var vconector = [] ;

          for (var i = 0; i < conector.length; i++) {
                
                if(conector[i].checked ){
                    
                    vconector.push(conector[i].value);
                }else{
                  vconector.push(0);
                }
          }

          console.log(vconector);


            // ------------------ CUBIERTA ----------------------------

          cubierta = document.getElementsByName("cubierta");
          var vcubierta = [] ;

          for (var i = 0; i < cubierta.length; i++) {
                
                if(cubierta[i].checked ){
                    
                    vcubierta.push(cubierta[i].value);
                }else{
                vcubierta.push(0);  }
          }

          console.log(vcubierta[0]);


           // ------------------ CABLE ----------------------------

          cable = document.getElementsByName("cable");
          var vcable = [] ;

          for (var i = 0; i < cable.length; i++) {
                
                if(cable[i].checked ){
                    
                    vcable.push(cable[i].value);
                }else{
                  vcable.push(0);
                }
          }

          console.log(vcable);

          var awg           = $("#awg").val();
          var longitud      = $("#longitud").val();
          var tc            = $("#tc").val();
          var hr            = $("#hr").val();
          var resistencia   = $("#resistencia").val();
          var obs8          = $("#obs8").val();



           $.ajax({

             url: '../backend/Source/Registro_inspeccion.php',
             type: 'GET',
             contentType : "application/json",
             dataType : "json",
             data : {"method" : 'addiniEnsayoTierra',
                     "corriente" : corriente, 
                     "tramo" : nu_tramo , 
                     "cotizacion" : cotic, 
                     "serial" : serial ,
                     "mordaza_faltran" : vmordaza[0], 
                     "mordaza_grieta" :vmordaza[1] , 
                     "mordaza_rotura" : vmordaza[2] , 
                     "conector_faltran" : vconector[0],
                     "conector_flujo" : vconector[1] ,
                     "conector_oxidado" : vconector[2],
                     "cubierta_rajado" :  vcubierta[0],
                     "cubierta_opaca" :  vcubierta[1],
                     "cubierta_abrasion" :  vcubierta[2],
                     "cable_aplastado" :  vcable[0],
                     "cable_sulfatado" :  vcable[1],
                     "cable_hilosrotos" :  vcable[2],
                     "awg" : awg, 
                     "long" : longitud, 
                     "tc" : tc, 
                     "hr" : hr, 
                     "resistencia" : resistencia, 
                     "obs" : obs8
                   },
             success: function(json)
             {
                console.log(vcable[0]);


            }
          });

         });

        });

      </script>

    </head>
    <body>



      <div class="container">


        <form id="form" class="form form-horizontal" role="form">

          <div class="form-group">

           <label for="numdoc" class="control-label col-sm-4">Corriente Diseño (kA)</label>
           <div class="col-sm-2">
            <input type="text" id="corriente" placeholder="" value="" class="form-control col-lg-4" autofocus  >
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Numero del tramo</label>
          <div class="col-sm-2">

            <select id="nu_tramo" class="form-control" >

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

            <label class="checkbox-inline"><input name="mordazaz" type="checkbox" value="1">Faltran</label>
            <label class="checkbox-inline"><input name="mordazaz" type="checkbox" value="1">Gricetas</label>
            <label class="checkbox-inline"><input name="mordazaz" type="checkbox" value="1">Roturas</label>


          </div>


        </div>


        <div class="form-group" >

          <label for="numdoc" class="control-label col-sm-4">Conectores</label>

          <div class="col-sm-2" >

            <label class="checkbox-inline"><input name="conector" type="checkbox" value="1">Faltran</label>
            <label class="checkbox-inline"><input name="conector" type="checkbox" value="1">Flojos</label>
            <label class="checkbox-inline"><input name="conector" type="checkbox" value="1">Oxidados</label>


          </div>


        </div>

        <div class="form-group" >

          <label for="numdoc" class="control-label col-sm-4">Cubierta</label>

          <div class="col-sm-2" >

            <label class="checkbox-inline"><input name="cubierta" type="checkbox" value="1">Rajado</label>
            <label class="checkbox-inline"><input name="cubierta" type="checkbox" value="1">Opaca</label>
            <label class="checkbox-inline"><input name="cubierta" type="checkbox" value="1">Abrasion</label>


          </div>


        </div>

        <div class="form-group" >

          <label for="numdoc" class="control-label col-sm-4">Cable</label>

          <div class="col-sm-2" >

            <label class="checkbox-inline"><input name="cable" type="checkbox" value="1">Aplastado</label>
            <label class="checkbox-inline"><input name="cable" type="checkbox" value="1">Sulfatado</label>
            <label class="checkbox-inline"><input name="cable" type="checkbox" value="1">Hilos Rotos</label>


          </div>


        </div>

        <div class="row">

         <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Sección en mm2 o AWG </label>
          <div class="col-sm-2">
            <input type="text" id="awg" placeholder="" value="" class="form-control col-lg-4" autofocus >
            <span class="help-block"></span>
          </div>
        </div>


        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Longitud</label>
          <div class="col-sm-2">
            <input type="text" id="longitud" placeholder="" value="" class="form-control col-lg-4" autofocus  >
            <span class="help-block"></span>
          </div>
        </div>



      </div>

      <div class="row">

       <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4">T °C 
        </label>
        <div class="col-sm-2">
          <input type="text" id="tc" placeholder="" value="" class="form-control col-lg-4" autofocus  >
          <span class="help-block"></span>
        </div>
      </div>



      <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4">% HR 

        </label>
        <div class="col-sm-2">
          <input type="text" id="hr" placeholder="" value="" class="form-control col-lg-4" autofocus  >
          <span class="help-block"></span>
        </div>
      </div>

      <div class="form-group">


        <label for="numdoc" class="control-label col-sm-4">Resistencia (mΩ) </label>
        <div class="col-sm-2">
          <input type="text" id="resistencia" placeholder="" value="" class="form-control col-lg-4" autofocus  >
          <span class="help-block"></span>
        </div>
      </div>


    </div>

    <div class="row">

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
        <div class="col-sm-2 col-xs-5">

         <textarea id="obs8"></textarea>
       </div>

     </div>

   </div>

 <button type="submit" id="btn_aceptartierras"  class="btn btn-primary pull-right">Aceptar</button>

 </form>

</div>



</body>
</html>

