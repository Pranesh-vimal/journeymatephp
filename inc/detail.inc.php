<?php 
		session_start();
	if (isset($_POST['detail'])) {

		require_once 'db.php';
		$id = $_SESSION['id'];
		$ranid =  $_SESSION['ranid']; 
		$native = $_POST['native'];
		$address = $_POST['address'];
		$car = $_POST['car'];
		$carname = $_POST['carname'];
		$work = $_POST['work'];
		$travell = $_POST['travell'];
		$status = $_POST['status'];
		$medical = $_POST['medical'];
		$issue = $_POST['issue'];

		$file = $_FILES['pro'];

		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		$fileType = $file['type'];

		$fileExt = explode('.', $fileName);

		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg','jpeg','png');	

		if (in_array($fileActualExt,$allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 100000000) {
					$fileNameNew = uniqid('',true).".".$fileActualExt;
					$fileDestination = "../profile/".$fileNameNew;
					move_uploaded_file($fileTmpName,$fileDestination);

				}else{
					header("location:../prereq.php?error=sizeerror&native=".$native."&address=".$address);
				exit();
				}
			}else{
				header("location:../prereq.php?error=fileerror&native=".$native."&address=".$address);
				exit();
			}
		}
		else{
			header("location:../prereq.php?error=exterror&native=".$native."&address=".$address);
			exit();
		}

		if (empty($native) || empty($address)) {
			header("location:../prereq.php?error=fillall&native=".$native."&address=".$address);
			exit();
		}
		// elseif ($car == "yes") {
		// 	if (empty($carname)) {
		// 		header("location:../prereq.php?error=fillall&native=".$native."&address=".$address);
		// 		exit();
		// 	}
		// }
		// elseif ($medical == "yes") {
		// 	if (empty($issue)) {
		// 		header("location:../prereq.php?error=fillall&native=".$native."&address=".$address);
		// 		exit();
		// 	}
		// }
		else{
		$sql = "SELECT * FROM detail WHERE pid=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../prereq.php?error=sqlError&native=".$native."&address=".$address);
			exit();
		}
		else{
			$stmt->bind_param("s",$id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("location:../main.php");
					exit();
				}
				else{
					$sql = "INSERT into detail (pid,native,address,car,carname,work,travell,status,medical,issue,img) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($con);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location:../prereq.php?error=sqlerror&native=".$native."&address=".$address);
						exit();
					}
					else{
						$stmt->bind_param("sssssssssss",$id,$native,$address,$car,$carname,$work,$travell,$status,$medical,$issue,$fileNameNew);
						mysqli_stmt_execute($stmt);
						header("location:../main.php?success");
						exit();
					}
				}
			}
	}
}
	else{
		header("location:../index.php");
		exit();
	}

 ?>