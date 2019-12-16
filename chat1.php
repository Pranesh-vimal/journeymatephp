<?php

require 'inc/db.php';

    session_start();

    $pid = $_SESSION['pid'];
    $id = $_SESSION['id'];
    $jid = $_SESSION['jid'];
    if(isset($_SESSION['backid'])){
        $backid = $_SESSION['backid'];
    }

if(isset($_POST['submit'])){
    $msg = $_POST['message'];
    $sql1 = "INSERT INTO chat(jid,pid,userid,msg) VALUES($jid,$pid,$id,'$msg')";
    mysqli_query($con,$sql1);
    header("location:detail.php?pid=".$pid."&jid=".$jid);
    exit();
}
else if(isset($_POST['send'])){
    $msg = $_POST['message'];
    $sql1 = "INSERT INTO chat(jid,pid,userid,msg) VALUES($jid,$pid,$id,'$msg')";
    mysqli_query($con,$sql1);
    header("location:profileView.php?id=".$backid);
    exit();
}