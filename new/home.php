<?php 

require 'inc/loginfun.php';
require 'classes/User.php';

// session_start();
$send_invite =  $_SESSION['user_id'];
// echo $_SESSION['email'];


$all_user = new User;

$allUsers = $all_user->get_all_users_except($_SESSION['user_id']);

$sender_id;
$receiver;

$invitations = null;

if (isset($_GET['send'])) {

    $sender_id = $_GET['invite_id'];
    $receiver = $_GET['user_id'];

    $all_user->setReceiver_id($receiver);
    $all_user->setSender_id($sender_id);
    $all_user->setStatus("not accept");

    $new_invite = $all_user->send_invite();

    $sent = "waiting for receiver";

    $invitations = $all_user->get_invitations_between_parties($sender_id);


    // $invite_details = $all_user->get_invitaion_details();

    // var_dump($invite_details);



}else {
        $sent = "";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Welcome</h1> 

   <?=$_SESSION['user_id']?>


   <?php


$all_user->setSender_id($sender_id);
$invitations = $all_user->get_invitations_between_parties($sender_id);


foreach ($invitations as $invitation) {

    $sender_id = $_GET['invite_id'];
    echo "
    <div class='invitation'>
        <h3>Invitation section</h3>
        <p> invitation BY " . $invitation['sender_id'] . "</p>
    </div> ";

}



foreach ($allUsers as $user) {

    ?>
    <div class="users">
    <p><?= $user['username']?></p>
    <a href="home.php?user_id=<?=$user['id']?>&&invite_id=<?=$send_invite?>&&send=true">Send invite</a>
    <p><?=$sent?></p>
   </div>
<?php
}

?>


<div class="inviation_details">
    <div><h3>Sender: <?php // var_dump($invite_details['username']);?></h3><a href="">Accept invitation</a></div>
</div>




</body>
</html>