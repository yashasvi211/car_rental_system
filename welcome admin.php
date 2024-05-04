<!DOCTYPE html>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
	$email = $_SESSION['email'];
?>

<html lang="en">
	
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="welcome admin.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Home (admin)</title>
</head>

<body>
	<nav class ="navbar">
		<div class="logo"><a href="#">Car Rental <i class="fas fa-car"></i></a></div>

		<div class="search-box">
			<form  method="POST" name="form2" action="advancedsearch.php">
				<input class="search-txt" type="text" name="advanced" placeholder="Type to search">
				<button  class="search-btn" name="search" type="submit" formaction="advancedsearch.php" value="car">Car</button>
				<button  class="search-btn" name="search" type="submit" formaction="advancedsearch.php" value="customer">Customer</button>
				<button  class="search-btn" name="search3" type="submit" formaction="advancedreservation.php">Reservation</button>
			</form>
		</div>
		<ul class="menu">

			<li><a href="#">Home</a></li>
			<li>
				<a href="#">Account</a>
				<ul class="dropdown">
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
		</ul>
	</nav>



	<section class="content">

		<div class="welcome">

			<p> Welcome Back
				<?php
					$query=mysqli_query($connect,"select admin_name from admin where Email = '$email'");
					$fetch = mysqli_fetch_assoc($query);
					echo $fetch['admin_name'];
				?>
			</p>

		</div>

		<div class="action_btn">
			<a href="#move1"><button>Edit Cars</button></a><br>
			<a href="#move2"><button>Edit officies</button></a><br>
			<a href="#move3"><button>Approve cars</button></a><br>
			<a href="#move4"><button>Reject Cars That Not Paid</button></a>
			<form method="get" name="form" action="payment.php">
				<button>Show Payment</button>
			</form>
			<form method="get" name="form" action="show reservations.php">
				<button>Show All Reservations</button>
			</form>
			<form method="get" name="form" action="carReservations.php">
				<button>Show Reservation For Car</button>
			</form>
			<form method="get" name="form" action="customer reservation.php">
				<button>Show Customer's Reservations</button>
			</form>
			<form method="get" name="form" action="show status.php">
				<button>Show Status</button>
			</form>
		</div>
	</section>

	<h1 id="move1"></h1><br><br>
	<h1 class="pheading">Cars in the officies</h1>

	<section class="sec">
		<div class="car">

			<div class="card">
				<div class="img"><img src="https://www.iconeasy.com/icon/png/System/Delikate/Add.png" alt=""></div>
				<div class="box">
					<a href="add car.php"><button class="btn0">Add car</button></a>
				</div>
			</div>
			<?php

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if($conn->connect_error)
				{
					
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = "SELECT * FROM car NATURAL JOIN office";
				
				
				if ($result=$conn->query($sql))
				{
					while($row = $result->fetch_assoc())
					{
						$picture = $row["Image"];
						$Brand = $row["Brand"];
						$Model = $row["Model"];
						$Year = $row["Year"];
						$office = $row["Office_name"];
						$Price_per_day = $row["Price_per_day"];
						?>
						<div class="card">
							<div class="img"><img src= <?= $picture ?> alt=""></div>
							<br>
							<div class="title"><span style="color:grey">Brand: </span> <?= $Brand ?></div>
							<div class="title"><span style="color:grey">Model: </span><?= $Model ?></div>
							<div class="title"><span style="color:grey">Year: </span><?= $Year ?></div>
							<div class="title"><span style="color:grey">Office: </span><?= $office ?></div>
							<div class="box">
								<div class="price"><span style="color:green">$</span> <?=  $Price_per_day ?></div>
								<form method="get" name="form" action="edit car.php">
									<button class="btn" name="plate" type="submit" value=<?= $row["Plate_id"] ?> > Edit Car </button>
								</form>
							</div>
						</div>
						<?php
					}
					
					$result->free();
				}

			?>
		</div>
	</section>

	<h1 id="move2"></h1><br><br>
    <h1 class="pheading">Officies in the countries</h1>

	<section class="sec">
		<div class="car">

			<div class="card">
				<div class="img"><img src="https://www.iconeasy.com/icon/png/System/Delikate/Add.png" alt=""></div>
				<div class="box">
					<a href="add office.php"><button class="btn0">Add office</button></a>
				</div>
			</div>

			
			<?php

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if($conn->connect_error)
				{
					
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = " SELECT * FROM office";
				
				if ($result=$conn->query($sql))
				{

					while($row = $result->fetch_assoc())
					{
						$officeid = $row["Office_id"];
						$officename = $row["Office_name"];
						$officecountry = $row["Country"];
						$officecity = $row["City"];
						$officeaddress = $row["Address"];
						?>

						<div class="card">
							<div class="img"><img src="https://images.olx.com.eg/thumbnails/43759412-800x600.webp" alt=""></div>
							<div class="title"><span style="color:grey">Office ID: </span><?= $officeid ?></div>
							<div class="title"><span style="color:grey">Office Name: </span><?= $officename ?></div>
							<div class="title"><span style="color:grey">City: </span><?= $officecity ?></div>
							<div class="title"><span style="color:grey">Address: </span><?= $officeaddress ?></div>
							<div class="box">
								<form method="get" name="form" action="edit office.php">
									<button class="btn" name="office" type="submit" value=<?= $officeid ?> > Edit Office </button>
								</form>
							</div>
						</div>

						<?php
					}
					
					$result->free();
				}

			?>

		</div>
	</section>

	<h1 id="move3"></h1><br><br>
    <h1 class="pheading">Reserved Cars by users</h1>

	<section class="sec">
		<div class="car">
			<?php

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if($conn->connect_error)
				{
					
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = "SELECT * FROM (reservation NATURAL JOIN car) NATURAL JOIN office WHERE reservation.Action = 'Pending' AND  car.Office_id = office.Office_id;";
				
				
				if ($res=$conn->query($sql))
				{
					while($row = $res->fetch_assoc())
					{
						$plate = $row["Plate_id"];
						$respicture = $row["Image"];
						$resBrand = $row["Brand"];
						$resModel = $row["Model"];
						$resYear = $row["Year"];
						$resoffice = $row["Office_name"];
						$resPrice_per_day = $row["Price_per_day"];
						$pickupDate = $row["Start_date"];
						$retuenDate = $row["End_date"];
						$ID = $row["national_id"];
						?>

						<div class="card">
							<div class="img"><img src= <?= $respicture ?> alt=""></div>
							<div class="title"><span style="color:grey">Plate ID: </span><?= $plate ?></div>
							<div class="title"><span style="color:grey">Brand: </span><?= $resBrand ?></div>
							<div class="title"><span style="color:grey">Model: </span><?= $resModel ?></div>
							<div class="title"><span style="color:grey">Year: </span><?= $resYear ?></div>
							<div class="title"><span style="color:grey">Office: </span><?= $resoffice ?></div>
							<div class="title"><span style="color:grey">Price/Day: </span><?=  $resPrice_per_day ?></div>
							<div class="title"><span style="color:grey">Pick Up Date: </span><?= $pickupDate ?></div>
							<div class="title"><span style="color:grey">Return Date: </span><?=  $retuenDate ?></div>
							<div class="title"><span style="color:grey">Customer National ID: </span><?=  $ID ?></div>
							<div class="box">
							</div>
							<div class="box">
								<form method="get" name="form">
									<button class="btn2" name="approve" type="submit" value=<?= $row["Plate_id"] ?> > Approve </button>
									<button class="btn3" name="reject" type="submit" value=<?= $row["Plate_id"] ?> > Reject </button>
								</form>
							</div>
							</div>

						<?php
					}
					$res->free();
				}
			?>
		</div>
	</section>

	<h1 id="move4"></h1><br><br>
    <h1 class="pheading">Reject Cars That Not Paid</h1>

	<section class="sec">
		<div class="car">
			<?php

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if($conn->connect_error)
				{
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = "SELECT * FROM (reservation NATURAL JOIN car) NATURAL JOIN office WHERE reservation.Action = 'Approved' AND  car.Office_id = office.Office_id;";
				
				
				if ($res=$conn->query($sql))
				{
					while($row = $res->fetch_assoc())
					{
						$plate = $row["Plate_id"];
						$respicture = $row["Image"];
						$resBrand = $row["Brand"];
						$resModel = $row["Model"];
						$resYear = $row["Year"];
						$resoffice = $row["Office_name"];
						$resPrice_per_day = $row["Price_per_day"];
						$entryDate = $row["Entry_date"];
						$ID = $row["national_id"];
						?>

						<div class="card">
							<div class="img"><img src= <?= $respicture ?> alt=""></div>
							<div class="title"><span style="color:grey">Plate_id: </span><?= $plate ?></div>
							<div class="title"><span style="color:grey">Brand: </span><?= $resBrand ?></div>
							<div class="title"><span style="color:grey">Model: </span><?= $resModel ?></div>
							<div class="title"><span style="color:grey">Year: </span><?= $resYear ?></div>
							<div class="title"><span style="color:grey">Office: </span><?= $resoffice ?></div>
							<div class="title"><span style="color:grey">Price/Day: </span><?=  $resPrice_per_day ?></div>
							<div class="title"><span style="color:grey">Reserved at: </span><?= $entryDate ?></div>
							<div class="title"><span style="color:grey">Customer National ID: </span><?=  $ID ?></div>
							<div class="box">
							</div>
								<div class="box">
									<form method="get" name="form">
										<button class="btn3" name="paid" type="submit" value=<?= $row["Plate_id"] ?> > Reject due to not paid </button>
									</form>
								</div>
							</div>

						<?php
					}
					$res->free();
				}
			?>
		</div>
	</section>

	<footer>
		<p><a href="">Contact us</a></p>
	</footer>

<?php
	if (isset($_GET["approve"])) {
		$plate = $_GET["approve"];
		$temp = $connect->prepare("UPDATE reservation SET reservation.Action='Approved' WHERE Plate_id='$plate' AND reservation.Action='Pending'");
		$temp->execute();
		}

	if (isset($_GET["reject"])) {
		$plate = $_GET["reject"];
		$temp = $connect->prepare("UPDATE reservation SET reservation.Action='Rejected' WHERE Plate_id='$plate' AND reservation.Action='Pending'");
		$temp->execute();
	}

	if (isset($_GET["paid"])) {
		$plate = $_GET["paid"];
		$temp = $connect->prepare("UPDATE reservation SET reservation.Action='Rejected not paid' WHERE Plate_id='$plate' AND reservation.Action='Approved'");
		$temp->execute();
	}
	
?>
</body>
</html>
