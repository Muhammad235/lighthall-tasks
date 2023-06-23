<?php


if (isset($_POST['edit'])) {
//    print_r($_POST);

   require '../classes/Task.php';

   $update_task_obj = new Task;
   $update_task_obj->setId($_POST['task_id']);
   $update_task_obj->setTaskTitle($_POST['title']);
   $update_task_obj->setTaskDescription($_POST['description']);
   $update_task_obj->setStatus($_POST['status']);
   $update_task_obj->setStartDate($_POST['start_date']);
   $update_task_obj->setEndDate($_POST['end_date']);

   $update_task = $update_task_obj->update_task();
   if ($update_task) {
    echo "<script>alert('Task Updated Successfully')</script>";   
    echo "<script>window.location.replace('../admin.php');</script>";   
    exit();
   }
}









?>