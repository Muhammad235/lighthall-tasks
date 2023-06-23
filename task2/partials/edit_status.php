<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the values sent from the client
  $selectedValue = $_POST['status'];
  $taskId = $_POST['taskId'];

  // Process the values as needed
  // ...

  // Prepare the response
  $response = [
    'selectedValue' => $selectedValue,
    'taskId' => $taskId
  ];

  // Send the response back to the client
  echo json_encode($response);
  $new_status = $response['selectedValue'];
  $taskId = $response['taskId'];

  echo $new_status;
  echo $taskId;

  require '../classes/Task.php';

  $update_status_obj = new Task;

  $update_status_obj->setId($taskId);
  $update_status_obj->setStatus($new_status);

  $update_status_obj->update_task_status();
  exit;
}
?>
