<?php 

require 'inc/loginfun.php';
require 'classes/User.php';

// session_start();
$send_invite =  $_SESSION['user_id'];
// echo $_SESSION['email'];

$all_user = new User;

$allUsers = $all_user->get_all_users_except($_SESSION['user_id']);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

  <h1>Welcome <?=$_SESSION['username']?> with ID <?=$_SESSION['user_id']?></h1> <br><br>

  <?php
foreach ($allUsers as $user) {
?>
    <form class="inviteForm" action="process_invite.php" method="post">
        <div class="users card">
            <h4>Available users</h4>
            <h5><?= $user['username'] ?></h5>

            <input type="hidden" name="username" value="<?= $user['username'] ?>">
            <input type="hidden" name="userID" value="<?= $user['id']?>">
            <input type="hidden" name="sendInviteID" value="<?=$send_invite?>">

            <button class="btn btn-info" name="add_user">Send invite</button>

        </div>
    </form>
<?php
}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

