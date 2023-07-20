<?php
$baseUrl = 'http://localhost/admin/admin';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/admin.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/admincontr.php';


    $login = new logincontr($username, $password);
    $login->loginadmin();

    header("location: login.php?error=none");
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo $baseUrl; ?>/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="login.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?php echo $baseUrl; ?>/assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <form action="<?php echo $baseUrl; ?>/views/admin/login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="form-check">
      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
      <label class="form-check-label text-dark" for="flexCheckChecked">
        Remember this Device
      </label>
    </div>
    <a href="#" class="text-primary fw-bold">Forgot Password?</a>
  </div>
  <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo $baseUrl; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>