<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="show status.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Status</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
</head>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
?>
<script>
	function validateForm(){
		var date= document.getElementById("date").value;
		if(date==document.getElementById("date").defaultValue){
			alert("You must enter a date");
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

	<h1> Show Status </h1>
    <div class="specs">
		<form id="period" name="period" action="show status2.php" method="post" onsubmit="return validateForm()">
			<div>
				<label class="sort">Choose a Date:</label><br>
				<input type="date" class="form-control" name="date" id="date"/>
			</div>
			<div>
			<button class="btn" name="plate" type="submit"> Confirm </button>
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
		$date = $_POST['date'];
	}
?>

</html>