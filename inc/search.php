<?php 
	
	require 'db.php';

	if (isset($_POST["query"])) {
		$output = "";

		$query = "SELECT * from geo_locations where name LIKE '%".$_POST["query"]."%' AND location_type != 'STATE' LIMIT 3";
		$result  = mysqli_query($con,$query);

		$output = '<ul class="w3-ul w3-card-4 w3-hoverable">';

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_array($result)){
				$output .= '<li class="w3-hover-blue w3-hover-text-white"><b>'.$row["name"].'</b></li>';
			}
		}else{
			$output .= '<li> City Not Found</li>';
		}
		$output .= '</ul>';
		echo $output;
	}

 ?>