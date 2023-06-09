<div class="container">
  <a class="navbar-brand p-0 m-auto" href="./">
    <img src="assets/multimedia/logos/<?php echo $marca['logotipo']; ?>" height="105" alt="logitopo logo gbp" loading="lazy">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu" aria-controls="navMenu"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navMenu">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 w-100 justify-content-end">
      <li class="nav-item active">
        <a class="nav-link" href="./">Inicio</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="servicios" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu" aria-labelledby="navMenu">          
          <?php
            try {
              $sql = "SELECT * FROM lista_servicios";
              $resultado = $conexion->query($sql);
            } catch (Exception $e) {
              $error = $e->getMessage();
            }
            while($lista_servicios = $resultado->fetch_assoc() ){
          ?>
          <a class="dropdown-item" href="<?php echo $lista_servicios['url']; ?>"><?php echo $lista_servicios['nombre_servicio']; ?></a>
          <?php
            } 
          ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="noticias.php">Noticias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="unete.php">Bolsa de trabajo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alianzas.php">Alianzas</a>
      </li>
    </ul>
  </div>
</div>
</nav>