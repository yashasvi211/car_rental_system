<!DOCTYPE html>

<?php
include_once 'C:\xampp\htdocs\CarRentalsYSTEM\once.php';
session_start();
$email = $_SESSION['email'];
$currentDate = date("Y-m-d");
?>

<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="advancedsearch.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Advanced Search</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
</head>


<body>
	<nav class ="navbar">
		<div class="logo"><a href="welcome admin.php">Car Rental <i class="fas fa-car"></i></a></div>
		<ul class="menu">
			<li><a href="welcome admin.php">Home</a></li>
			<li>
				<a href="#">Account</a>
				<ul class="dropdown">
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
		</ul>
	</nav>

	<h1> Advanced Search </h1>

	

    <?php

        if ($_POST['search'] == 'car')
        {
            ?>

            <table>
            <tr>
            <th>Plate ID</th>
            <th>Color</th>
            <th>Year</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Office ID</th>
            <th>Price/Day</th>
            </tr>

            <?php
            $plateid = $_POST['advanced'];
            $sql = "SELECT * FROM car  WHERE Plate_id LIKE '%$plateid%' OR Brand LIKE '%$plateid%' OR Model LIKE '%$plateid%' 
            OR car.Year LIKE '%$plateid%' OR Color LIKE '%$plateid%' OR Price_per_day LIKE '%$plateid%' OR Office_id LIKE '%$plateid%'";
            $result = $connect->query($sql);

            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Plate_id"]. "</td><td>" . $row["Color"] . "</td><td>" . $row["Year"] . "</td><td>" . $row["Brand"] . "</td><td>"
                . $row["Model"] . "</td><td>" . $row["Office_id"] . "</td><td>" . $row["Price_per_day"] . "</td><td>";
            }
            ?>
            </table>
            <?php
        }
        elseif($_POST['search'] == 'customer')
        {
            ?>

            <table>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Sex</th>
            <th>National ID</th>
            <th>Licence ID</th>
            </tr>

            <?php
            $nationalid = $_POST['advanced'];
            $sql = "SELECT * FROM customer WHERE national_id LIKE '%$nationalid%' OR Fname LIKE '%$nationalid%' OR Lname LIKE '%$nationalid%' OR Email LIKE '%$nationalid%'
            OR Phone_number LIKE '%$nationalid%' OR Country LIKE '%$nationalid%' OR Sex LIKE '%$nationalid%' OR licence_id LIKE '%$nationalid%'";
            $result = $connect->query($sql);

            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["phone_number"] . "</td><td>"
                . $row["Country"] . "</td><td>" . $row["Sex"] . "</td><td>" . $row["national_id"] . "</td><td>" . $row["licence_id"] . "</td><td>";
            }
        }

        ?>
        </table>

	<footer>
		<p><a href="">Contact us</a></p>
	</footer>


</body>
</html>
