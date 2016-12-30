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

        $params = array();

        insertarDetalleEquipoCotizacion($params,$usuario);

        break;

        case 'getlistCliente':
            # code...

        getListCliente();
            break;

            case 'getClienteById':
                # code...

            $id_client = $_GET['cliente'];



            getClienteById($id_client);
                break;


                case 'getEquipoEnsayo':
                    # code...

               $param = array("id_cliente" => $_GET['cliente'], "id_revision" => $_GET['id_revision'] );

                getEquipoEnsayo($param);
                    break;


                    case 'getnumbercotic':
                        # code...

                    getCurrentCoticByUsuario($usuario);

                        break;

                        case 'regDetalleCotizacion':
                            # code...


                        $params = array("fk_cotizacion" =>$_GET['cotizacion'], "fk_cod_tipo_equipo" => $_GET['codigoe'] , "cantidad" => $_GET['cantidad'] , "valor" =>$_GET['valor'], "fk_usu_creacion" => $usuario);

                        regDetalleCotizacion($params);
                            break;

                                
        
    }

}else{
    echo "la variable no existe";
}

}



function getListCliente(){

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/getListCliente");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);

}

function getClienteById($id){

    
    $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/getClienteById?id_cliente=".$id);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);

}

function getEquipoEnsayo($params){

    $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/ensayosCliente?".http_build_query($params));

//var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/ensayo/ensayosCliente?".http_build_query($params));

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}

function insertarDetalleEquipoCotizacion(){



    $curl  = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/regdetallecotizacion?id_cliente");
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode();
    }
    
    curl_close($curl);
    

}

function getCurrentCoticByUsuario($usu){



 $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/getCurrentcotic?id_usuario=".$usu);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);



}

function regDetalleCotizacion($params){



 $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/regdetallecotizacion?".http_build_query($params));

#var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/regdetallecotizacion?".http_build_query($params));

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}











