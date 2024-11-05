<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $lista = [
  [
   "nombre" => "ARELLANES MENDOZA ABRAHAM",
   "color" => "\n¿Cómo se dice disparo en árabe? Ahí-va-la-bala."
  ],
  [
   "nombre" => "CHAVARRIA SANCHEZ URIEL",
   "color" => "¿Por qué los estadounidenses son malos jugadores de ajedrez? Porque perdieron dos torres."
  ],
  [
   "nombre" => "GOMEZ CRUZ MAXIMO",
   "color" => "¿Qué es peor que seis niños colgados de un árbol? Un niño colgado de seis árboles."
  ],
  [
   "nombre" => "GREGORIO GONZALEZ ALEXIS GIOVANI",
   "color" => "Estaba cavando un hoyo en nuestro jardín y encontré un cofre lleno de monedas de oro. Quería ir corriendo a casa a contárselo a mi marido. Entonces recordé por qué estaba cavando un hoyo en nuestro jardín."
  ],
  [
   "nombre" => "MENDEZ MONTERO VICTOR ABRAHAN",
   "color" => "Mi novia me dejó, así que le robé la silla de ruedas. Adivina quién volvió arrastrándose..."
  ],
  [
   "nombre" => "PIMENTEL NAVARRO BRANDON AXEL",
   "color" => "¿Cómo se dice pañuelo en japonés? Saka-moko."
  ],
  [
   "nombre" => "ROMERO LAGUNA KIMBERLY JAZMIN",
   "color" => "Doctor, ¿tendré cura?: Por supuesto, cura, misa y funeral"
  ],
  [
   "nombre" => "VIVAR TUFIÑO ALEJANDRO ISRAEL",
   "color" => "Su humor era tan negro que le disparaba la policía."
  ]
 ];

 // Genera el código HTML de la lista.
 $render = "";
 foreach ($lista as $modelo) {
  /* Codifica nombre y color para que cambie los caracteres
   * especiales y el texto no se pueda interpretar como HTML.
   * Esta técnica evita la inyección de código. */
  $nombre = htmlentities($modelo["nombre"]);
  $color = htmlentities($modelo["color"]);
  $render .=
   "<dt>{$nombre}</dt>
   <br>
    <dd>{$color}</dd>
    <br>";
    
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}
