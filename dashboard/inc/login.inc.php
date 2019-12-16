<?php

if (isset($_POST['login'])) {
	
	$email = $_POST['email'];
    $pass = $_POST['password'];

    if(empty($email) || empty($pass)){
		header("Location:../index.php?email=".$email."&error=emptyfields");
	    exit();
	}else if($email != "admin@jm.com"){
        header("Location:../index.php?email=".$email."&error=emailIncorrect");
        exit();
    }else if($pass != "prane143"){
        header("Location:../index.php?email=".$email."&error=passwordMissMatch");
        exit();
    }else{
        session_start();

        $_SESSION['dash'] = $email;
        header("location:../main.php");
        exit();
    }
}else {
    header("location:../index.php");
    exit();
}