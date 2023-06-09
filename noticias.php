<?php
    include_once 'templates/head-conexion.php';
    include_once 'templates/head-top.html';
  ?>

  <title>GBP | Noticias</title>

  <?php
    include_once 'templates/head-bottom.php';
  ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
  <link rel="stylesheet" href="assets/css/servicios.css?v=<?php echo $v;?>" />
  </head>

  <body>
    <!-- Header -->
    <?php
    include_once 'templates/nav-bar-azul.html';
    include_once 'templates/nav-bar.php';
  ?>
    <?php
    include_once 'templates/header-noticias.php';
    include_once 'functions/timeParse.php';
    // include_once 'functions/Parsedown.php';
    // $Parsedown = new Parsedown();
  ?>

  <!-- Noticias y blog -->
  <section class="container-fluid py-5 noticias" id="Noticias">
    <div class="container max-size py-5">
      <div class="row" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
        <div class="col-12 col-md-8">
          <p class="etiqueta"><i class="linea"></i>Artículos importantes<i class="linea"></i></p>
          <h2 class="titulo2">Últimas noticias y blog</h2>
        </div>
        <!-- <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-end position-static pt-3">
          <button class="btn btn-special"><span>Saber más</span></button>
        </div> -->
      </div>
      <!-- <div class="card-deck- py-5" > -->
        <div class="row row-cols-1 row-cols-md-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0" data-aos-easing="ease-in-out">
      <!-- <div class="card-deck py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0"
        data-aos-easing="ease-in-out"> -->

        <?php
          try {

            if( !empty($_REQUEST["pag"]) ){ $_REQUEST["pag"] = $_REQUEST["pag"];}else{ $_REQUEST["pag"] = '1'; }
            if( $_REQUEST["pag"] == "" ){ $_REQUEST["pag"] = "1"; }

            $sql_noticias_c = "SELECT ln.id_noticia, ln.titulo, ln.subtitulo, ln.descripcion, a.nombre as nombre_autor, ln.url_imagen, ln.editado FROM lista_noticias AS ln LEFT JOIN admins AS a ON ln.autor = a.id_admin WHERE ln.band_eliminar = 1";
            $res_noticias_c = $conexion->query($sql_noticias_c);
            $num_registros = mysqli_num_rows($res_noticias_c);

            $registros = '3';
            $pagina = $_REQUEST["pag"];
            if ( is_numeric($pagina) ) { $inicio = (( $pagina - 1 ) * $registros); }else{ $inicio = 0; }
            
            $sql_noticias = 
            "SELECT ln.id_noticia, ln.titulo, ln.subtitulo, ln.descripcion, a.nombre as nombre_autor, ln.url_imagen, ln.editado 
            FROM lista_noticias AS ln 
            LEFT JOIN admins AS a ON ln.autor = a.id_admin 
            WHERE ln.band_eliminar = 1 
            LIMIT $inicio, $registros";

            $paginas=ceil( $num_registros/$registros );
            $res_noticias = $conexion->query($sql_noticias);

            while($noticias = $res_noticias->fetch_assoc()){ ?>

              <div class="card card-noticias py-4 px-3">
                <div class="card-noticias-img sombra-card">
                  <img src="admin/img/noticias/<?php echo $noticias['url_imagen']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body card-body-noticias mt-2 sombra-card">[<?php echo $noticias['id_noticia']; ?>]
                  <h4 class="card-title text-uppercase card-date"><img class="card-img-calendario mr-2"
                      src="assets/multimedia/icons/calendario.svg" alt=""><?php echo paseTimeNoticias($noticias['editado']);?></h4>
                  <h5 class="card-title"><?php echo $noticias['titulo']; ?></h5>
                  <p class="card-text card-contenido"><?php echo $noticias['subtitulo'];?></p>
                  <p class="publicado_por">Publicado por: <b><?php echo $noticias['nombre_autor'];?></b></p>
                  <!-- <p class="card-text card-contenido"><?php //echo  Parsedown::instance()->text($noticias['descripcion']);?></p> -->
                  <a href="leer_noticia.php?post=<?php echo $noticias['id_noticia']; ?>" class="btn btn-mas px-0">Leer más <img src="assets/multimedia/icons/arrow2.svg" width="18"alt=""></a>
                </div>
              </div>

      <?php 
            }
          } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
          }
      ?> 

              <div class="container-fluid col-12">
                  <ul class="pagination justify-content-center pb-5 pt-5 mb-0">
                      <li class="page-item">
                      <?php
                        if( $_REQUEST["pag"] == "1" ){
                          $_REQUEST["pag"] == "0";
                        }else{
                          if ( $pagina > 1 ){
                            $ant = $_REQUEST["pag"] - 1;
                            echo "<a class='page-link' aria-label='Previous' href='noticias.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
                            echo "<li class='page-item '><a class='page-link' href='noticias.php?pag=". ( $pagina - 1 ) ."' >" . $ant . "</a></li>"; 
                          }
                        }

                        echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["pag"]."</a></li>"; 
                        $sigui = $_REQUEST["pag"] + 1;
                        $ultima = $num_registros / $registros;

                        if ( $ultima == $_REQUEST["pag"] + 1 ){ $ultima == ""; }
                        if ( $pagina < $paginas && $paginas > 1 ){ echo "<li class='page-item'><a class='page-link' href='noticias.php?pag=". ( $pagina + 1 ) . "'>" . $sigui . "</a></li>"; }
                        if ( $pagina < $paginas && $paginas > 1 ){ echo "<li class='page-item'><a class='page-link' aria-label='Next' href='noticias.php?pag=" . ceil( $ultima ) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>"; }
                      ?>
                  </ul>
              </div>
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