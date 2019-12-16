<?php 

	require 'db.php';

	if (isset($_POST['interest'])) {
		$pid = $_GET['pid'];
		$jid = $_GET['jid'];
		$partid = $_GET['id'];

		$sql = "SELECT * from partner where pid=$pid and jid=$jid and partid=$partid";

		$result = mysqli_query($con,$sql);

		if (mysqli_num_rows($result) > 0) {
			$sql1 = "DELETE FROM partner WHERE pid=$pid and jid=$jid and partid=$partid";

			mysqli_query($con,$sql1);
			header("location:../detail.php?&pid=".$pid."&jid=".$jid);
			exit();
		}
		else{
			$sql1 = "INSERT into partner(jid,pid,partid) Values('$jid','$pid','$partid')";

			mysqli_query($con,$sql1);
			header("location:../detail.php?&pid=".$pid."&jid=".$jid);
			exit();
		}
	}else{
		header("location:../index.php");
		exit();
	}

 ?>