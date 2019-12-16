<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOURNEY MATE</title>
    <style>
        ::-webkit-scrollbar {
			width: 10px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			box-shadow: inset 0 0 5px white;
			border-radius: 10px;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: red;
			border-radius: 10px;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #b30000;
		}
    </style>
</head>

<body>

    <header class="w3-padding w3-large w3-top " id="bg">
        <div class="w3-bar">
            <a class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item" href="index.php"><b>JOURNEY MATE</b></a>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/index.php') : ?>
                <a href="register.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-right w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Register</b></a>
            <?php endif ?>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/register.php') : ?>
                <a href="index.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Login</b></a>
            <?php endif ?>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/forgetpwd.php') : ?>
                <a href="index.php" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-small"><b>Back To Login</b></a>
            <?php endif ?>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/register.php' || $_SERVER['PHP_SELF'] == '/journeymate/index.php') : ?>
                <a href="javascript:void(0)" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
        </div>
    <?php endif ?>
    <div id="demo" class="w3-padding w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-center" id="bg">
        <?php if ($_SERVER['PHP_SELF'] == '/journeymate/index.php') : ?>
            <a href="register.php" class=" w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Register</b></a>
        <?php endif ?>
        <?php if ($_SERVER['PHP_SELF'] == '/journeymate/register.php') : ?>
            <a href="index.php" class="w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Login</b></a>
        <?php endif ?>
        <?php if ($_SERVER['PHP_SELF'] == '/journeymate/forgetpwd.php') : ?>
            <a href="index.php" class="w3-small w3-center w3-hover-text-blue  w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item "><b>Back To Login</b></a>
        <?php endif ?>
    </div>
    </header>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show ";
            } else {
                x.className = x.className.replace("w3-show", "");
            }
        }
    </script>
</body>

</html>