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
	<link href="Carspecs.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Car Specs</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
</head>



<?php
	
	$plateid = $_GET['plate'];

	$query=mysqli_query($connect,"SELECT car_status.STATUS FROM car_status WHERE Plate_id='$plateid' AND car_status.Date='$currentDate'");
	$fetch = mysqli_fetch_assoc($query);
	if(isset($fetch['STATUS']) == 0)
	{
		$status = 'Active';
	}
	else
	{
		$status = $fetch['STATUS'];
	}

	$sql = "SELECT * FROM car NATURAL JOIN office WHERE car.Plate_id='$plateid'";

	if ($result=$connect->query($sql))
		{
			if ($car = $result->fetch_assoc())
				{
					$picture = $car["Image"];
					$Brand = $car["Brand"];
					$Model = $car["Model"];
					$Year = $car["Year"];
					$Price_per_day = $car["Price_per_day"];
					$color = $car["Color"];
					$office = $car["Office_name"];
					$officeid = $car["Office_id"];
				}
		}
	
?>

<script>
	function calculatePrice(priceperday)
	{
		var d1 = document.getElementById("pickupDate").value;
		var d2 = document.getElementById("returnDate").value;
		var p = parseInt(priceperday);
		const dateOne = new Date(d1);
		const dateTwo = new Date(d2);
		const time = dateTwo - dateOne;
		if (time <= 0)
		{
			alert("Return date MUST be at least 1 day after pickup date");
			return false;
		}
		const days = Math.ceil(time / (1000 * 60 * 60 * 24));
		const Price = days * p;
		document.getElementById("output").innerHTML=Price;
	}
	function validateForm(){
			var pickupDate= document.getElementById("pickupDate").value;
			var returnDate= document.getElementById("returnDate").value;
			if(pickupDate <= returnDate)
			{
				if(pickupDate==document.getElementById("pickupDate").defaultValue){
					alert("You must enter a pick up date");
					return false;
				}
				else if(returnDate==document.getElementById("returnDate").defaultValue){
					alert("You must enter a return date");
					return false;
				}
			}
			else
			{
				alert("You entred a WRONG pickup date and return date");
				return false;
			}
		}
</script>

<body>
	<nav class ="navbar">
		<div class="logo"><a href="welcome user.php">Car Rental <i class="fas fa-car"></i></a></div>
		<ul class="menu">
			<li><a href="welcome user.php">Home</a></li>
			<li>
				<a href="#">Account</a>
				<ul class="dropdown">
					<li><a href="manage.php">Manage your account</a></li>
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
		</ul>
	</nav>

	<h1> Car Specs</h1>
	<section class="content">
	<div class="card">
		<div class="img"><img src= <?= $picture ?> alt=""></div>
	</div>
	
			<div class="specs">
				<div class="ans"><span class="sort">Brand: </span> <?= $Brand ?></div><br>
				<div class="ans"><span class="sort">Model: </span> <?= $Model ?></div><br>
				<div class="ans"><span class="sort">Year: </span> <?= $Year ?></div><br>
				<div class="ans"><span class="sort">Color: </span> <?= $color ?></div><br>
				<div class="ans"><span class="sort">Price/Day: </span> <?= $Price_per_day ?></div><br>
				<div class="ans"><span class="sort">Status: </span> <?= $status ?></div><br>		
				<div class="ans"><span class="sort">Office Name: </span> <?= $office ?></div><br>	
				<div class="ans"><span class="sort">Office ID: </span> <?= $officeid ?></div><br>	
				<div class="ans"><span class="sort">Plate Number: </span> <?= $plateid ?></div><br>
				
			</div>
		<div>

			<?php
				$query=mysqli_query($connect,"SELECT national_id FROM customer WHERE Email='$email'");
				$fetch = mysqli_fetch_assoc($query);
				$nationalID = $fetch['national_id'];
				
				$query=mysqli_query($connect,"SELECT car_status.STATUS FROM car_status WHERE Plate_id='$plateid' AND car_status.Date='$currentDate'");
				$fetch = mysqli_fetch_assoc($query);
				if(isset($fetch['STATUS']) == 0)
				{
					$checkStatus = 'Active';
				}
				else
				{
					$checkStatus = $fetch['STATUS'];
				}

				if($checkStatus=='Active')
				{
					$query=mysqli_query($connect,"SELECT * FROM reservation WHERE Plate_id='$plateid' AND Reservation_id = (SELECT MAX(Reservation_id) FROM reservation Where Plate_id='$plateid')");
					$fetch = mysqli_fetch_assoc($query);
					if(isset($fetch['Action']) == 0)
					{
						$checkStatus = 'Active without reservation';
					}
					else
					{
						$checkStatus = $fetch['Action'];
					}

					if($checkStatus == 'Rejected' || $checkStatus == 'Paid')
					{
						?>
						<div class="formDate">
							<form method='POST' action="" onsubmit="return validateForm()">
							<div class="info">
								<label class="sort">Pickup Date:</label><br>
								<input type="date" class="form-control" name="pickupDate" id="pickupDate"/>
							</div>
							<br>
							<div class="info">
								<label class="sort">Return Date:</label><br>
								<input type="date" class="form-control" name="returnDate" id="returnDate"/>
							</div>
							<div><button class="btn3" type="button" onclick="calculatePrice(<?= $Price_per_day ?>)"><span>Calculate Total Price</span></button><br>
								<label class="sort">Total Price:</label><br>
								<p class="ans">$<p class="ans" id="output"></p></p>
							</div>
								<button class="btn2" name=reserve type="submit" action=""><span>Reserve</span></button>
							</form>
							<form method="get" name="form" action="">
								<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
							</form>
						</div>
						<?php
					}
					elseif($checkStatus == 'Approved')
					{
						if($fetch['national_id'] == $nationalID)
						{
							?>
							<div class="formDate">
							<form method='POST' action="" onsubmit="return validateForm()">
							<div class="info">
								<label class="sort">Pickup Date:</label><br>
								<input type="date" class="form-control" name="pickupDate" id="pickupDate"/>
							</div>
							<br>
							<div class="info">
								<label class="sort">Return Date:</label><br>
								<input type="date" class="form-control" name="returnDate" id="returnDate"/>
							</div>
							<div><button class="btn3" type="button" onclick="calculatePrice(<?= $Price_per_day ?>)"><span>Calculate Total Price</span></button><br>
								<label class="sort">Total Price:</label><br>
								<p class="ans"><span style="color:green">$</span><p class="ans" id="output"></p></p>
							</div>
								<button class="btn1" name=reserve type="submit" disabled><span>Reserve</span></button>
							</form>
							<form method="get" name="form" action="checkout.php">
								<button class="btn" name="plate2" type="submit" value=<?= $plateid ?>><span> Pay </span></button>
							</form>
							</div>
							<?php
						}
						else
						{
							?>
							<div class="formDate">
							<form method='POST' action='' onsubmit="return validateForm()">
							<div class="info">
								<label class="sort">Pickup Date:</label><br>
								<input type="date" class="form-control" name="pickupDate" id="pickupDate"/>
							</div>
							<br>
							<div class="info">
								<label class="sort">Return Date:</label><br>
								<input type="date" class="form-control" name="returnDate" id="returnDate"/>
							</div>
							<div><button class="btn3" type="button" onclick="calculatePrice(<?= $Price_per_day ?>)"><span>Calculate Total Price</span></button>
								<label class="sort">Total Price:</label>
								<p class="ans"><span style="color:green">$</span><p class="ans" id="output"></p></p>
							</div>
								<button class="btn1" name=reserve type="submit" action="" disabled><span>Reserve</span></button>
							</form>
							<form method="get" name="form" action="checkout.php">
								<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
							</form>
							</div>
							<?php
						}
					}
					elseif($checkStatus == 'Pending')
					{
						?>
						<div class="formDate">
							<form method='POST' action="" onsubmit="return validateForm()">
							<div class="info">
								<label class="sort">Pickup Date:</label><br>
								<input type="date" class="form-control" name="pickupDate" id="pickupDate"/>
							</div>
							<br>
							<div class="info">
								<label class="sort">Return Date:</label><br>
								<input type="date" class="form-control" name="returnDate" id="returnDate"/>
							</div>
							<div><button class="btn3" type="button" onclick="calculatePrice(<?= $Price_per_day ?>)"><span>Calculate Total Price</span></button>
								<label class="sort">Total Price:</label>
								<p class="ans"><span style="color:green">$</span><p class="ans" id="output"></p></p>
							</div>
								<button class="btn1" name=reserve type="submit" disabled><span>Reserve</span></button>
							</form>
							<form method="get" name="form" action="">
								<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
							</form>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="formDate">
							<form method='POST' action="" onsubmit="return validateForm()">
							<div class="info">
								<label class="sort">Pickup Date:</label><br>
								<input type="date" class="form-control" name="pickupDate" id="pickupDate"/>
							</div>
							<br>
							<div class="info">
								<label class="sort">Return Date:</label><br>
								<input type="date" class="form-control" name="returnDate" id="returnDate"/>
							</div>
							<div><button class="btn3" type="button" onclick="calculatePrice(<?= $Price_per_day ?>)"><span>Calculate Total Price</span></button><br>
								<label class="sort">Total Price:</label><br>
								<p class="ans"><span style="color:green">$</span><p class="ans" id="output"></p></p>
							</div>
								<button class="btn2" name=reserve type="submit" action=""><span>Reserve</span></button>
							</form>
							<form method="get" name="form" action="">
								<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
							</form>
						</div>
						<?php
					}
					
				}
				elseif($checkStatus=='Rented')
				{
					?>
						<button class="btn1" name=reserve type="submit"><span>Reserve</span></button>
						<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
					<?php
				}
				elseif($checkStatus=='OutOfService')
				{
					?>
						<button class="btn1" name=reserve type="submit" disabled><span>Reserve</span></button>
						<button class="btn1" name="plate2" type="submit" disabled><span> Pay </span></button>
					<?php
				}
			?>
	
		</div>
	</section>
	<?php
		if(isset($_POST['reserve']))
		{
			$pickupDate = $_POST['pickupDate'];
			$temp = $pickupDate;
			$returnDate = $_POST['returnDate'];

			while($temp <= $returnDate)
			{
				$query = "select * from `car_status` where `car_status`.Date = '$temp'";
				$result = mysqli_query($connect, $query);
				if (mysqli_num_rows($result) > 0)
				{
					echo '<script>alert("This Car is not available during this period")</script>';
					exit();
				}
				$temp = strtotime("+1 day", strtotime("$temp"));
				$temp = date("Y-m-d",$temp);
			}
			$query = "SELECT * FROM `reservation` WHERE `reservation`.national_id = '$nationalID'
					AND `reservation`.Plate_id = '$plateid' AND `reservation`.Entry_date = '$currentDate'";
			$result = mysqli_query($connect, $query);
			if (mysqli_num_rows($result) > 0)
			{
				echo '<script>alert("This Car is not available during this period")</script>';
				exit();
			}
			$sql = "INSERT INTO reservation(national_id,Plate_id,reservation.Start_date,reservation.End_date,reservation.Entry_date,reservation.Action)
			VALUES ($nationalID,$plateid,'$pickupDate','$returnDate','$currentDate','Pending')";
			$result=$connect->query($sql);
			
			header("Location:welcome user.php");
		}
	?>


	<footer>
		<p><a href="">Contact us</a></p>
	</footer>


</body>
</html>