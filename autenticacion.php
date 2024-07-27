<?php
    session_start();
    // if( !isset( $_SESSION["usuario"]["idSesion"] ) ){
    //     header("location: spa");
    //     exit;
    // }

    if(isset($_POST['email']) && isset($_POST['contrasenia']) ){

        try{
            include "conexionPDO.php";
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            
            $stmt  = $conexion->prepare($sql);   //Prepared Statement (Declaración Preparada)
            $stmt->bindParam(':email', $_POST['email'] );
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $conexion= null;

            if($resultado){
                
                $flag = false;

                foreach( $resultado as $usuario ){
                    
                    if(  password_verify($_POST['contrasenia'], $usuario["contrasenia"]) || $_POST['contrasenia'] == $usuario['contrasenia']){
                        
                        $_SESSION['usuario']['idSesion'] = session_create_id();
                        $_SESSION['usuario']['nombre'] = $usuario['nombre'];

                        $datos = new stdClass();
                        $datos->admin = false;
                        $datos->nombre = $usuario['nombre'];
                        $datos->operacion = true;
                        $flag = true;
                        
                        if ($usuario['adm']) {
                            $datos->admin = true;       
                            $datos->idSesion = $_SESSION['usuario']['idSesion'];  
                            $_SESSION['usuario']['adm'] = $usuario['adm'];
                        }
                        
                        echo json_encode($datos);
                    }
                }

                if( !$flag ){
                    $datos = new stdClass();
                    $datos->operacion = false;
                    echo json_encode($datos);
                }

            }else{
                echo json_encode("noooooo se enconctro el usuario");
            }

        } catch (Exception $e) {
            include "funcionError.php";
            $datos = new stdClass();
            $mensaje = $e->getMessaege();
            $linea = __LINE__ . " : " .  "autenticacion.php";
            error($mensaje, $linea );
            $datos->mensaje = $mensaje . $linea;
            echo json_encode( $datos );
        }
            
    }else{
        $datos = new stdClass();
        $datos->mensaje = "ERROR EN LOS DATOS ENVIADOS". __LINE__;
        echo json_encode( $datos );
    }
?>