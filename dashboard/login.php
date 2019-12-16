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
		<div class="w3-panel w3-third w3-center w3-padding ">
		</div>
        <div class="w3-panel w3-third w3-center w3-padding  w3-round-large  w3-card-4 ">
            <div class="w3-panel w3-padding w3-center ">
    
                <h1 class="w3-padding w3-large w3-text-indigo " id="txthead"><b>Login</b></h1>
                <form class="w3-container w3-small" method="post" action="inc/login.inc.php">
                    <label class="w3-text-red "><b>Email : &nbsp; &nbsp; &nbsp; &nbsp; </b></label>
                    <input type="email" value="<?php echo $email; ?>" name="email" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " autocomplete="off" placeholder="Enter Your Email">
                    <br>
                    <label class="w3-text-red "><b>Password : </b></label>
                    <input type="password" name="password" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " placeholder="Enter Your Password"><br>
                    <input type="submit" name="login" value="Login" class="w3-center w3-panel w3-padding w3-round-large w3-red w3-button w3-hover-indigo">
                </form>
                <?php
                if (isset($_GET['error'])) { ?>
                    <div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
                    <?php
                        if ($_GET['error'] == "emptyfields") {
                            echo "Fill All Fields *";
                        } elseif ($_GET['error'] == "passwordMissMatch") {
                            echo "Password Wrong *";
                        } elseif ($_GET['error'] == "emailIncorrect") {
                            echo "No Account Found*";
                        } 
                    }
                    ?>
                    </div>
            </div>
		</div>
		<div class="w3-panel w3-third w3-padding w3-white ">
		</div>
	</div>
</body>

</html>