<?php

error_reporting(E_ALL);

//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/labdiel/backend/ConexionBD/Conexion.php');
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

        case 'add':
            # code...

        $params = array("");

        registrarEquipo();

            break;

       case 'getclase':
           # code...

       getclase();
           break;

           case 'getProcedimiento':
               # code...

           getProcedimiento("" => $_GET['']);

               break;

    }

}else{
    echo "la variable no existe";
}

}

function getclase(){


     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/registroEquipo/getClase");
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}


function getProcedimiento(){


     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/registroEquipo/getProcedimiento");
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function registrarEquipo(){


}
