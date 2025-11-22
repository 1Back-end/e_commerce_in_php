<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo strtoupper(ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));?></title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../vendors/css/styles.min.css" />
</head>

<body>

  <?php include("../authentification/session_users.php")?>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          
        </a>

        
      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <div class="d-flex align-items-center justify-content-center gap-2">
          <div class="dropdown d-flex">
            <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
              data-bs-toggle="dropdown" aria-expanded="false">
            </a>
          </div>
        </div>
      </div>

    </div>
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="../admin/dashboard.php" class="text-nowrap logo-img">
            <img src="../vendors/images/logos/logo.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/dashboard.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/category.php" aria-expanded="false">
              <i class="fa-solid fa-list"></i>
                <span class="hide-menu">Categories</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/product.php" aria-expanded="false">
              <i class="fa-brands fa-product-hunt"></i>
                <span class="hide-menu">Produits</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/order.php" aria-expanded="false">
              <i class="fa-solid fa-cart-shopping"></i>
                <span class="hide-menu">Commandes</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/payment.php" aria-expanded="false">
              <i class="fa-solid fa-coins"></i>
                <span class="hide-menu">Paiements</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../admin/users.php" aria-expanded="false">
              <i class="fa-solid fa-users"></i>
                <span class="hide-menu">Utilisateurs</span>
              </a>
            </li>



            <li class="sidebar-item">
              <a class="sidebar-link" href="../index.php" aria-expanded="false">
              <i class="fa-solid fa-backward"></i>
                <span class="hide-menu">Retour</span>
              </a>
            </li>

            
            
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../vendors/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
            
                    <a href="../authentification/logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- <div class="body-wrapper-inner">
    <div class="container-fluid">
          
           ghklmj
                
    </div>
    </div> -->
            
  <script src="../vendors/libs/jquery/dist/jquery.min.js"></script>
  <script src="../vendors/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/js/sidebarmenu.js"></script>
  <script src="../vendors/js/app.min.js"></script>
  <script src="../vendors/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../vendors/libs/simplebar/dist/simplebar.js"></script>
  <script src="../vendors/js/dashboard.js"></script>
  <script src="../vendors/js/main.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>