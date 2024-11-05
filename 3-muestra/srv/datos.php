<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";

$jsonData = file_get_contents("https://jsonplaceholder.typicode.com/users/1");

if ($jsonData === false) {
    die("Error al obtener los datos.");
}

$jsonData = json_decode($jsonData);

devuelveJson([
    "id" => ["value" => $jsonData->id],
    "name" => ["value" => $jsonData->name],
    "username" => ["value" => $jsonData->username],
    "email" => ["value"=> $jsonData->email],
    "phone" => ["value"=> $jsonData->phone],
    "website" => ["value"=> $jsonData->website],
]);
