<?php
// Enable error reporting and display errors on the screen (optional, for debugging purposes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the error log file path
$logFile = '../error.log';

// Log errors to the specified log file
ini_set('log_errors', 1);
ini_set('error_log', $logFile);



class Task

{

    private $id;
    private $user_id;
    private $task_title;
    private $description;
    private $status;
    private $start_date;
    private $end_date;
    private $connect;

    public function __construct(){
        require 'Database_connection.php';
    
        $database_object = new Database_connection;
    
        $this->connect = $database_object->connect();

    }

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id; 
    }

    function setUserId($user_id){
        $this->user_id = $user_id;
    }

    function getUserId(){
        return $this->user_id; 
    }

    function setTaskTitle($task_title){
        $this->task_title = $task_title;
    }

    function getTaskTitle(){
        return $this->task_title; 
    }

    function setTaskDescription($description){
        $this->description = $description;
    }

    function getTaskDescription(){
        return $this->description; 
    }

    function setStatus($status){
        $this->status = $status;
    }

    function getStatus(){
        return $this->status; 
    }

    function setStartDate($start_date){
        $this->start_date = $start_date;
    }

    function getStartDate(){
        return $this->start_date; 
    }

    function setEndDate($end_date){
        $this->end_date = $end_date;
    }

    function getEndDate(){
        return $this->end_date; 
    }


    //save each new task method
    function save_task(){
        
        $query = "INSERT INTO task (user_id, task_title, description, start_date, end_date, status) VALUES(:user_id, :task_title, :description, :start_date, :end_date, :status)";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':task_title', $this->task_title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':end_date', $this->end_date);
        $stmt->bindParam(':status', $this->status);

        if ($stmt->execute()) {
          return true;
            
        }else {
          return false;     
        }
    }



    //get all tasks by user id
    // function get_task_by_user_id(){
    //     $query = "SELECT * FROM task WHERE user_id = :user_id";

    //     $stmt = $this->connect->prepare($query);
    //     $stmt->bindParam(':user_id', $this->user_id);

    //     try {
    //         if ($stmt->execute()) {
    //             $task_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //        }else {
    //            $task_data = array();
    //        } 
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    //         return $task_data;
    // }

        //get all tasks by user id
        function get_task_by_user_id(){
            $query = "SELECT * FROM task WHERE user_id = :user_id";

            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':user_id', $this->user_id);
    
            try {
                if ($stmt->execute()) {
                    $task_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               }else {
                   $task_data = array();
               } 
            } catch (Exception $e) {
                echo $e->getMessage();
            }
                return $task_data;
        }

        //get all tasks by user id
        function get_task_by_user_filter($filter){
            $query = "SELECT * FROM task WHERE user_id = :user_id AND status = :status";

            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':status', $filter);
    
            try {
                if ($stmt->execute()) {
                    $task_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               }else {
                   $task_data = array();
               } 
            } catch (Exception $e) {
                echo $e->getMessage();
            }
                return $task_data;
        }
   

    //update task status
    function update_task_status() {
        $query = "UPDATE task SET status = :status WHERE id = :id";
    
        $stmt = $this->connect->prepare($query);

        $execute = $stmt->execute(array(
            'id' => $this->id,
            'status' => $this->status
        ));
    
        if ($execute) {
            return true;
        } else {
            return false;
        }
    }

    function get_task_by_task_id() {
        $query = "SELECT * FROM task WHERE id = :id";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $this->id);

        try {
            if ($stmt->execute()) {
                $task_data = $stmt->fetch(PDO::FETCH_ASSOC);
           }else {
               $task_data = array();
           } 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
            return $task_data;
    }


        //update task status
        function update_task() {
            $query = "UPDATE task SET task_title = :task_title, description = :description, start_date = :start_date, end_date = :end_date,  status = :status  WHERE id = :id";
        
            $stmt = $this->connect->prepare($query);
    
            $execute = $stmt->execute(array(
                'id' => $this->id,
                'task_title' => $this->task_title,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status
            ));
        
            if ($execute) {
                return true;
            } else {
                return false;
            }
        }


}