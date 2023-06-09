<?php
    include_once 'templates/head-conexion.php';
    include_once 'templates/head-top.html';
    $id_noticia = $_GET['post'];
    if (!filter_var($id_noticia, FILTER_VALIDATE_INT)) {
      header("location:noticias.php");
    }
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
    include_once 'templates/nav-bar-azul-sticky.html';
    include_once 'templates/nav-bar.php';
  ?>
    <?php
    include_once 'templates/header-leer-noticias.php';
    include_once 'functions/timeParse.php';
    include_once 'functions/Parsedown.php';
    $Parsedown = new Parsedown();
  ?>

  <!-- Noticias y blog -->
  <section class="container py-4">
      <?php
      try {
        $sql_noticias = "SELECT ln.id_noticia, ln.titulo, ln.subtitulo, ln.descripcion, a.nombre as nombre_autor, e.nombre as nombre_editor, ln.url_imagen, ln.creado, ln.editado FROM lista_noticias AS ln LEFT JOIN admins AS a ON ln.autor = a.id_admin LEFT JOIN admins AS e ON ln.editor = e.id_admin WHERE id_noticia = '$id_noticia' AND ln.band_eliminar = 1";
        $res_noticias = $conexion->query($sql_noticias);
        while($noticias = $res_noticias->fetch_assoc()){ ?>
    
          <div class="leer">
            <h4 class="card-date"><img class="card-img-calendario mr-2" src="assets/multimedia/icons/calendario.svg" alt="">Última vez: <?php echo paseTimeNoticias($noticias['editado']);?></h4>
            <h1 class="leer-titulo"><?php echo $noticias['titulo']; ?></h1>
            <hr>
            <p class="leer-subtitulo"><?php echo $noticias['subtitulo'];?></p>
            <div class="leer-img"><img src="admin/img/noticias/<?php echo $noticias['url_imagen']; ?>" alt="<?php echo $noticias['titulo']; ?>" loading="lazy"></div>
            <div class="pt-2 pb-4">
              <span class="publicado_por">Publicado por: <b><?php echo $noticias['nombre_autor'];?></b> </b> Creado: <b><?php echo paseTimeNoticias($noticias['creado']);?></b></span>
              <span class="publicado_por">Editado por: <b><?php echo $noticias['nombre_editor'];?></span>
            </div>
            <p class=""><?php echo  Parsedown::instance()->text($noticias['descripcion']);?></p>
          </div>

      <?php }
        } catch (Exception $e) {
          echo "Error: ".$e->getMessage();
        }
      ?> 
  </section>

    <!-- Footer -->
    <?php
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';
  ?>
</body>

  </html>