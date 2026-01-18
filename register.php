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
  <style>
    .form-label {
      font-weight: bold;
    }

    .error-message {
      color: red;
      text-align: center;
    }

    .success-message {
      color: green;
      text-align: center;
    }

    .modal-body form input {
      margin-bottom: 10px;
    }

    /* New styling to center the title in the modal */
    .modal-header .modal-title {
      font-weight: bold;
      text-align: center;
      width: 100%;
    }
  </style>
</head>

<body class="bg-gray-200">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                </div>
              </div>
              <div class="card-body">
                <form action="prosesregis.php" method="POST" id="registerForm">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="uname" class="form-control" required id="username">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required id="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="regis">Register</button>
                  </div>
                  <p class="text-center p-2">Sudah Punya Akun? <a href="login.php"><b>Login</b></a></p>
                  <p class="text-center p-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#changeAccountModal"><b>Pengaturan Akun</b></a>
                  </p>
                  <p id="error-message" class="text-center text-danger"></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal for Change Account -->
  <div class="modal fade" id="changeAccountModal" tabindex="-1" aria-labelledby="changeAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-dark">
          <h5 class="modal-title text-white font-weight-bolder" id="changeAccountModalLabel">Ganti Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="setting_account.php" method="POST" id="changeAccountForm">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Username</label>
              <input type="text" name="old_username" class="form-control" required id="old_username">
            </div>
            <div class="input-group input-group-outline mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="old_password" class="form-control" required id="old_password">
            </div>
            <div class="input-group input-group-outline mb-3">
              <label class="form-label">Username Baru</label>
              <input type="text" name="new_username" class="form-control" required id="new_username">
            </div>
            <div class="input-group input-group-outline mb-3">
              <label class="form-label">Password Baru</label>
              <input type="password" name="new_password" class="form-control" required id="new_password">
            </div>
            <div class="input-group input-group-outline mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" name="confirm_password" class="form-control" required id="confirm_password">
            </div>
            <div class="text-center">
              <button type="submit" name="update_account" class="btn bg-gradient-dark w-100 my-4 mb-2" id="updateAccountButton">Perbarui Akun</button>
            </div>
            <p id="timeErrorMessage" class="text-center text-danger"></p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/material-dashboard.min.js?v=3.2.0"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const updateButton = document.getElementById('updateAccountButton');
      const timeErrorMessage = document.getElementById('timeErrorMessage');

      // Get the last update time from localStorage
      const lastUpdate = localStorage.getItem('lastUpdate');
      const currentTime = Date.now();

      console.log("Last update: " + lastUpdate); // Log the stored time
      console.log("Current time: " + currentTime); // Log the current time

      // Check if it's been more than 60 seconds since the last update
      if (lastUpdate && currentTime - lastUpdate < 30000) {
        let remainingTime = Math.ceil((30000 - (currentTime - lastUpdate)) / 1000);
        timeErrorMessage.textContent = `Anda Dapat Memperbarui Akun Anda Dalam ${remainingTime} Detik.`;
        updateButton.disabled = true;

        // Set an interval to update the countdown
        const countdownInterval = setInterval(function () {
          remainingTime--;
          timeErrorMessage.textContent = `Anda Dapat Memperbarui Akun Anda Dalam ${remainingTime} Detik.`;

          if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            timeErrorMessage.textContent = '';
            updateButton.disabled = false;
          }
        }, 1000);
      } else {
        timeErrorMessage.textContent = '';
        updateButton.disabled = false;
      }

      // When the user submits the form, update the last update time
      document.getElementById('changeAccountForm').addEventListener('submit', function () {
        localStorage.setItem('lastUpdate', Date.now());
      });
    });
  </script>
</body>

</html>
