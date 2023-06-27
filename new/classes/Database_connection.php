<?php


class Database_connection
{
    function connect(){
        $connect = new PDO("mysql:host=localhost; dbname=task3", "root", "");

        return $connect;
    }
}


?>

