<?php
require_once 'db.php';
if (isset($_POST['send'])) {
    $email = $_GET['email'];

    if (empty($email)) {
        header("location:../forgetpwd.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../forgetpwd.php?error=emailerror&email");
        exit();
    } else {
        $sql = "SELECT * FROM account WHERE email=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../forgetpwd.php?error=sqlError&email=".$email);
	exit();
		}$stmt->bind_param("s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);	
        if ($row = mysqli_fetch_assoc($result)) {
            
        }
    }
} else {
    header("location:../index.php");
    exit();
}
