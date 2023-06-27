<?php

class User
{
    private $user_id;
    private $username;
    private $email;
    private $password;
    private $user_profile;

    private $receiver_id;
    private $sender_id;
    private $status;


    public function __construct(){
        require 'Database_connection.php';
    
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


    //invite

    function setReceiver_id($receiver_id){
        $this->receiver_id = $receiver_id;
    }

    function getReceiver_id(){
        return $this->receiver_id;
    }


    function setSender_id($sender_id){
        $this->sender_id = $sender_id;
    }

    function getSender_id(){
        return $this->sender_id;
    }


    function setStatus($status){
        $this->status = $status;
    }

    function getStatus(){
        return $this->status;
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

    // function get_all_user(){
    //     $query = "SELECT * FROM users";

    //     $stmt = $this->connect->prepare($query);

    //     // $stmt->bindParam(":email", $this->email);

    //     if ($stmt->execute()) {
    //         $all_user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }
    //     return $all_user_data;
    // }

    function get_all_users_except($excludedId) {
        $query = "SELECT * FROM users WHERE id <> :excluded_id";
    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':excluded_id', $excludedId);
    
        if ($stmt->execute()) {
            $all_user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $all_user_data;
        }
    
        return [];
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

    function send_invite(){
        
        $query = "INSERT INTO invite (receiver_id, sender_id, status) VALUES(:receiver_id, :sender_id, :status)";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':receiver_id', $this->receiver_id);
        $stmt->bindParam(':sender_id', $this->sender_id);
        $stmt->bindParam(':status',  $this->status);


        if ($stmt->execute()) {
          return true;
            
        }else {
          return false;     
        }
    }

   
//     function get_invitations_between_parties($sender_id, $receiver_id) {
//     $query = "SELECT * FROM  invite
//               WHERE (sender_id = :sender_id AND receiver_id = :receiver_id)
//                  OR (sender_id = :receiver_id AND receiver_id = :sender_id)";

//     $stmt = $this->connect->prepare($query);
//     $stmt->bindParam(':sender_id', $sender_id);
//     $stmt->bindParam(':receiver_id', $receiver_id);

//     if ($stmt->execute()) {
//         $invitations = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         return $invitations;
//     }

//     return [];
// }



function get_invitations_between_parties($sender_id) {

    $query = "SELECT * FROM invite WHERE sender_id <> :sender_id AND status = 'not accept'";


    $stmt = $this->connect->prepare($query);
    $stmt->bindParam(':sender_id', $sender_id);
    // $stmt->bindParam(':receiver_id', $receiver_id);

    if ($stmt->execute()) {
        $invitations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $invitations;
    }

    return [];
}

function get_invitaion_details() {

    $query = "SELECT * FROM users WHERE id = :sender_id";


    $stmt = $this->connect->prepare($query);
    $stmt->bindParam(':sender_id', $sender_id);
    // $stmt->bindParam(':receiver_id', $receiver_id);

    if ($stmt->execute()) {
        $invite_details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $invite_details;
    }

    return [];
}


}