<!DOCTYPE html>
<html lang="en">

<?php
	$date = $_POST['date'];
?>

<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="show status2.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Status</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
</head>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
?>

<body>
	<nav class ="navbar">
		<div class="logo"><a href="welcome admin.php">Car Rental <i class="fas fa-car"></i></a></div>
		<ul class="menu">
			<li><a href="welcome admin.php">Home</a></li>
			<ul class="dropdown">
					<li><a href="index.php">Log out</a></li>
				</ul>
			<li><a href="">About us</a></li>
		</ul>
	</nav>

	<h1> Show Status </h1>
    
	<table>
	<tr>
	<th>Plate ID</th>
	<th>Status</th>
	</tr>
	<?php

		$sql = "SELECT Plate_id FROM car";
		$result = $connect->query($sql);
		
		$cars_array = array();
		$temp = 0;
		while($row = $result->fetch_assoc())
		{
			$cars_array[$temp] = $row['Plate_id'];
			$temp = $temp + 1;
		}

		$sql = "SELECT car_status.Plate_id, car_status.`STATUS` FROM car_status WHERE car_status.`Date` = '$date'";
		$result = $connect->query($sql);

		//$status = 'Active';
		while($fetch = $result->fetch_assoc())
		{
			for($i = 0; $i < $temp; $i++)
			{
				if($fetch['Plate_id'] == $cars_array[$i])
				{
					$cars_array[$i] = "";
					$status = $fetch['STATUS'];
					echo "<tr><td>" . $fetch["Plate_id"]. "</td><td>" . $status . "</td><td>";
					break;
				}
			}
		}

		for($i = 0; $i < $temp; $i++)
		{
			if($cars_array[$i] != "")
			{
				$status = "Active";
				echo "<tr><td>" . $cars_array[$i] . "</td><td>" . $status . "</td><td>";
				$cars_array[$i] = "";
			}
		}
	?>
	</table>
	
	<footer>
		<p><a href="">Contact us</a></p>
	</footer>
</body>

</html>