<?php
    try {
        if (isset($_POST["legajo"])) {

            include "conexionPDO.php";

            $sql = "UPDATE inmuebles  SET 
                -- legajo, 
                tipoInmueble = :tipoInmueble, 
                ambientes =  :ambientes, 
                departamento = :departamento, 
                piso = :piso,
                barrio =  :barrio, 
                calle = :calle, 
                entreCalle1 = :entreCalle1, 
                entreCalle2 = :entreCalle2, 
                localidad = :localidad,  
                numero =    :numero, 
                orientacion = :orientacion, 
                ubicacion = :ubicacion,
                supCubierta =  :supCubierta, 
                supLibre = :supLibre,
                supTotal =  :supTotal,
                propietario = :propietario, 
                valor = :valor,
                fechaIngreso =  :fechaIngreso, 
                tipoOperacion = :tipoOperacion
            WHERE legajo = :legajo";

            $stmt = $conexion->prepare($sql);   
            $stmt->bindParam('legajo', $_POST['legajo']);
            $stmt->bindParam('tipoInmueble', $_POST['tipoInmueble']);    
            $stmt->bindParam('ambientes', $_POST['ambientes']);    
            $stmt->bindParam('departamento', $_POST['departamento']);    
            $stmt->bindParam('piso', $_POST['piso']);    
            $stmt->bindParam('barrio', $_POST['barrio']);    
            $stmt->bindParam('calle', $_POST['calle']);    
            $stmt->bindParam('entreCalle1', $_POST['entreCalle1']);    
            $stmt->bindParam('entreCalle2', $_POST['entreCalle2']);    
            $stmt->bindParam('localidad', $_POST['localidad']);    
            $stmt->bindParam('numero', $_POST['numero']);    
            $stmt->bindParam('orientacion', $_POST['orientacion']);    
            $stmt->bindParam('ubicacion', $_POST['ubicacion']);    
            $stmt->bindParam('supCubierta', $_POST['supCubierta']);   
            $stmt->bindParam('supLibre', $_POST['supLibre']);   
            $stmt->bindParam('supTotal', $_POST['supTotal']);   
            $stmt->bindParam('propietario', $_POST['propietario']);   
            $stmt->bindParam('valor', $_POST['valor']);   
            $stmt->bindParam('fechaIngreso', $_POST['fechaIngreso']);   
            $stmt->bindParam('tipoOperacion', $_POST['tipoOperacion']);   

            $resultado = $stmt->execute();

            $conexion = null;
            
            if($resultado){
                $mensaje = "MODIFICADO CON EXITO...! \n";
                echo $mensaje;
            }
            else{
                $linea = __LINE__ . " : " .  "propiedadModificar.php";
                $mensaje = "ERROR...! NO SE PUDO MODIFICAR" . $linea . "\n";
                echo $mensaje;
            }
        }
        else{
            echo "ERROR... INGRESE UN LEGAJO";
        }
    } catch (Exception $e) {
        include "funcionError.php";
        $mensaje = $e->getMessaege();
        $linea = __LINE__ . " : " .  "propiedadModificar.php";
        error($mensaje, $linea );
        echo json_encode( $mensaje );
    }
?>






