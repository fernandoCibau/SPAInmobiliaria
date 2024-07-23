<?php
    try {
        if (isset($_POST["legajo"])) {

            include "conexionPDO.php";

            $sql = "SELECT * FROM inmuebles WHERE legajo = :legajo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam("legajo", $_POST['legajo']);
            $resultado = $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "EL LEGAJO YA EXISTE";

            }else{

                $sql = "INSERT INTO inmuebles(
                    legajo, tipoInmueble, ambientes, departamento, piso,
                    barrio, calle, entreCalle1, entreCalle2, localidad,
                    numero, orientacion, ubicacion, supCubierta, supLibre, supTotal,
                    propietario, valor, fechaIngreso, tipoOperacion
                ) VALUES(
                :legajo, :tipoInmueble, :ambientes, :departamento, :piso,
                    :barrio, :calle, :entreCalle1, :entreCalle2, :localidad,
                    :numero, :orientacion, :ubicacion, :supCubierta, :supLibre, :supTotal,
                    :propietario, :valor, :fechaIngreso, :tipoOperacion

                )";
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

                $resultado = $stmt->execute();//**************** */

                $conexion = null;
                
                if($resultado){
                    $mensaje = "GUARDADO CON EXITO...!" . "\n";

                    //// --------------------------------------------------
                    ////          AGREGAMOS FOTOS
                    //// --------------------------------------------------

                    //     // $imagen =  base64_encode( file_get_contents($_FILES['imagen']['tmp_name'] ) ) ;
                    if(isset($_FILES['imagenes'] ) && $_FILES['imagenes']['name'][0] != "" ) {
                        include "agregarJpeg.php";
                        $num_archivos = count($_FILES['imagenes']['name']);

                        // Iterar sobre cada archivo subido
                        for($i = 0; $i < $num_archivos; $i++) {
                            $nombre_archivo = file_get_contents( $_FILES['imagenes']['tmp_name'][$i] );
                            cargarImagen( $nombre_archivo, $_POST['legajo'] );
                        }
                    }else{
                        $mensaje = $mensaje . "SIN IMAGEN" . "\n";
                    }

                    echo $mensaje;
                }
                else{
                    echo "ERROR... NO SE GUARDO";
                }
            }
        }
        else{
            echo "ERROR... INGRESE UN LEGAJO";
        }
    } catch (Exception $e) {
        include "funcionError.php";
        $mensaje = $e->getMessaege();
        $linea = __LINE__ . " : " .  "propiedadAlta.php";
        error($mensaje, $linea );
        echo json_encode( $mensaje );
    }
?>






