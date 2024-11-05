<?php
/**
 * Recupera y decodifica datos JSON del cuerpo de la petición
 * @return object Datos JSON decodificados
 * @throws Exception si hay error al decodificar
 */
function recuperaJson() {
    $datos = file_get_contents('php://input');
    $json = json_decode($datos);
    
    if ($json === null) {
        throw new Exception(
            'Error al procesar el JSON: ' . json_last_error_msg()
        );
    }
    
    return $json;
}