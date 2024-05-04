<!DOCTYPE html>
<html lang="en">

<?php
	$from = $_POST['from'];
	$to = $_POST['to'];
?>

<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="show reservations2.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Show Reservations</title>
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

	<h1> Show Reservations </h1>
    
	<table>
	<tr>
	<th>Reservation ID</th>
	<th>Start Date</th>
    <th>End Date</th>
	<th>Entry Date</th>
    <th>Action</th>
	<th>Plate ID</th>
    <th>Brand</th>
	<th>Model</th>
    <th>Color</th>
	<th>Price/Day</th>
    <th>Office ID</th>
	<th>Year</th>
    <th>National ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Country</th>
    <th>Sex</th>
    <th>Licence ID</th>
	</tr>
	<?php
	$sql = "SELECT * FROM reservation JOIN customer ON customer.national_id = reservation.national_id
	JOIN car ON reservation.Plate_id = car.Plate_id
	WHERE reservation.Start_date <= '$from' AND reservation.End_date >= '$from'
	OR reservation.Start_date <= '$to' AND reservation.End_date >= '$to'
	OR reservation.Start_date >= '$from' AND reservation.End_date <= '$to'
	OR reservation.Start_date <= '$from' AND reservation.End_date >= '$to'
	";

	$result = $connect->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["Reservation_id"]. "</td><td>" . $row["Start_date"] . "</td><td>" . $row["End_date"] . "</td><td>" . $row["Entry_date"] . "</td><td>"
			. $row["Action"] . "</td><td>" . $row["Plate_id"] . "</td><td>" . $row["Brand"] . "</td><td>" . $row["Model"] . "</td><td>" . $row["Color"] . "</td><td>"
			. $row["Price_per_day"] . "</td><td>" . $row["Office_id"] . "</td><td>" . $row["Year"] . "</td><td>" . $row["national_id"] . "</td><td>"
			. $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["phone_number"] . "</td><td>"
			. $row["Country"] . "</td><td>" . $row["Sex"] . "</td><td>" . $row["licence_id"] . "</td><td>";
		}
	}

    
	?>
	</table>
	
	<footer>
		<p><a href="">Contact us</a></p>
	</footer>
</body>

</html>