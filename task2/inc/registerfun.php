<?php

session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if (empty($username) || empty($email) || empty($password) || empty($confirmpassword)) {
        
        $_SESSION['error'] = 'please fill all input fields';
    }else {
        
    require '../classes/User.php';

    $user_object = new User;

    $user_object->setUserConfirmPassword($confirmpassword);
    $user_object->setUserName($username);
    $user_object->setUserEmail($email);
    $user_object->setUserPassword($password);
    $user_object->setUserProfile('profile.png');
   

    $user_data = $user_object->get_user_data_by_email();

    if (is_array($user_data) && count($user_data) > 0) {
        $_SESSION['error'] = 'This Email Already Registered';
    }else {
        if ($user_object->confirm_password()) {
              
            if ($user_object->save_data()) {
                echo "<script>window.location.replace('../admin.php')</script>";

            }else{
            $_SESSION['error'] = 'Registration failed, this could be server error';
            }
       }else {
         $_SESSION['error'] = 'your password does not match';
       }
    }

    }

    if (isset($_SESSION['error'])) {
        echo "<script>window.location.replace('../register.php')</script>";
        exit();
  }
}




?>
