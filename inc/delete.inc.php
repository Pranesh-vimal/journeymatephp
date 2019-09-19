<?php 
	
	session_start();
	require_once 'db.php';

	if (isset($_POST['delete'])) {
		$pid = $_GET['pid'];
		$jid = $_GET['jid'];

		$sql = "DELETE FROM journey WHERE jid='$jid' and pid='$pid'";
		mysqli_query($con,$sql);

		header("location:../recent.php?success");
	}
	else{
		header("location:../index.php");
	}

 ?>