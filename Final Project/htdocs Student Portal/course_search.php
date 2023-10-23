<?php
    require('db.php');
    $results = [];
    if(isset($_POST['search'])) {
        $searchTerm = mysqli_real_escape_string($con, $_POST['search']);
        $query = "SELECT * FROM `tblcourses` WHERE course_name LIKE '%$searchTerm%' OR course_code LIKE '%$searchTerm%'";
        $results = mysqli_query($con, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Course Search </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'master.php'; ?>
    <div class="container">
        <h2>Search Courses</h2>
        <form method="post" action="course_search.php">
            <input type="text" name="search" placeholder="Course Name or Code">
            <input type="submit" value="Search">
        </form>
        <ul>
            <?php while($course = mysqli_fetch_assoc($results)): ?>
                <li><?php echo $course['course_name']; ?> - <?php echo $course['course_code']; ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>
