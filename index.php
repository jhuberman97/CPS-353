<?php 
  include ('server.php');
  if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
  if (!isset($_SESSION['username'])) {
	echo $_SESSION['username'];
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$query = "SELECT id from profile where username = '$username'";
	$id = mysqli_query($db, $query);
	$id = $id->fetch_array();
	$idno = intval($id[0]);
	$_SESSION['id'] = $idno;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2><center>You Decide: A Decision-Making Game</center></h2>
<div class="header">
	<h2>Home</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p> <a href ="sit1.php"> Begin Game </p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Log Out</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>