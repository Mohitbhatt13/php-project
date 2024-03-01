	<?php
	session_start();
	if(isset($_SESSION['id'])){
     '';
	}else{
		header("location:../login.php");
	}
	echo "<a href='../logout.php' style='float:right; margin-right:64px; text-decoration:none; margin-top:40px;'>Logout</a>";
	echo '<a href="admindash.php" style="float: left; margin-left:65px; text-decoration:none; margin-top:40px";>Back to Dashboard</a>';
	?>
	<?php
	include("header.php");
	?>
	<div class="admin_title">
		<h1>Welcome To Admin Dashboard</h1>
	</div>
	<form style="width:40%; margin: auto; margin-top:40px" enctype="multipart/form-data" method="post">
		<table>
			<tr>
				<td> <label for="exampleInputPassword1">Name</label></td>
				<td><input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name" name="name" required></td>
				<td><label for="exampleInputPassword1">Standard</label></td>
				<td> <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Standard" name="standard" required></td>
				<td>   <button type="submit" class="btn btn-primary" name="submit" style="margin-top:0px;">Search</button></td>
			</tr>
		</table>
	</form>
	<?php
	include("../dbcon.php");
	if(isset($_POST['submit'])){
	 $name=$_POST['name'];
	 $standard=$_POST['standard'];
	$query=mysqli_query($conn,"select * from student where standard='$standard' AND name LIKE '%$name%'");
	if(mysqli_num_rows($query)>0){
		$fetchdata=mysqli_fetch_assoc($query);
		?>
		<table style="width:80%; margin:auto; border:1;" >
			<tr style="background-color: black; color: white;">
				<td>ID</td>
				<td>Roll No</td>
				<td>Name</td>
				<td>City</td>
				<td>Contact No</td>
				<td>Standard</td>
				<td>Name</td>
				<td>Image</td>
			</tr>
			<?php foreach($fetchdata as $value){ ?>
				<td><?php echo $value.'<br>'?></td>
			<?php  } ?>
			<td ><img src="../dataimg/<?php echo $fetchdata['image']?>"style='max-width: 100px;'></td>
			</table>
			<a href="deleteform.php?id=<?php echo $fetchdata['id']?>" style='float:right; margin-right:80px; text-decoration:none; margin-top:-2px;'>Delete</a>
		<?php
	}else{
		echo "no record found";
	}
}
	?>
</body>
</html>