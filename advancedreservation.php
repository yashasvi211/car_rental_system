<!DOCTYPE html>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
	$email = $_SESSION['email'];
?>

<html lang="en">

<script>

	function validateForm()
        {
			var Entrydate= document.getElementById("entrydate").value;
			
            if(Entrydate==document.getElementById("entrydate").defaultValue){
                alert("You must enter an entry date!");
                return false;
            }
				
		}

</script>
	
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="advancedreservation.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Home (admin)</title>
</head>

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

	<h1> Advanced Reservations </h1>
    <div class="specs">
        <form method='POST' action="" onsubmit="return validateForm()">
            <div class="info">
                <label class="sort">Enter Date:</label><br>
                <input type="date" class="form-control" name="entrydate" id="entrydate"/>
                <button class="btn" name="ok" type="submit" ><span>Submit</span></button>
            </div>
        </form>
	</div>

	<?php

    if (isset($_POST['ok']))
    {
        $date = $_POST['entrydate'];
        $sql = "SELECT * FROM reservation WHERE reservation.Entry_date ='$date' GROUP BY reservation.Reservation_id";

        if ($result = $connect->query($sql))
        {
            if ($result->num_rows > 0)
	        {
                ?>

                <table>
                <tr>
                <th>Reservation ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Entry Date</th>
                <th>Action</th>
                <th>Plate ID</th>
                <th>National ID</th>
                </tr>

                <?php
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["Reservation_id"]. "</td><td>" . $row["Start_date"] . "</td><td>" . $row["End_date"] . "</td><td>" . $row["Entry_date"] . "</td><td>"
                    . $row["Action"] . "</td><td>" . $row["Plate_id"] . "</td><td>" . $row["national_id"] . "</td><td>";
                }
            }
        }
    }
    
	?>
	</table>





    <footer>
		<p><a href="">Contact us</a></p>
	</footer>

</body>