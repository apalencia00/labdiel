<?php

error_reporting(E_ALL);

require 'ConexionBD/Conexion.php';

class Modulo {
    
    
    public function __construct() {
        
    }

    public function getModule(){

    	$conn = new Conexion();

    	$conn->conectar(); 

        $result = $conn->query("SELECT \"ID_MODULE\", \"MODULOS\", \"ESTADO\" FROM auth.\"MODULES\"");

     return $result;

     pg_close($conn);

    }
  
  public function getSubMenu($usu, $idmod)

  {

  	$conn = new Conexion();

    	$conn->conectar(); 

        $result = $conn->query("SELECT menu.\"ID_MENU\", menu.\"DESCRIPCION\" as mod, menu.\"ESTADO\", \"FECHA_REGISTRO\", \"MODULO\", \"PROPIEDAD\"
FROM auth.\"MENU\" menu, auth.\"USUARIO_MENU\" usmod
WHERE menu.\"ID_MENU\" = usmod.\"ID_MENU\" AND usmod.\"FK_MODULE\" = $idmod AND usmod.\"ID_USUARIO\" = $usu AND usmod.\"ESTADO\" = 'A' ORDER BY 1 ");



     return $result;

     pg_close($conn);


  }

}


