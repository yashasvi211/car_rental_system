<!DOCTYPE html>

<?php
	include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
	session_start();
    
    if (isset($_POST["submit"])) {
        $flag = 0;
        $temp = 0;
        $ID = $_POST['ID'];
        $color = $_POST['color'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $year = $_POST['year'];
        $office = $_POST['office'];
        $image = $_POST['image'];

        $query = mysqli_query($connect, "select Plate_id from car");
        while ($fetch = mysqli_fetch_assoc($query)) {
          if ($ID == $fetch['Plate_id']) {
            echo '<div class="error1"><h2 class="error2">Plate_ID Already Exists</h2></div>';
            $flag = 1;
            break;
          }
        }
        $query = mysqli_query($connect, "select Office_id from office");
        while ($fetch = mysqli_fetch_assoc($query)) {
            if ($office == $fetch['Office_id']) {
                $temp = 1;
            }
        }
        if($temp == 0){
            echo '<div class="error1"><h2 class="error2">Office does not exist</h2></div>';
        }
        if ($flag == 0 and $temp == 1) {
            $temp = $connect->prepare("INSERT INTO CAR (Plate_id,Color,car.Year,Brand,Model,Price_per_day,office_id,car.Image) VALUES ($ID,'$color',$year,'$brand', '$model', $price,$office,'$image')");
            $temp->execute();
            header('location:welcome admin.php');
        }
      }

?>

<html lang="en">
<head>
	<meta charset="utf-8"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="add car.css" rel="stylesheet">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
	<title>Car Rental - Add Car</title>
	<script src="https://kit.fontawesome.com/77fd9664d1.js" crossorigin="anonymous"></script>
    <script>

		function validateForm(){
			var a= document.forms["save"]["ID"].value;
			var b= document.forms["save"]["color"].value;
            var c= document.forms["save"]["brand"].value;
			var d= document.forms["save"]["model"].value;
            var e= document.forms["save"]["price"].value;
			var f= document.forms["save"]["year"].value;
			var g= document.forms["save"]["office"].value;
            var h= document.forms["save"]["image"].value;
            if(a==""){
                alert("You must enter plate_id");
				return false;
            }
            else if(b==""){
				alert("You must enter color");
				return false;
			}
            else if(c==""){
				alert("You must enter brand");
				return false;
			}
            else if(d==""){
				alert("You must enter model");
				return false;
			}
            else if(e==""){
				alert("You must enter price");
				return false;
			}
            else if(f==""){
				alert("You must enter year");
				return false;
			}
            else if(g==""){
				alert("You must enter office");
				return false;
			}
            else if(h==""){
				alert("You must enter image");
				return false;
			}
            
            if (isNaN(a)) 
            {
                alert("enter a valid plate_id");
                return false;
            }

            if (isNaN(e)) 
            {
                alert("enter a valid price");
                return false;
            }

            if (isNaN(f)) 
            {
                alert("enter a valid year");
                return false;
            }

            if (isNaN(g)) 
            {
                alert("enter a valid ofice ID");
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

	<h1> Add Car</h1>
    <form id="save" name="save" action="#" onsubmit="return validateForm()" method="post">
        <section class="content">
            <br>
            <div class="specs">
                <div class="info">
                    <p>Plate-ID:</p>
                    <input type="text" class="form-control" name="ID" id="ID" value=""/>
                </div>
                <div class="info">
                    <p>Color:</p>
                    <input type="text" class="form-control" name="color" id="color" value=""/>
                </div>
                <div class="info">
                    <p>Brand:</p>
                    <input type="text" class="form-control" name="brand" id="brand" value=""/>
                </div>
                <div class="info">
                    <p>Model:</p>
                    <input type="text" class="form-control" name="model" id="model" value=""/>
                </div>
                <div class="info">
                    <p>Price Per Day:</p>
                    <input type="text" class="form-control" name="price" id="price" value=""/>
                </div>
                <div class="info">
                    <p>Year:</p>
                    <input type="text" class="form-control" name="year" id="year" value=""/>
                </div>
                <div class="info">
                    <p>Oficce ID:</p>
                    <input type="text" class="form-control" name="office" id="office" value=""/>
                </div>
                <div class="info">
                    <p>Image url:</p>
                    <input type="text" class="form-control" name="image" id="image" value=""/>
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