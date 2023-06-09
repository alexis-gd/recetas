<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->

  <a href="admin-area.php" class="brand-link">
    <img src="img/gbp3.svg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">GrupoGBP</span>
  </a>

  <!-- Sidebar -->

  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="image">
        <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <div class="info">
        <a href="#" class="d-block"><i class="fas fa-user-circle"></i> <?php echo ucwords ($_SESSION['nombre']);?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- seccion_servicios -->
        <!-- <li class="nav-item">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>
              Servicios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-servicios.php" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="crear-seccion_servicios.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li> -->

        <!-- Administradores -->

        <?php //if($_SESSION['nivel'] == 1): ?>

        <li class="nav-item">

          <a href="../widgets.html" class="nav-link">

            <i class="nav-icon fas fa-user-shield"></i>

            <p>

              Usuarios

              <i class="right fas fa-angle-left"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="lista-admin.php" class="nav-link">

                <i class="fas fa-clipboard-list nav-icon"></i>

                <p>Ver todos</p>

              </a>

            </li>

          </ul>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="crear-admin.php" class="nav-link">

                <i class="fas fa-plus-circle nav-icon"></i>

                <p>Agregar</p>

              </a>

            </li>

          </ul>

        </li>

        <?php //endif; ?>

        <!-- Seccion banner -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Página principal<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-banner.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Banner</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-nosotros.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Nosotros</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-servicios.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Servicios</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-servicios.php" class="nav-link">
                <i class="fas fa-chevron-right nav-icon"></i>
                <p>Lista de Servicios</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-clientes.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-clientes-sector.php" class="nav-link">
                <i class="fas fa-chevron-right nav-icon"></i>
                <p>Lista Clientes Sector</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-clientes-logos.php" class="nav-link">
                <i class="fas fa-chevron-right nav-icon"></i>
                <p>Lista Clientes Logos</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-footer.php" class="nav-link">
                <i class="fas fa-info-circle nav-icon"></i>
                <p>Pie de página</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Seccion Servicios -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Servicios<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-servicios-header.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Banner</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-servicios-servicios.php" class="nav-link">
                <i class="far fa-image nav-icon"></i>
                <p>Servicios</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Seccion Noticias -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Noticias<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-noticias.php" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Ver todas</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="crear-seccion-noticias.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Seccion Contacto -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Contacto<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="contacto.php?tc" class="nav-link">
                <i class="nav-icon fa fa-envelope"></i>
                <p>Búzon</p>
              </a>
            </li>       
          </ul>
        </li>            

        <!-- Seccion Bolsa de trabajo -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Bolsa de trabajo<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="bolsa-trabajo.php?tbt" class="nav-link">
                <i class="nav-icon fa fa-envelope"></i>
                <p>Búzon</p>
              </a>
            </li>          
          </ul>
        </li>

        <!-- Seccion Alianzas -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>Alianzas<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-seccion-alianzas-logos.php" class="nav-link">
                <i class="fas fa-chevron-right nav-icon"></i>
                <p>Lista Alianzas Logos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="alianzas.php?alia" class="nav-link">
                <i class="nav-icon fa fa-envelope"></i>
                <p>Búzon</p>
              </a>
            </li>            
          </ul>
        </li>        

      </ul>

    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>