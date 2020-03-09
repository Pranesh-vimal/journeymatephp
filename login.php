<?php
$email = "";
if (isset($_GET['error'])) {
	$email = $_GET['email'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/design.css">
	<link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
	<title>Journey Mate</title>
	<style type="text/css">
		#txthead {
			font-family: 'Blinker', sans-serif;
		}
	</style>
</head>

<body>
	<br>
	<br>
	<div class="w3-container w3-row w3-row-padding">
		<div class="w3-panel w3-twothird w3-center w3-padding ">
			<div class="w3-panel w3-padding w3-large w3-hide-small">
				<section class="w3-text-white">
					<h3>
						Choose Your Travel Partner
					</h3>
				</section>
			</div>
		</div>

		<div class="w3-panel w3-third w3-padding w3-card-4 w3-round-large w3-white ">
			<div class="w3-panel w3-padding w3-center">
				<h1 class="w3-padding w3-large w3-text-indigo " id="txthead"><b>Login</b></h1>
				<form class="w3-container w3-small" method="post" action="inc/login.inc.php">
					<label class="w3-text-red "><b>Email : &nbsp; &nbsp; &nbsp; &nbsp; </b></label>
					<input type="email" value="<?php echo $email; ?>" name="email" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " autocomplete="off" placeholder="Enter Your Email">
					<br>
					<label class="w3-text-red "><b>Password : </b></label>
					<input type="password" name="password" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Password"><br>
					<input type="submit" name="login" value="Login" class="w3-center w3-panel w3-padding w3-round-large w3-red w3-button w3-hover-indigo">
				</form>
				<!-- <div class="w3-center w3-text-blue">
					<a href="forgetpwd.php">Forget Password ?</a>
				</div> -->
				<?php
				if (isset($_GET['error'])) { ?>
					<div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
					<?php
						if ($_GET['error'] == "emptyfields") {
							echo "Fill All Fields *";
						} elseif ($_GET['error'] == "sqlError") {
							echo "Try Again Later Server Problem";
						} elseif ($_GET['error'] == "PasswordIncorrect") {
							echo "Password Wrong *";
						} elseif ($_GET['error'] == "nouser") {
							echo "No Account Found Create An Account *";
						} elseif ($_GET['error'] == "success") {
							echo "Login Your Account *";
						} elseif ($_GET['error'] == "feedback") {
							echo "Thank You For Your Feedback";
						}
					}
					?>
					</div>
			</div>
		</div>
	</div>
</body>

</html>