<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <title>Change Password - Journey Mate</title>
     <link rel="stylesheet" href="css/design.css">
     <style type="text/css">
     	input:focus, textarea:focus, select:focus{
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
		<p class="w3-tag w3-red w3-round-large w3-padding"><b>Enter Your Password </b></p>
		<form class="w3-padding w3-center w3-panel" method="post" action="inc/changepwd.php" >
			<label class="w3-tag w3-panel w3-round-large w3-indigo">Password : </label>
			<input class="w3-padding w3-panel w3-round-large w3-border" type="password" placeholder="Enter Your Password" name="pass1"><br>
			<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Minimum of 8 Characters *</b></p>
			<label class="w3-tag w3-panel w3-round-large w3-indigo">Re-Enter &nbsp;  : </label>
			<input class="w3-padding w3-panel w3-round-large w3-border" type="password" placeholder="Re-Enter Your Password" name="pass2"><br>
			<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Same As Top *</b></p>
			<input class="w3-padding w3-panel w3-round-large w3-border w3-button w3-red w3-text-white w3-hover-green" type="submit" name="change" value="Change">
			<?php 
					if (isset($_GET['error'])) { ?>
						<div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
					<?php
						if ($_GET['error'] == "fillall") {
							echo "Fill All Fields *";
						}elseif ($_GET['error'] == "missMatch") {
							echo "Enter Same Password In Both Fields *";
						}elseif ($_GET['error'] == "charerr") {
							echo "Enter Minimum Of * Characters *";
						}elseif ($_GET['error'] == "sqlerror") {
							echo "Error In Server Try Again Later*";
						}
					}	
				?>
			</div>
		</form>
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