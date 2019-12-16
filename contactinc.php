<?php

    require 'db.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        if(empty($fname) || empty($email) || empty($msg)){
            header("Location:contactus.php?error=fillall");
            exit();
        }else{
            $sql = "INSERT into feedback values('$fname','$email','$msg')";
            mysqli_query($con,$sql);
            header("Location:contact.php?succes=feedback");
            exit();
        }
    }