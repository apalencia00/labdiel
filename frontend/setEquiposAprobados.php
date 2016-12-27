
<!DOCTYPE html>
<html>
<head>
  <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_equipos_aprobados.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

<script type="text/javascript">
  

  $(document).on("click", "#aceptarTodo", function(){

    var codigoe  = $("#cod_equipo").val();
    var cantidad = $("#cantidad").val();
    var cotic    = $("#cotizacion").val();
    

    $.ajax({

      url: '../backend/Source/Equipos_aprobados.php',
      type: 'GET',
      contentType : "application/json",
      dataType : "json",
      data : {"method" : 'aprobarCantidadEquipo', "tipoe" : codigoe, "cantidad" : cantidad, "cotinum" : cotic},
      success: function(json)
      {
        var arr = jQuery.parseJSON(json);

        var html = '<table class="table table-striped" border="0">';
        var i = 0;
        $.each(arr, function(key, value){

          html += '<td width="10%" scope="row" data-toggle="modal" id="myclass" data-id="'+arr[key].fk_cotizacion+'" data-target="#myModal2" >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion_equipo + '</td>' + '<td width="10%" >' + arr[key].cantidad + '</td>'  ;
          html += '</tr>';

        });
        
        html += '</table>';
        $('#act_table').html(html);
        localStorage.clear();

      }
    });


  });

</script>

</head>
<body>

<form class="form-horizontal" role="form">

             <div class="form-group">
                <label for="numcot" class="control-label col-sm-4"> # Cotizacion</label>
                <div class="col-sm-6">
                  <input type="text" id="cotizacion" value="<?php echo $_GET['coti'] ?>" readonly placeholder="" class="form-control" autofocus>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group">
                <label for="numdoc" class="control-label col-sm-4"> Codigo Equipo</label>
                <div class="col-sm-6">
                  <input type="text" id="cod_equipo" placeholder="" readonly value="<?php echo $_GET['equipo'] ?>" class="form-control" autofocus>
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="pnombre" class="col-sm-3 control-label">Tipo Equipo</label>
                <div class="col-sm-9">
                  <input type="text" id="tipo_equipo" value="<?php echo "" ?>" placeholder="" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="papallido" class="col-sm-3 control-label">Cantidad</label>
                <div class="col-sm-9">
                  <input type="text" id="cantidad" placeholder="" value="<?php echo $_GET['cantidad'] ?>" class="form-control">
                </div>
              </div>


              <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                   <button type="button" id="aceptarTodo" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </form> <!-- /form -->

</body>
</html>

