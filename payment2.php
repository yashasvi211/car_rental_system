<!DOCTYPE html>
<html lang="en">

<?php
	$from = $_POST['from'];
	$to = $_POST['to'];
?>

<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="payment2.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Payments</title>
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

	<h1> Show Payments </h1>
    
	<table>
	<tr>
	<th>Date</th>
	<th>Daily Payments</th>
	</tr>
	<?php

	$temp = $from;
	while($temp <= $to)
	{
		$sql = "SELECT payments.Date, SUM(payments.Amount) AS ' Daily Payments' FROM
				payments WHERE payments.Date = '$temp' GROUP BY  payments.Date";
		$result = $connect->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<tr><td>" . $row["Date"]. "</td><td>" . $row["Daily Payments"] . "</td><td>";
			}
		}
		else
		{
			echo "<tr><td>" . $temp . "</td><td>" . 0 . "</td><td>";
		}
		$temp = strtotime("+1 day", strtotime("$temp"));
		$temp = date("Y-m-d",$temp);
	}
	?>
	</table>
	
	<footer>
		<p><a href="">Contact us</a></p>
	</footer>
</body>

</html>