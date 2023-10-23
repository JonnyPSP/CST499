<?php
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCKTYPE html>
<html lang="en">
<head>
	<title> Registration Page </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'master.php'; ?>

	<div class="container text-center">
	<h1>Welcome to the Registration page</h1>
	</div>

<?php
    require('db.php');
    if (isset($_REQUEST['email'])) {
        $email    = ($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = ($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $firstname    = ($_REQUEST['firstname']);
        $firstname    = mysqli_real_escape_string($con, $firstname);
        $lastname    = ($_REQUEST['lastname']);
        $lastname    = mysqli_real_escape_string($con, $lastname);
        $address    = ($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        $phone    = ($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);
        $studentnbr    = ($_REQUEST['studentnbr']);
        $studentnbr    = mysqli_real_escape_string($con, $studentnbr);


        $query    = "INSERT into `tblUser` (email, password, firstname, lastname, address, phone, studentnbr)
                     VALUES ('$email', '$password', '$firstname', '$lastname', '$address', '$phone', '$studentnbr')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <center><h3>Registration Successful!</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Registration Failed</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<center>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="email" placeholder="Email Address" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="text" class="login-input" name="firstname" placeholder="First Name" required />
        <input type="text" class="login-input" name="lastname" placeholder="Last Name" required /><br>
        <input type="text" class="login-input" name="address" placeholder="Address" required />
        <input type="text" class="login-input" name="phone" placeholder="Phone" required />
        <input type="text" class="login-input" name="studentnbr" placeholder="Student Number" required />
        <input type="submit" name="submit" value="Register" class="login-button"><br><br>
        <p class="link"><a href="login.php">Existing User Login</a></p>
    </form>
	</center>
<?php
    }
?>
	
<?php include 'footer.php';?>
</body>
</html>