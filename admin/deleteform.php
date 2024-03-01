	<?php
	session_start();
	if(isset($_SESSION['id'])){
     '';
	}else{
		header("location:../login.php");
	}
	echo "<a href='../logout.php' style='float:right; margin-right:64px; text-decoration:none;'>Logout</a>";
	echo '<a href="admindash.php" style="float: left; margin-left:65px; text-decoration:none;">Back to Dashboard</a>';
	?>
 	<div class="admin_title">
		<h1>Welcome To Admin Dashboard</h1>
	</div>
		<?php
  include("header.php");
  include("../dbcon.php");
  echo $id=$_GET['id'];
  $query= mysqli_query($conn,"delete from student where id='$id'");
  if($query){?>
  	<script type="text/javascript">
  		alert("deleted successfully");
  		window.open("deletestudent.php","_self");
  	</script><?php
  }else{
  	echo "error";
  }
 ?>


