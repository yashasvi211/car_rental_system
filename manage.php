<!DOCTYPE html>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
    $email = $_SESSION['email'];
    
    $query=mysqli_query($connect,"select * from customer where Email = '$email'");
    $fetch = mysqli_fetch_assoc($query);

    $Fname = $fetch["Fname"];
    $Lname = $fetch["Lname"];
    $phone = $fetch["phone_number"];
    $country = $fetch["Country"];

    if (isset($_POST["submit"])) {
        $Fname = $_POST["Fname"];
        $Lname = $_POST["Lname"];
        $phone = $_POST["phone"];
        $country = $_POST["country"];

        $temp = $connect->prepare("UPDATE customer SET Fname='$Fname',Lname='$Lname',phone_number='$phone',Country='$country' WHERE Email='$email'");
        $temp->execute();
        header('location:welcome user.php');
    }

?>

<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="manage.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Manage Account</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
    <script>

		function validateForm(){
			var a= document.forms["save"]["Fname"].value;
			var b= document.forms["save"]["Lname"].value;
            var c= document.forms["save"]["phone"].value;

            if(a==""){
                alert("You must enter First name");
				return false;
            }
            else if(b==""){
				alert("You must enter Last Name");
				return false;
			}
            else if(c==""){
				alert("You must enter Phone");
				return false;
			}
            if (isNaN(c)) 
            {
                alert("enter a valid Phone");
                return false;
            }
		}

	</script>

</head>



<body>
	<nav class ="navbar">
		<div class="logo"><a href="welcome user.php">Car Rental <i class="fas fa-car"></i></a></div>
		<ul class="menu">
			<li><a href="welcome user.php">Home</a></li>
			<li>
				<a href="#">Account</a>
				<ul class="dropdown">
					<li><a href="#">Manage your account</a></li>
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
		</ul>
	</nav>

	<h1> Manage Your Account</h1>
    <form id="save" name="save" action="#" onsubmit="return validateForm()" method="post">
        <section class="content">
            <div class="specs">
                <div class="info">
                    <p>First Name:</p>
                    <input type="text" class="form-control" name="Fname" id="Fname" value="<?= $Fname ?>"/>
                </div>
                <div class="info">
                    <p>Last Name:</p>
                    <input type="text" class="form-control" name="Lname" id="Lname" value="<?= $Lname ?>"/>
                </div>
                <div class="info">
                    <p>Phone:</p>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone ?>"/>
                </div>
                <div class="info">
                    <p>Country:</p>
                    <?php if($country == 'EGY'){ ?>
					<select name="country" id="country">
						<option value="EGY" selected>Egypt</option>
						<option value="USA">United States</option>
						<option value="KSA">Saudie Arabia</option>
					</select>
                    <?php }elseif($country == 'USA') { ?>
                        <select name="country" id="country">
                            <option value="EGY">Egypt</option>
                            <option value="USA" selected>United States</option>
                            <option value="KSA">Saudie Arabia</option>
                        </select>
                    <?php } elseif($country == 'KSA'){ ?>
                        <select name="country" id="country">
                            <option value="EGY">Egypt</option>
                            <option value="USA" >United States</option>
                            <option value="KSA" selected>Saudie Arabia</option>
                        </select>
				    <?php } ?>
                </div>
            </div>

            <div>
            <button type="submit" class="btn btn-larger btn-block" value='submit' name="submit">Save</button>
            </div>

        </section>
    </form>

	<footer>
		<p><a href="">Contact us</a></p>
	</footer>
</body>
</html>