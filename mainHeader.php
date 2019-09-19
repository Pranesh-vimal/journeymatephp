<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <title>Journey Mate</title>
      <link rel="stylesheet" href="css/design.css">
</head>
<body>
	<header class="w3-padding w3-large w3-top" id="bg">
	<div class="w3-bar">
    <a class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item" href="main.php"><b>JOURNEY MATE</b></a>
    <?php if ($_SERVER['PHP_SELF'] !== '/journeymate/main.php' && $_SERVER['PHP_SELF'] !== '/journeymate/changepwd.php'): ?>
    <a href="main.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small w3-button"><b>Back To Feed</b></a>
    <?php endif ?>
     <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php' || $_SERVER['PHP_SELF'] == '/journeymate/proflie.php'): ?>
    <form method="post" action="logout.php">
        <b><input class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-button w3-text-white w3-bar-item w3-hide-small" type="submit" name="logout" value="Logout"></b>
    </form>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/changepwd.php'): ?>
    <a href="profile.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Back To Profile</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="profile.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Profile</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="recent.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Recent</b></a>
    <?php endif ?>
     <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="addT.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-right w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Add Travel</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="main.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-right w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Travel Feed</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="javascript:void(0)" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] !== '/journeymate/main.php' && $_SERVER['PHP_SELF'] !== '/journeymate/changepwd.php'): ?>
    <a href="main.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-medium w3-hide-large"><b>Back To Feed</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/changepwd.php'): ?>
    <a href="profile.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-medium w3-hide-large"><b>Back To Profile</b></a>
    <?php endif ?>
    </div>

    <div id="demo" class="w3-padding w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-center" id="bg">
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="main.php" class=" w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Travel Feed </b></a>
    <?php endif ?>
     <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="addT.php" class="w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Add Travel</b></a>
    <?php endif ?>
        <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="recent.php" class=" w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Recent</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
    <a href="profile.php" class="w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Profile</b></a>
    <?php endif ?>
    <?php if ($_SERVER['PHP_SELF'] == '/journeymate/main.php'): ?>
     <form method="post" action="logout.php">
        <b><input class="w3-small w3-center w3-hover-text-blue w3-button  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item " type="submit" name="logout" value="Logout"></b>
    </form>
    <?php endif ?>
    </div>
	</header>
	<script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("demo");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show ";
			}
			else{
				x.className = x.className.replace("w3-show", "");
			}
		}
</script>
</body>
</html>