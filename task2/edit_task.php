<?php

// Enable error reporting and display errors on the screen (optional, for debugging purposes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the error log file path
$logFile = 'error.log';

// Log errors to the specified log file
ini_set('log_errors', 1);
ini_set('error_log', $logFile);


// session_start();

// if (isset($_SESSION['user_id'])) {
//   echo "<script>window.location.replace('admin.php')</script>";        
  
// }else {
//   echo "<script>window.location.replace('login.php')</script>";        

// }

require __DIR__ . '/inc/add_task.php';
require __DIR__ . '/classes/Task.php';
// require 'inc/loginfun.php';

//create new instance of Task class and pass in the values
$get_task_object = new Task();


//get user id by session
$user_id = $_SESSION['user_id'];

//get task id
$task_id = $_GET['id'];

//setting the user id
$get_task_object->setId($task_id);

//getting task by user id
$task_data = $get_task_object->get_task_by_task_id();



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Task management system</title>

  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- main:css -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
  

  <link rel="stylesheet" href="css/admin.css">

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
              <h4 class="font-weight-bold text-dark">Hi, welcome <?=$_SESSION['username']?></h4>
              <p class="font-weight-normal mb-2 text-muted">
                <?php
                $date = date('F j, Y', strtotime('now'));
                echo $date;
                ?>
              </p>
            </div>
          </div>
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                <form method="POST" action="inc/edit_taskfun.php">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Task Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="I want to code" value="<?=$task_data['task_title']?>" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Task Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?=$task_data['description']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Start Date (current date: <?=$task_data['start_date']?>)</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date" value="<?=$task_data['start_date']?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">End Date (current date: <?=$task_data['end_date']?>)</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="end_date" value="<?=$task_data['end_date']?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Task status</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="status">
                            <!-- <option value="" selected></option> -->
                            <option selected class="py-3 mb-2"><?=$task_data['status']?></option>
                            
                            <option value="Completed" class="py-3 mb-2">Completed</option>
                            <option value="In progress" class="py-3 mb-0">In progress</option>
                            <option value="Pending" class="py-3 mb-2">Pending</option>
                        </select>
                    </div>

                    <input type="hidden" name="task_id" value="<?=$task_id?>">

                    <div class="row">
                      <div class="col-md-12 text-center"><button class="btn btn-info w-50" type="submit" name="edit">Save</button></div>
                    </div>
     
                 </form>
                </div>
            </div>
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

<!-- 
  <div class="show_modal" id="show_modal">
       
  </div> -->

<script>

$(document).ready(function() {
  // Listen for the change event on select elements within the taskForm class
  $('.taskForm .statusSelect').on('change', function() {
    // Get the selected value from the current select element
    var selectedValue = $(this).val();

    // Get the corresponding taskId from the hidden input within the current form
    var taskId = $(this).siblings('input[name="taskId"]').val();

    // Send the selected value and taskId to the server using AJAX
    $.ajax({
      url: 'partials/edit_status.php', // Replace with your server URL
      method: 'POST',
      data: { status: selectedValue, taskId: taskId },
      success: function(response) {
        // Handle the AJAX response
        console.log('AJAX request successful');
        console.log('Response:', response);
      },
      error: function(xhr, status, error) {
        // Handle AJAX errors
        console.log('AJAX request failed');
        console.log('Error:', error);
      }
    });
  });
});





</script>


  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- js library -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

