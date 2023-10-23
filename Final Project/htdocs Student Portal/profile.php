<?php
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCKTYPE html>
<html lang="en">
<head>
	<title> Profile Page </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'master.php';?>

	<div class="container text-center">
	<h1>Welcome to the Profile page</h1>
	</div>
	<br><br>
	<div>
	<center>
	<b>LOGIN SUCCESSFUL!</b>
	</center>
	</div>
<?php
  session_start();
  require('db.php');

  $strSQL = "SELECT email, firstname, lastname, address, phone, salary, ssn FROM tbluser WHERE email = '".$_SESSION['email']."'";

  $rs = mysqli_query($con, $strSQL);

  while($row = mysqli_fetch_array($rs)) {

    echo "Email Address : " . $row['email'] . "<br />";
    echo "First Name : " . $row['firstname'] . "<br />";	
    echo "Last Name : " . $row['lastname'] . "<br />";	
    echo "Address : " . $row['address'] . "<br />";	
    echo "Phone Number : " . $row['phone'] . "<br />";
    echo "Employee Salary : " . $row['salary'] . "<br />";	
	echo "Social Security No. : " . $row['ssn'] . "<br />";
  }	
?>
	
<?php include 'footer.php';?>
</body>
</html>
