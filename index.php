  <?php
    include_once 'templates/head-conexion.php';
    include_once 'templates/head-top.html';
  ?>

    <title><?php echo $marca['nombre']; ?></title>

  <?php
    include_once 'templates/head-bottom.php';
  ?>

</head>
<body>
  <!-- Header -->
  <?php
    include_once 'templates/nav-bar-azul.html';
    include_once 'templates/nav-bar.php';
  ?>
  <?php
    include_once 'templates/header-index.php';
    ?>

<!-- Nosotros -->
  <?php 
    $nombre_archivo = $nosotros['img_bg_url'];
    $formato = explode('.', $nosotros['img_bg_url']);
  ?>
  <!-- <section class="container-fluid py-5 nosotros nosotros-index" id="Somos" style="background-image: url(admin/img/banner/<?php echo $nosotros['img_bg_url']; ?>);"> -->
  <section class="container-fluid py-5 nosotros nosotros-index" id="Somos">
  <?php if ($formato[1] != "jpg" || $formato[1] != "jpeg" || $formato[1] != "png") { ?>
      <video id="background-video" autoplay loop muted poster="admin/img/banner/deafult.jpg">
        <source src="admin/img/banner/<?php echo $nosotros['img_bg_url']; ?>" type="video/mp4">
      </video>
    <?php } else{ ?>
      <video id="background-video" poster="admin/img/banner/<?php echo $nosotros['img_bg_url']; ?>"></video>
    <?php } ?>
    <div class="container max-size pt-5 nosotros-box-text" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="0"
      data-aos-easing="ease-in-out">
      <div class="row">
        <div class="col-12 text-center">
          <p class="etiqueta text-white sombra-texto"><i class="linea bg-white sombra-texto"></i><?php echo $nosotros['seccion']; ?></p>
          <h2 class="titulo2 text-white sombra-texto"><?php echo $nosotros['titulo']; ?></h2>
          <p class="nosotros-p text-white sombra-texto"><?php echo $nosotros['subtitulo']; ?></p>
        </div>
        <!-- <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-end position-static">
          <a href="<?php // echo $nosotros['boton_link']; ?>" class="btn btn-special" value="2"><span><?php // echo $nosotros['boton_text']; ?></span></a>
        </div> -->
      </div>
    </div>

  </section>

  <!-- Servicios -->
  <section class="container-fluid py-5 servicios" id="Servicios">
    <div class="container d-flex align-items-center flex-column pt-5" data-aos="fade-down" data-aos-duration="1000"
      data-aos-delay="0" data-aos-easing="ease-in-out">
      <p class="etiqueta"><i class="linea"></i><?php echo $servicios['seccion']; ?><i class="linea"></i></p>
      <h2 class="titulo-t1"><?php echo $servicios['titulo']; ?></h2>
    </div>
    <div class="container py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
      data-aos-easing="ease-in-out">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">        
      <?php
        try {
          $sql = "SELECT * FROM lista_servicios";
          $resultado = $conexion->query($sql);
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        while($lista_servicios = $resultado->fetch_assoc() ){
      ?>
        <div class="col d-flex justify-content-around px-1">
          <a href="<?php echo $lista_servicios['url']; ?>">
            <div class="servicios-card-icon">
              <img src="admin/img/seccion_servicios/<?php echo $lista_servicios['url_imagen']; ?>" alt="servicio-contabilidad" loading="lazy">
              <div class="servicios-frame"></div>
              <div class="servicios-frame2"></div>
              <div class="servicios-text">
                <img src="assets/multimedia/icons/arrow.svg" alt="" loading="lazy">
                <h3><?php echo $lista_servicios['nombre_servicio']; ?></h3>
                <span><?php echo $lista_servicios['descripcion']; ?></span>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="container max-size">
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h2 class="titulo2"><?php echo $servicios['subtitulo']; ?></h2 class="titulo">
        <a class="btn btn-special my-4" data-toggle="collapse" href="#paquetes" role="button" aria-expanded="false"
          aria-controls="paquetes"><?php echo $servicios['boton_text']; ?> 
        </a>
      </div>

      <!-- Conoce nuestros paquetes -->
      <div class="collapse py-2" id="paquetes">
        <div class="card card-body ">
        <img src="admin/img/banner/<?php echo $servicios['url_archivo']; ?>" alt="" loading="lazy">
          <!-- <embed id="paquetesEmbed" src="admin/img/banner/<?php echo $servicios['url_archivo']; ?>#scrollbar=0&toolbar=1&view=Fit,100"
            type="application/pdf" frameborder="0" height="400"> -->
        </div>
      </div>
    </div>
  </section>
  
  <!-- Clientes -->
  <section class="container-fluid py-3 clientes" id="Clientes">
    <div class="container d-flex align-items-center flex-column max-size" data-aos="fade-down" data-aos-duration="1000"
      data-aos-delay="0" data-aos-easing="ease-in-out">
      <h2 class="titulo py-3">Nuestros clientes</h2>
    </div>
    <div class="container" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
      <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 py-4 text-left">
      <?php
        try {
          $sql = "SELECT * FROM lista_clientes_sector WHERE band_eliminar = 1";
          $resultado = $conexion->query($sql);
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        while($lista_clientes_sector = $resultado->fetch_assoc() ){
          if ($lista_clientes_sector['sector'] != "") {                      
      ?>
        <div class="col py-2">
          <span class="clientes-sector"><?php echo $lista_clientes_sector['sector']; ?></span>
        </div>
      <?php } } ?>
      </div>    
    
    </div>
    <div class="container pb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
      data-aos-easing="ease-in-out">
      <div class="carousel js-flickity">
      <?php
        try {
          $sql = "SELECT * FROM lista_clientes_logos WHERE band_eliminar = 1";
          $resultado = $conexion->query($sql);
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        while($lista_clientes_logos = $resultado->fetch_assoc() ){
          if ($lista_clientes_logos['url_logo'] != "") {                      
      ?>
        <img class="carousel-cell" data-flickity-lazyload="admin/img/seccion_clientes_logos/<?php echo $lista_clientes_logos['url_logo']; ?>" alt="<?php echo $lista_clientes_logos['seo']; ?>" loading="lazy">
      <?php } } ?>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';
  ?>
  <script src="assets/js/flickity.pkgd.min.js"></script>
  <script src="assets/js/index.js?v=<?php echo $v;?>"></script>
</body>

</html>