<?php

  if (isset($_GET['logout']) && $_GET['logout'] == 'true') {

      session_start();
      session_unset();
      session_destroy();
  
      echo "<script>window.location.replace('../login.php')</script>";   
  }

?>
