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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add patient</h5>
              <div class="card">
                <div class="card-body">
              
                  <form method="post">
                    
                    <div class="mb-3">
                      <label for="first patient" class="form-label">First name</label>
                      <input type="text" class="form-control" id="firstname" aria-describedby="name" name="firstname">
                      <div  class="form-text">Take ur moment plz dont do mistake.</div>
                    </div>
                    <div class="mb-3">
                      <label for="lastname" class="form-label">Last name</label>
                      <input type="text" class="form-control" id="lastname" aria-describedby="lastname" name="lastname">
                      <div  class="form-text">Take ur moment plz dont do mistake.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                      <div id="emailHelp" class="form-text">We'll never share  email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="number" class="form-control" id="lastname" aria-describedby="lastname" name="phone">
                      <div  class="form-text">Take ur moment plz dont do mistake.</div>
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">address</label>
                      <input type="text" class="form-control" id="address" aria-describedby="emailHelp "name="adresse">
                      <div id="emailHelp" class="form-text">We'll never share  address with anyone else.</div>
                    </div>

                    <div class="mb-3">
                      <label for="Probleme" class="form-label">Probleme</label>
                      <input type="text" class="form-control" id="Probleme" aria-describedby="emailHelp "name="Probleme">
                      <div id="emailHelp" class="form-text">Take ur moment plz dont do mistake.</div>
                    </div>
                  
                    <div class="mb-3">
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
                    
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
              require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/patientcontr.php';
               if (isset($_POST["submit"])) {
                $a = new Patientcontr();
               $name = $_POST['firstname'];
               $lastname= $_POST['lastname'];
               $email = $_POST['email'];
               $phone = $_POST['phone'];
               $doctor_id = $_POST['doctor'];
               $adress=$_POST['adresse'];
               $probleme=$_POST['Probleme'];
               $a->insertPatient($name, $lastname, $email, $adress, $phone,$probleme, $doctor_id);
   
               }
               ?>
              
            </div>
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