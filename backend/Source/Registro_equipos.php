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

    $params = array("cod_equipo" => $_GET['cod_equipo'], "marca" => $_GET['marca'], "serial_interno" => $_GET['serial_interno'], "tipo" => $_GET['tipo'] );

        registrarEquipo($params);

            break;

       case 'getclase':
           # code...

       getclase();
           break;

           case 'getProcedimiento':
               # code...

           getProcedimiento();

               break;

               case 'addParam':
                 # code...


$params = array("nombre" => $_GET['desc'] , "clase"  => $_GET['clase'] , "unidad" => $_GET['unidad'], "proc_eq" => $_GET['proc_eq']);
addParam( $params );

                 break;

                 case 'gettipo':
                   # code...

                 gettipo();
                   break;

                   case 'addPrecio':
                       # code...
                   $paramst = array("tipoe" => $_GET['tipoe'], "precio" => $_GET['precio']);
                   addPrecio($paramst);

                       break;

    }

}else{
    echo "la variable no existe";
}

}

function getclase(){


     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/getClase");
    
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
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/getProcedimiento");
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function registrarEquipo($param){

  $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/regEquipo?" . http_build_query($param));

    #var_dump("http://localhost:8080/LabDielectrico/webresources/registroEquipo/regEquipo?" . http_build_query($param));
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function addParam($param){


  $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/regParamEquipo?" . http_build_query($param));

    #var_dump("http://localhost:8080/LabDielectrico/webresources/registroEquipo/regEquipo?" . http_build_query($param));
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);

}

function gettipo(){

  $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/getTipo");

    #var_dump("http://localhost:8080/LabDielectrico/webresources/registroEquipo/regEquipo?" . http_build_query($param));
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);



}

function addPrecio($param){

     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/registroEquipo/regPrecio?" . http_build_query($param));

    #var_dump("http://localhost:8080/LabDielectrico/webresources/registroEquipo/regEquipo?" . http_build_query($param));
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);

}
