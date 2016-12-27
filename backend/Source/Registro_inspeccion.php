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

     case 'getserialesEquipos':
            # code...

     getserialesEquipos($_GET['cotizacion']);

     break; 

     case 'add':
                # code...

     $param = array("serieeq" => $_GET['serial'], "claseeq" => $_GET['clase'], "obsclase" => $_GET['obsclase'], "tensioneq" => $_GET['tension'], "obstension" => $_GET['obstension'], "tipoeq" => $_GET['tipoeq'], "obestilo" => $_GET['obestilo'],
        "coloreq" => $_GET['coloreq'], "obscolor" => $_GET['obscolor'],
        "tallaeq" => $_GET['tallaeq'], "obstalla" => $_GET['obstalla'],
        "longitudeq" => $_GET['longitudeq'], "obslogintud" => $_GET['obslogintud'],
        "perforacioneq" => $_GET['perforacioneq'], "obsperforacion" => $_GET['obsperforacion'], "abrasioneq" => $_GET['abrasioneq'], "obsabrasion" => $_GET['obsabrasion'], "degradacioneq" => $_GET['degradacioneq'], "obsdegradacion" =>$_GET['obsdegradacion'], "ozonoeq" => $_GET['ozonoeq'], "obsozono" => $_GET['obsozono'], "cristaleq" => $_GET['cristaleq'], "obscristal" => $_GET['obscristal'], "quemaduraeq" => $_GET['quemaduraeq'], "obsquemadura" => $_GET['obsquemadura'], "contaminacioneq" => $_GET['contaminacioneq'], "obscontaminacion" => $_GET['obscontaminacion'], "infladoeq" => $_GET['infladoeq'], "obsinflado" => $_GET['obsinflado'], "inspeccioneq" => $_GET['inspeccioneq'], "obsinspeccion" => $_GET['obsinspeccion']


        );

     registro_inspeccion_entrada_equipos($param);

     break;


 }

}else{
    echo "la variable no existe";
}

}

function getserialesEquipos($coti){



   $curl = curl_init();

   curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/getDetalleSerialesEquipos?fk_cotizacion=".$coti);

   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($curl);

   if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);



}

function registro_inspeccion_entrada_equipos($parameters){


   $curl = curl_init();

   curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/ensayo/ensayosCliente?".http_build_query($parameters));

   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($curl);

   if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
}else{
    echo json_encode($result);
}

curl_close($curl);


}
