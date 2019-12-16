<?php 
	
	require 'db.php';	

	if (isset($_POST['register'])) {
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$number = $_POST['phno'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];

		if ((empty($email) || empty($fname) || empty($lname) || empty($number) || empty($password1) || empty($password2))) {
			header("Location:../register.php?error=emptyfields&email=".$email."&fname=".$fname."&phno=".$number."&dob=".$dob."&lname=".$lname);
				exit();
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location:../register.php?error=invalidUserEmail&fname=".$fname."&phno=".$number."&dob=".$dob."&lname=".$lname."&email");
			exit();
		}elseif (!preg_match("/^[a-zA-Z0-9]*$/",$fname) && !preg_match("/^[a-zA-Z0-9]*$/",$lname)) {
			header("Location:../register.php?error=invalidUserName&fname&phno=".$number."&dob=".$dob."&lname&email=".$email);
			exit();
		}
		elseif (strlen($number) < 10) {
			header("Location:../register.php?error=invalidNum&fname=".$fname."&email=".$email."&dob=".$dob."&phno&lname=".$lname);
			exit();
		}
		elseif (strlen($password1) < 8) {
			header("Location:../register.php?error=invalidPass&email=".$email."&fname=".$fname."&phno=".$number."&dob=".$dob."&lname=".$lname);
			exit();
		}
		elseif ($password1 !== $password2) {
			header("Location:../register.php?error=passwordMissMatch&email=".$email."&fname=".$fname."&phno=".$number."&dob=".$dob."&lname=".$lname);
			exit();
		}else{
			$sql="SELECT email FROM account WHERE email=? ";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location:../register.php?error=sqlerror&email=".$email."&fname=".$fname."&phno=".$number."&dob=".$dob."&lname=".$lname);
				exit();
			}
			else{
				$stmt->bind_param("s",$email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location:../register.php?error=emailAlreadyTaken&fname=".$fname."&phno=".$number."&email&dob=".$dob."&lname=".$lname);
					exit();
				}
				else{
					$sql="INSERT INTO account (fname,lname,email,gender,dob,age,phone,pass,ranid) VALUES(?,?,?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($con);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location:../register.php?error=sqlerror&fname=".$fname."&phno=".$number."&email&dob=".$dob."&lname=".$lname);
						exit();
					}
					else{
						$random_id_length = 10; 
						//generate a random id encrypt it and store it in $rnd_id 
						$rnd_id = crypt(uniqid(rand(),1),'st'); 
						//to remove any slashes that might have come 
						$rnd_id = strip_tags(stripslashes($rnd_id)); 
						//Removing any . or / and reversing the string 
						$rnd_id = str_replace(".","",$rnd_id); 
						$rnd_id = strrev(str_replace("/","",$rnd_id)); 
						//finally I take the first 10 characters from the $rnd_id 
						$rnd_id = substr($rnd_id,0,$random_id_length);  

						$today = date("Y-m-d");
						$diff = date_diff(date_create($dob), date_create($today));
						$hashpwd = password_hash($password1, PASSWORD_DEFAULT);
						$stmt->bind_param("sssssssss",ucfirst($fname),ucfirst($lname),$email,$gender,$dob,$diff->format('%y'),$number,$hashpwd,$rnd_id);
						mysqli_stmt_execute($stmt);

						$mailto = $email;
						$subject = "Account created in Journey Mate";
						$message = "You have created an account in Journey Mate ! Thank you for joining. Have a safe journey";
						$headers = "From: admin@journeymate.ga";

						mail($mailto,$subject,$message,$headers);
						header("Location:../index.php?error=success&email=".$email);
						exit();
					}
				}
			}
		}
}
else {
		header("Location:../index.php");
			exit();
	}