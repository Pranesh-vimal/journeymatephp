<?php

    require 'db.php';

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email= $_POST['email'];
        $feed = $_POST['feedback'];

        if(empty($name) || empty($email) || empty($feed)){
            header("location:../feedback.php?error=emptyfields&name=".$name."&email=".$email."&feed=".$feed);
            exit();
        }else{
            $sql = "INSERT into feedback(name,email,feed) values('$name','$email','$feed') ";
            mysqli_query($con,$sql);
            header("location:../index.php?error=feedback");
            exit();
        }
    }else{
        header("location:../index.php");
        exit();
    }

