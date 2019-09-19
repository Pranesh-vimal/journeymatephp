<?php 
	session_start();
	if (isset($_SESSION['id'])) {
		$name = $_SESSION['fname'];
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];
		$phno = $_SESSION['phno'];
		$gender = $_SESSION['gender'];

		date_default_timezone_set('Asia/Kolkata');

		require_once 'inc/db.php';
		$dt = new DateTime();
    	$dt=$dt->format('Y-m-d H:i:s');
		$sql = "SELECT * from journey where pid=$id ORDER BY dt ASC";

		$result = mysqli_query($con,$sql);

		$sql1 = "SELECT * from journey where pid=$id ORDER BY dt ASC";

		$result1 = mysqli_query($con,$sql1);
	}
	else{
		header("location:index.php");
		exit();
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
    <title>Recent - Journey Mate</title>
     <link rel="stylesheet" href="css/design.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
     <style type="text/css">
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
  <div class="loader">
      <!-- <img src="img/831.gif"> -->
      <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
 <div class="w3-row">
 	<div class="w3-quarter w3-padding"></div>
 	<div class="w3-half w3-padding">
 		<div class="w3-container">
 	<div class="w3-container w3-text-orange w3-card-4 w3-round-large">
 		<p><b>Live Travel</b></p>
 		<?php 
 				if (mysqli_num_rows($result)) {
 					while ($rows = mysqli_fetch_assoc($result)) {	
 						if (strtotime($rows['dt']) > strtotime($dt)) {
 							
			 ?>
		<div class="w3-padding w3-panel w3-container w3-indigo w3-round-large">
			
	 				<div class="w3-row ">
	 					<div class="w3-quarter w3-padding w3-center">
	 						<?php
	 						$myvalue1 = $rows['fp'];
							$arr1 = explode(' ',trim($myvalue1));
	 						 echo ucwords($arr1[0]); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						To
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						<?php 
	 						$myvalue2 = $rows['tp'];
							$arr2 = explode(' ',trim($myvalue2));
	 						echo ucwords($arr2[0]); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding w3-center">
	 						Seats : <?php echo $rows['seat']; ?>
	 					</div>
	 				</div>
	 				<div class="w3-row w3-panel">
	 					<div class="w3-quarter w3-padding w3-center">
	 						<form method="post" action="inc/delete.inc.php?pid=<?php echo $rows['pid']; ?>&jid=<?php echo $rows['jid']; ?>">
	 							<input class="w3-center w3-padding w3-button w3-round-large w3-white w3-hover-red w3-text-indigo w3-hover-text-white" type="submit" name="delete" value="Delete">
	 						</form>
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						Date : <br> <?php echo date("d.m.Y ", strtotime($rows['dt'])); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						Time : <br><?php echo date("g:i A", strtotime($rows['dt'])); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding w3-center"><?php 
	 						$origDate = $rows['dt'];
							$date = str_replace('-', '/', $origDate );
	 						?>
	 						Time Left : <div  data-countdown="<?php echo $date ; ?>"></div>
	 					</div>
	 				</div>
	 				<a href="detail.php?pid=<?php echo $rows['pid']; ?>&jid=<?php echo $rows['jid']; ?>" class="w3-white w3-block  w3-panel w3-padding w3-center w3-medium w3-text-red w3-round-large w3-hover-text-green">See More</a>
	 		</div>
	 		<?php 
	 						}
	 					}
	 				}
 				else{
 				?>
 				<p class="w3-padding w3-text-blue ">No Live Update Available </p>
 				<?php
 				}
	 		 ?>
 	</div>
 </div>
 
 	</div>
 	<div class="w3-quarter w3-padding"></div>
 </div>
 <div class="w3-row">
 	<div class="w3-quarter w3-padding"></div>
 	<div class="w3-half w3-padding">
 		<div class="w3-container">
 	<div class="w3-container w3-text-orange w3-card-4 w3-round-large">
 		<p><b>History </b></p>
 		<?php 
 				if (mysqli_num_rows($result1)) {
 					while ($rows = mysqli_fetch_assoc($result1)) {	
 						if (strtotime($rows['dt']) < strtotime($dt)) {
 							
			 ?>
		<div class="w3-padding w3-panel w3-container w3-indigo w3-round-large">
			
	 				<div class="w3-row ">
	 					<div class="w3-quarter w3-padding w3-center">
	 						<?php
	 						$myvalue1 = $rows['fp'];
							$arr1 = explode(' ',trim($myvalue1));
	 						 echo ucwords($arr1[0]); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						To
	 					</div>
	 					<div class="w3-quarter w3-padding  w3-center">
	 						<?php 
	 						$myvalue2 = $rows['tp'];
							$arr2 = explode(' ',trim($myvalue2));
	 						echo ucwords($arr2[0]); ?>
	 					</div>
	 					<div class="w3-quarter w3-padding w3-center">
	 						Seats : <?php echo $rows['seat']; ?>
	 					</div>
	 				</div>
	 				<div class="w3-row w3-panel">
	 					<div class="w3-half w3-padding  w3-center">
	 						Date : <?php echo date("d.m.Y ", strtotime($rows['dt'])); ?>
	 					</div>
	 					<div class="w3-half w3-padding  w3-center">
	 						Time : <?php echo date("g:i A", strtotime($rows['dt'])); ?>
	 					</div>
	 				</div>
	 				
	 		</div>
	 		<?php 
	 						}
	 					}
	 				}
 				else{
 				?>
 				<p class="w3-padding w3-text-blue ">No History Available </p>
 				<?php
 				}
	 		 ?>
 	</div>
 </div>
 
 	</div>
 	<div class="w3-quarter w3-padding"></div>
 </div>
 <script>
	$(function(){
    $('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
   $this.countdown(finalDate, function(event) {
     $this.html(event.strftime('%D days %H:%M:%S'));
   });
 });
});

	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
 </script>
</body>
</html>