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
  include("../dbcon.php");
 $id=$_GET['id'];
 $query=mysqli_query($conn,"select * from student where id='$id'");
 $fetch=mysqli_fetch_assoc($query);
	?>
	<div class="admin_title">
		<h1>Welcome To Admin Dashboard</h1>
	</div>
	<form style="width:40%; margin: auto; margin-top:40px" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Roll No</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll No" name="rollno" required value="<?php echo $fetch['rollno'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name" name="name" required value="<?php echo $fetch['name']?>">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter city" name="city" required value="<?php echo $fetch['city']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contact No</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Phone No" name="contactno" required value="<?php echo $fetch['contactno']?>">
  </div>
  <div class="form-group">
  	 <label for="exampleInputPassword1">Standard</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Standard" name="standard" required value="<?php echo $fetch['standard']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder=" Upload image" name="image" required value="<?php echo $fetch['image']?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" style="margin-top:12px;">Submit</button>
</form>
<?php
if(isset($_POST['submit'])){
$rollno=$_POST['rollno'];
$name=$_POST['name'];
$city=$_POST['city'];
$contact=$_POST['contactno'];
$standard=$_POST['standard'];
$imagename=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
move_uploaded_file($tmpname, '../dataimg/'.$imagename);
$query=mysqli_query($conn,"update student set rollno='$rollno',name='$name',city='$city',contactno='$contact', standard='$standard', image='$imagename' where id='$id'");
if($query){?>
  <script type="text/javascript">
    alert("data updated successfully");
    window.open("updateform.php?id=<?php echo $id ?>","_self");
</script><?php
}else{
  echo "failed";
}
}
?>
