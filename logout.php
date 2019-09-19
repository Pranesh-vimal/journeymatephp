<?php

session_start();
$id = $_SESSION['id'];
if (isset($_POST['logout'])) {
	require_once 'inc/db.php';
	date_default_timezone_set("Asia/Calcutta"); 
	$date = date('Y-m-d H:i:s');
	$date = date('h:i:s a m/d/Y', strtotime($date));
		$sql2 = "UPDATE account SET status = '$date' WHERE id = $id ";
		$res2 = mysqli_query($con,$sql2); 		
        session_unset();
		session_destroy();
		header("Location:index.php");
    }
    else{
        header("Location:index.php");
    }
