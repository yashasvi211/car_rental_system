<!DOCTYPE html>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
    
    if (isset($_POST["submit"])) {
        $flag = 0;
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        $query = mysqli_query($connect, "select Office_id from office");
        while ($fetch = mysqli_fetch_assoc($query)) {
          if ($ID == $fetch['Office_id']) {
            echo '<div class="error1"><h2 class="error2">Office ID Already Exists</h2></div>';
            $flag = 1;
            break;
          }
        }
        if ($flag == 0) {
            $temp = $connect->prepare("INSERT INTO office (Office_id,Office_name,Country,City,office.Address) VALUES ($ID,'$name','$country','$city', '$address')");
            $temp->execute();
            header('location:welcome admin.php');
        }
      }

?>

<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="add office.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Add Office</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
    <script>

		function validateForm(){
			var a= document.forms["save"]["ID"].value;
			var b= document.forms["save"]["name"].value;
            var c= document.forms["save"]["city"].value;
			var d= document.forms["save"]["address"].value;
            if(a==""){
                alert("You must enter Office ID");
				return false;
            }
            else if(b==""){
				alert("You must enter Office Name");
				return false;
			}
            else if(c==""){
				alert("You must enter City");
				return false;
			}
            else if(d==""){
				alert("You must enter Address");
				return false;
			}
            
            if (isNaN(a)) 
            {
                alert("enter a valid Office ID");
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
					<li><a href="index.php">Log out</a></li>
				</ul>
			</li>
			<li><a href="#">About us</a></li>
		</ul>
	</nav>

	<h1> Add Office</h1>
    <form id="save" name="save" action="#" onsubmit="return validateForm()" method="post">
        <section class="content">
            <div class="specs">
                <div class="info">
                    <p>Office ID::</p>
                    <input type="text" class="form-control" name="ID" id="ID" value=""/>
                </div>
                <div class="info">
                    <p>Office Name:</p>
                    <input type="text" class="form-control" name="name" id="name" value=""/>
                </div>
                <div class="info">
                    <p>Country:</p>
                    <select class="form-control" id="format1" name="country">
                        <option value="EGY" selected>Egypt</option>
                        <option value="USA">United States</option>
                        <option value="KSA">Saudi Arabia</option>
                    </select>
                </div>
                <div class="info">
                    <p>City:</p>
                    <input type="text" class="form-control" name="city" id="city" value=""/>
                </div>
                <div class="info">
                    <p>Office Address:</p>
                    <input type="text" class="form-control" name="address" id="address" value=""/>
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