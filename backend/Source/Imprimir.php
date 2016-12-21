<?php

if(isset($_GET['genpdf']){

  $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/LabDielectrico/webresources/cotizacion/imprimirCotizacion?ncotic=COTIC -1015");

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);

    var_dump($result);

    file_put_contents('result-andres.pdf', $result);
      
    curl_close($curl);

}else{
	echo "WUAPEA WILLY!!";
}