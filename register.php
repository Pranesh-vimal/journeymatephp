<?php
session_start();
$fname = "";
$lname = "";
$email = "";
$phno = "";
$dob = "";
if (isset($_GET['error'])) {
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $email = $_GET['email'];
  $phno = $_GET['phno'];
  $dob = $_GET['dob'];
}
if (isset($_SESSION['id'])) {
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
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
  <title>Journey Mate</title>
  <link rel="stylesheet" href="css/design.css">
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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

    #txthead {
      font-family: 'Blinker', sans-serif;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=date]::-webkit-inner-spin-button,
    input[type=date]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
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
      background: skyblue;
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

    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-calendar-picker-indicator {
      display: none;
      -webkit-appearance: none;
    }
  </style>
</head>

<body id="index">
  <div class="loader">
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
  <br>
  <br class="w3-hide-small">
  <div class="w3-container w3-row w3-row-padding">
    <div class="w3-panel w3-twothird w3-center w3-padding ">
      <div class="w3-panel w3-padding w3-large w3-hide-small">
        <section class="w3-text-white">
          <h3>
            Register Your Account <br> Plan Your Journey !
          </h3>
        </section>
      </div>
    </div>

    <div class="w3-panel w3-third w3-padding w3-card-4 w3-round-large w3-white ">
      <div class="w3-panel w3-padding w3-center ">

        <h1 class="w3-padding w3-large w3-text-indigo " id="txthead"><b>Register</b></h1>
        <form class="w3-container w3-small" method="post" action="inc/register.inc.php">
          <label class="w3-text-red "><b>First Name &nbsp; &nbsp;&nbsp;: &nbsp;&nbsp; </b></label>
          <input type="text" value="<?php echo $fname; ?>" autocomplete="off" onKeyPress="if(this.value.length==20) return false;" name="fname" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your FirstName">
          <br>
          <label class="w3-text-red "><b>Last Name &nbsp;&nbsp; &nbsp;: &nbsp;&nbsp;</b></label>
          <input type="text" value="<?php echo $lname; ?>" autocomplete="off" onKeyPress="if(this.value.length==20) return false;" name="lname" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your LastName">
          <br>
          <label class="w3-text-red "><b>Email &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b></label>
          <input type="email" name="email" value="<?php echo $email; ?>" autocomplete="off" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Email">
          <br>
          <label class="w3-text-red "><b>Gender &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b></label>
          <select name="gender" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " style="width: 190px;">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Others</option>
          </select><br>
          <label class="w3-text-red "><b>Phone No. &nbsp; &nbsp; : &nbsp; &nbsp; </b></label>
          <input type="text" name="phno" value="<?php echo $phno; ?>" autocomplete="off" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Phone No." pattern="[1-9]{1}[0-9]{9}" onKeyPress="if(this.value.length==10) return false;"><br>
          <label class="w3-text-red "><b>Date of Birth &nbsp;:&nbsp;</b></label>
          <input type="text" name="dob" id="dob" value="<?php echo $dob; ?>" placeholder="Enter Your D.O.B" autocomplete="off" style="width: 190px;" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue "><br>
          <label class="w3-text-red "><b>Password &nbsp; &nbsp; : &nbsp; &nbsp;</b></label>
          <input type="password" name="password1" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Password"><br>
          <p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Minimum 8 Characters *</b></p>
          <label class="w3-text-red "><b>Re-Password : </b></label>
          <input type="password" name="password2" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Password Again"><br>
          <p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Same Password *</b></p>
          <input type="submit" name="register" value="Register" class="w3-center w3-panel w3-padding w3-round-large w3-red w3-button w3-hover-indigo">
        </form>
        <?php
        if (isset($_GET['error'])) { ?>
          <div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
          <?php
          if ($_GET['error'] == "emptyfields") {
            echo "Fill All Fields *";
          } elseif ($_GET['error'] == "invalidUserEmail") {
            echo "Enter A Valid Email Id *";
          } elseif ($_GET['error'] == "passwordMissMatch") {
            echo "Password Wrong Enter Same Password In Two Fields *";
          } elseif ($_GET['error'] == "sqlerror") {
            echo "Try Again Later Server Problem ";
          } elseif ($_GET['error'] == "emailAlreadyTaken") {
            echo "Email Already Exist Login To Continue ";
          } elseif ($_GET['error'] == "invalidNum") {
            echo "Enter A Valid Number *";
          } elseif ($_GET['error'] == "invalidUserName") {
            echo "Enter A Valid Name *";
          } elseif ($_GET['error'] == "invalidDob") {
            echo "Enter A Valid Date *";
          } elseif ($_GET['error'] == "invalidPass") {
            echo "Enter A Valid Password *";
          }
        }
          ?>
          </div>
      </div>
    </div>
  </div>
  <!-- <script type="text/javascript">
		$(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker("show");
         });
	</script> -->
  <script type="text/javascript">
    window.addEventListener("load", function() {
      const loader = document.querySelector(".loader");
      loader.className += " hidden"; // class "loader hidden"
    });
    var d = new Date();
    var year = d.getFullYear() - 18;
    d.setFullYear(year);
    $('#dob').datepicker({
      changeYear: true,
      changeMonth: true,
      yearRange: '1920:' + year + '',
      defaultDate: d
    });
  </script>
</body>

</html>