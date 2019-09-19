  <?php 

if (isset($_POST['login'])) {
	
	require 'db.php';

	$email = $_POST['email'];
	$pass = $_POST['password'];

	if(empty($email) || empty($pass)){
		header("Location:../index.php?email=".$email."&error=emptyfields");
	exit();
	}
	else{
		$sql = "SELECT * FROM account WHERE email=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../index.php?error=sqlError&email=".$email);
	exit();
		}
		else{
			$stmt->bind_param("s",$email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);	
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($pass,$row['pass']);
				if ($pwdCheck == false) {
					header("Location:../index.php?error=PasswordIncorrect&email=".$email);
				exit();
				}
				else if ($pwdCheck == true) {
					session_start();
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['phno'] = $row['phone'];
					$_SESSION['gender'] = $row['gender'];
					$_SESSION['ranid'] = $row['ranid'];
					$_SESSION['dob'] = $row['dob'];
					header("Location:../prereq.php?id=".$row['id']."&ranid=".$row['ranid']);
				exit();
				}
				else{
					header("Location:../index.php?error=PasswordIncorrect&email=".$email);
				exit();
				}
			}
			else{
				header("Location:../index.php?error=nouser");
			exit();
			}
		}
	}
}
else{
	header("Location:../index.php");
	exit();
}