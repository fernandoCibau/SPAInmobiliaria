<?php
    try {
        if (isset($_POST["legajo"])) {
            include "conexionPDO.php";

            $sql = "DELETE FROM inmuebles WHERE legajo = :legajo";
            $stmt = $conexion->prepare($sql);   
            $stmt->bindParam('legajo', $_POST['legajo']);
            $resultado = $stmt->execute();

            $conexion = null;
            
            if($resultado){
                $mensaje = "INMUEBLE ELIMINADO CON EXITO...! " ;

                include "conexionPDO.php";

                $sql = "DELETE FROM imagenes WHERE legajo = :legajo";
                $stmt = $conexion->prepare($sql);   
                $stmt->bindParam('legajo', $_POST['legajo']);
                $resultado = $stmt->execute();
    
                $conexion = null;

                if($resultado){
                    $mensaje =  " IMAGENES ELIMINADAS CON EXITO...! " ;
                    echo json_encode($mensaje);
                }
                else{
                    $linea = __LINE__ . " : " .  "propiedadEliminar.php";
                    $mensaje = "ERROR...! NO SE PUDO ELIMINAR LAS IMAGENES" . $linea . "\n";
                    echo json_encode($mensaje);
                }

            }
            else{
                $linea = __LINE__ . " : " .  "propiedadEliminar.php";
                $mensaje = "ERROR...! NO SE PUDO ELIMINAR" . $linea . "\n";
                echo json_encode( $mensaje );
            }
        }
        else{
            echo "ERROR... INGRESE UN LEGAJO";
        }
    } catch (Exception $e) {
        include "funcionError.php";
        $mensaje = $e->getMessage(); 
        $linea = __LINE__ . " : " .  "propiedadModificar.php";
        error($mensaje, $linea );
        echo json_encode( $mensaje );
    }
?>






