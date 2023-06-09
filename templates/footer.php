<footer class="container-fluid pt-5 footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3 pt-4">
        <div class="footer-logo pb-2 d-flex justify-content-center">
          <a href="./"><img src="assets/multimedia/logos/<?php echo $marca['logotipo']; ?>" alt="" loading="lazy"></a>
        </div>
        <div class="footer-redes py-4 d-flex justify-content-center">
          <!-- <a href="<?php // echo $footer['twitter']; ?>"><img src="assets/multimedia/icons/twitter.svg" alt="" loading="lazy"></a> -->
          <a href="<?php echo $footer['facebook']; ?>" class="pr-4"><img src="assets/multimedia/icons/facebook.svg" alt="" loading="lazy"></a>
          <a href="<?php echo $footer['instagram']; ?>" class="pl-4"><img src="assets/multimedia/icons/instagram.svg" alt="" loading="lazy"></a>
          <!-- <a href="<?php // echo $footer['linkedin']; ?>"><img src="assets/multimedia/icons/linkedin.svg" alt="" loading="lazy"></a> -->
        </div>
      </div>
      <div class="col-6 col-md-2 pt-4">
        <h4 class="footer-title text-center text-md-left">Enlaces</h4>
        <a href="#Top" class="btn px-0 footer-links text-center text-md-left">Inicio</a>
        <a href="noticias.php" class="btn px-0 footer-links text-center text-md-left">Noticias</a>
        <a href="contacto.php" class="btn px-0 footer-links text-center text-md-left">Contacto</a>
        <a href="unete.php" class="btn px-0 footer-links text-center text-md-left">Bolsa de trabajo</a>
      </div>
      <div class="col-6 col-md-2 pt-4">
        <h4 class="footer-title text-center text-md-left">Servicios</h4>
        <?php
            try {
              $sql = "SELECT * FROM lista_servicios";
              $resultado = $conexion->query($sql);
            } catch (Exception $e) {
              $error = $e->getMessage();
            }
            while($lista_servicios = $resultado->fetch_assoc() ){
          ?>
          <a href="<?php echo $lista_servicios['url']; ?>" class="btn px-0 footer-links text-center text-md-left"><?php echo $lista_servicios['nombre_servicio']; ?></a>
          <?php
            } 
          ?>
      </div>
      <div class="col-12 col-md-5 pt-4">
        <h4 class="footer-title text-center text-md-left">Contáctanos</h4>
        <a href="tel:+52<?php echo $footer['telefono']; ?>" class="btn px-0 footer-links text-center text-md-left"><img
            src="assets/multimedia/icons/telefono.svg" alt="" loading="lazy" class="pr-1"><?php echo $footer['telefono']; ?></a>
        <a href="mailto:<?php echo $footer['correo']; ?>" class="btn px-0 footer-links text-center text-md-left"><img
            src="assets/multimedia/icons/correo.svg" alt="" loading="lazy" class="pr-1"><?php echo $footer['correo']; ?></a>
        <a href="<?php echo $footer['direccion_url']; ?>" target="_blank"
          class="btn px-0 footer-links text-center text-md-left line-h"><img src="assets/multimedia/icons/ubicacion.svg"
            alt="" loading="lazy" class="pr-1"><?php echo $footer['direccion']; ?></a>
        <a href="https://wa.me/52<?php echo $footer['whats_num']; ?>?text=<?php echo $footer['whats_msj']; ?>" target="_blank"
          class="btn px-0 footer-links text-center text-md-left line-h"><img src="assets/multimedia/icons/whatsapp.svg"
            alt="" loading="lazy" class="pr-1"> <?php echo $footer['whats_titulo']; ?></a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">Copyright © 2021 <a href="#" class="btn p-0 footer-links d-inline">GBP Grupo
      Consultor</a> | Develop by <a href="https://nodosmx.com/" target="_blank"
      class="btn p-0 footer-links d-inline">NodosMx</a> | <a href="aviso-de-privacidad.html" target="_blank"
      class="btn p-0 footer-links d-inline"> Aviso de Privacidad</a>
  </div>
</footer>