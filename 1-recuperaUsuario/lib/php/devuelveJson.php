<?php
/**
 * Envía una respuesta en formato JSON al cliente
 * @param mixed $datos Datos a enviar como JSON
 */
function devuelveJson($datos) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    
    echo json_encode($datos);
}