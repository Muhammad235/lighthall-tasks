<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Regal Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="custom.css">
  
  <!-- main:css -->
  <link rel="stylesheet" href="css/style.css">

  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php require 'partials/_navbar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require 'partials/_sidebar.php'; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
              <p class="font-weight-normal mb-2 text-muted">APRIL 1, 2019</p>
            </div>
          </div>
          <div class="container message-table">
            <div class="row message-header">
              <div class="col-md-3">
                <h4>Task Title</h4>
              </div>
              <div class="col-md-3"><h6>Description</h6></div>
              <div class="col-md-2"><h6>Start Date</h6></div>
              <div class="col-md-2"><h6>End date</h6></div>
              <div class="col-md-2"><h6>Satus</h6></div>
            </div>
            <!-- message display -->
            <?php

require 'config/conn.php';

              $sql = "SELECT * FROM `task` LIMIT 3";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                while($row = mysqli_fetch_assoc($result)) {

              $id = $row['id'];               
              $name = $row['name'];               
              $email	 = $row['email'];               
              $subject = $row['subject'];               
              $message = $row['message'];               
              $status = $row['status'];               
              $date = $row['date'];  
          ?>


            <div class="row">
              <div class="col-md-3 message-info">

              <div class="box">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.

                </p>
              </div> 
              </div>
              <div class="col-md-3">
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
              </div>
              <div class="col-md-2"><a href="inc/read.php?id=<?=$id?>" >2222222222</a></div>
              <div class="col-md-2">2222222222<a href="inc/delete.php?id=<?=$id?>"></a></div>
              <div class="col-md-2"><a href="inc/delete.php?id=<?=$id?>"></a></div>
            </div>

            <?php

            }                            
          }

          ?>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>

  <!-- js library -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>

  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

