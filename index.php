<?php
session_start();
if (isset($_SESSION['id'])) {
  header("location:prereq.php");
  exit();
}else if(isset($_SESSION['dash'])){
  header("location:dashboard/index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
  <title>Journey Mate</title>
  <link rel="stylesheet" href="css/design.css">
  <style type="text/css">
    @media (min-width: 360px) {
      #index {
        background: lightgreen;
      }
    }

    @media (min-width: 1200px) {
      #index {
        background-image: url("img/inwal.jpg");
        background-size: cover;
        background-repeat: no-repeat;

      }
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
    }

    .loader {
      position: fixed;
      z-index: 99;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader>img {
      width: 100px;
    }

    .loader.hidden {
      animation: fadeOut 1s;
      animation-fill-mode: forwards;
    }

    @keyframes fadeOut {
      100% {
        opacity: 0;
        visibility: hidden;
      }
    }

    .lds-grid {
      display: inline-block;
      position: relative;
      width: 64px;
      height: 64px;
    }

    .lds-grid div {
      position: absolute;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      background: red;
      animation: lds-grid 1.2s linear infinite;
    }

    .lds-grid div:nth-child(1) {
      top: 6px;
      left: 6px;
      animation-delay: 0s;
    }

    .lds-grid div:nth-child(2) {
      top: 6px;
      left: 26px;
      animation-delay: -0.4s;
    }

    .lds-grid div:nth-child(3) {
      top: 6px;
      left: 45px;
      animation-delay: -0.8s;
    }

    .lds-grid div:nth-child(4) {
      top: 26px;
      left: 6px;
      animation-delay: -0.4s;
    }

    .lds-grid div:nth-child(5) {
      top: 26px;
      left: 26px;
      animation-delay: -0.8s;
    }

    .lds-grid div:nth-child(6) {
      top: 26px;
      left: 45px;
      animation-delay: -1.2s;
    }

    .lds-grid div:nth-child(7) {
      top: 45px;
      left: 6px;
      animation-delay: -0.8s;
    }

    .lds-grid div:nth-child(8) {
      top: 45px;
      left: 26px;
      animation-delay: -1.2s;
    }

    .lds-grid div:nth-child(9) {
      top: 45px;
      left: 45px;
      animation-delay: -1.6s;
    }

    @keyframes lds-grid {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0.5;
      }
    }
  </style>
</head>

<body id="index">
  <div class="loader">
    <!-- <img src="img/831.gif"> -->
    <div class="lds-grid">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <?php
  require 'header.php';
  ?>
  <?php
  require 'login.php';
  ?>
  <script type="text/javascript">
    window.addEventListener("load", function() {
      const loader = document.querySelector(".loader");
      loader.className += " hidden"; // class "loader hidden"
    });
  </script>
</body>

</html>