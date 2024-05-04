<!DOCTYPE html>

<?php
include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
session_start();
$email = $_SESSION['email'];
$currentDate = date("Y-m-d");
$flag = 0;
?>

<html lang="en">
	
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="Welcome user.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Home</title>
</head>

<body>
	<nav class ="navbar">
		<div class="logo"><a href="#">Car Rental <i class="fas fa-car"></i></a></div>
		<div class="search-box">
			<form  method="POST" name="form2" action="">
				<input class="search-txt" type="text" name="name" placeholder="Type to search">
				<button  class="search-btn" name="searchh" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</form>
		</div>
		<?php
			$query=mysqli_query($connect,"select Country from customer where Email = '$email'");
			$fetch = mysqli_fetch_assoc($query);
			$country = $fetch['Country'];
		?>
		<ul class="menu">
			<li><a href="#">Home</a></li>
			<li>
				<a href="#">Account</a>
				<ul class="dropdown">
					<li><a href="manage.php">Manage your account</a></li>
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
			<li><?= $country?></li>
		</ul>
	</nav>
	
	<section class="content">
		<div class="welcome"><p>Hello <?php
										$query=mysqli_query($connect,"select Fname from customer where Email = '$email'");
										$fetch = mysqli_fetch_assoc($query);
										echo $fetch['Fname'];
									?>
							</p>
		</div>
		<h1>Rent the best cars in the city now!!</h1>
		<p>Rent the suitable car for you now with the best price in the city.</p>
		<a href="#move"><button>Rent Now</button></a>
	</section>

	<h1 id="move"></h1><br><br>
	<h1 class="pheading">Availabe cars in your country</h1>

	<section class="sec">
		<div class="car">
			<?php
				if ( ! empty($_POST['name'])){
					$keyword = $_POST['name'];
					$sql = "SELECT * FROM car NATURAL JOIN office WHERE (color LIKE '%$keyword%' or car.year LIKE '%$keyword%' or brand LIKE '%$keyword%' or model LIKE '%$keyword%' or Office_name LIKE '%$keyword%' or Plate_id LIKE '%$keyword%' or Price_per_day LIKE '%$keyword%') AND office.Country='$country'";
				}
				
				else{
					$sql = "SELECT * FROM car NATURAL JOIN office WHERE office.Country='$country' ";
				}
				
				if ($result=$connect->query($sql))
				{
					while($row = $result->fetch_assoc())
					{
						$picture = $row["Image"];
						$Brand = $row["Brand"];
						$Model = $row["Model"];
						$Year = $row["Year"];
						$Price_per_day = $row["Price_per_day"];
						$office = $row["Office_name"];
		            	$plate = $row["Plate_id"];
						$query=mysqli_query($connect,"SELECT car_status.STATUS FROM car_status WHERE Plate_id='$plate' AND car_status.Date='$currentDate'");
						$fetch = mysqli_fetch_assoc($query);
						if(isset($fetch['STATUS']) == 0)
						{
							$status = 'Active';
						}
						else
						{
							$status = $fetch['STATUS'];
						}
						?>
						<div class="card">
							<div class="img"><img src= <?= $picture ?> alt=""></div>
							<div class="title"><span style="color:grey">Brand: </span><?= $Brand ?></div>
							<div class="title"><span style="color:grey">Year: </span><?= $Year ?></div>
							<div class="title"><span style="color:grey">Office: </span><?= $office ?> </div>
							<div class="title"><span style="color:grey">Status: </span><?= $status ?> </div>
							<div class="box">
								<div class="price"><span style="color:green">$</span> <?=  $Price_per_day ?></div>
								<form method="get" name="form" action="carspecs.php">
									<button class="btn" name="plate" type="submit" value=<?= $row["Plate_id"] ?> > Rent Now </button>
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

	

	<footer>
		<p><a href="">Contact us</a></p>
	</footer>

	
</body>
</html>