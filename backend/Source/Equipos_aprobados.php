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

            case 'getCotizacionCliente':
                # code...

            getCotizacionCliente($_GET['cliente']);
                break;


                case 'aprobarCantidadEquipo':
                    # code...

                $params = array("equipo" => $_GET['tipoe'], "cantidad" => $_GET['cantidad'] , "fk_cotizacion" => $_GET['cotinum'] , "fk_usuario" => $usuario);

                aprobarCantidadEquipo($params);
                    break;

                    case 'getCantidadAprobados':
                        # code...

                    getCantidadAprobados();
                        break;

                        case 'regdetalle_serial':
                            # code...

                        $cantidad = (int)$_GET['cant_equi'];
                        #var_dump($cantidad);
                        
                        $eeee = $_GET['desc_equipo'];

                        #var_dump($eeee);

                        $div = explode("-", $eeee);
                        
                        #var_dump($div[0]);

                        for ($i=0; $i <= $cantidad ; $i++) { 
                                
                     $cod_serial_equipo = "INF-" .$_GET['cod_equipos'] . "-" . $div[0] . "-2016"; 

                            $params = array("codigo_equipo" => $_GET['cod_equipos'], "serial" => $cod_serial_equipo , "fk_cotizacion" => $_GET['cotizacion']);

                           # var_dump($params); exit();

                            regdetalle_serial($params);
                         
                        }

                       

                        
                            break;

                                         
        
    }

}else{
    echo "la variable no existe";
}

}

function getEquiposCotizados($coti){

$param = array("ncotic" => $coti);

 $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/getEquiposCotizados?".http_build_query($param));

//var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/getEquiposCotizados?ncotic=".$coti);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}

# 3012042992
function getCotizacionCliente($cliente){


 $curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/listarCotizacionesCliente?id_cliente=".$cliente);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}

function aprobarCantidadEquipo($p){



     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/aprobacionEquiposLab?". http_build_query($p));

    #var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/aprobacionEquiposLab?". http_build_query($p));
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
    
    if(!$result){
    
        die('Error: "' . curl_error($curl). '" - Code: ');
    }else{
        echo json_encode($result);
    }
    
    curl_close($curl);
    

}

function regdetalle_serial($param){



     $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/regDetalleSerials?" . http_build_query($param));
    
    #var_dump("http://173.199.148.4:8080/LabDielectrico/webresources/cotizacion/regDetalleSerials?" . http_build_query($param));
    
    curl_exec($curl);
    
    curl_close($curl);
    


}














