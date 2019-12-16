<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
}

$email = "";
if (isset($_GET['error'])) {
    $email = $_GET['email'];
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
    <title>Forget Password - Journey Mate</title>
    <link rel="stylesheet" href="css/design.css">
    <style>
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

<body>
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
    <br>
    <br>
    <div class="w3-container w3-row w3-row-padding">
        <div class="w3-panel w3-twothird w3-center w3-padding ">

        </div>

        <div class="w3-panel w3-third w3-padding w3-card-4 w3-round-large w3-white ">
            <div class="w3-panel w3-padding w3-center ">

                <h1 class="w3-padding w3-large w3-text-indigo " id="txthead"><b>Forget Password</b></h1>
                <form class="w3-container w3-small" method="post" action="inc/mail.inc.php">
                    <label class="w3-text-red "><b>Email : &nbsp; &nbsp; &nbsp; &nbsp; </b></label>
                    <input type="email" value="<?php echo $email; ?>" name="email" class="w3-panel w3-border w3-center w3-padding w3-round-large w3-border-blue " autocomplete="off" placeholder="Enter Your Email">
                    <br>
                    <input type="submit" name="send" value="Send" class="w3-center w3-panel w3-padding w3-round-large w3-red w3-button w3-hover-indigo">
                </form>
                <?php
                if (isset($_GET['error'])) { ?>
                    <div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
                    <?php
                        if ($_GET['error'] == "emptyfields") {
                            echo "Fill All Fields *";
                        } elseif ($_GET['error'] == "sqlError") {
                            echo "Try Again Later Server Problem";
                        } else if ($_GET['error'] == "emailerror") {
                            echo "Enter A Valid Email";
                        }
                    }
                    ?>
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener("load", function() {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
</body>

</html>