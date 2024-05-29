<?php
 require_once("../funciones.php");
if(isset($_COOKIE['email'])) {
  $email = $_COOKIE['email'];
  //obtengo nombre y apellidos de la base de datos para rellenarlo en los campos input
         $consulta ="SELECT * FROM usuarios WHERE email = '$email'";
         $resultado = ejecuta_SQL($consulta);
         foreach ($resultado as $row) {
             $nombre = $row['nombre'];
             $contraseña = $row['contraseña'];
             $apellido1 = $row['Primer_Apellido'];
             $apellido2 = $row['Segundo_Apellido'];
             $email = $row['email']; 
             $rol = $row['rol'];
      }
      
    }
    if($rol === '[ROLE_USER]'){
      header('Location: ../index.php');
    }
    
   ?> 
<!DOCTYPE html>
<html
  lang="es"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path=".../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin - Dulces y Eventos</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link href="../js/sweetalert2.min.css" rel="stylesheet">
    

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
         

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="indexadmin.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div id="Analytics">Panel de Control</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Cuentas</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div id="AdministrarCuenta">Administrar Cuenta</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="cuenta.php" class="menu-link">
                    <div id="Cuenta">Mi Cuenta</div>
                  </a>
                </li>
                
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div id="Administracion">Administración</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="clientes.php" class="menu-link" >
                    <div id="Clientes">Clientes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="adminregistrar.php" class="menu-link" >
                    <div id="Registrar">Registrar Usuario</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="adminproductos.php" class="menu-link" >
                    <div id="Producto">Productos</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="adminregistrarproducto.php" class="menu-link" >
                    <div id="Registrarproducto">Registrar Producto</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-notepad"></i>
                <div id="Administracion">Pedidos</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="adminpedidos.php" class="menu-link" >
                    <div id="Pedidos">Ver Facturas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="adminvercompras.php" class="menu-link" >
                    <div id="PedidosClientes">Ver Pedidos de Clientes</div>
                  </a>
                </li>
                
                
              </ul>
            </li>
          
            <!-- Components -->
     
            <!-- User interface -->
            

        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- Buscador -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- <li class="nav-item lh-1 me-3">
                  
                </li> -->

                <!-- Usuario -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $nombre;?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="cuenta.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mi Perfil</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Cerrar Sesión</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->