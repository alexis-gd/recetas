<header class="container-fluid header-legales"
  style="background-image: url(admin/img/servicios/header/<?php echo $banner['url_imagen']; ?>);">
  <div class="header-container-legales h-100 d-flex flex-column justify-content-center text-center">
    <div class="container" data-aos="fade-down">
      <h1 class="header-h1"><?php echo $banner['titulo']; ?></h1>
      <p class="nosotros-p"><?php echo $banner['descripcion']; ?></p>
      <a id="whatsapp"
        href="https://wa.me/52<?php echo $banner['num_boton']; ?>?text=<?php echo $banner['msj_boton']; ?>"
        target="_blank" class="btn btn-special my-4 my-sm-5"><span><?php echo $banner['txt_boton']; ?></span></a>
    </div>
  </div>
</header>