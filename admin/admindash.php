	<?php
	session_start();
	if(isset($_SESSION['id'])){
     '';
	}else{
		header("location:../login.php");
	}
	echo "<a href='../logout.php' style='float:right; margin-right:62px; text-decoration:none; margin-top:40px;'>Logout</a>";
	?>
	<?php
	include("header.php");
	?>
	<div class="admin_title">
		<h1>Welcome To Admin Dashboard</h1>
	</div>
	<a href="../index.php" style="position: absolute; top:10px; left: 66px; text-decoration: none; margin-top: 40px;">HOME</a>
	<table class="admin_details">
		<tr align="center"><td><a href="addstudent.php">1. Insert Student Details</a></td></tr>
		<tr align="center"><td><a href="updatestudent.php">2. Update Student Details</a></td></tr>
		<tr align="center"><td><a href="deletestudent.php">3. Delete Student Details</a></td></tr>
	</table>
</body>
</html>


