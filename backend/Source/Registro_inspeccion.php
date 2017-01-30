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

      case 'addiniEnsayo':

      $param = array("serial" => $_GET['serial'], "cotizacion" => $_GET['cotizacion'] ,"clase" => $_GET['clase'], "obsclase" => $_GET['obsclase'], "tension" => $_GET['tension'], "obstension" => $_GET['obs_tension'], "tipoeq" => $_GET['tipoeq'], "obs_tipo" => $_GET['obs_tipo'], "estilo" => $_GET['estilo'], "obestilo" => $_GET['obestilo'], "coloreq" => $_GET['coloreq'], "obscolor" => $_GET['obscolor'], "tallaeq" => $_GET['tallaeq'], "obstalla" => $_GET['obstalla'], "longitudeq" => $_GET['longitudeq'], "obslogintud" => 'Despes lo cambio'/*, */ );

      addiniEnsayo($param);
        # code...
      break;

      case 'addsecondEnsayo':
          # code...

      $params2 = array("serial" => $_GET['serial'], "cotizacion" => $_GET['cotizacion'], "perforacioneq" => $_GET['perforacioneq'], "obsperforacion" => $_GET['obsperforacion'], "abrasioneq" => $_GET['abrasioneq'], "obs_abrasion" => $_GET['obs_abrasion'], "degradacioneq" => $_GET['degradacioneq'], "obsdegradacion" => $_GET['obsdegradacion'], "ozonoeq" => $_GET['ozonoeq'], "obsozono" => $_GET['obsozono'], "cristaleq" => $_GET['cristaleq'], "obscristal" => $_GET['obscristal'], "quemaduraeq" => $_GET['quemaduraeq'], "obsquemadura" => $_GET['obsquemadura'], "contaminacioneq" => $_GET['contaminacioneq'], "obscontaminacion" => $_GET['obscontaminacion'], "infladoeq" => $_GET['infladoeq'], "obsinflado" => $_GET['obsinflado'], "inspeccioneq" => $_GET['inspeccioneq'], "obsinspeccion" => $_GET['obsinspeccion']);

      addSecodEnsayo($params2);

      break;

      case 'addTercerEnsayo':
            # code...

      $param3 = array("serial" => $_GET['serial'], "cotizacion" => $_GET['cotizacion'],"tension" => $_GET['tension'], "corriente" => $_GET['fuga'], "temperatura" => $_GET['temperatura'], "humedad" => $_GET['humedad'], "tiempo" => $_GET['tiempo'], "obs_final" => $_GET['obser']);

      addTercerEnsayo($param3);

      break;

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

      case 'getserialesEquiposPuestaTierra':
       # code...
      getserialesEquiposPuestaTierra($_GET['cotizacion']);
      break;

      case 'addiniEnsayoTierra':
          # code...
      $param = array("cotizacion" => $_GET['cotizacion'] , 
       "serial" => $_GET['serial'], 
       "corriente" => $_GET['corriente'], 
       "tramo" => $_GET['tramo'], 
       "mordaza" => $_GET['mordaza'], 
       "conector" => $_GET['conector'] ,
       "cubierta" => $_GET['cubierta'], 
       "cable" => $_GET['cable'], 
       "awg" => $_GET['awg'], 
       "long" => $_GET['long'], 
       "tc" => $_GET['tc'], 
       "hr" => $_GET['hr'], 
       "resistencia" => $_GET['resistencia'], 
       "obs" => $_GET['obs']);

      addiniEnsayoTierra($param);
      break;

      case 'getserialesEquiposPertigas':
            # code...

      getserialesEquiposPertigas($_GET['cotizacion']);
      break;

      case 'getserialesEquiposLinears':
              # code...

      getserialesEquiposLinears($_GET['cotizacion']);
      break;

      case 'addiniEnsayoPertigas':
                # code...
      $param = array('serial' => $_GET['serial'], "cotizacion" => $_GET['cotizacion'], "tramo" => $_GET['tramo'] , "tension" => $_GET['tension'], "obs_tension" => $_GET['obs_tension'], "color" => $_GET['color'],"obs_color" => $_GET['obs_color'], "longitud" => $_GET['longitud'], "obs_longitud" => $_GET['obs_longitud']);

      addiniEnsayoPertigas($param);
      break;


      case 'addsecondEnsayoPertigas':
                  # code...

      $params2 = array("serial" => $_GET['serial'], "cotizacion" => $_GET['cotizacion'], "perforacioneq" => $_GET['perforacioneq'], "obsperforacion" => $_GET['obsperforacion'], "abrasioneq" => $_GET['abrasioneq'], "obs_abrasion" => $_GET['obs_abrasion'], "degradacioneq" => $_GET['degradacioneq'], "obsdegradacion" => $_GET['obsdegradacion'], "ozonoeq" => $_GET['ozonoeq'], "obsozono" => $_GET['obsozono'], "cristaleq" => $_GET['cristaleq'], "obscristal" => $_GET['obscristal'], "quemaduraeq" => $_GET['quemaduraeq'], "obsquemadura" => $_GET['obsquemadura'], "contaminacioneq" => $_GET['contaminacioneq'], "obscontaminacion" => $_GET['obscontaminacion'], "inspeccioneq" => $_GET['inspeccioneq'], "obsinspeccion" => $_GET['obsinspeccion']);

      addsecondEnsayoPertigas($params2);

      break;

      case 'addTercerEnsayoPertigas':
                    # code...

      $param3 = array('serial' => $_GET['serial'], "cotizacion" => $_GET['cotizacion'], "tempi1" => $_GET['tempi1'],
       "tempi2" => $_GET['tempi2'],    
       "tempi3" => $_GET['tempi3'],      
       "tempi4" => $_GET['tempi4'],      
       "tempi5" => $_GET['tempi5'],      
       "tempi6" => $_GET['tempi6'],       
       "tempi7" => $_GET['tempi7'],      
       "tempi8" => $_GET['tempi8'],       
       "tempi9" => $_GET['tempi9'],       
       "tmp_ambiente"  => $_GET['tmp_ambiente'],
       "humedad"  => $_GET['humedad'],    
       "tension"  => $_GET['tension'],    
       "tiempo"   => $_GET['tiempo']    );


      addTercerEnsayoPertigas($param3);
      break;


      case 'addCuartoEnsayoPertigas':
        # code...

      $param4  = array('serial' =>$_GET['serial'], "cotizacion" => $_GET['cotizacion'], "tempf1" =>$_GET['tempf1'], "tempf2" =>$_GET['tempf2'], "tempf3" =>$_GET['tempf3'], "tempf4" =>$_GET['tempf4'], "tempf5" =>$_GET['tempf5'], "tempf6" =>$_GET['tempf6'], "tempf7" =>$_GET['tempf7'], "tempf8" =>$_GET['tempf8'], "tempf9" =>$_GET['tempf9'], "obs" =>$_GET['obs']);

      addCuartoEnsayoPertigas($param4);
        break;


        case 'addPrimerEnsayoLinears':
          # code...

        $paraml = array("cotizacion" => $_GET['cotic'], "serial" => $_GET['serial'], "tipo" => $_GET['tipo'], "aceite" => $_GET['aceite'], "obs8" => $_GET['obs8'], "abrasion" => $_GET['abrasion'], "obs9" => $_GET['obs9'], "degradacion" => $_GET['degradacion'], "obs10" => $_GET['obs10'], "polvo" => $_GET['polvo'], "obs11" => $_GET['obs11'], "quemadura" => $_GET['quemadura'], "obs_quemadura" => $_GET['obs_quemadura'], "perforacion" => $_GET['perforacion'], "obs_perforacion" => $_GET['obs_perforacion'], "inspeccion" => $_GET['inspeccion'], "obs_inspeccion" => $_GET['obs_inspeccion']);

        addPrimerEnsayoLinears($paraml);
          break;


    }

  }else{
    echo "la variable no existe";
  }

}

function getserialesEquipos($coti){



 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/cotizacion/getDetalleSerialesEquipos?fk_cotizacion=".$coti);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);



}

function getserialesEquiposPuestaTierra($coti){



 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/cotizacion/getserialesEquiposPuestaTierra?fk_cotizacion=".$coti);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);



}


function getserialesEquiposPertigas($coti){



 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/cotizacion/getserialesEquiposPertigas?fk_cotizacion=".$coti);

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

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/ensayo/ensayosCliente?".http_build_query($parameters));

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);


}

function addiniEnsayo($paramst)

{

 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroInicioInspeccion?".http_build_query($paramst));

  #var_dump("http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroInicioInspeccion?".http_build_query($paramst));

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);


}

function addSecodEnsayo($e){


 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroSegundoInspeccion?".http_build_query($e));

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);



}

function addTercerEnsayo($param){



 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroTerceroInspeccion?". http_build_query($param));

 #var_dump( "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroTerceroInspeccion?". http_build_query($param));

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);


}

function addiniEnsayoTierra($pa){


 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/tierra?". http_build_query($pa));

  #var_dump( "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/registroTerceroInspeccion?". http_build_query($param));

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);


}

function getserialesEquiposLinears($coti){


 $curl = curl_init();

 curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/cotizacion/getserialesEquiposLinears?fk_cotizacion=".$coti);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 $result = curl_exec($curl);

 if(!$result){

  die('Error: "' . curl_error($curl). '" - Code: ');
}else{
  echo json_encode($result);
}

curl_close($curl);




}

function addiniEnsayoPertigas($param){

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addiniEnsayoPertigas?" . http_build_query($param));
  #var_dump("http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addiniEnsayoPertigas?" . http_build_query($param));

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);

  if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
  }else{
    echo json_encode($result);
  }

  curl_close($curl);





}

function addsecondEnsayoPertigas($param){

  $curl = curl_init();
  
  curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addsecondEnsayoPertiga?".http_build_query($param));
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  
  if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
  }else{
    echo json_encode($result);
  }
  
  curl_close($curl);


}

function addTercerEnsayoPertigas($params3){

$curl = curl_init();
  
  curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addTercerEnsayoPertigas?".http_build_query($params3));

  #var_dump("http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addTercerEnsayoPertigas?".http_build_query($params3));
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  
  if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
  }else{
    echo json_encode($result);
  }
  
  curl_close($curl);

}

function addCuartoEnsayoPertigas($params4){

$curl = curl_init();
  
  curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addCuartoEnsayoPertigas?".http_build_query($params4));
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  
  if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
  }else{
    echo json_encode($result);
  }
  
  curl_close($curl);


}

function addPrimerEnsayoLinears($params3){

$curl = curl_init();
  
  curl_setopt($curl, CURLOPT_URL, "http://".$_SERVER['SERVER_NAME'].":8080/LabDielectrico/webresources/inspeccion/addPrimerEnsayoLinears?".http_build_query($params3));
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  
  if(!$result){

    die('Error: "' . curl_error($curl). '" - Code: ');
  }else{
    echo json_encode($result);
  }
  
  curl_close($curl);



}
