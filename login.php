<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("location:admin/admindash.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </head>
  <body>
       <form style="width:40%; margin: auto; margin-top: 60px;" method="post">
    <h3 align="center">Admin Login</h3>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password" required>
  </div>
  <button type="submit" class="btn btn-success" style="margin-top:15px;" name="submit" >Submit</button>
</form>
<?php
  include("dbcon.php");
  if(isset($_POST['submit'])){
$name=$_POST['username'];
$pass=$_POST['password'];
$query=mysqli_query($conn,"select * from admin where username='$name' and password='$pass'");
if(mysqli_num_rows($query)>0){
  session_start();
  $fetchdata=mysqli_fetch_assoc($query);
  $_SESSION['id']=$fetchdata['id'];
  header("location:admin/admindash.php");
}else{?>
  <script type="text/javascript">
    alert("username and password not matched");
    window.open('login.php', '_self');
  </script>
  <?php
}
}
?>
  </body>
</html>