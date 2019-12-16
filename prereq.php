<?php

session_start();
$native = "";
$address = "";
if (isset($_GET['error'])) {
	$native = $_GET['native'];
	$address = $_GET['address'];
}
require_once 'inc/db.php';

if ($_SESSION['id']) {
	$sql = "SELECT * FROM detail WHERE pid=?";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		session_unset();
		session_destroy();
		header("location:prereq.php");
		exit();
	}
	$id = $_SESSION['id'];
	$stmt->bind_param("s", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$resultCheck = mysqli_stmt_num_rows($stmt);
	if ($resultCheck > 0) {
		header("location:main.php?success");
		exit();
	}
} else {
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
	<title>Details - Journey Mate</title>
	<link rel="stylesheet" href="css/design.css">
</head>
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

<body>
	<?php
	require 'header.php';
	?>
	<div class="w3-panel w3-padding">

	</div>
	<br>
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
	<div class="w3-container w3-padding w3-center">
		<div class="w3-padding w3-padding w3-panel w3-round-large">
			<p class="w3-tag w3-red w3-round-large"><b>About You</b></p>
			<form action="inc/detail.inc.php" method="post" enctype="multipart/form-data" class="w3-padding ">
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b> Native : </b></label>
				<input class="w3-padding w3-panel w3-round-large w3-border" type="text" id="native" autocomplete="off" name="native" placeholder="Enter The Name" value="<?php echo $native; ?>"><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter The City / Town Name *</b></p>
				<div id="nativeList"></div>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b> Address : </b></label>
				<input class="w3-padding w3-panel w3-round-large w3-border" type="text" name="address" value="<?php echo $address; ?>" placeholder="Enter The Name"><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter The Address *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Car &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</b></label>
				<select class="w3-padding w3-panel w3-round-large w3-border" style="width: 235px;" id="car" name="car">
					<option selected="selected" value="no">No</option>
					<option value="yes">Yes</option>
				</select><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>If Available Choose " Yes " *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Model &nbsp; :</b></label>
				<input type="text" class="w3-padding w3-panel w3-round-large w3-border" disabled id="carname" name="carname"><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter the Car Name *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b> Work &nbsp;&nbsp; : </b></label>
				<select class="w3-padding w3-panel w3-round-large w3-border" style="width: 235px;" name="work">
					<option selected="selected" value="student">Student</option>
					<option value="job">Job</option>
					<option value="business">Business</option>
				</select><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Enter Your Work *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Travell : </b></label>
				<select class="w3-padding w3-panel w3-round-large w3-border" style="width: 235px;" name="travell">
					<option value="day">Day</option>
					<option value="afternoon">Afternoon</option>
					<option value="evening">Evening</option>
					<option value="night">Night</option>
				</select><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Choose The Time Prefer To Travell *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b> Status &nbsp; : </b></label>
				<select class="w3-padding w3-panel w3-round-large w3-border" style="width: 235px;" name="status">
					<option value="un-married">Un-married</option>
					<option value="married">Married</option>
				</select><br>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b>Choose Your Relationship Status *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Medical Issues : </b></label>
				<br>
				<select class="w3-padding w3-panel w3-round-large w3-border" id="medical" style="width: 235px;" name="medical">
					<option selected="selected" value="no">No</option>
					<option value="yes">Yes</option>
				</select><br>
				<textarea class="w3-padding w3-panel w3-round-large w3-border" disabled id="issue" name="issue" value=" " style="resize: none;" rows="4" cols="25">

		</textarea>
				<p class="w3-tiny w3-text-red" style="margin-top: -10px;"><b> Enter The Medical Issues *</b></p>
				<label class="w3-tag w3-panel w3-round-large w3-indigo"><b>Profile Image : </b></label>
				<br>
				<input class="w3-padding w3-panel w3-round-large w3-border" type="file" name="pro" value="" multiple=""><br>
				<input class="w3-padding w3-panel w3-round-large w3-red w3-hover-indigo w3-text-white w3-button" type="submit" name="detail" value="Add">
			</form>
			<?php
			if (isset($_GET['error'])) { ?>
				<div class="w3-container w3-panel w3-center w3-tag w3-red w3-round-large w3-panel w3-small w3-padding">
				<?php
					if ($_GET['error'] == "sizeerror") {
						echo "Size Of The Image Is High *";
					} elseif ($_GET['error'] == "fileerror") {
						echo "Error In Uploading File";
					} elseif ($_GET['error'] == "exterror") {
						echo "You Cannot Upload File Of This Type ! ";
					} elseif ($_GET['error'] == "fillall") {
						echo "Fill All Fields *";
					} elseif ($_GET['error'] == "sqlError") {
						echo "Error In Server *";
					} elseif ($_GET['error'] == "success") {
						echo "Login Your Account *";
					}
				}
				?>
				</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#native').keyup(function() {
					var query = $(this).val();
					if (query != '') {
						$.ajax({
							url: "inc/search.php",
							method: "POST",
							data: {
								query: query
							},
							success: function(data) {
								$('#nativeList').fadeIn();
								$('#nativeList').html(data);
							}
						});
					}
				});
			});

			$("#native").focusout(function() {
				$('#nativeList').fadeOut();
			});

			$('#nativeList').on('click', 'li', function() {
				$('#native').val($(this).text());
				$('#nativeList').fadeOut();
			});

			$('#car').on('change', function(e) {
				if ($(this).val() == "yes")
					$('#carname').prop('disabled', false);
				else
					$('#carname').prop('disabled', true);
			});

			$('#medical').on('change', function(e) {
				if ($(this).val() == "yes")
					$('#issue').prop('disabled', false);
				else
					$('#issue').prop('disabled', true);
			});

			window.addEventListener("load", function() {
				const loader = document.querySelector(".loader");
				loader.className += " hidden"; // class "loader hidden"
			});
		</script>
		</script>
</body>

</html>