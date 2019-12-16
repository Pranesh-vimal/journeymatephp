<?php

require 'inc/db.php';

session_start();
if (isset($_GET['id'])) {
  $_SESSION['backid'] = $_GET['id'];
  $sql = "SELECT * from account where id=$_GET[id]";
  $res = mysqli_query($con, $sql);
  while ($rows  = mysqli_fetch_assoc($res)) {
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $gender = $rows['gender'];
    $dob = $rows['dob'];
    $age = $rows['age'];
    $phone = $rows['phone'];
  }
  $sql1 = "SELECT * from detail where pid=$_GET[id]";
  $res1 = mysqli_query($con, $sql1);
  while ($rows  = mysqli_fetch_assoc($res1)) {
    $native = $rows['native'];
    $address = $rows['address'];
    $car = $rows['car'];
    $carname = $rows['carname'];
    $work = $rows['work'];
    $travell = $rows['travell'];
    $status = $rows['status'];
    $medical = $rows['medical'];
    $issue = $rows['issue'];
    $img = $rows['img'];
  }

  $rate = "SELECT * from partner where partid=$_GET[id]";

  $resrate = mysqli_query($con, $rate);

  $dt = new DateTime();
  $dt = $dt->format('Y-m-d H:i:s');
} else {
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
  <title>Profile Viewer - Journey Mate</title>
  <link rel="stylesheet" href="css/design.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
  </script>
  <script src="https://kit.fontawesome.com/90c41f30c4.js" crossorigin="anonymous"></script>
  <style type="text/css">
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

    #pro {
      border-radius: 50%;
      height: 100px;
      width: 100px;
    }

    #chat {
      height: 250px;
      overflow-x: hidden;
      overflow-y: scroll;
      scroll-behavior: smooth;
    }

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
  <?php
  require 'mainHeader.php';
  ?>
  <div class="w3-panel">
    <br>
  </div>
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

  <div class="w3-row">
    <div>
    <div class="w3-quarter w3-padding">
      <?php

      $pid = $_SESSION['pid'];
      $jid = $_SESSION['jid'];
      $id = $_GET['id'];
      $sqlr1 = "SELECT * from journey where pid=$pid and jid=$jid";

      $resultr1 = mysqli_query($con, $sqlr1);

      if (mysqli_num_rows($resultr1)) {
        while ($rows = mysqli_fetch_assoc($resultr1)) {
          if (strtotime($rows['dt']) < strtotime($dt)) {
            ?>
            <div class="w3-padding w3-center w3-card-4 w3-round-large">
              <h1 class="w3-center w3-text-blue w3-small">Rate Your Partner !</h1>
              <div class="w3-panel w3-padding">
                <?php
                      $ratepart = "SELECT * from partner where pid=$pid and jid=$jid and partid=$id";

                      $resratepart = mysqli_query($con, $ratepart);

                      if (mysqli_num_rows($resratepart)) {
                        while ($rows = mysqli_fetch_assoc($resratepart)) {
                          if ($rows['ratepart'] == 0) {
                            ?>
                      <form class="w3-padding" action="inc/ratepart.inc.php?pid=<?php echo $pid; ?>&jid=<?php echo $jid; ?>&partid=<?php echo $id; ?>" method="post">
                        <select class="w3-padding w3-border-white" name="rating">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option selected value="5">5</option>
                        </select>
                        <input type="submit" name="rate" value="Rate" class="w3-button w3-padding w3-text-white w3-red w3-hover-green w3-round-large">
                      </form>
                    <?php
                              } else {
                                ?>
                      <p class="w3-indigo w3-text-white w3-padding w3-round-large">Your Rating : <?php echo $rows['ratepart']; ?> </p>
                <?php
                          }
                        }
                      }
                      ?>
                <?php
                      if (isset($_GET['success'])) {
                        if ($_GET['success'] == 'partner') {
                          ?>
                    <p class="w3-indigo w3-text-white w3-padding w3-round-large">Thanks For Your Rating About Partner !</p>
                <?php
                        }
                      }
                      ?>
              </div>

        <?php
            }
          }
        } ?>
            </div>
    </div>
    <div class="w3-half w3-padding">
      <div class="w3-padding w3-center w3-card-4 w3-round-large">
        <div class="w3-center w3-round-large w3-panel">
          <button class="w3-button w3-hover-white" onclick="document.getElementById('id01').style.display='block'">
            <img id="pro" align="center" src="profile/<?php echo $img; ?>">
          </button>
          <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

              <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-medium w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="profile/<?php echo $img; ?>" alt="Avatar" class="w3-image w3-margin-top">
              </div>
            </div>
          </div>
        </div>
        <div class="w3-row w3-padding  w3-light-green w3-round-large w3-text-white">
          <div class="w3-third w3-padding">
            <p>First Name : <?php echo $fname; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Last Name : <?php echo $lname; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Age : <?php echo $age; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Gender : <?php echo ucwords($gender); ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>D.O.B : <?php echo date("d.m.Y ", strtotime($dob)); ?></p>
          </div>
        </div>
        <div class="w3-row w3-padding w3-panel  w3-light-blue w3-round-large w3-text-white">
          <div class="w3-third w3-padding">
            <p>Native : <?php echo $native; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Address : <?php echo $address; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Work :<br> <?php echo $work; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Travell : <?php echo $travell; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Status : <?php echo $status; ?></p>
          </div>
          <div class="w3-third w3-padding ">
            <p>Car Name : <?php if ($carname == NULL) {
                            echo "Car Not Available";
                          } else {
                            echo $carname;
                          } ?></p>
          </div>
          <div class="w3-rest w3-padding ">
            <p>Medical Issues : <?php if ($issue == NULL) {
                                  echo "No Medical Issues";
                                } else {
                                  echo $issue;
                                } ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="w3-quarter w3-padding">
      <div class="w3-padding w3-card-4 w3-round-large ">
        <div class="w3-panel w3-padding w3-center">
          <?php
          if (mysqli_num_rows($resrate)) {
            $rating = 0;
            while ($rows = mysqli_fetch_assoc($resrate)) {
              $rating += $rows['ratepart'];
            }
            $rating /= mysqli_num_rows($resrate);
          } else {
            $rating = 0;
          }
          ?>
          <p class="w3-text-indigo"><b>Person Rating</b></p>
          <p class="w3-large w3-text-light-green"><b><?php if ($rating != 0) for ($i = 0; $i < round($rating); $i++) { ?><i class="fas fa-star"></i> <?php } else echo "Rating Is Not Available";  ?> </b></p>
        </div>
      </div>
      <?php
        $time = "SELECT * from journey where pid=$pid and jid=$jid";

        $resulttime = mysqli_query($con, $time);
  
        if (mysqli_num_rows($resulttime)) {
          while ($rows = mysqli_fetch_assoc($resulttime)) {
            if (strtotime($rows['dt']) > strtotime($dt)) {
              ?>
      <div class="w3-padding w3-center w3-card-4 w3-round-large w3-panel">
        <h1 class="w3-center w3-text-blue w3-small">Chat With Your Partner </h1>
        <i title="To Scroll Up" class="fas fa-angle-up w3-large w3-round-large w3-text-white w3-indigo w3-padding" onclick="up()"></i>
        <i title="To Scroll Down" class="fas fa-angle-down w3-large w3-round-large w3-text-white w3-indigo w3-padding" onclick="down()"></i>
        <div class="w3-panel w3-border w3-round-large" id="chat">

        </div>
        <form method="post" action="chat1.php">
          <input type="text" autocomplete="off" id="message" name="message" placeholder="Enter Your Message" class="w3-small w3-padding w3-border-indigo w3-round-large">
          <input type="submit" id="submit" name="send" value="Send" class="w3-button w3-hover-red w3-indigo w3-text-white w3-round-large">
        </form>
      </div>
      <?php
            }
          }
        }
      ?>
    </div>
  </div>

  <script type="text/javascript">
    window.addEventListener("load", function() {
      const loader = document.querySelector(".loader");
      loader.className += " hidden"; // class "loader hidden"
    });
    setInterval(function() {
      $("#chat").load('chat.php');
    }, 10);

    function down() {
      $(document).ready(function() {
        var $text = $('#chat');
        $text.scrollTop($text[0].scrollHeight);
      });
    }

    function up() {
      $(document).ready(function() {
        var myDiv = document.getElementById('chat');
        myDiv.scrollTop = 0;
      });
    }
  </script>

</body>

</html>