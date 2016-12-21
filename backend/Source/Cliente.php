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
        # code...

        $tipo      = $_GET['tipo']; 
        $doc       = $_GET['docu'];
        $nombre    = $_GET['nombre'];
        $apellido  = $_GET['apellido'];
        $tele      = $_GET['tele'];
        $ciudad    = $_GET['ciudad'];
        
        $contacto  = $_GET['contacto'];
        $email     = $_GET['email'];
        
        $direccion = $_GET['direccion'];

        $params = array("tipoid" => (int)$tipo, "documento" => $doc, "nombre" => $nombre, "apellido" => $apellido, "tel_cliente" => $tele, "cod_ciudad" => (int)$ciudad, "cod_depto" => (int)1,  "contacto" => $contacto, "email" => $email, "direccion" => $direccion, "fecha_registro" => date('Y-m-d'), "usu_creador" => (int)$usuario);

        registrarCliente($params,$usuario);

        break;


        case 'getListTipoIde':
            # code...
        
        getTipoId();  

        break;

        case 'getCiudad':
                # code...

        getCiudad();
        break;

        case 'addEquipo':
            # code...

        $cliente_cod = $_GET["listCliente"];
        $tipo_equipo = $_GET['tipo_equipo'];
        $cod_producto= $_GET['cod_producto'];
        $nomb_equipo = $_GET['nomb_equipo'];
        $marca       = $_GET['marca'];
        
        $para_e = array("cod_equipo" => $cod_producto, "descripcion" =>$nomb_equipo, "marca" =>$marca, "fk_cliente" => $cliente_cod, "fk_tipo_equipo" => $tipo_equipo );

        
        registroEquipo_Cliente($para_e,$usuario);
            break;

        default:

        case 'getListCliente':
            # code...

        getListCliente();

            break;

            case 'getTipoEquipo':
                # code...

            getTipoEquipo();

                break;

        # code...
        break;
    }

}else{
    echo "la variable no existe";
}

}

function getTipoId(){


    $curl = curl_init();


    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/tipoIdentificacion");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);


    echo json_encode($result);



}

function getCiudad(){

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/ciudad");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);


    echo json_encode($result);

}

function registrarCliente($params,$us)

{

   $curl = curl_init();
  
      curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/registroCliente?" .http_build_query($params) );
    
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($curl);

    if(!$result){

        die('Error: "' . curl_error($curl) . '" - Code: ');
    }else{
        echo json_encode($result);
    }

   curl_close($curl);

   

}

function registroEquipo_Cliente($params, $us){

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/registroEquipo?" .http_build_query($params));


curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


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

function getTipoEquipo(){

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cliente/getTipoEquipo");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);

}


