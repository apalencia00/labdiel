
<?php 

error_reporting(E_ALL);

require_once '../backend/Model/Modulo.php';

session_start(); 


if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

      $usuario = $_SESSION['admon_mod'];
      $datos_mod = json_decode($usuario,true);
    
      $us = $usuario[0]['nusuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>:: Laboratorio Dielectrico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

  <script type="text/javascript">
    
    $(document).on("click", "#myclass", function () {
      
     var codigo = $(this).data('id');
     $("#cod_equipo").val( codigo );
     $("#tipo_equipo").val( "GUANTES DIELECTRICOS" );
     $("#cantidad").val(" 100 ");


     
});

    $(document).on("click", "#guardar", function(){



    });

    
  </script>


 


   </head>

  <body>

<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Equipos Aprobados</h2>

            <fieldset  >    
           
            <legend> Inventario Ensayo Cliente </legend>

            

 <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Codigo Equipo</th>
      <th>Tipo Equipo</th>
      <th>Cantidad</th>
     <th>Cliente</th>
      <th>Estado</th>
        </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td data-toggle="modal" id="myclass" data-id="GA001" data-target="#myModal"  scope="row" >GA001</td>
      <td>GUANTES DIELECTRICOS</td>
      <td>100</td>
      <td>Andres Palencia</td>
      <td>Pendiente Aprobacion</td>
     
    </tr>
  </tbody>
</table>
                
</fieldset>

<fieldset>

<legend> Inventario en Laboratorio </legend>

  <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Codigo Producto</th>
      <th>Tipo Equipo</th>
      <th>Cantidad</th>
      <th>Cliente</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
     <td> </td>
    </tr>
  </tbody>
</table>
 
</fieldset>
            </form> <!-- /form -->
    
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Detalle Inventario Cliente</h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" role="form">
           
                <div class="form-group">
                    <label for="numdoc" class="control-label col-sm-4"> Codigo Equipo</label>
                    <div class="col-sm-6">
                        <input type="text" id="cod_equipo" placeholder="" class="form-control" autofocus>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pnombre" class="col-sm-3 control-label">Tipo Equipo</label>
                    <div class="col-sm-9">
                        <input type="text" id="tipo_equipo" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="papallido" class="col-sm-3 control-label">Cantidad</label>
                    <div class="col-sm-9">
                        <input type="text" id="cantidad" placeholder="" class="form-control">
                    </div>
                </div>
               

                              <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="button" id="guardar" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </form> <!-- /form -->
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
    
</body>

        </html>

<?php }
else{

header("Location: 500.php");

 unset($_SESSION['admon_mod']);
        
        // DESTROY COOKIE
        if (isset($_COOKIE['key'])) {
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/');

  }


} ?>