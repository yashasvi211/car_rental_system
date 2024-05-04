<!DOCTYPE html>

<?php
include_once 'C:\xampp\htdocs\CarRentalSystem\once.php';
session_start();

if (isset($_POST["submit1"])) {
  $flag = 0;
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];
  $gender = $_POST['gender'];
  $ID = $_POST['ID'];
  $pass = $_POST['pass'];
  $licence = $_POST['licence'];
  $query = mysqli_query($connect, "select Email from customer");
  while ($fetch = mysqli_fetch_assoc($query)) {
    if ($email == $fetch['Email']) {
      echo '<script>alert("This email already exists")</script>';
      $flag = 1;
      break;
    }
  }
  $query = mysqli_query($connect, "select national_id from customer");
  while ($fetch = mysqli_fetch_assoc($query)) {
    if ($ID == $fetch['national_id']) {
      echo '<script>alert("National ID already exists")</script>';
      $flag = 1;
      break;
    }
  }
  $query = mysqli_query($connect, "select licence_id from customer");
  while ($fetch = mysqli_fetch_assoc($query)) {
    if ($licence == $fetch['licence_id']) {
      echo '<script>alert("License ID already exists")</script>';
      $flag = 1;
      break;
    }
  }
  if ($flag == 0) {
    $temp = $connect->prepare("insert into customer(Fname,Lname,Email,Password,national_id,phone_number,Country,Sex,licence_id) values(?,?,?,?,?,?,?,?,?)");
    $temp->bind_param("ssssiissi", $Fname, $Lname, $email, $pass, $ID, $phone, $country, $gender, $licence);
    $temp->execute();
    $_SESSION['email'] = $email;
    header('location:welcome user.php');
  }
}

if (isset($_POST["submit2"])) {
  $email = $_POST['email2'];
  $pass = $_POST['pass2'];
  $var = $_POST['user'];
  if ($var == 'user') {
    $query = mysqli_query($connect, "select * from customer where email='" . $email . "' and password='" . $pass . "'");
    $res = mysqli_fetch_row($query);
    if ($res) {
      $_SESSION['email'] = $email;
      header('location:welcome user.php');
    } else {
      echo '<script>alert("Incorrect password or email")</script>';
    }
  } else if ($var == 'admin') {
    $query = mysqli_query($connect, "select * from admin where email='" . $email . "' and password='" . $pass . "'");
    $res = mysqli_fetch_row($query);
    if ($res) {
      $_SESSION['email'] = $email;
      header('location:welcome admin.php');
    } else {
      echo '<script>alert("Incorrect password or email")</script>';
    }
  }
}
?>

<html lang="en">

<head>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/809/809998.png" type="image/x-icon">
  <title>Car Rental Form</title>
  <link rel="stylesheet" href="./index.css">
  <script>

    function validateForm() {
      var x = document.forms["loginForm"]["email"].value;
      var y = document.forms["loginForm"]["password"].value;
      var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if (x == "") {
        alert("You must enter an email");
        return false;
      }
      else if (y == "") {
        alert("You must enter the password");
        return false;
      }
      if (x.match(validRegex)) {
        document.loginForm.email.focus();
        return true;
      }
      else {
        alert("Invalid email address!");
        document.loginForm.email.focus();
        return false;
      }
    }

    function validateForm2() {
      var a = document.forms["regForm"]["Fname"].value;
      var b = document.forms["regForm"]["Lname"].value;
      var c = document.forms["regForm"]["email"].value;
      var p = document.forms["regForm"]["phone"].value;
      var d = document.forms["regForm"]["ID"].value;
      var e = document.forms["regForm"]["pass"].value;
      var f = document.forms["regForm"]["confPass"].value;
      var l = document.forms["regForm"]["licence"].value;
      var m = document.getElementById("format1");
      var selectedValue1 = m.options[m.selectedIndex].value;
      var o = document.getElementById("format2");
      var selectedValue2 = o.options[o.selectedIndex].value;
      var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if (a == "") {
        alert("You must enter your first name");
        return false;
      }
      else if (b == "") {
        alert("You must enter your last name");
        return false;
      }
      else if (c == "") {
        alert("You must enter an email");
        return false;
      }
      else if (p == "") {
        alert("You must enter your phone number");
        return false;
      }
      else if (selectedValue1 == "selected") {
        alert("choose your country");
        return false;
      }
      else if (selectedValue2 == "selected") {
        alert("choose your gender");
        return false;
      }
      else if (l == "") {
        alert("You must enter your Licence ID");
        return false;
      }
      else if (d == "") {
        alert("You must enter your ID");
        return false;
      }
      else if (e == "") {
        alert("You must enter a password");
        return false;
      }
      else if (f == "") {
        alert("You must confirm your password");
        return false;
      }
      else if (e != f) {
        alert("Passwords don't match each others");
        return false;
      }

      if (isNaN(p)) {
        alert("enter a valid phone number");
        return false;
      }

      if (isNaN(l)) {
        alert("enter a valid Licence ID");
        return false;
      }

      if (isNaN(d)) {
        alert("enter a valid National ID");
        return false;
      }

      if (c.match(validRegex)) {
        document.registrationForm.email.focus();
        return true;
      }
      else {
        alert("Invalid email address!");
        document.registrationForm.email.focus();
        return false;
      }
    }

  </script>
</head>

<body>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

  <body>
    <div id="form">
      <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
          <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#signup" role="tab" data-toggle="tab">Sign up</a></li>
              <li><a href="#login" role="tab" data-toggle="tab">Log in</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="signup">
                <h2 class="text-uppercase text-center"> Sign Up for Free</h2>
                <form id="signup" name="regForm" action="#" onsubmit="return validateForm2()" method="post">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="Fname" name="Fname" placeholder="First Name">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="Lname" name="Lname" placeholder="Last Name">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="format1" name="country">
                      <option selected disabled value="selected">Select your country</option>
                      <option value="EGY">Egypt</option>
                      <option value="IND">India</option>
                      <option value="KSA">Saudi Arabia</option>
                    </select>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <select class="form-control" id="format2" name="gender">
                      <option selected disabled value="selected">Select your gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="licence" name="licence" placeholder="Licence ID">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="ID" name="ID" placeholder="National ID">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="confPass" placeholder="Confirm Password">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="mrgn-30-top">
                    <button type="submit" class="btn btn-larger btn-block" value='Submit1' name="submit1">
                      Sign up
                    </button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade in" id="login">
                <h2 class="text-uppercase text-center"> Log in</h2>
                <form id="login" name="loginForm" action="#" onsubmit="return validateForm()" method="post">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email2" placeholder="Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="pass2" placeholder="Password">
                    <p class="help-block text-danger"></p>
                  </div>
                  <br>
                  <div class="form-group">
                    <input type="radio" name="user" value="user" checked> User<br>
                    <input type="radio" name="user" value="admin"> Admin<br>
                  </div>

                  <div class="mrgn-30-top">
                    <button type="submit" class="btn btn-larger btn-block" value='Submit' name="submit2">
                      Log in
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p><a href="">Contact us</a></p>
    </footer>


    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
  <script src="./script.js"></script>

  </html>