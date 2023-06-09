<?php
 include_once 'templates/head-conexion.php';
 include_once 'templates/head-top.html';
?>

<title>GBP | Inicio</title>

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
  include_once 'templates/header-unete.php';
?>

  <!-- Unete -->
  <section class="container py-5">
    <form id="form_bt">
      <div class="row justify-content-center pt-3">
        <div class="col-10 col-sm-10 col-md-6">
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Su nombre</label>
            <div class="col-sm-8">
              <input type="text" name="nombre_bt" class="form-control" placeholder="Nombre(s) Apellido Apellido">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Número de teléfono</label>
            <div class="col-sm-8">
              <input type="tel" name="telefono_bt" class="form-control" placeholder="6699134985" maxlength="10">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Correo electrónico</label>
            <div class="col-sm-8">
              <input type="email" name="correo_bt" class="form-control" placeholder="contacto@grupogbp.mx">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Puesto Solicitado</label>
            <div class="col-sm-8">
              <input type="text" name="puesto_bt" class="form-control" placeholder="Auxiliar contable">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">C.V. o Solicitud con Fotografía</label>
            <div class="col-sm-8">
              <div class="custom-file text-center">
                <input type="file" name="curriculum_bt" class="custom-file-input" id="curriculum" lang="es"  accept="application/pdf">
                <label class="custom-file-label texto-largo" for="curriculum" data-browse="Elegir">Seleccionar Archivo PDF</label>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none d-md-block col-md-6 align-self-start text-center">
          <img src="assets/multimedia/images/equipo.png" class="w-special"
            alt="Socios con grandes piezas de rompecabezas" loading="lazy">
        </div>
        <div class="col-10 col-sm-6 my-2">        
          <button type="submit" class="btn btn-special-common" id="submit_bt">Enviar Solicitud</button>
        </div>
      </div>
    </form>
  </section>


  <!-- Footer -->
  <?php
 include_once 'templates/footer.php';
 include_once 'templates/footer-scripts.php';
?>
  <script src="assets/js/bolsa_trabajo.js?v=<?php echo $v;?>"></script>
</body>

</html>