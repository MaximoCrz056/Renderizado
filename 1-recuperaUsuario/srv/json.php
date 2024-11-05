<?php
require_once __DIR__ . "/../lib/php/recuperaJson.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";

try {
    $json = recuperaJson();

    // Extraer datos del JSON
    $id = $json->id;
    $name = $json->name;
    $username = $json->username;
    $email = $json->email;
    $address = $json->address->street . ', ' .
        $json->address->city . ', ' .
        $json->address->zipcode . ', ' .
        $json->address->suite;
        $geo = $json->address->geo->lat . ', '.
                $json->address->geo->lng;

    // Formar resultado como lista (usando <br> para saltos de línea en HTML)
    $resultado = [
        'texto' => "id: " . $id . "\n" .
            "Nombre: " . $name . "\n" .
            "Usuario: " . $username . "\n" .
            "Correo: " . $email . "\n" .
            "Direccion: " . $address. "\n" .
            "Geolocalizacion: " . $geo,
    ];

    // Devolver respuesta
    devuelveJson($resultado);

} catch (Exception $e) {
    http_response_code(400);
    devuelveJson([
        "error" => $e->getMessage()
    ]);
}