<?php 
		
		session_start();		
		require_once 'db.php';
		$id = $_SESSION['id'];

		if (isset($_POST['add'])) {
			$from = $_POST['from'];
			$to = $_POST['to'];			
			$seat = $_POST['seat'];
			$date = $_POST['date'];
			$time = $_POST['time'];	
			$amt = $_POST['amt'];
			$desc = $_POST['desc'];				
			$dt = $date.' '.$time;

			if (empty($from) || empty($to) || empty($seat) || empty($date) || empty($time) || empty($amt)) {
					header("location:../addT.php?error=fillall&from=".$from."&to=".$to."&seat=".$seat);
					exit();
				}else{
					if ($from == $to ) {
						header("location:../addT.php?error=same&from=".$from."&seat=".$seat);
						exit();
					}
					elseif ($seat < 1) {
						header("location:../addT.php?error=seat&from=".$from."&to=".$to);
						exit();
					}
					else{
						$sql="SELECT * FROM journey";
						$stmt = mysqli_stmt_init($con);
						if(!mysqli_stmt_prepare($stmt,$sql)){
							header("Location:../addT.php?error=sqlerror1&from=".$from."&to=".$to);
							exit();
						}
						else{
							$sql="INSERT INTO journey (pid,fp,tp,seat,dt,amt,des) VALUES(?,?,?,?,?,?,?)";
							$stmt = mysqli_stmt_init($con);
							if(!mysqli_stmt_prepare($stmt,$sql)){
								header("Location:../addT.php?error=sqlerror2&from=".$from."&to=".$to);
								exit();
							}
							else{
								echo $date;
								$stmt->bind_param("sssssss",$id,$from,$to,$seat,$dt,$amt,$desc);
								mysqli_stmt_execute($stmt);
								mysqli_stmt_close($stmt);
								mysqli_close($con);
								header("Location:../recent.php?success");
								exit();
							}
						}		
					}
				}	
		}else{
			header("location:../index.php");
		}

 ?>