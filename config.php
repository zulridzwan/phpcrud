<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//define('DB_SERVER', 'localhost');
define('DB_SERVER', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=XE)))');
define('DB_USERNAME', 'uitmstudent');
define('DB_PASSWORD', 'uitmstudent');
define('DB_NAME', 'XE');

 
/* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
/* if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} */
//Oracle database
try{
$link = new PDO("oci:dbname=".DB_SERVER,DB_USERNAME,DB_PASSWORD);
} catch (PDOException $e) {
    echo ($e->getMessage());
}
 

?>