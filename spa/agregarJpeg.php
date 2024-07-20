<?php
function cargarImagen($imagen, $legajo) {
    try {
        include "conexionPDO.php";
        $sql = "INSERT INTO imagenes(legajo, imagen) VALUES(:legajo, :imagen)";
    
        $stmt = $conexion->prepare($sql);
    
        $stmt->bindParam(':legajo', $legajo);
        $stmt->bindParam(':imagen', $imagen);
    
        $resultado = $stmt->execute();
    
        $conexion = null;
        if ($resultado) {
            echo "IMAGEN AGREGADA CORRECTAMENTE \n";
        } else {
            echo "Error al actualizar el registro: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>