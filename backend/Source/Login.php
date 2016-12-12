<?php

require '../ConexionBD/Conexion.php';

error_reporting(0);

$usuario    = $_GET['un'];
$contrasena = $_GET['pw'];

if($usuario != "" || $contrasena != "")
{


        $conn = new Conexion();
        
        $conn->conectar_auth($usuario,$contrasena);
        
        $res = $conn->query("SELECT * FROM auth.\"USUARIO\" WHERE usuanom = '$usuario' ");

        if($res){

            $_SESSION['un'] = $usuario;
            $_SESSION['pw'] = $contrasena;

            $data = array("user" => $usuario);

            $mod = $conn->executePL("auth.fun_get_listamodulos",$data);

                echo json_encode(array('success' => true, 'root' => $mod));
                $_SESSION['admon_mod'] = $mod;
        }else{
            echo json_encode(array('success' => true, 'root' => 'Error usuario invalido'));
        }

        

        pg_close($conn);


}

?>
