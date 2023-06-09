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
  include_once 'templates/header-contacto.php';
?>

  <!-- Contacto -->
  <section class="container py-5">
    <form id="form_contacto">
      <div class="row justify-content-center pt-3">
        <div class="col-10 col-sm-10 col-md-6">
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Su nombre</label>
            <div class="col-sm-8">
              <input type="text" name="nombre_contacto" class="form-control" placeholder="Nombre(s) Apellido Apellido">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Número de teléfono</label>
            <div class="col-sm-8">
              <input type="tel" type="" name="telefono_contacto" class="form-control" placeholder="6699134985"
                maxlength="10">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Correo electrónico</label>
            <div class="col-sm-8">
              <input type="email" name="correo_contacto" class="form-control" placeholder="contacto@grupogbp.mx">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Su compañía</label>
            <div class="col-sm-8">
              <input type="text" name="compania_contacto" class="form-control" placeholder="GBP Grupo Consultor">
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Servicio de interés</label>
            <div class="col-sm-8">
              <select name="servicio_contacto" class="form-control">
                <option value="">Seleccione un Servicio</option>
                <option value="1">Servicios Contables</option>
                <option value="2">Nóminas</option>
                <option value="3">Auditoría</option>
                <option value="4">Consultoría Fiscal</option>
                <option value="5">Asesoría Legal</option>
                <option value="6">Patrimonial</option>
              </select>
            </div>
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-4 col-form-label font-weight-bold">Comentarios</label>
            <div class="col-sm-8">
              <textarea name="comentarios_contacto" class="form-control" placeholder="¡Cuéntanos tus dudas!"
                maxlength="500"></textarea>
            </div>
          </div>
        </div>
        <div class="d-none d-md-block col-md-6 align-self-end text-center">
          <img src="assets/multimedia/images/contacto.png" class="w-100 opacidad-img "
            alt="Personas Ateniendo Call Center" loading="lazy">
        </div>
        <div class="col-10 col-sm-6 my-2">
          <button type="submit" class="btn btn-special-common" id="submit_contacto">Solicitar Consulta</button>
        </div>
      </div>
    </form>
  </section>


  <!-- Footer -->
  <?php
 include_once 'templates/footer.php';
 include_once 'templates/footer-scripts.php';
?>
  <script src="assets/js/contacto.js?v=<?php echo $v;?>"></script>
</body>

</html>