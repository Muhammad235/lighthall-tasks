<?php
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'taskapp');


$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

if(!$conn){
     mysqli_connect_error();

   // echo 'connect';
}
?>

