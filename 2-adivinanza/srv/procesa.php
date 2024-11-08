<?php
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";

function enviarError($status, $titulo, $detalle) {
    http_response_code($status);
    header('Content-Type: application/problem+json');
    echo json_encode([
        'status' => $status,
        'title' => $titulo,
        'detail' => $detalle,
        'type' => 'validation-error'
    ]);
    exit;
}

try {
    // Recuperar la respuesta
    $respuesta = recuperaTexto("respuesta");

    // Validar campo vacío primero
    if (trim($respuesta) === "") {
        enviarError(400, "Campo vacío", "No puede tener un campo vacío.");
    }

    // Limpieza básica de la respuesta
    $respuesta = trim($respuesta);
    $respuesta = strtolower($respuesta);
    $respuesta = preg_replace('/\s+/', ' ', $respuesta);

    // Validar longitud máxima
    if (strlen($respuesta) > 20) {
        enviarError(400, "Respuesta muy larga", "La respuesta es demasiado larga.");
    }

    // Validar la respuesta correcta
    if ($respuesta === "agujero" || $respuesta === "hoyo") {
        $resultado = "Correcto la respuesta es Agujero";
    } else {
        $resultado = "Incorrecto, intentalo una vez mas!";
    }

    // Devolver resultado exitoso
    devuelveJson($resultado);

} catch (Exception $e) {
    enviarError(500, "Error interno", $e->getMessage());
}