
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
      <script type="text/javascript" src="js/registro_cliente.js" ></script>
      <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

  </head>

  <body>

    <div class="container">
        <form class="form-horizontal" id="form" role="form" >
            <h2>Registro Cliente</h2>

            <div class="form-group">
                <label for="tipodoc" class="control-label col-sm-4">Tipo Identificacion</label>
                <div class="col-sm-6">

                   <select id="tipodoc" class="form-control">
                      <option>Seleccione Tipo</option>
                  </select>
              </div>
          </div> <!-- /.form-group -->

          <div class="form-group">
            <label for="numdoc" class="control-label col-sm-4"> No. Documento</label>
            <div class="col-sm-6">
                <input type="text" id="docu" placeholder="Documento/NIT" class="form-control" autofocus>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="pnombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" id="nomb" placeholder="Nombre" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="papallido" class="col-sm-3 control-label">Apellido</label>
            <div class="col-sm-9">
                <input type="text" id="ape" placeholder="Apellido(s)" class="form-control">
            </div>
        </div>
                <!--
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" class="form-control">
                    </div>
                </div>

            -->
            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Telefono Contacto</label>
                <div class="col-sm-9">
                    <input type="text" id="tele" placeholder="Telefono" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="tipodoc" class="col-sm-3 control-label">Ciudad</label>
                <div class="col-sm-9">

                   <select id="ciudad" class="form-control">
                      <option>Seleccione Tipo</option>
                  </select>
              </div>
          </div> <!-- /.form-group -->

                          <div class="form-group">
                    <label for="tel" class="col-sm-3 control-label">Contacto</label>
                    <div class="col-sm-9">
                        <input type="text" id="contacto" placeholder="Telefono" class="form-control">
                    </div>
                </div>



                <div class="form-group">
                    <label for="tel" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" id="email" placeholder="Correo Electronico" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tel" class="col-sm-3 control-label">Direccion</label>
                    <div class="col-sm-9">
                        <input type="text" id="direccion" placeholder="Direccion" class="form-control">
                    </div>
                </div>

                                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" id="submitbutton" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

        <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="http://www.travislayne.com/images/loading.gif" class="icon" />
                    <h4>Processing... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button></h4>
                </div>
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