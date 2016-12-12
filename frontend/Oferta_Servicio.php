
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

  <style type="text/css">
      

  </style>


  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

   </head>

  <body>

<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Cotizacion</h2>

                
                  <div class="form-group">
                    <label for="tipodoc" class="control-label col-sm-4">Seleccione Cliente</label>
                    <div class="col-sm-2">

                         <select id="tipodoc" class="form-control">
                              <option>Seleccione </option>
                        </select>
                    </div>

                    </div>

                      <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4"> No. Documento/NIT</label>
                    <div class="col-sm-2">
                        <input type="text" id="docu" placeholder="Documento/NIT" class="form-control" autofocus>
                        <span class="help-block"></span>
                    </div>
                </div>



                <fieldset class="the-fieldset">
                    
                        <legend class="the-legend">Detalle Cliente</legend>

                           <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Fecha Cotizacion</label>
                    <div class="col-sm-2">
                        <input type="text" id="docu" placeholder="" value="<?php echo date('Y-m-d') ?>" class="form-control col-lg-4" autofocus readonly="" >
                        <span class="help-block"></span>
                    </div>
                </div>

   
                        <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Documento/NIT</label>
                    <div class="col-sm-2">
                        <input type="text" id="docu" placeholder="" class="form-control col-lg-4" autofocus readonly="" >
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Cliente</label>
                    <div class="col-sm-8">
                        <input type="text"  id="docu" placeholder="" class="form-control col-lg-100" autofocus>
                                           </div>

                </div>

                 <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Telefono Contacto</label>
                    <div class="col-sm-2">
                        <input type="text"  id="docu" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>

                 
                    <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Persona Contacto</label>
                    <div class="col-sm-6">
                        <input type="text"  id="docu" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>

                <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Email</label>
                    <div class="col-sm-4">
                        <input type="text"  id="docu" placeholder="example@example.co" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>

                 <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Direccion</label>
                    <div class="col-sm-4">
                        <input type="text"  id="docu" placeholder="" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>


               </fieldset>

               <fieldset  >

               <legend>Detalle Equipos Cotizados</legend>


                  <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Codigo Equipo</th>
      <th>Tipo Equipo</th>
      <th>Cantidad</th>
      <th>Valor Unitario</th>
      <th>Estado</th>
      <th>Aprobación</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>GA001</td>
      <td>GUANTES DIELECTRICOS</td>
      <td>100</td>
      <td>$25.000</td>
      <td>Pendiente Aprobacion</td>
      <td><input type="checkbox" /></td>
    </tr>
  </tbody>
</table>
               

                 <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-danger">PDF</button>
                    </div>
                </div>

                </fieldset>

               

 

            </form> <!-- /form -->
    
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