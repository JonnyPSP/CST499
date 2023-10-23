<?php
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCKTYPE html>
<html lang="en">
<head>
	<title> Login Page </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php require 'master.php';
?>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `tbluser` WHERE email='$email'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            header("Location: my_courses.php");
        } else {
            echo "<center>
                  <h3>
				  <FONT COLOR=red>Invalid email/password, or user not found.
				  </font>
				  </h3><br/>
                  </center>";
        }
    } else {
	}
?>



	<div class="container text-center">
		<h1>Welcome to the Login page</h1>
	</div>

<div>
<center>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="Email Address" autofocus="true"/><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/><br>
        <input type="submit" value="Login" name="submit" class="login-button"/><br><br>
        <p class="link"><a href="registration.php">New User Registration</a></p>
  </form>
  </center>
  </div>

<?php require_once 'footer.php';?>
</body>
</html>