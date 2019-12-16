<?php
session_start();
require_once 'db.php';
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    
    if(empty($fname) || empty($lname)){
        header("Location:../profile.php?error=emptyfields&fname=".$fname."&lname=".$lname);
        exit();
    }else{
        $sql = "UPDATE account SET fname=?,lname=? WHERE id= $_SESSION[id]";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../profile.php?error=sqlerror&fname=".$fname."&lname=".$lname);
            exit();
        }else{
            $stmt->bind_param("ss",$fname,$lname);
            mysqli_stmt_execute($stmt);

            header("Location:../profile.php?success");
            exit();
        }
    }
}
