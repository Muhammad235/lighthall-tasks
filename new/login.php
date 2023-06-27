<?php  

include 'inc/loginfun.php'; 
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <link rel="stylesheet" href="css/custom.css">
   <title>Task management system</title>

</head>
<body>
<style>
    .error{
        margin-top: -30px;
        margin-bottom: -20px;
    }

    .error p{
        color: red;
        font-size: 16px;
        text-align: center;
    }
</style>
<div class="wrapper">
    <h1>Hello Again!</h1>
    <p>Welcome back you've <br> been missed!</p>


    <form action="inc/loginfun.php" method="POST">

    <?php  if (isset($_SESSION['error'])) : ?>
            <div class="error">
            <p>
                <?= $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </p>
            </div>
    <?php endif ?>


      <input type="text" placeholder="Email ID" name="email">
      <input type="password" placeholder="Password" name="password">     
      <p class="recover">
        <a href="resetpassword.html">Recover Password</a>
      </p>
      <button name="login">Log in</button>
    </form>
   
    <p class="or">
      ----- or continue with -----
    </p>
    <div class="icons">
      <i class="fab fa-google"></i>
      <i class="fab fa-github"></i>
      <i class="fab fa-facebook"></i>
    </div>
    <div class="not-member">
      Not a member? <a href="register.php">Register Now</a>
    </div>
  </div>
</body>
</html>