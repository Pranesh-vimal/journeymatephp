<?php 

$servername ="localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "journeymate";

$con = mysqli_connect("$servername","$dbUser","$dbPass","$dbName");

if(!$con){
	die("connection failed : ".mysqli_connect_error());
}

?>