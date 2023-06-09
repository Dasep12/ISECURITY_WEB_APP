
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>I - SECURITY</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>main.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/new/css/')?>style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/')?>logo2.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="<?php echo base_url('assets/img/')?>logo2.png" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action=<?= base_url('Login/cekLogin')?> method="POST">
                  <div class="form-group">
                    <input type="text" name="user" class="form-control form-control-lg" id="user" placeholder="NPK">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium">L O G I N</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black" style="text-decoration:none;">Lupa password?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Belum Memiliki Akun? <a href="#" class="text-primary" style="text-decoration:none;">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('assets/new/js/')?>vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/new/js/')?>off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/new/js/')?>template.js"></script>
  <script src="<?= base_url('assets/new/js/')?>settings.js"></script>
  <script src="<?= base_url('assets/new/js/')?>todolist.js"></script>
  <!-- endinject -->
</body>


</html>
