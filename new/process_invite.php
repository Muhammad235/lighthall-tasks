<?php

   if (isset($_POST['add_user'])) {

    print_r($_POST);
      $username = $_POST['username'];
      $userID = $_POST['userID'];
      $sendInviteID = $_POST['sendInviteID'];

    echo $username;

      // Return a response (optional)
      echo "Form data received successfully";
   }
?>
