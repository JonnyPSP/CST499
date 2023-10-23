<?php
    require('db.php');
    session_start();
    $email = $_SESSION['email'];
    if(isset($_POST['unenroll_id'])) {
        $course_id = $_POST['unenroll_id'];
        mysqli_query($con, "DELETE FROM `tblenrollment` WHERE email='$email' AND course_id='$course_id'");
    }
    $enrollments = mysqli_query($con, "SELECT * FROM `tblenrollment` JOIN `tblcourses` ON tblenrollment.course_id = tblcourses.course_id WHERE email='$email'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Enrolled Courses </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'master.php'; ?>
    <div class="container">
        <h2>My Courses</h2>
        <ul>
            <?php while($course = mysqli_fetch_assoc($enrollments)): ?>
                <li>
                    <?php echo $course['course_name']; ?> - 
                    <?php echo $course['course_code']; ?>
                    <form method="post" action="my_courses.php">
                        <input type="hidden" name="unenroll_id" value="
                        <?php echo $course['course_id']; ?>">
                        <input type="submit" value="Unenroll">
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>