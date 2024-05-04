<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="carReservations.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Customer Reservations</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
</head>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
?>

<script>
	function validateForm(){
		var from= document.getElementById("from").value;
		var to= document.getElementById("to").value;
		if(from <= to)
		{
			if(from==document.getElementById("from").defaultValue){
				alert("You must enter a date");
				return false;
			}
			else if(to==document.getElementById("to").defaultValue){
				alert("You must enter a date");
				return false;
			}
		}
		else
		{
			alert("You entred a WRONG date");
			return false;
		}
	}
</script>

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

	<h1> Customer Reservations </h1>
    <div class="specs">
		<form id="period" name="period" action="customer reservation2.php" method="post" onsubmit="return validateForm()">
			<div>
				<label class="sort">Date From:</label><br>
				<input type="date" class="form-control" name="from" id="from"/>
			</div>
			<div>
				<br>
				<label class="sort">To Date:</label><br>
				<input type="date" class="form-control" name="to" id="to"/>
			</div>
            <div>
                <br>
                <label class="sort">Customer ID:</label> 
                <input type="text" required name="customer_id"/>
            </div>
			<div>
			<button class="btn" name="customer" type="submit"> Confirm </button>
			</div>
		</form>
	</div>
	<footer>
		<p><a href="">Contact us</a></p>
	</footer>
</body>

<?php
	if(isset($_POST['period']))
	{
		$from = $_POST['from'];
		$to = $_POST['to'];
		$customer_id = $_POST['customer_id'];
	}
?>

</html>