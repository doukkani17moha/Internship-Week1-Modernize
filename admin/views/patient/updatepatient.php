<?php
$baseUrl = 'http://localhost/admin/admin';
if (isset($_POST['submit'])) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/patientcontr.php';

    $patient_id = $_GET['patientid'];

    $a = new Patientcontr();

    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor_id = $_POST['doctor'];
    $adress = $_POST['address'];
    $probleme = $_POST['Probleme'];

    $a->updatePatient($name, $lastname, $email, $adress, $phone, $probleme, $doctor_id, $patient_id);

  
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
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php include 'C:\xampp\htdocs\admin\admin\includes\leftsidebar.php'; ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php include 'C:\xampp\htdocs\admin\admin\includes\header.php'; ?>

      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Update patient</h5>
              <div class="card">
                <div class="card-body">


                  <form method="post">
                  <?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/patientcontr.php';
 $patient_id = $_GET['patientid'];

$a = new Patientcontr();
$patientData = $a->getpatientbyid($patient_id);

if (!empty($patientData)) {
    $patient = $patientData[0];

    ?>
    <div class="mb-3">
        <label for="first_patient" class="form-label">First name</label>
        <input type="text" class="form-control" id="firstname" aria-describedby="name" name="firstname" value="<?php echo $patient->getpatientname(); ?>">
        <div class="form-text">Take your time, please don't make a mistake.</div>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last name</label>
        <input type="text" class="form-control" id="lastname" aria-describedby="lastname" name="lastname" value="<?php echo $patient->getpatientlastname(); ?>">
        <div class="form-text">Take your time, please don't make a mistake.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $patient->getpatientemail(); ?>">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" class="form-control" id="phone" aria-describedby="phone" name="phone" value="<?php echo $patient->getpatientphone(); ?>">
        <div class="form-text">Take your time, please don't make a mistake.</div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" aria-describedby="emailHelp" name="address" value="<?php echo $patient->getpatientadress(); ?>">
        <div id="emailHelp" class="form-text">We'll never share your address with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="Probleme" class="form-label">Probleme</label>
        <input type="text" class="form-control" id="Probleme" aria-describedby="emailHelp" name="Probleme" value="<?php echo $patient->getpatientprob(); ?>">
        <div id="emailHelp" class="form-text">Take your time, please don't make a mistake.</div>
    </div>
                      <label for="doctor" class="form-label">Doctor</label>
                      <div class="col-12 col-sm-6">
                      <select class="form-control" name="doctor" style="height: 55px;">
                                        <option selected>Choose Doctor</option>
                                        <?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/doctor.php';
                                          $doctor = new Doctor();
                                         $allDoctors = $doctor->getAllDoctors();
                                         foreach($allDoctors as $doctors){
                                          ?>
                                        <option value= "<?php echo $doctors->getdoctorid(); ?>"><?php echo $doctors->getdoctorname(); ?></option>
                                        <?php } ?>
                                    </select>
                        </div>
                    </div>
    <?php
} else {
    echo "Patient not found."; 
}
?>

<button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

              </div>
            </div>

          </div>
        </div>
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