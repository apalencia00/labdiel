<?php

error_reporting(E_ALL);

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/labdiel/backend/ConexionBD/Conexion.php');
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/labdiel/vendor/fergusean/nusoap/lib/nusoap.php');

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$usuario = 0;

if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

  $usuario = $_SESSION['admon_mod'][0]['nusuario'];

if(isset($_GET['method'])){


    $method = $_GET['method'];

    switch ($method) {

        case 'getEnsayosManGua':

       
        getEquiposEnsayados($_GET['cotizacion']);

        break;

       
        
    }

}else{
    echo "la variable no existe";
}

}


function getEquiposEnsayados($param){

    
  
      $conectarbd = new Conexion();

                        $conectarbd->conectar();

                                            
                        $sql ="SELECT i.\"FK_ID_SERIAL_EQUIPO\", i.\"FECHA_REGISTRO\" FROM labor.\"REGISTRO_INSPECCION_EQUIPO\" i WHERE i.\"FK_COTIZACION\" = $param  ";

                        $res = $conectarbd->query($sql);


                        echo json_encode(array("success" => true, "root" => $res));





}




