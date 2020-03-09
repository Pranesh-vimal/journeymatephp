<?php
session_start();
if (isset($_SESSION['id'])) {
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$id = $_SESSION['id'];
	$phno = $_SESSION['phno'];
	$gender = $_SESSION['gender'];
	$dob = $_SESSION['dob'];

	require_once 'inc/db.php';

	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$age = $diff->format('%y');
	$_SESSION['age'] = $age;
	$sql2 = "UPDATE account SET status = 'Active', age = '$age' WHERE id = $id ";
	$res2 = mysqli_query($con, $sql2);

	$sql1 = "SELECT * from detail where pid = $id ";
	$res = mysqli_query($con, $sql1);
	if (mysqli_num_rows($res)) {
		while ($rows = mysqli_fetch_assoc($res)) {
			$img = $rows['img'];
		}
	}
	date_default_timezone_set('Asia/Kolkata');
	$dt = new DateTime();
	$dt = $dt->format('Y-m-d H:i:s');
	$sql = "SELECT * from journey where pid!=$id ORDER BY dt ASC";

	$result = mysqli_query($con, $sql);

	$ratp = "SELECT * from partner where pid=$id and ratep>0";

	$resratp = mysqli_query($con,$ratp);

	$ratj = "SELECT * from partner where pid=$id and ratej>0";

	$resratj = mysqli_query($con,$ratj);

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
	<script src="https://kit.fontawesome.com/90c41f30c4.js" crossorigin="anonymous"></script>
	<title>Journey Mate</title>
	<link rel="stylesheet" href="css/design.css">
	<style type="text/css">
		#map {
			height: 450px;
			width: 100%;
		}

		a[href^="http://maps.google.com/maps"] {
			display: none !important
		}

		a[href^="https://maps.google.com/maps"] {
			display: none !important
		}

		#pro {
			border-radius: 50%;
			height: 100px;
			width: 100px;
		}

		.gmnoprint a,
		.gmnoprint span,
		.gm-style-cc {
			display: none;
		}

		.gmnoprint div {
			background: none !important;
		}

		#topbar {
			background: #373B44;
			/* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #4286f4, #373B44);
			/* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #4286f4, #373B44);
			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuHx2Vg2L8f5PqZNYyj_BrHmMk4P8FwIo" type="text/javascript"></script>
</head>

<body>
	<?php
	require 'mainHeader.php';
	?>
	<br>
	<div class="w3-panel">
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
		<div class="w3-quarter w3-panel w3-hide-small">
			<div class="w3-padding w3-card-4 w3-round-large">
				<div class="w3-panel w3-padding w3-center">
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
					<p class="w3-text-grey"><b><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></b></p>
					<p class="w3-text-grey">Status : <span class="w3-text-green"> Active</span></p>
					<!-- <p class="w3-text-grey">Location : <span class="w3-text-red" id="location"></span></p> -->
				</div>
			</div>
			<div class="w3-padding w3-card-4 w3-round-large w3-panel">
				<div class="w3-panel w3-padding ">
				<?php
					if (mysqli_num_rows($resratp)) {
						$rating1 = 0;
						while ($rows = mysqli_fetch_assoc($resratp)) {
							$rating1 += $rows['ratep'];
						}
						$rating1 /= mysqli_num_rows($resratp);
					} else {
						$rating1 = 0;
					}
					if (mysqli_num_rows($resratj)) {
						$rating2 = 0;
						while ($rows = mysqli_fetch_assoc($resratj)) {
							$rating2 += $rows['ratej'];
						}
						$rating2 /= mysqli_num_rows($resratj);
					} else {
						$rating2 = 0;
					}
					?>
					<div class="w3-row">
						<p class="w3-third w3-text-indigo"><b>Person Rating :</b></p> 
						<p class="w3-twothird w3-large w3-text-light-green"><b><?php if($rating1 !=0)for ($i = 0; $i < round($rating1) ; $i++) { ?><i class="fas fa-star"></i> <?php }else echo "Rating Is Not Available";  ?> </b></p>
					</div>
					<div class="w3-row">
						<p class="w3-third w3-text-indigo"><b>Journey Rating :</b></p>
						<p class="w3-twothird w3-large w3-text-light-green"><b><?php if($rating2 !=0)for ($i = 0; $i < round($rating2) ; $i++) { ?><i class="fas fa-star"></i> <?php }else echo "Rating Is Not Available";  ?> </b></p>
					</div>
			</div>
			</div>
		</div>
		<div class="w3-half w3-panel ">
			<div class="w3-padding w3-card-4 w3-round-large">
				<div>
					<p id="topbar" class=" w3-center w3-text-white w3-card w3-padding w3-round-large"><b>Travel Feeds</b></p>
				</div>
				<?php
				if (mysqli_num_rows($result)) {
					while ($rows = mysqli_fetch_assoc($result)) {
						if (strtotime($rows['dt']) > strtotime($dt)) {
							?>
							<div class="w3-padding w3-panel w3-container w3-indigo w3-round-large">
								<div class="w3-row w3-row-padding">
									<div class="w3-quarter w3-padding w3-center">
										<?php echo ucwords($rows['fp']); ?>
									</div>
									<div class="w3-quarter w3-padding  w3-center">
										To
									</div>
									<div class="w3-quarter w3-padding  w3-center">
										<?php echo ucwords($rows['tp']); ?>
									</div>
									<div class="w3-quarter w3-center">
										<?php
													$origDate = $rows['dt'];
													$date = str_replace('-', '/', $origDate);
													?>
										Time Left : <div data-countdown="<?php echo $date; ?>"></div>
									</div>
								</div>
								<div class="w3-row w3-panel">
									<div class="w3-quarter w3-padding w3-center">
										Seats :<br> <?php echo $rows['seat']; ?>
									</div>
									<div class="w3-quarter w3-padding  w3-center">
										Date : <br><?php echo date("d.m.Y ", strtotime($rows['dt'])); ?>
									</div>
									<div class="w3-quarter w3-padding  w3-center">
										Time : <br><?php echo date("g:i A", strtotime($rows['dt'])); ?>
									</div>
									<div class="w3-quarter w3-center">
										<br>
										<a href="detail.php?pid=<?php echo $rows['pid']; ?>&jid=<?php echo $rows['jid']; ?>" class="w3-white w3-text-indigo w3-hover-blue w3-round-large w3-padding">See More >></a>
									</div>
								</div>
							</div>
					<?php
							}
						}
					} else {
						?>
					<p class="w3-padding w3-text-blue w3-round-large">No Live Update Available </p>
				<?php
				}
				?>
			</div>
		</div>
		<div class="w3-quarter w3-panel ">
			<div class="w3-padding w3-card-4 w3-round-large">
				<div>
					<p class="w3-red w3-center  w3-card w3-padding w3-round-large"><b>Current Location</b></p>
				</div>
				<div class="w3-padding w3-round-large" id="map">
					<p class="w3-panel w3-center">Map Has A Problem In Loading..</p>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('[data-countdown]').each(function() {
				var $this = $(this),
					finalDate = $(this).data('countdown');
				$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%D days %H:%M:%S'));
				});
			});
		});




		x = navigator.geolocation;

		x.getCurrentPosition(success, failure);

		function success(position) {
			var myLat = position.coords.latitude;
			var myLong = position.coords.longitude;

			var coords = new google.maps.LatLng(myLat, myLong);

			var mapOptions = {
				zoom: 15,
				center: coords,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDefaultUI: true,
				gestureHandling: 'none',
				zoomControl: false
			};

			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			var marker = new google.maps.Marker({
				map: map,
				position: coords
			});

		}

		function failure() {

		}

		$(document).ready(function() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showLocation);
			} else {
				$('#location').html('Geolocation is not supported by this browser.');
			}
		});

		function showLocation(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			$.ajax({
				type: 'POST',
				url: 'getLocation.php',
				data: 'latitude=' + latitude + '&longitude=' + longitude,
				success: function(msg) {
					if (msg) {
						$("#location").html(msg);
					} else {
						$("#location").html('Not Available');
					}
				}
			});
		}

		window.addEventListener("load", function() {
			const loader = document.querySelector(".loader");
			loader.className += " hidden"; // class "loader hidden"
		});
	</script>
</body>

</html>