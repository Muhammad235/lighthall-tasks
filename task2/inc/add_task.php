<?php
// Enable error reporting and display errors on the screen (optional, for debugging purposes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the error log file path
$logFile = '../error.log';

// Log errors to the specified log file
ini_set('log_errors', 1);
ini_set('error_log', $logFile);


require 'loginfun.php';

if (isset($_POST['add_task'])) {
    

    $user_id = $_POST['user_id'];
    $task_title = trim($_POST['task_title']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);
    

    if (empty($user_id) || empty($task_title) || empty($description) || empty($start_date) || empty($end_date)) {
        
        $_SESSION['error'] = 'please add all task details';
        echo "<script>window.location.replace('../admin.php')</script>";  
        exit();

    }else {
        require '../classes/Task.php';
        
        //create new instance of Task class and pass in the values
        $new_task_object = new Task();
        
        $new_task_object->setUserId($user_id);
        $new_task_object->setTaskTitle($task_title);
        $new_task_object->setTaskDescription($description);
        $new_task_object->setStatus($status);
        $new_task_object->setStartDate($start_date);
        $new_task_object->setEndDate($end_date);

        $insert_task = $new_task_object->save_task();

        if ($insert_task) {
            $_SESSION['success'] = 'please add all task details';
            echo "<script>window.location.replace('../admin.php')</script>";  
            exit();      
        }
    }
}