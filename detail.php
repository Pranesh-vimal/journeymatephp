<?php 

	require_once 'inc/db.php';
	if (isset($_GET['pid']) && isset($_GET['jid'])) {
		session_start();
		$pid = $_GET['pid'];
		$jid = $_GET['jid'];
		$id = $_SESSION['id'];

		$sql1 = "SELECT * from account where id=$pid";

		$result1 = mysqli_query($con,$sql1);

		$sql = "SELECT * from detail where pid=$pid";

		$result = mysqli_query($con,$sql);

		$sql2 = "SELECT * from journey where pid=$pid AND jid=$jid ";

		$result2 = mysqli_query($con,$sql2);
	}else{
		header("location:index.php");
		exit();
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Journey Details</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
    <style type="text/css">

    	input:focus, textarea:focus, select:focus{
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

#pro{
			border-radius: 50%;
			height: 100px;
			width: 100px;
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
    	<div class="w3-quarter w3-padding">
    		<div class="w3-padding w3-card-4 w3-round-large">
    			<div class="w3-center w3-padding">
    				<?php 
    					if (mysqli_num_rows($result)) {
 						while ($rows = mysqli_fetch_assoc($result)) {
 						$native = $rows['native'];	
 						$carname = $rows['carname'];
 						$ttime = $rows['travell'];
 						$missue = $rows['issue']; 
 						$work = $rows['work'];
 						$status = $rows['status'];
    				 ?>
    				<img id="pro" align="center" src="profile/<?php echo $rows['img']; ?>">
    				<?php 
    					}
    				}
    				 ?>
    				 <?php 
    					if (mysqli_num_rows($result1)) {
 						while ($rows = mysqli_fetch_assoc($result1)) {	
 							$age = $rows['age'];
 							$gender = $rows['gender'];
    				 ?>
    				<p class="w3-text-black"><b><?php echo $rows['fname'];?>&nbsp;<?php echo $rows['lname']; ?></b></p>
    				<p class="w3-text-grey"><b>Native : <span class="w3-text-green"><?php echo $native; ?></span></b></p>
					<p class="w3-text-grey"><b>Last Seen :<span id="time" class="w3-text-red"><br><?php echo $rows['status']; ?></span></b></p>
    				<?php 
    					}
    				}
    				 ?>
    			</div>
    		</div>
    		<div class="w3-padding w3-panel w3-card-4 w3-round-large">
    			<div class="w3-row w3-round-large">
    				<div class="w3-quarter w3-padding"></div>
    				<div class="w3-half w3-center">
    					<p class="w3-text-blue"><b>Age : <span class="w3-text-green"><?php echo $age; ?></span></b></p>
    					<p class="w3-text-blue"><b>Gender : <span class="w3-text-green"><?php echo ucwords($gender); ?></span></b></p>
    					<p class="w3-text-blue"><b>Work :<br> <span class="w3-text-green"><?php echo ucwords($work); ?></span></b></p>
    					<p class="w3-text-blue"><b>Status : <br><span class="w3-text-green"><?php echo ucwords($status); ?></span></b></p>
    				</div>
    				<div class="w3-quarter w3-padding"></div>
    			</div>
    		</div>
    	</div>
    	<div class="w3-half w3-padding">
    		<div class="w3-padding w3-center w3-card-4 w3-round-large">
    			<div class="w3-row w3-row-padding w3-padding  w3-light-green w3-round-large w3-text-white">
    				<?php 
 						if (mysqli_num_rows($result2)) {
 						while ($rows = mysqli_fetch_assoc($result2)) {	
					 ?>
    				<div class="w3-quarter w3-panel w3-padding w3-center">
    					<?php
	 						$myvalue1 = $rows['fp'];
							$arr1 = explode(' ',trim($myvalue1));
	 						 echo ucwords($arr1[0]); ?>
    				</div>
    				<div class="w3-quarter w3-panel w3-center w3-padding">
    					To
    				</div>
    				<div class="w3-quarter w3-panel w3-padding w3-center">
    					<?php 
	 						$myvalue2 = $rows['tp'];
							$arr2 = explode(' ',trim($myvalue2));
	 						echo ucwords($arr2[0]); ?>
    				</div>
    				<div class="w3-quarter w3-panel ">
    					<?php 
    						$origDate = $rows['dt'];
							$date = str_replace('-', '/', $origDate );
	 						?>
	 						Time Left : <div  data-countdown="<?php echo $date ; ?>"></div>
    				</div>
    				<div class="w3-quarter w3-padding w3-center w3-panel">
    						Date : <br> <?php echo date("d.m.Y ", strtotime($rows['dt'])); ?>
    				</div>
    				<div class="w3-quarter w3-center w3-padding w3-panel">
    					Time : <br><?php echo date("g:i A", strtotime($rows['dt'])); ?>
    				</div>
    				<div class="w3-quarter w3-padding w3-center w3-panel">
    					Seats :<br> <?php echo $rows['seat']; ?>
    				</div>
    				<?php 
    					if ($pid != $id) {
    				 ?>
    				 <div class="w3-quarter w3-panel">
    					<form method="post" action="inc/interest.inc.php?jid=<?php echo $jid; ?>&pid=<?php echo $pid; ?>&id=<?php echo $id; ?>">
    						<input type="submit" name="interest" value="Interested" class="w3-button w3-panel w3-padding w3-hover-white w3-hover-text-red w3-round-large w3-white w3-text-blue ">
    					</form>
    				</div>
    				<?php 
    					}else{
    				?>
    				<div class="w3-quarter w3-padding w3-center  w3-panel">
	 						<form method="post" action="inc/delete.inc.php?pid=<?php echo $pid; ?>&jid=<?php echo $jid; ?>">
	 							<input class="w3-button w3-panel w3-padding w3-hover-white w3-hover-text-red w3-round-large w3-white w3-text-blue " type="submit" name="delete" value="Delete">
	 						</form>
	 					</div>
    				<?php	
    					}
    				 ?>
    				<?php 
    					}
    				}
    				 ?>
    			</div>
    		</div>
    		<div class="w3-padding w3-panel w3-center w3-card-4 w3-round-large">
    			<div class="w3-row w3-row-padding w3-padding  w3-light-blue w3-round-large w3-text-white">
    				<div class="w3-third w3-panel w3-padding w3-center">
    					Car Name :<br> <?php if ($carname == NULL) {
    						echo "No Car Available";
    					}else{
    						echo $carname;
    					} ?>
    				</div>
    				<div class="w3-third w3-panel w3-padding w3-center">
						Time Prefer To Travel :<br> <?php echo $ttime; ?>
    				</div>
    				<div class="w3-third w3-panel w3-padding w3-center">
    					Medical Issue :<br> <?php if ($missue == NULL) {
    						echo "No Medical Issue";
    					}else{
    						echo $missue;
    					} ?>
    				</div>
    			</div>
    		</div>
    	</div>
    	<?php 

		$sqlc = "SELECT * from partner where pid=$pid and jid=$jid and partid=$id";

		$resultc = mysqli_query($con,$sqlc);    	

		if (mysqli_num_rows($resultc)) {
 			while ($rows = mysqli_fetch_assoc($resultc)) {		
    	 ?>
    	<div class="w3-quarter w3-padding">
    		<div class="w3-padding w3-center w3-card-4 w3-round-large">
    			<h1 class="w3-center w3-text-blue w3-small">Chat With Your Partner</h1>
    			<div class="w3-panel w3-padding">
    				
    			</div>
    		</div>
    	</div>
    	<?php 
    		}
    	}
    	 ?>
    </div>
    <script type="text/javascript">
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