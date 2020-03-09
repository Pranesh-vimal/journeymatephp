<?php

require_once 'inc/db.php';
if (isset($_GET['pid']) && isset($_GET['jid'])) {
	session_start();
	$pid = $_GET['pid'];
	$jid = $_GET['jid'];
	$id = $_SESSION['id'];
	$_SESSION['cid'] = $id;
	$_SESSION['pid'] = $pid;
	$_SESSION['jid'] = $jid;

	$sql1 = "SELECT * from account where id=$pid";

	$result1 = mysqli_query($con, $sql1);

	$sql = "SELECT * from detail where pid=$pid";

	$result = mysqli_query($con, $sql);

	$sql2 = "SELECT * from journey where pid=$pid AND jid=$jid ";

	$result2 = mysqli_query($con, $sql2);
	$dt = new DateTime();
	$dt = $dt->format('Y-m-d H:i:s');

	$ratp = "SELECT * from partner where pid=$pid and ratep>0";

	$resratp = mysqli_query($con, $ratp);

	$ratj = "SELECT * from partner where pid=$pid and ratej>0";

	$resratj = mysqli_query($con, $ratj);
} else {
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
			height: 200px;
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
							<button class="w3-button w3-hover-white" onclick="document.getElementById('id01').style.display='block'">
								<img id="pro" align="center" src="profile/<?php echo $rows['img']; ?>">
							</button>
							<div id="id01" class="w3-modal">
								<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

									<div class="w3-center"><br>
										<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-medium w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
										<img src="profile/<?php echo $rows['img']; ?>" alt="Avatar" class="w3-image w3-margin-top">
									</div>
								</div>
							</div>
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
							<p class="w3-text-black"><b><?php echo $rows['fname']; ?>&nbsp;<?php echo $rows['lname']; ?></b></p>
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
							$des = $rows['des'];
							$amt = $rows['amt'];
					?>
							<div class="w3-quarter w3-panel w3-padding w3-center">
								<?php
								$myvalue1 = $rows['fp'];
								$arr1 = explode(' ', trim($myvalue1));
								echo ucwords($arr1[0]); ?>
							</div>
							<div class="w3-quarter w3-panel w3-center w3-padding">
								To
							</div>
							<div class="w3-quarter w3-panel w3-padding w3-center">
								<?php
								$myvalue2 = $rows['tp'];
								$arr2 = explode(' ', trim($myvalue2));
								echo ucwords($arr2[0]); ?>
							</div>
							<div class="w3-quarter w3-panel ">
								<?php
								if (strtotime($rows['dt']) > strtotime($dt)) {
									$origDate = $rows['dt'];
									$date = str_replace('-', '/', $origDate);
								?>
									Time Left : <div data-countdown="<?php echo $date; ?>"></div>
								<?php
								} else {
								?>
									<div class="w3-bold">Have A Safe Journey !</div>
								<?php
								}
								?>
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
							if (strtotime($rows['dt']) > strtotime($dt)) {
								if ($pid != $id) {
							?>
									<div class="w3-quarter w3-panel">
										<form method="post" action="inc/interest.inc.php?jid=<?php echo $jid; ?>&pid=<?php echo $pid; ?>&id=<?php echo $id; ?>">
											<input type="submit" name="interest" value="<?php

																						$int = "SELECT * from partner where jid=$jid and pid=$pid and partid=$id";
																						$resint = mysqli_query($con, $int);
																						if (mysqli_num_rows($resint) > 0) {
																							echo "Not Interested";
																						} else {
																							echo "Interested";
																						}
																						?>" class="w3-button w3-panel w3-padding w3-hover-white w3-hover-text-red w3-round-large w3-white w3-text-blue ">
										</form>
									</div>
								<?php
								} else {
								?>
									<div class="w3-quarter w3-padding w3-center w3-panel">
										<form method="post" action="inc/delete.inc.php?pid=<?php echo $pid; ?>&jid=<?php echo $jid; ?>">
											<input class="w3-button w3-panel w3-padding w3-hover-white w3-hover-text-red w3-round-large w3-white w3-text-blue " type="submit" name="delete" value="Delete">
										</form>
									</div>
								<?php
								}
							} else {
								if ($pid == $id) {
								?>
									<div class="w3-quarter w3-padding w3-panel">
										You Cannot Delete !
									</div>
					<?php
								}
							}
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
										} else {
											echo $carname;
										} ?>
					</div>
					<div class="w3-third w3-panel w3-padding w3-center">
						Time Prefer To Travel:<br> <?php echo $ttime; ?>
					</div>
					<div class="w3-third w3-panel w3-padding w3-center">
						Medical Issue :<br> <?php if ($missue == NULL) {
												echo "No Medical Issue";
											} else {
												echo $missue;
											} ?>
					</div>
				</div>
			</div>
			<?php
			if ($des != NULL) {
			?>
				<div class="w3-padding w3-panel w3-center w3-card-4 w3-round-large">
					<div class="w3-row w3-padding  w3-light-green w3-round-large w3-text-white">
						Description : <?php echo $des; ?>
					</div>
				</div>
			<?php
			}
			?>
			<div class="w3-padding w3-panel w3-center w3-card-4 w3-round-large">
				<div class="w3-row w3-padding  w3-light-blue w3-round-large w3-text-white">
					<?php
					$people = "SELECT * from partner where pid=$pid and jid=$jid";

					$respeople = mysqli_query($con, $people);

					$count = mysqli_num_rows($respeople);
					?>
					<div class="w3-half w3-panel w3-padding w3-center">
						Amount Per head : <br> <?php echo $amt; ?>
					</div>
					<div class="w3-half w3-panel w3-padding w3-center">
						People Interested : <br> <?php echo $count; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="w3-quarter w3-padding">
			<div class="w3-padding w3-card-4 w3-round-large ">
				<div class="w3-panel w3-padding">
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
						<p class="w3-twothird w3-large w3-text-light-green"><b><?php if ($rating1 != 0) for ($i = 0; $i < round($rating1); $i++) { ?><i class="fas fa-star"></i> <?php } else echo "Rating Is Not Available";  ?> </b></p>
					</div>
					<div class="w3-row">
						<p class="w3-third w3-text-indigo"><b>Journey Rating :</b></p>
						<p class="w3-twothird w3-large w3-text-light-green"><b><?php if ($rating2 != 0) for ($i = 0; $i < round($rating2); $i++) { ?><i class="fas fa-star"></i> <?php } else echo "Rating Is Not Available";  ?> </b></p>
					</div>
				</div>
			</div>
			<?php
			if ($id == $pid) {
			?>
				<div class="w3-padding w3-center w3-card-4 w3-round-large w3-panel">
					<h1 class="w3-center w3-text-blue w3-medium">People Interested </h1>
					<?php
					$interest1 = "SELECT * from partner where jid=$jid and pid=$pid";
					$resinter1 = mysqli_query($con, $interest1);
					if (mysqli_num_rows($resinter1)) {
						while ($rows = mysqli_fetch_assoc($resinter1)) {
							$nameid = $rows['partid'];
							$name = "SELECT * from account where id=$nameid";
							$resname = mysqli_query($con, $name);
							while ($row = mysqli_fetch_assoc($resname)) {
					?>
								<div class=" w3-center">
									<a href="profileView.php?id=<?php echo $nameid; ?>">
										<p><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></p>
									</a>
								</div>
						<?php
							}
						}
					} else {
						?>
						<div class=" w3-padding w3-center">
							<p>No One Interested !</p>
						</div>
					<?php
					}
					?>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		if ($id != $pid) {
		?>
			<?php

			$sqlr1 = "SELECT * from journey where pid=$pid and jid=$jid";

			$resultr1 = mysqli_query($con, $sqlr1);

			if (mysqli_num_rows($resultr1)) {
				while ($rows = mysqli_fetch_assoc($resultr1)) {
					if (strtotime($rows['dt']) > strtotime($dt)) {
						$sqlc = "SELECT * from partner where pid=$pid and jid=$jid and partid=$id";

						$resultc = mysqli_query($con, $sqlc);

						if (mysqli_num_rows($resultc)) {
							while ($rows = mysqli_fetch_assoc($resultc)) {
			?>
								<div class="w3-quarter w3-padding">
									<div class="w3-padding w3-center w3-card-4 w3-round-large">
										<h1 class="w3-center w3-text-blue w3-small">
											<i title="To Scroll Up" class="fas fa-angle-up w3-small w3-round-large w3-text-white w3-indigo w3-padding" onclick="up()"></i>
											Chat With Your Partner
											<i title="To Scroll Down" class="fas fa-angle-down w3-small w3-round-large w3-text-white w3-indigo w3-padding" onclick="down()"></i></h1>
										<div class="w3-panel w3-border w3-round-large" id="chat">

										</div>
										<form method="post" action="chat1.php">
											<input type="text" autocomplete="off" id="message" name="message" placeholder="Enter Your Message" class="w3-small w3-padding w3-border-indigo w3-round-large">
											<input type="submit" id="submit" name="submit" value="Send" class="w3-button w3-hover-red w3-indigo w3-text-white w3-round-large">
										</form>
									</div>
								</div>
		<?php
							}
						}
					}
				}
			}
		}

		?>
		<?php
		if ($id != $pid) {
		?>
			<?php

			$sqlr1 = "SELECT * from journey where pid=$pid and jid=$jid";

			$resultr1 = mysqli_query($con, $sqlr1);

			if (mysqli_num_rows($resultr1)) {
				while ($rows = mysqli_fetch_assoc($resultr1)) {
					if (strtotime($rows['dt']) < strtotime($dt)) {
			?>
						<div class="w3-quarter w3-padding">
							<div class="w3-padding w3-center w3-card-4 w3-round-large">
								<h1 class="w3-center w3-text-blue w3-small">Rate Your Journey !</h1>
								<div class="w3-panel w3-padding">
									<?php
									$ratej = "SELECT * from partner where pid=$pid and jid=$jid and partid=$id";

									$resratej = mysqli_query($con, $ratej);

									if (mysqli_num_rows($resratej)) {
										while ($rows = mysqli_fetch_assoc($resratej)) {
											if ($rows['ratej'] == 0) {
									?>
												<form class="w3-padding" action="inc/ratejourney.inc.php?pid=<?php echo $pid; ?>&jid=<?php echo $jid; ?>&partid=<?php echo $id; ?>" method="post">
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
												<p class="w3-indigo w3-text-white w3-padding w3-round-large">Your Rating : <?php echo $rows['ratej']; ?> </p>
									<?php
											}
										}
									}
									?>
									<?php
									if (isset($_GET['success'])) {
										if ($_GET['success'] == 'journey') {
									?>
											<p class="w3-indigo w3-text-white w3-padding w3-round-large">Thanks For Your Rating About Journey !</p>
									<?php
										}
									}
									?>
								</div>
								<h1 class="w3-center w3-text-blue w3-small">Rate Your Partner !</h1>
								<div class="w3-panel w3-padding">
									<?php
									$ratep = "SELECT * from partner where pid=$pid and jid=$jid and partid=$id";

									$resratep = mysqli_query($con, $ratep);

									if (mysqli_num_rows($resratep)) {
										while ($rows = mysqli_fetch_assoc($resratep)) {
											if ($rows['ratep'] == 0) {
									?>
												<form class="w3-padding" action="inc/ratepartner.inc.php?pid=<?php echo $pid; ?>&jid=<?php echo $jid; ?>&partid=<?php echo $id; ?>" method="post">
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
												<p class="w3-indigo w3-text-white w3-padding w3-round-large">Your Rating : <?php echo $rows['ratep']; ?> </p>
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
							</div>
						</div>
		<?php
					}
				}
			}
		}
		?>

	</div>
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