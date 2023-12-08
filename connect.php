<?php
$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="project";  //database name which you created

$con = mysqli_connect($hostname,$username,$password,$database);

if(! $con)
{
die('Connection Failed'.mysql_error());
}

if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
