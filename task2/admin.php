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

require __DIR__ . '/inc/add_task.php';
require __DIR__ . '/classes/Task.php';


//get user id by session
$user_id = $_SESSION['user_id'];

$get_task_object = new Task();
$get_task_object->setUserId($user_id);


if (isset($_POST['filterCompleted'])) {
  $filter = $_POST['completed'];

  //get all completed task   
  $task_data = $get_task_object->get_filtered_task($filter);

}elseif(isset($_POST['filterPending'])){
  $filter = $_POST['pending'];

  //get all pending task   
  $task_data = $get_task_object->get_filtered_task($filter);

}elseif(isset($_POST['Inprogress'])){
  $filter = $_POST['In_progress'];

  //get all In progress task   
  $task_data = $get_task_object->get_filtered_task($filter);

}else{

  //get all task by user id
  $task_data = $get_task_object->get_task_by_user_id();

}


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
              <div class="float-right">
                <div class="filter d-flex">
                <h5 class="pt-2 px-2">sort by:</h5>
                  <form action="" method="POST" class="">
                    <input type="text" name="all" value="*" hidden></input>
                    <button type="submit" name="filterAll" class="btn btn-info">All</button>
                  </form>

                  <form action="" method="POST">
                    <input type="text" name="pending" value="Pending" hidden></input>
                    <button type="submit" name="filterPending" class="btn btn-warning text-white">Pending</button>
                  </form>

                  <form action="" method="POST">
                    <input type="text" name="completed" value="Completed" hidden></input>
                    <button type="submit" name="filterCompleted" class="btn btn-success">Completed</button>
                  </form>

                  <form action="" method="POST">
                    <input type="text" name="In_progress" value="In progress" hidden></input>
                    <button type="submit" name="Inprogress" class="btn btn-dark">In progress</button>
                  </form>
                  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="container message-table">
            <div class="row message-header">
              <div class="col-md-2">
                <h6>Task Title</h6>
              </div>
              <div class="col-md-3"><h6>Description</h6></div>
              <div class="col-md-2"><h6>Start Date</h6></div>
              <div class="col-md-2"><h6>End date</h6></div>
              <div class="col-md-2"><h6>Satus</h6></div>
              <div class="col-md-1"><h6>Action</h6></div>
            </div>
            <?php

// Check if there are tasks
if (!empty($task_data)) {
    // Loop over the tasks and display task details
    foreach ($task_data as $task) {

    ?>
<div class="row">
              <div class="col-md-2 message-info mt-3">
                <div class="box">
                  <p><?=$task['task_title']?></p>
                </div> 
              </div>
              <div class="col-md-3 mt-3">
                <p><?=$task['description']?></p>
              </div>
              <div class="col-md-2 mt-3"><?=$task['start_date']?></div>
              <div class="col-md-2 mt-2"><?=$task['end_date']?></div>
              <div class="col-md-2 mt-2">

              <form action="" method="post" class="taskForm">
                <input type="hidden" name="taskId" value="<?=$task['id']?>">
                <select name="status" class="statusSelect">
                  <option value="" selected><?=$task['status']?></option>
                  <option value="Pending">Pending</option>
                  <option value="Completed">Completed</option>
                  <option value="In progress">In progress</option>
                </select>
              </form>

              </div>   

              <div class="col-md-1 mt-1">
              <a href="edit_task.php?id=<?=$task['id']?>"><i class='bx bxs-edit bx-sm'></i></a>
              <a href="edit_task.php?id=<?=$task['id']?>"><i class='bx bxs-calendar-check text-success bx-sm'></i></a>
              </div>
            </div>
  <?php  }
} else {
    echo '<h1 class="text-center mt-5 text-danger">No tasks found, Start adding tasks now!</h1>';
    $task['task_title'] ="";
    $task['description'] ="";
    $task['start_date'] ="";
    $task['end_date'] ="";
    $task['status'] ="";

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

