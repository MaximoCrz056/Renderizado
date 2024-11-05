<?php
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";

// Recuperar la respuesta
$respuesta = recuperaTexto("respuesta");

// Limpieza básica de la respuesta
$respuesta = trim($respuesta);               // Elimina espacios al inicio y final
$respuesta = strtolower($respuesta);         // Convierte a minúsculas
$respuesta = preg_replace('/\s+/', ' ', $respuesta); // Elimina espacios múltiples

// Validaciones simples
if (trim($respuesta) === "") {
    $resultado = "No puedes dejar el campo vacio.";
} 
// Validar longitud máxima
else if (strlen($respuesta) > 100) {
    $resultado = "La respuesta es demasiado larga.";
}
// Validar la respuesta correcta
else if ($respuesta === "agujero") {
    $resultado = "Correcto la respuesta es Agujero";
} 
else {
    $resultado = "Incorrecto, intentalo una vez mas!";
}

devuelveJson($resultado);