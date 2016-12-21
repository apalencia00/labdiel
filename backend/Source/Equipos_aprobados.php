<?php

error_reporting(E_ALL);

//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/labdiel/backend/ConexionBD/Conexion.php');
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/labdiel/vendor/fergusean/nusoap/lib/nusoap.php');

session_start(); 

$usuario = 0;

if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {

  $usuario = $_SESSION['admon_mod'][0]['nusuario'];

if(isset($_GET['method'])){


    $method = $_GET['method'];

    switch ($method) {

        case 'add':

        $params = array();

        insertarDetalleEquipoCotizacion($params,$usuario);

        break;

        case 'getEquiposCotizados':
            # code...

        $ncoti = $_GET['cotizacion'];

        getEquiposCotizados($ncoti);
            break;

                                         
        
    }

}else{
    echo "la variable no existe";
}

}

function getEquiposCotizados($coti){

$param = array("ncotic" => $coti);

 $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/getEquiposCotizados?".http_build_query($param));

//var_dump("http://localhost:8080/LabDielectrico/webresources/cotizacion/getEquiposCotizados?ncotic=".$coti);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}














