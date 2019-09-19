<?php 
	session_start();
	if (isset($_SESSION['id'])) {
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		$number = $_SESSION['phno'];
		$gender = $_SESSION['gender'];
		$age = $_SESSION['age'];
		$dob = $_SESSION['dob'];
	}
	else{
		header("location:index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <title>Profile - Journey Mate</title>
     <link rel="stylesheet" href="css/design.css">
     <style type="text/css">
     	input:focus, textarea:focus, select:focus{
        outline: none;
    }
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
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

.loader > img {
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
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}
     </style>
</head>
<body>
<?php 
		require 'mainHeader.php';
?>
<div class="w3-panel w3-padding">
	
</div>
<br>
 <div class="loader">
      <!-- <img src="img/831.gif"> -->
      <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
<div class="w3-container w3-padding w3-center">
	<div class="w3-padding w3-padding w3-panel w3-round-large">
		<p class="w3-tag w3-red w3-round-large w3-padding"><b>Profile</b></p>
	<form class="w3-padding ">
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>FirstName : </b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="fname" value="<?php echo $fname; ?>"  placeholder="Enter The First Name" required><br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>LastName : </b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="lname" value="<?php echo $lname; ?>"  placeholder="Enter The Last Name" required><br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>&nbsp; &nbsp;Email &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; </b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="email" name="email" value="<?php echo $email; ?>" disabled placeholder="Enter The Email" required><br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>&nbsp;&nbsp;Gender&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; </b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="gender" value="<?php echo $gender; ?>" disabled placeholder="Enter The Genderl" required>
		<br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Date of Birth :</b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="dob" value="<?php echo $dob; ?>"  style="width: 220px;" disabled  required>
		<br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="age" value="<?php echo $age; ?>" disabled placeholder="Enter The Age" required>
		<br>
		<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>&nbsp;&nbsp;&nbsp;Phone &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; </b></label>
		<input class="w3-padding w3-panel w3-round-large w3-border" type="number" value="<?php echo $number; ?>" disabled  onKeyPress="if(this.value.length==10) return false;" name="phno" value="<?php  ?>" placeholder="Enter The Phone" required><br>
		<input class="w3-padding w3-panel w3-round-large w3-red w3-hover-indigo w3-text-white w3-button"  type="submit" name="update" value="update"><br>
		<?php 
					if (isset($_GET['error']) || isset($_GET['success'])) { ?>
						<div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
					<?php
						if ($_GET['success'] == "changed") {
							echo "Changes Made Successfully *";
						}
					}	
				?>
			</div>
	</form>
	<p class="w3-container w3-center w3-panel"><a class="w3-padding w3-text-white w3-indigo w3-round-large w3-hover-green" href="changepwd.php">Change Password ? </a></p>
	</div>
</div>
<script type="text/javascript">
	 window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
</script>
</body>
</html>