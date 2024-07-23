<?php
    try {
        if( isset($_GET['todos']) ){
            include "conexionPDO.php";
            $sql = "SELECT * FROM inmuebles";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($resultado){

                $listaInmuebles = [];

                foreach( $resultado as $inmueble){
                    $nuevoInmueble = new stdClass();
                    $nuevoInmueble->legajo = $inmueble['legajo'];
                    $nuevoInmueble->tipoInmueble = $inmueble['tipoInmueble'];
                    $nuevoInmueble->ambientes = $inmueble['ambientes'];
                    $nuevoInmueble->departamento = $inmueble['departamento'];
                    $nuevoInmueble->piso = $inmueble['piso'];
                    $nuevoInmueble->barrio = $inmueble['barrio'];
                    $nuevoInmueble->calle = $inmueble['calle'];
                    $nuevoInmueble->entreCalle1 = $inmueble['entreCalle1'];
                    $nuevoInmueble->entreCalle2 = $inmueble['entreCalle2'];
                    $nuevoInmueble->localidad = $inmueble['localidad'];
                    $nuevoInmueble->numero = $inmueble['numero'];
                    $nuevoInmueble->orientacion = $inmueble['orientacion'];
                    $nuevoInmueble->ubicacion = $inmueble['ubicacion'];
                    $nuevoInmueble->supCubierta = $inmueble['supCubierta'];
                    $nuevoInmueble->supLibre = $inmueble['supLibre'];
                    $nuevoInmueble->supTotal = $inmueble['supTotal'];
                    $nuevoInmueble->propietario = $inmueble['propietario'];
                    $nuevoInmueble->valor = $inmueble['valor'];
                    $nuevoInmueble->fechaIngreso = $inmueble['fechaIngreso'];
                    $nuevoInmueble->tipoOperacion = $inmueble['tipoOperacion'];
                    $nuevoInmueble->id = $inmueble['id'];

                    //CARGA DE IMAGENES
                    try {
                        $sql = "SELECT imagen FROM imagenes  WHERE  legajo = :legajo";
                        $stmt = $conexion->prepare($sql);
                        $stmt->bindParam(':legajo', $inmueble['legajo']);
                        $stmt->execute();
                        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if($resultado){
                            $litaImagenes= [];
                            foreach( $resultado as $imagen){
                                $imagenBase64 =  base64_encode( $imagen['imagen'] ) ;
                                array_push($litaImagenes, $imagenBase64);
                            }
                            $nuevoInmueble->imagenes = $litaImagenes;
                        }else{
                            $litaImagenes= [];
                            $nuevoInmueble->imagenes = $litaImagenes;
                        }
                        array_push($listaInmuebles, $nuevoInmueble);
                    } catch (Exception $e) {
                        include "funcionError.php";
                        $mensaje = $e->getMessaege();
                        $linea = __LINE__ . " : " .  "cargarTodos.php";
                        error($mensaje, $linea );
                        echo json_encode( $mensaje );
                    }

                }

                echo  json_encode( $listaInmuebles);
                $conexion = null;
            }else {
                    $error = new stdClass();
                    $error->mensaje = "NO SE ENCONTRO REGISTO EN LA  TABLA...!";
                    $error->resultado = FALSE;
                    echo json_encode( $error);
            } 
        }else{
            echo "ERROR...!";
        }
    } catch (Exception $e) {
        include "funcionError.php";
        $mensaje = $e->getMessaege();
        $linea = __LINE__ . " : " .  "cargarTodos.php";
        error($mensaje, $linea );
        echo json_encode( $mensaje );
    }
?>