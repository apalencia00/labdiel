
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
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registro_equipos_aprobados.js" ></script>
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>

   </head>

  <body>

<div class="container">
            <form id="form" class="form-horizontal" role="form">
                <h2>Equipos Aprobados</h2>

            <fieldset  >    
           
            <legend> Inventario Ensayo Cliente </legend>

            

 <table class="table table-striped">
  <thead>
    <tr>
  
      <th>Codigo Equipo</th>
      <th>Tipo Equipo</th>
      <th>Cantidad</th>
     <th>Cliente</th>

        </tr>
  </thead>
  <tbody>
    <tr>
            <td colspan="5">
              <div id="act_table" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
            </tr>
  </tbody>
</table>
                
</fieldset>

<fieldset>

<legend> Inventario en Laboratorio </legend>

  <table class="table table-striped">
  <thead>
    <tr>
     
      <th>Codigo Producto</th>
      <th>Tipo Equipo</th>
      <th>Cantidad</th>
      <th>Cliente</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
            <td colspan="5">
              <div id="act_table2" style="width: 100%; height: 200px; overflow-y: scroll;" > </div></td>
            </tr>
  </tbody>
</table>
 
</fieldset>

<button type="button" id="generar" class="btn btn-primary">Generar</button>
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
                        
                    </div>
                </div>
            </form> <!-- /form -->
      </div>
      <div class="modal-footer">
       
        <button type="button" id="aceptar" class="btn btn-primary">Aceptar</button>
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