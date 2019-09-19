<?php 
   $from = "";
   $to="";
   $seat="";
	if (isset($_GET['error'])) {
		$from = $_GET['from'];
		$to = $_GET['to'];
		$seat = $_GET['seat'];
	} 

  session_start();

  require 'inc/db.php';
  $id = $_SESSION['id'];
  $sql1 = "SELECT * from detail where pid = $id ";
    $res = mysqli_query($con,$sql1); 
    if (mysqli_num_rows($res)) {
      while ($rows = mysqli_fetch_assoc($res)) {  
        $car = $rows['car'];
      }
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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	

      <style type="text/css">
     	input:focus, textarea:focus, select:focus{
        outline: none;
    }
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=date]::-webkit-inner-spin-button, 
input[type=date]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=time]::-webkit-inner-spin-button, 
input[type=time]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

ul{
	background-color: white;
	color: red;
	border-radius: 5px;  
	cursor: pointer;
}

li{
	padding: 10px;
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
<div class="w3-panel">
	<br>
</div>

<div class="w3-container w3-panel w3-padding">
	<div class="w3-row w3-row-padding">
		<div class="w3-third w3-padding">
			
		</div>
     
		<div class="w3-third w3-card-4 w3-padding w3-center w3-round-large">
      <?php 
        if ($car === 'no') {
       ?>
      <p class="w3-text-orange"><b>You Doesn't Have A Car To Add A Post</b></p>
      <?php 
        }else{
       ?>
			<p class="w3-text-orange"><b>Enter the Journey Details</b></p>
			<form class=" w3-padding w3-round-large w3-panel" method="post" action="inc/add.inc.php">
			<label class="w3-padding w3-tag w3-panel w3-round-large"><b>From : </b></label>
			<input class="w3-padding w3-round-large w3-border w3-panel" autocomplete="off" type="text" name="from" id="from" placeholder="Enter the Starting Point" value="<?php echo $from; ?>"><br>
			<div id="fromList"></div>
			<label class="w3-padding w3-tag w3-panel w3-round-large"><b>To &nbsp; &nbsp;:  &nbsp;</b></label>
			<input class="w3-padding w3-round-large w3-border w3-panel" autocomplete="off" type="text" name="to" id="to" placeholder="Enter the End Point" value="<?php echo $to; ?>"><br>
			<div id="toList"></div>
			<label class="w3-padding w3-tag w3-panel w3-round-large"><b>Seats :</b></label>
			<input class="w3-padding w3-round-large w3-border w3-panel" type="number" max="3"  name="seat"   placeholder="Enter the No. of Seats" value="<?php echo $seat; ?>"><br>
			<label class="w3-padding w3-tag w3-panel w3-round-large"><b>Date :</b></label>
			<input class="w3-padding w3-round-large w3-border w3-panel" type="date" name="date" style="width: 220px;" id="date"><br>
			<label class="w3-padding w3-tag w3-panel w3-round-large"><b>Time :</b></label>
			<input class="w3-padding w3-round-large w3-border w3-panel" type="time" name="time" style="width: 220px;"><br>
			<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter in 24hrs format *</b></p>
      <label class="w3-padding w3-tag w3-panel w3-round-large"><b>Note :</b></label><br>
      <textarea class="w3-padding w3-round-large w3-border w3-panel"  style="resize: none;" rows="4" cols="25" name="desc" ></textarea><br>
      <p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Any Description *</b></p>
			<input class="w3-padding w3-round-large w3-border w3-panel w3-button w3-red w3-text-white w3-hover-indigo" type="submit" name="add" value="Add Post">
	</form>
			
			<?php 
          if (isset($_GET['error'])) { ?>
            <div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
          <?php
            if ($_GET['error'] == "fillall") {
              echo "Fill All Fields *";
            } elseif ($_GET['error'] == "same") {
              echo "From And To Places Are Same *";
            }elseif ($_GET['error'] == "seat") {
              echo "Enter A Valid No.of Seats (Max 3) *";
            }elseif ($_GET['error'] == "sqlerror1") {
              echo "Try Again Later Server Problem ";
            }elseif ($_GET['error'] == "sqlerror2") {
              echo "Try Again Later Server Problem";
            }
          }
         ?>
      </div>
        <?php 
          }
         ?>
		</div>
		<div class="w3-third w3-padding">
			
		</div>
	</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  		
  		$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#date').attr('min', maxDate);
});

  	document.getElementById('date').addEventListener('keydown', function(e) {
    if (e.which === 38 || e.which === 40) {
        e.preventDefault();
    }
});

  	$("[type='date']").keypress(function (evt) {
    evt.preventDefault();
});

window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});

  	$(document).ready(function(){
  		$('#from').keyup(function(){
  			var query = $(this).val();
  			if (query != '') {
  				$.ajax({
  					url: "inc/search.php",
  					method:"POST",
  					data:{query:query},
  					success: function(data){
  						$('#fromList').fadeIn();
  						$('#fromList').html(data);
  					}
  				});
  			}
  		});
  	});
  	$(document).ready(function(){
  		$('#to').keyup(function(){
  			var query = $(this).val();
  			if (query != '') {
  				$.ajax({
  					url: "inc/search.php",
  					method:"POST",
  					data:{query:query},
  					success: function(data){
  						$('#toList').fadeIn();
  						$('#toList').html(data);
  					}
  				});
  			}
  		});
  	});

  	$('#fromList').on('click','li',function(){
  		$('#from').val($(this).text());
  		$('#fromList').fadeOut();
  	});
  	$('#toList').on('click','li',function(){
  		$('#to').val($(this).text());
  		$('#toList').fadeOut();
  	});

  </script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuHx2Vg2L8f5PqZNYyj_BrHmMk4P8FwIo&libraries=places&callback=activatePlacesSearch" async defer></script> -->
 
</body>
</html>