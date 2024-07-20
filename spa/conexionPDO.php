<?php
    $host           = 'localhost';
    $username  = 'root';
    $dbname     = 'inmobiliaria';
    $password   = '';
    
    // $host           = 'localhost';
    // $username  = 'id22183063_serviciostecnicos';
    // $dbname     = 'id22183063_serviciostecnicos';
    // $password   = 'MArado10!';
    
    try{
        $conexion = new PDO( "mysql:host=$host; dbname=$dbname", $username, $password );
        $conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        // echo "CONEXION EXITOSA...!";
    }
    catch(PDOExecption $e ){
        include "funcionError.php";
        $mensaje = $e->getMessage();
        error( $mensaje,  $linea = __LINE__);
    }
?>

