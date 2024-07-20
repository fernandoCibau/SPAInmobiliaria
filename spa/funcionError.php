<?php
// Establecer la zona horaria para Argentina (Buenos Aires)
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Definir la función error
function error($mensaje, $linea) {
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Error: {$mensaje} in line {$linea}\n";
    error_log($errorMessage, 3, 'archivo.log');
}
// $linea = __LINE__;
?>

