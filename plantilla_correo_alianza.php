<?php

  function plantilla($empresa, $nombre, $telefono, $correo) {

    $base = "https://grupogbp.mx/";
    $color_fondo = "#02375F";  
    $color_subfondo = "#012A48";  
    $color_texto = "#FFFFFF";  
    $color_texto2 = "#FFFFFF";  
    $color_caja = "#02375F";  
    $imagen1 = "assets/multimedia/logos/gbp3.png";  
    $texto_caja = "style='background: $color_caja; color: $color_texto !important; margin-right:1rem; padding: .2rem .6rem; border-radius: 5px;'";
    $texto_normal = "style='margin: 1rem; font-size:1.6rem; color: $color_texto2 !important;'";

    $message = ' 
      <center>
      <div style="max-width: 600px; background: '. $color_texto .'; margin-top: 2rem; border:1px solid #F4A740;">
        <div style="height: 100%; background: '. $color_fondo .'; padding: 1rem; max-height: 140px; text-align: center;">
          <img src=" '. $base . $imagen1 .'" style="max-height: 100px;" />
        </div>
        <div style="background: '. $color_subfondo .'; text-align: left; padding: 1rem;">
          <h1 '. $texto_normal .' ><b '. $texto_caja .'>Nombre de la empresa:</b>'. $empresa .'</h1>
          <h1 '. $texto_normal .' ><b '. $texto_caja .'>Nombre:</b>'. $nombre .'</h1>
          <h1 '. $texto_normal .' ><b '. $texto_caja .'>Teléfono:</b>'. $telefono .'</h1>
          <h1 '. $texto_normal .' ><b '. $texto_caja .'>Correo:</b>'. $correo .'</h1>
        </div>
        <div style="height: 100%; background: '. $color_fondo .'; padding: 1rem; max-height: 120px; text-align: center; color: '. $color_texto .';">
          <h5 style="margin: 1rem; font-size:1rem; color: '. $color_texto2 .' !important;">Jesús Garcia 300, Col. Ferrocarrilera, C.P. 82013, Mazatlán, Sinaloa.</h5>
        </div>      
      </div>
      </center>';

    return $message;

  }
?>