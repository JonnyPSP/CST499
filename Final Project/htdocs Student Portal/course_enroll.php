<?php
    require('db.php');
    session_start();
    $courses = mysqli_query($con, "SELECT * FROM `tblcourses`");
    if(isset($_POST['course_id'])) {
        $course_id = $_POST['course_id'];
        $email = $_SESSION['email'];
        $checkEnrollment = mysqli_query($con, "SELECT * FROM `tblenrollment` WHERE email='$email' AND course_id='$course_id'");
        if(mysqli_num_rows($checkEnrollment) == 0) {
            mysqli_query($con, "INSERT INTO `tblenrollment` (email, course_id) VALUES ('$email', '$course_id')");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Course Enrollment </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'master.php'; ?>
    <div class="container">
        <h2>Enroll in a Course</h2>
        <ul>
            <?php while($course = mysqli_fetch_assoc($courses)): ?>
                <li>
                    <?php echo $course['course_name']; ?> - 
                    <?php echo $course['course_code']; ?>
                    <form method="post" action="course_enroll.php">
                        <input type="hidden" name="course_id" value="
                        <?php echo $course['course_id']; ?>">
                        <input type="submit" value="Enroll">
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>