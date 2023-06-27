<?php
session_start();
if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        
        $_SESSION['error'] = 'please fill all input fields';

    }else {
      
        require '../classes/User.php';

        $user_object = new User;
        $user_object->setUserEmail($email);
        $user_object->setUserPassword($password);

        $user_data = $user_object->get_user_data_by_email();

        if (is_array($user_data) && count($user_data) > 0) {

            if ($user_data['password'] == $_POST['password']) {
                
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['username'] = $user_data['username'];

                echo "<script>window.location.replace('../invite.php')</script>";        
                

            }
        }else{ 

          $_SESSION['error'] = 'Wrong Email address';

        }
    }   

    if (isset($_SESSION['error'])) {
        echo "<script>window.location.replace('../login.php')</script>";
        exit();
    }
 
}else {
    // echo "<script>window.location('../index.php')</script>";
    // exit();
}

