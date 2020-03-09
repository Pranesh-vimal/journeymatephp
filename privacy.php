<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privacy Polices - Journey Mate</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
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
        <div class="w3-panel w3-third w3-center w3-padding ">

        </div>

        <div class="w3-panel w3-third w3-padding w3-card-4 w3-round-large w3-white ">
            <div class="w3-panel w3-padding w3-center ">
                <h1 class="w3-padding w3-large w3-text-indigo " id="txthead"><b>Privacy Policy</b></h1>
                <p>We Are The Team From Journey Mate ! Thank You For Using Our Site. We Provide The Higher Security To Your Data. We Won't Share Your Data To Anyone Else Except Gov. Officers For Safety Purpose. <br> Have A Safe Journey   </p>
            </div>
        </div>
        <div class="w3-panel w3-third w3-center w3-padding ">

        </div>
    </div>
    <?php
    require 'footer.php';
    ?>
    <script type="text/javascript">
        window.addEventListener("load", function() {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
</body>

</html>