<?php
define('SERVERNAME', 'localhost');
define('USERNAME', 'muhammad_adeleke');
define('PASSWORD', 'okikiola(m)');
define('DBNAME', 'muhammad_taskapp');


$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

if(!$conn){
     mysqli_connect_error();

   // echo 'connect';
}
?>

