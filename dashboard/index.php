<?php
session_start();
if (isset($_SESSION['dash'])) {
    header("location:main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard Login - Journey Mate</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/design.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <style>
        input:focus,
    textarea:focus,
    select:focus {
      outline: none;
    }
        </style>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <?php 
    require 'login.php';
    ?>
    
</body>

</html>