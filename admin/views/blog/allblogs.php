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
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/popupimg.css" />

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
                <h5 class="card-title fw-semibold mb-4">All Blogs</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Title</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Img</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>  
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Date</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                       require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/blog.php';
                       $blog = new Blog();
                       $allBlogs = $blog->getAllBlogs();
                       foreach($allBlogs as $blogs){
                        ?>



<tr>
  <td class="border-bottom-0">
    <h6 class="fw-semibold mb-0"><?php echo $blogs->getblogid(); ?></h6>
  </td>
  <td class="border-bottom-0">
    <p class="mb-0 fw-normal"><?php echo substr($blogs->getblogtitle(), 0, 30).'...'; ?></p>
  </td>
  <td class="border-bottom-0">
    <p class="mb-0 fw-normal">
      <a href="#" class="blog-image-link" data-image="<?php echo $blogs->getblogimg(); ?>">
        <?php echo $blogs->getblogimg(); ?>
      </a>
    </p>
  </td>
  <td class="border-bottom-0">
    <p class="mb-0 fw-normal"><?php echo substr($blogs->getblogdescription(), 0, 30).'...'; ?></p>
  </td>
  <td class="border-bottom-0">
    <p class="mb-0 fw-normal"><?php echo $blogs->getdatecreation(); ?></p>
  </td>
</tr>
<tr class="popup-row">
  <td colspan="5">
    <div class="popup-container">
      <img src="" class="popup-image">
    </div>
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
  <script>
  var imageLinks = document.getElementsByClassName('blog-image-link');
  var popupImage = document.querySelector('.popup-image');
  var popupContainer = document.querySelector('.popup-container');

  Array.from(imageLinks).forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      var imageUrl = this.getAttribute('data-image');
      popupImage.src = 'http://localhost/admin/admin/assets/images/blogs/' + imageUrl;
      popupContainer.style.display = 'block';
    });
  });

  // Close the popup when clicking outside the image
  document.addEventListener('click', function(event) {
    if (!popupContainer.contains(event.target) && !event.target.classList.contains('blog-image-link')) {
      popupContainer.style.display = 'none';
    }
  });
</script>


  <script src="<?php echo $baseUrl; ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/sidebarmenu.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/app.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?php echo $baseUrl; ?>/assets/js/dashboard.js"></script>
</body>

</html>