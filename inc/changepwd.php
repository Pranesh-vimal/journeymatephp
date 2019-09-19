<?php 
	session_start();
	$id = $_SESSION['id'];
	require_once 'db.php';
	if (isset($_POST['change'])) {
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];

		if (empty($pass1) || empty($pass2)) {
			header("location:../change.php?error=fillall");
			exit();
		}elseif ($pass1 != $pass2) {
			header("location:../change.php?error=missMatch");
			exit();
		}elseif (strlen($pass1) < 8) {
			header("location:../change.php?error=charerr");
			exit();
		}else{
			$sql = "UPDATE account SET pass = ? WHERE id = $id ";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location:../register.php?error=sqlerror");
				exit();
			}else{
				$hashpwd = password_hash($pass1, PASSWORD_DEFAULT);
				$stmt->bind_param("s",$hashpwd);
				mysqli_stmt_execute($stmt);
				header("location:../profile.php?success=changed");
				exit();
			}

		}
	}else{
		header("location:../index.php");
		exit();
	}

 ?>