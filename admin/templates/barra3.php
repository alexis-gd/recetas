<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-special">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <!-- <i class="fas fa-walking "></i> -->
            <i class="fas fa-cog"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Opciones</span>
            <div class="dropdown-divider"></div>
            <a href="editar-admin.php?id=<?php echo $_SESSION['id'];?>" class="dropdown-item">
              <i class="fas fa-user  mr-2"></i>Cuenta
            </a>
            <div class="dropdown-divider"></div>
            <a href="login.php?cerrar_sesion=true" class="dropdown-item">
              <i class="fas fa-sign-out-alt  mr-2"></i>Cerrar sesión
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->