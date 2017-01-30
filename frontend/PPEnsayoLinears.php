
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

     
      var cotic                 = $("#cotic" , parent.document).val();
      var serial                = $("#num_serialequipo", parent.document).val();
      var tipo                  = $("#tipo").val();
      var aceite                = $("#aceite").val();
      var obs8                  = $("#obs8").val();
      var abrasion              = $("#abrasion").val();
      var obs9                  = $("#obs9").val();
      var degradacion           = $("#degradacion").val();
      var obs10                 = $("#obs10").val();
      var polvo                 = $("#polvo").val();
      var obs11                 = $("#obs11").val();
      var quemadura             = $("#quemadura").val();
      var obs_quemadura         = $("#obs_quemadura").val();
      var perforacion           = $("#perforacion").val();
      var obs_perforacion       = $("#obs_perforacion").val();
      var inspeccion            = $("#inspeccion").val();
      var obs_inspeccion        = $("#obs_inspeccion").val();
      
      
      $.ajax({

        url: '../backend/Source/Registro_inspeccion.php',
        type: 'GET',
        contentType : "application/json",
        dataType : "json",
        data : {"method" : 'addPrimerEnsayoLinears', 'cotizacion' : cotic, 'serial' : serial, "tipo" : tipo, "aceite" : aceite, "obs8" : obs8, "abrasion" : abrasion, "obs9" : obs9, "degradacion" : degradacion, "obs10" : obs10, "polvo" : polvo, "obs11" : obs11, "quemadura" : quemadura, "obs_quemadura" : obs_quemadura, "perforacion" : perforacion, "obs_perforacion" : obs_perforacion, "inspeccion" : inspeccion, "obs_inspeccion" : obs_inspeccion
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


        }   else{

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



  });

</script>

</head>
<body>

  <div class="container">

    <form id="form" class="" >

      <fieldset>

        <div class="row">

         <div class="form-group">
          <label for="tipodoc" class="control-label col-sm-4">Tipo Liner</label>
          <div class="col-sm-6 col-xs-5">

           <select id="tipo" class="form-control">
            <option>Seleccione </option>
            <option>Doble</option>
            <option>Sencillo</option>
          </select>
        </div>
      </div> <!-- /.form-group -->

      <p>

        <br>

        <div class="form-group">


          <label for="numdoc" class="control-label col-sm-4">Aceite en la superficie interior o exterior</label>
          <div class="col-sm-2">


           <select id="aceite" class="form-control">
            <option value="0" >T </option>
            <option value="1" >NT </option>
            <option value="2" >NA </option>
          </select>


        </div>
      </div>

      <div class="form-group">
        <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
        <div class="col-sm-2 col-xs-5">

         <textarea id="obs8"></textarea>
       </div>

     </div>

     <div class="form-group">


      <label for="numdoc" class="control-label col-sm-4">Abrasión       
      </label>
      <div class="col-sm-2">


       <select id="abrasion" class="form-control">
        <option value="0" >T </option>
        <option value="1" >NT </option>
        <option value="2" >NA </option>
      </select>


    </div>
  </div>

  <div class="form-group">
    <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
    <div class="col-sm-2 col-xs-5">

     <textarea id="obs9"></textarea>
   </div>

 </div>

</div>

<div class="row">

 <div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Degradación        

  </label>
  <div class="col-sm-2">


   <select id="degradacion" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="tipodoc" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs10"></textarea>
 </div>

</div>


<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Polvo o Tierra        

  </label>
  <div class="col-sm-2">


   <select id="polvo" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs11"></textarea>
 </div>

</div>

</div>


<div class="row" >

  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Quemaduras        

    </label>
    <div class="col-sm-2">


     <select id="quemadura" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_quemadura"></textarea>
 </div>

</div>

<div class="form-group">


  <label for="numdoc" class="control-label col-sm-4">Perforaciones        

  </label>
  <div class="col-sm-2">


   <select id="perforacion" class="form-control">
    <option value="0" >T </option>
    <option value="1" >NT </option>
    <option value="2" >NA </option>
  </select>


</div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_perforacion"></textarea>
 </div>

</div>

</div>

<div class="row" >

  <div class="form-group">


    <label for="numdoc" class="control-label col-sm-4">Aprueba Inspeccion Inicial        

    </label>
    <div class="col-sm-2">


     <select id="inspeccion" class="form-control">
      <option value="0" >T </option>
      <option value="1" >NT </option>
      <option value="2" >NA </option>
    </select>


  </div>
</div>

<div class="form-group">
  <label for="obs_ozono" class="control-label col-sm-4">Observacion</label>
  <div class="col-sm-2 col-xs-5">

   <textarea id="obs_inspeccion"></textarea>
 </div>

</div>

<button type="submit" id="btn_aceptar"  class="btn btn-primary pull-right">Aceptar</button>
</div>



</fieldset>


</form>

</div>
</body>
</html>

