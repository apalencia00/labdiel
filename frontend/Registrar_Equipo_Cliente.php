
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
      
.the-legend {
    border-style: none;
    border-width: 0;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
}
.the-fieldset {
    border: 2px groove threedface #444;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

  </style>


  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

   </head>

  <body>

<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Registro Equipos Cliente</h2>

                
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

                <p>

              <fieldset class="the-fieldset">
                    
                        <legend class="the-legend">Registrar Equipos</legend>

   
                        <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4"> Codigo Cliente</label>
                    <div class="col-sm-2">
                        <input type="text" id="docu" placeholder="6789" class="form-control col-lg-4" autofocus readonly="" >
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Codigo Producto</label>
                    <div class="col-sm-8">
                        <input type="text"  id="docu" placeholder="Codigo Producto" class="form-control col-lg-100" autofocus>
                                           </div>

                </div>

                 <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Nombre Equipo</label>
                    <div class="col-sm-8">
                        <input type="text"  id="docu" placeholder="Nombre Equipo" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>

                 <div class="form-group">

        
                    <label for="numdoc" class="control-label col-sm-4">Marca Equipo</label>
                    <div class="col-sm-8">
                        <input type="text"  id="docu" placeholder="Marca Equipo" class="form-control col-lg-100" autofocus>
                       
                    </div>

                </div>


                  <div class="form-group">
                    <label for="tipodoc" class="control-label col-sm-4">Clase Equipo</label>
                    <div class="col-sm-2">

                         <select id="tipodoc" class="form-control">
                              <option>Seleccione Equipo</option>
                        </select>
                    </div>

                    </div>


               </fieldset>
               
             <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Añadir</button>
                    </div>
                </div>

                <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
                
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