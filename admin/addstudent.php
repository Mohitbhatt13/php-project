	<?php
	session_start();
	if(isset($_SESSION['id'])){
     '';
	}else{
		header("location:../login.php");
	}
	echo "<a href='../logout.php' style='float:right; margin-right:64px; text-decoration:none;margin-top:40px;'>Logout</a>";
	echo '<a href="admindash.php" style="float: left; margin-left:65px; text-decoration:none;margin-top:40px;">Back to Dashboard</a>';
	?>
	<?php
	include("header.php");
	?>
	<div class="admin_title">
		<h1>Welcome To Admin Dashboard</h1>
	</div>
	<form style="width:40%; margin: auto; margin-top:40px" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Roll No</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll No" name="rollno" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name" name="name" required>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter city" name="city" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contact No</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Phone No" name="contactno" required>
  </div>
  <div class="form-group">
  	 <label for="exampleInputPassword1">Standard</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Standard" name="standard" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder=" Upload image" name="image" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit" style="margin-top:12px;">Submit</button>
</form>
<h4></h4>
<?php
include("../dbcon.php");
if(isset($_POST['submit'])){
	$Rollno= $_POST['rollno'];
	$Name= $_POST['name'];
	$City= $_POST['city'];
	$Contactno= $_POST['contactno'];
	$Standard= $_POST['standard'];
	$imagename=$_FILES['image'];
	$imagename=$_FILES['image']['name'];
	$tmpname=$_FILES['image']['tmp_name'];
	move_uploaded_file($tmpname, '../dataimg/'.$imagename);
	$query=mysqli_query($conn,"insert into student(rollno,name,city,contactno,standard,image)values('$Rollno','$Name','$City','$Contactno','$Standard','$imagename')");
	if($query){?>
		<script type="text/javascript">alert("inserted successfully");</script>
		<?php
	}else{
		echo "error";
	}
}
?>