<?php

    require_once 'db.php';
    
    if(isset($_POST['rate'])){

        $pid = $_GET['pid'];
        $jid = $_GET['jid'];
        $partid = $_GET['partid'];

        $rate = $_POST['rating'];

        $sql = "UPDATE partner SET ratej=$rate where pid=$pid and jid=$jid and partid=$partid";

        mysqli_query($con,$sql);

        header("Location:../detail.php?pid=".$pid."&jid=".$jid."&success=journey");
        exit();
    }else{
        header("Location:../index.php");
        exit();
    }