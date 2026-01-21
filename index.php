<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
        header('location:login.php');
        exit();
    }
    function rupiah($angka) {
        return 'Rp ' . number_format((float)$angka, 0, ',', '.');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <title>Bengkel</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-6 py-3 m-0" href="home.php" target="_blank">
        <img src="assets/img/logo.png" class="navbar-brand-img" width="26" height="26">
        <span class="ms-1 text-sm text-dark">29Garage</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="home.php">
            <i class="fas fa-home"></i>
            <span class="nav-link-text ms-3">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Otomotif</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="spareparts.php">
            <i class="fas fa-wrench"></i>
            <span class="nav-link-text ms-3">Sparepart</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="kendaraan.php">
            <i class="fas fa-car"></i>
            <span class="nav-link-text ms-3">Service Registration</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="service.php">
            <i class="fas fa-gear"></i>
            <span class="nav-link-text ms-3">Mechanical Service</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Lainnya</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="customer.php">
            <i class="fas fa-users"></i>
            <span class="nav-link-text ms-3">Customer</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="mekanik.php">
            <i class="fas fa-user-gear"></i>
            <span class="nav-link-text ms-3">Mechanical</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="transaksi.php">
            <i class="fas fa-cash-register"></i>
            <span class="nav-link-text ms-3">service transaction</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="logout.php">
            <i class="fas fa-right-from-bracket"></i>
            <span class="nav-link-text ms-3">Log out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
            <ul class="navbar-nav d-flex align-items-center justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="#" class="nav-link text-body font-weight-bold d-flex align-items-center">
                        <i class="fas fa-circle-user fa-2x me-2"></i>
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin'; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = { damping: '0.5' }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="assets/js/material-dashboard.min.js?v=3.2.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>