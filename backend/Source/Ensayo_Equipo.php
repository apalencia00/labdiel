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

        case 'addennsayo':

        $params = array("fecha_solicitud_in" => $_GET['fecha'], "lugar_revision_in" => $_GET['lugare'], "direccion_revision_in" => '', "capacidad_servicio_in" => $_GET['capacidad'], "recibido_in" => '', "aprobado_in" => '', "fk_empleado_in" => 0, "fk_cliente_in" => $_GET['cliente'], "ensayo_indoor_in" => $_GET['ensayoindoor'], "obs_in" => '-', "fk_usu_creador_int" => $usuario);

        registroEnsayoEquipo($params);

        break;

        case 'regDetalleEnsayo':
            # code...

        $datos = $_GET['datos'];
        $cliente = $_GET["cliente"];

        //var_dump($datos);
        
        $params = array("fk_cod_tipo_equipo_in" => $datos, "cantidad_equipo_in" => $_GET['cantidad'], "fk_revision_ensayo_equipo_in" => $_GET['revision'], "fk_cliente_in" =>$cliente , "fk_id_usuario_in" =>$usuario);


        regDetalleEnsayo($params);

            break;

        case 'tipoequipo':
            # code...

        gettipoequipo();

            break;

            case 'getInfoRevisio_Equipo':
                # code...

            #$params = array("id_cliente" => $_GET['cliente'], "id_revision_ensayo" => $_GET['revisionensayo'], "fk_id_tipo_equipo" => $_GET['equipo']);

            getInfoEnsayoRevisionCliente_TipoEquipos_Equipos_Cliente();

                break;

                case 'getLastIDRevisionByUsuario':
                    # code...

                getLastIDRevisionByUsuario($usuario);

                    break;

        
    }

}else{
    echo "la variable no existe";
}

}


function registroEnsayoEquipo($param){

    
    $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/registroEnsayo?". http_build_query($param));

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);

}

function gettipoequipo(){



     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/listtipoEquipo");
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function regDetalleEnsayo($param){

     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/regDetalleEnsayo?". http_build_query($param));

       
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function getInfoEnsayoRevisionCliente_TipoEquipos_Equipos_Cliente($param){



     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/getInfoEnsayoRevisionCliente_TipoEquipos_Equipos_Cliente?". http_build_query($param) );

    #var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/ensayo/getInfoEnsayoRevisionCliente_TipoEquipos_Equipos_Cliente?". http_build_query($param) ); exit();
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error(). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function getLastIDRevisionByUsuario($usu){


     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/getLastIDRevisionByUsuario?id_usuario=".$usu);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error(). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}



