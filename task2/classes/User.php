<?php

class User
{
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $user_profile;


    public function __construct(){
        require '../config/Database_connection.php';
    
        $database_object = new Database_connection;
    
        $this->connect = $database_object->connect();
    }

    function setUserId($user_id){
        $this->user_id = $user_id;
    }

    function getUserId(){
        return $this->user_id;
    }

    function setUserName($user_name){
        $this->username = $user_name;
    }

    function getUserName(){
        return $this->username;
    }

    function setUserEmail($email){
        $this->email = $email;
    }

    function getUserEmail(){
        return $this->email;
    }

    function setUserPassword($user_password){
        $this->password = $user_password;
    }

    function getUserPassword(){
        return $this->password;
    }

    function setUserConfirmPassword($user_confirm_password){
        $this->user_confirm_password = $user_confirm_password;
    }

    function setUserProfile($user_profile){
        $this->user_profile = $user_profile;
    }

    function getUserProfile(){
        return $this->user_profile;
    }


    function get_user_data_by_email(){
        $query = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->connect->prepare($query);

        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $user_data;
    }

    function confirm_password(){
        if ($this->password !== $this->user_confirm_password) {
            return false;
        }else {
            return true;
        }
    }


    function save_data(){
        
        $query = "INSERT INTO users (username, email, profile_img, password) VALUES(:username, :email, :profile_img, :password)";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':profile_img', $this->user_profile);

        if ($stmt->execute()) {
          return true;
            
        }else {
          return false;     
        }
    }

}

?>