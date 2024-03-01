<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
	
	
	<!-- <h1 align="center">Welcome To Student Management System</h1> -->
		<div class="admin_title">
		<h1>Welcome To Student Management System</h1>
	</div>
	<h5 align="right" style="margin-right: 20px; position:absolute; top: 40px; right: 60px;"><a href="login.php" style="text-decoration: none;" >Admin Login</a></h5>
	<form method="post" style="margin-top: 60px;">
		<table border="1" style="width:30%" align="center" class="table table-striped">
			<tr>
				<td colspan="3" align="center"><b>Student Information</b></td>
			</tr>
			<tr>
				<td colspan="2">Choose standard</td>
				<td><select name="select">
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="2">Enter Roll No</td>
				<td colspan="2">
					<input type="text" name="rollno" required>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" value="show info" class="btn btn-info">
				</td>
			</tr>
		</table>
	</form>
	<?php
	include("dbcon.php");
	if(isset($_POST['submit'])){
	$select=$_POST['select'];
	$rollno=$_POST['rollno'];
	$query=mysqli_query($conn, "select * from student where standard='$select' and rollno='$rollno'");
	if(mysqli_num_rows($query)>0){
		$fetchdata=mysqli_fetch_assoc($query);?>
		<table style="width:40%; margin:auto;" class="table table-striped" id="table">
			<tr>
				<td>ID</td>
				<td>ROLLNO</td>
				<td>NAME</td>
				<td>CITY</td>
				<td>CONTACT NO</td>
				<td>STANDARD</td>
				<td>IMAGE</td>
			</tr>
			<tr>
				<td><?php echo $fetchdata['id']?></td>
				<td><?php echo $fetchdata['rollno']?></td>
				<td><?php echo $fetchdata['name']?></td>
				<td><?php echo $fetchdata['city']?></td>
				<td><?php echo $fetchdata['contactno']?></td>
				<td><?php echo $fetchdata['standard']?></td>
				<td><img src="dataimg/<?php echo $fetchdata['image']?>" style="max-width: 100px; position: relative; !important; top:0px !important; right: 0px !important; "></td>
			</tr>
		</table>
		<?php

	}
	}

	?>

</body>

</html>