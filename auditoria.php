  <?php
    include_once 'templates/head-conexion.php';
    include_once 'templates/head-servicios.php';
    include_once 'templates/head-top.html';
  ?>

    <title>GBP | <?php echo $banner['titulo']; ?></title>

  <?php
    include_once 'templates/head-bottom.php';
  ?>
    <link rel="stylesheet" href="assets/css/servicios.css?v=<?php echo $v;?>" />
</head>
<body>
  <!-- Header -->
  <?php
    include_once 'templates/nav-bar-azul.html';
    include_once 'templates/nav-bar.php';
  ?>
  <?php
    include_once 'templates/header-auditoria.php';
  ?>

  <!-- Nosotros -->
  <!-- <section class="container-fluid py-5 nosotros" id="Nosotros">
    <div class="container max-size pt-5" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="0"
      data-aos-easing="ease-in-out">
      <div class="row">
        <div class="col-12">
          <h2 class="titulo-t2">Plantea tu futuro</h2>
          <p class="nosotros-p"><i>"Te brindamos asesoria en seguros y ahorro para el futuro."</i></p>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Nuestros servicios -->
  <section class="container-fluid py-5 servicios" id="Servicios">
    <div class="row mx-0">
      <div class="container d-flex align-items-center flex-column py-5" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
        <h2 class="titulo">Nuestros servicios</h2>
      </div>

      <?php
        try {
        $sql_lss = "SELECT * FROM lista_servicios_servicios WHERE id_lista_servicio = '3' AND band_eliminar = 1";
        $res_lss = $conexion->query($sql_lss);
        while($lss = $res_lss->fetch_assoc()){ ?>

        <section class="col-12 col-md-4 py-4" id="Corporativos">
          <div class="container d-flex align-items-center flex-column justify-content-center h-100 subservicios" data-aos="fade-right"
            data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
            <h2 class="titulo"><?php echo $lss['nivel_1']; ?></h2>
            <!-- <img src="assets/multimedia/icons/serv-corporativos.svg" alt=""> -->
            <img src="admin/img/seccion_servicios/iconos/<?php echo $lss['icono']; ?>" alt="">
          </div>
        </section>
        <div class="col-12 col-md-8 py-4 align-self-end h-100">
          <div class="container max-size orilla" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
            data-aos-easing="ease-in-out">
            <?php
            try {
              
              $sql_lsss = "SELECT * FROM lista_servicios_servicios_sub WHERE id_lista_servicio = '3' AND id_lista_servicio_servicio = '$lss[id_lista_servicio_servicio]' AND band_eliminar = 1";
              $res_lsss = $conexion->query($sql_lsss);
              ?>
            <ul class="lista-servicios">
              <?php while($lsss = $res_lsss->fetch_assoc()){ ?>
              <?php if($lsss['nivel_2'] != ""): ?>
              <li>
                <font class="font-weight-bold"><?php echo $lsss['nivel_2']; ?></font>
                <?php
                  $sql_lsss2 = "SELECT id_lista_servicio_servicio_sub, parent_2, nivel_3 FROM lista_servicios_servicios_sub WHERE parent_2 = '$lsss[id_lista_servicio_servicio_sub]' AND band_eliminar = 1";
                  $res_lsss2 = $conexion->query($sql_lsss2);
                ?>
                <?php while($lsss2 = $res_lsss2->fetch_assoc()){ ?>
                <ul>
                  <li>
                    <?php echo $lsss2['nivel_3']; ?>
                  </li>
                  <?php
                    $sql_lsss3 = "SELECT id_lista_servicio_servicio_sub, nivel_4 FROM lista_servicios_servicios_sub WHERE parent_3 = '$lsss2[id_lista_servicio_servicio_sub]' AND band_eliminar = 1";
                    $res_lsss3 = $conexion->query($sql_lsss3);
                  ?>
                  <?php
                   if($res_lsss3->num_rows != 0):  
                  ?>
                  <a class="btn btn-special-2 my-3" data-toggle="collapse"
                    href="#sublist<?php echo $lsss2['id_lista_servicio_servicio_sub']; ?>" role="button"
                    aria-expanded="false" aria-controls="sublist">Ver más...</a>
                  <ul class="collapse multi-collapse"
                    id="sublist<?php echo $lsss2['id_lista_servicio_servicio_sub']; ?>">
                    <?php
                      while($lsss3 = $res_lsss3->fetch_assoc()){ 
                    ?>
                    <li><?php echo $lsss3['nivel_4']; ?></li>
                    <?php } ?>
                  </ul>
                  <?php endif; ?>
                </ul>
                <?php } ?>
              </li>
              <?php endif; ?>
              <?php } ?>
            </ul>

            <?php
              } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
              }
              ?>
          </div>
        </div>
        <?php }
      } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
      }
      ?>

    </div>
  </section>

  <!-- Paquetes -->
  <?php
    include_once 'templates/paquetes.php';
  ?>

  <!-- Aviso -->
  <section class="container-fluid py-5 aviso" id="Aviso">
    <div class="container d-flex align-items-center flex-column max-size pt-5" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
      <h2 class="titulo-t1 pt-3"><font class="titulo-t2">Más vale una auditoria oportuna y profesional a enfrentar un gran problema legal o fiscal.
</font></h2>
    </div>    
    <div class="container py-3 max-size">
      <div class="d-flex justify-content-center align-items-center">
        <a class="btn btn-special my-4" href="https://wa.me/52<?php echo $banner['num_boton']; ?>?text=<?php echo $banner['msj_boton']; ?>" target="_blank" >
          <?php echo $banner['txt_boton']; ?>
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';
  ?>

</body>

</html>