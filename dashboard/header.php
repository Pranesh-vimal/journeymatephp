<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOURNEY MATE</title>
</head>

<body>

    <header class="w3-padding w3-large w3-top " id="bg">
        <div class="w3-bar">
            <a class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-hover-white w3-text-white w3-bar-item" href="index.php"><b>JOURNEY MATE</b></a>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/dashboard/main.php') : ?>
                <form method="post" action="logout.php">
                    <b><input class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-button w3-text-white w3-bar-item w3-hide-small" type="submit" name="logout" value="Logout"></b>
                </form>
                <?php endif ?>
            <?php if ($_SERVER['PHP_SELF'] == '/journeymate/dashboard/main.php') : ?>
                <a href="javascript:void(0)" class="w3-padding w3-small w3-hover-text-blue a w3-round-large w3-hover-text-blue w3-right w3-hover-white w3-text-white w3-bar-item w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
            <?php endif ?>
        </div>
    <div id="demo" class="w3-padding w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-center" id="bg">
        <?php if ($_SERVER['PHP_SELF'] == '/journeymate/dashboard/main.php') : ?>
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
            } else {
                x.className = x.className.replace("w3-show", "");
            }
        }
    </script>
</body>

</html>