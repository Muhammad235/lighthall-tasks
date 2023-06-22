<?php

class Task

{

    private $id;
    private $user_id;
    private $task_title;
    private $description;
    private $status;
    private $start_date;
    private $end_date;

    public function __construct(){
        require '../config/Database_connection.php';
    
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
}