<?php

  function plantilla($nombre, $telefono, $correo, $compania, $servicio, $comentarios) {

    $base = "https://grupogbp.mx/";
    $color1 = "#02375F";  
    $color2 = "#012A48";  
    $color3 = "#FFFFFF";  
    $imagen1 = "assets/multimedia/logos/gbp3.png";  
    $estilo = "style='background: $color1; margin-right:1rem; padding: .2rem .6rem; border-radius: 5px;'";
    $estilo2 = "style='margin: 1rem; font-size:1.6rem; color: $color3 !important;'";

    $message = ' 
    <html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
      <title>Solicitud de contacto</title>
    </head>
    <body>
      <center>
      <div style="max-width: 600px; background: '. $color3 .'; margin-top: 2rem;">
        <div style="height: 100%; background: '. $color1 .'; padding: 1rem; max-height: 140px; text-align: center;">
          <img src=" '. $base . $imagen1 .'" style="max-height: 100px;" />
        </div>
        <div style="background: '. $color2 .'; text-align: left; padding: 1rem;">
          <h1 '. $estilo2 .' ><b '. $estilo .'>Nombre:</b>'. $nombre .'</h1>
          <h1 '. $estilo2 .' ><b '. $estilo .'>Teléfono:</b>'. $telefono .'</h1>
          <h1 '. $estilo2 .' ><b '. $estilo .'>Correo:</b>'. $correo .'</h1>
          <h1 '. $estilo2 .' ><b '. $estilo .'>Compañia:</b>'. $compania .'</h1>
          <h1 '. $estilo2 .' ><b '. $estilo .'>Servicio:</b>'. $servicio .'</h1>
          <h1 '. $estilo2 .' ><b '. $estilo .'>Comentarios:</b>'. $comentarios .'</h1>
        </div>
        <div style="margin-bottom: 2rem; height: 100%; background: '. $color1 .'; padding: 1rem; max-height: 120px; text-align: center; color: '. $color3 .';">
          <h5>Jesús Garcia 300, Col. Ferrocarrilera, C.P. 82013, Mazatlán, Sinaloa.</h5>
        </div>      
      </div>
      </center>
    </body>
    </html>';

    return $message;

  }
?>