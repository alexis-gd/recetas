<?php
 include_once 'templates/head-conexion.php';
 include_once 'templates/head-top.html';
?>

<title>GBP | Alianzas</title>

<?php
 include_once 'templates/head-bottom.php';
?>
<link rel="stylesheet" href="assets/css/servicios.css?v=<?php echo $v;?>" />
<script src="https://kit.fontawesome.com/83065bad8f.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gris">
  <!-- Header -->
  <?php
  include_once 'templates/nav-bar-blanco.html';
  include_once 'templates/nav-bar.php';
?>
  <?php
  include_once 'templates/header-alianzas.php';
?>

  <!-- Alianzas -->
  <div class="container-fluid pt-5 pb-5 bg-white" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
      data-aos-easing="ease-in-out">
      <div class="container">
        <h5 class="font-weight-bold text-center">En GBP GRUPO CONSULTOR nos importa el fortalecimiento de tu negocio. Por
          eso, nos aliamos con algunas de las empresas más importantes del país para ofrecerte herramientas y beneficios
          exclusivos que puedan potencializar tu crecimiento.</h5>
      
        <div class="carousel js-flickity">
          <?php
            try {
              $sql = "SELECT * FROM lista_alianzas_logos WHERE band_eliminar = 1";
              $resultado = $conexion->query($sql);
            } catch (Exception $e) {
              $error = $e->getMessage();
            }
            while($lista_alianzas_logos = $resultado->fetch_assoc() ){
              if ($lista_alianzas_logos['url_logo'] != "") {                      
          ?>
          <a href="<?php echo $lista_alianzas_logos['url_cliente']; ?>" class="a-carousel" target="_blank">
            <img class="carousel-cell" data-flickity-lazyload="admin/img/seccion_alianzas_logos/<?php echo $lista_alianzas_logos['url_logo']; ?>" alt="<?php echo $lista_alianzas_logos['seo']; ?>" loading="lazy">
          </a>
          <?php } } ?>

        </div>
      </div>
    </div>


  <!-- Unete -->
  <section class="container py-5">
    <div class="container text-center pt-3 pb-4">
      <h2 class="font-weight-bold">Seamos aliados</h2>
      <h5 class="font-weight-bold">Buscamos empresas con las que podamos colaborar mutuamente con el fin de generar
        valor agregado para nuestros
        clientes y potencializar su crecimiento.</h5>
    </div>
    <form id="form_alianzas">
      <div class="row justify-content-center pt-3">
        <div class="col-10 col-sm-10 col-md-6">
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Nombre de la empresa:</label>
            <div class="col-sm-8">
            <input type="text" name="empresa_alianzas" class="form-control" placeholder="GBP Grupo Consultor"
                  maxlength="50">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Nombre:</label>
            <div class="col-sm-8">
            <input type="text" name="nombre_alianzas" class="form-control" placeholder="Nombre(s) Apellido Apellido"
                  maxlength="50">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Número de teléfono:</label>
            <div class="col-sm-8">
            <input type="tel" type="" name="telefono_alianzas" class="form-control" placeholder="6691230000"
                  maxlength="10">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Correo electrónico:</label>
            <div class="col-sm-8">
            <input type="email" name="correo_alianzas" class="form-control"
                  placeholder="contacto@quanticcapital.com.mx">
            </div>
          </div>
        </div>
        <div class="d-none d-md-block col-md-6 align-self-start text-center">
          <img src="assets/multimedia/images/alianzas.png" class="w-100 opacidad-img "
            alt="Alianzas para mejorar" loading="lazy">
        </div>
        <div class="col-10 col-sm-6 my-2">        
          <button type="submit" class="btn btn-special-common" id="submit_alianzas">Enviar</button>
        </div>
      </div>
    </form>
  </section>


  <!-- Footer -->
  <?php
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';
  ?>
  
  <script src="assets/js/flickity.pkgd.min.js"></script>
  <script src="assets/js/alianzas.js?v=<?php echo $v;?>"></script>
</body>

</html>