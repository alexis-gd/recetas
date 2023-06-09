<?php

function paseTimeNoticias($dateTime){
  date_default_timezone_set('America/Mazatlan'); //definimos la zona horaria
  setlocale(LC_TIME, 'es_ES.UTF-8'); //convertimos el formato de tiempo a español
  setlocale(LC_TIME, 'spanish'); //convertimos el formato de tiempo a español
  
  $dateTime = new DateTime($dateTime);
  $tiempoEnSegundos = $dateTime->getTimestamp();
  if ($tiempoEnSegundos == "" || $tiempoEnSegundos == -62169958460) {
    return "hace tiempo";
  }else{
    $dateTime = strftime("%d %B %Y", $tiempoEnSegundos);
    return $dateTime;
  }
}

?>