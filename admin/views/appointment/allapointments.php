<?php
$baseUrl = 'http://localhost/admin/admin';
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
    <!-- Sidebar Start -->
    <?php include 'C:\xampp\htdocs\admin\admin\includes\leftsidebar.php'; ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php include 'C:\xampp\htdocs\admin\admin\includes\header.php'; ?>

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
                <h5 class="card-title fw-semibold mb-4">All Appointements</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Patient Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Patient Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Doctor Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Probleme</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Date</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                       require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/appointment.php';
                       $appointement = new Appointement();
                       $allAppointements = $appointement->getAllAppointements();
                       foreach($allAppointements as $appointements){
                        ?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo $appointements->getappointementid(); ?></h6></td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $appointements->getpatientname(); ?></p>
                        </td>

                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $appointements->getpatientemail(); ?></p>
                        </td>

                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $appointements->getdoctorname(); ?></p>
                        </td>

                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $appointements->getprobleme(); ?></p>
                        </td>

                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $appointements->getdateappointement()."/". $appointements->gettimeappointement() ; ?></p>
                        </td>
                      </tr> 
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by Mohamed & Hamza</p>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo $baseUrl; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/sidebarmenu.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/app.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/dashboard.js"></script>
</body>

</html>