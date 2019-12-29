<?php
session_start();

// initializing variables
$first_name = "";
$last_name = "";
//$birth_year = 0;
$gender = "";
$username = "";
$email    = "";
$user_password = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'se_19f_g05', 'q35a7z', 'se_19f_g05_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $birth_year = mysqli_real_escape_string($db, $_POST['birth_year']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM profile WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$user_password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO profile (first_name, last_name, birth_year, gender, email, username, user_password) 
  			  VALUES(?, ?, ?, ?, ?, ?, ?)";
	$stmt = "";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssissss", $first_name, $last_name, $birth_year, $gender, $email, $username, $user_password);
	$stmt->execute();
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
	$query = "SELECT id from profile where username = '$username'";
	$id = mysqli_query($db, $query);
	$id = $id->fetch_array();
	$idno = intval($id[0]);
	$_SESSION['id'] = $idno;
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $user_password = mysqli_real_escape_string($db, $_POST['user_password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($user_password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$user_password = md5($user_password);
  	$query = "SELECT * FROM profile WHERE username='$username' AND user_password='$user_password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  echo $_SESSION['username'];
	  echo isset($_SESSION['username']);
	  $query = "SELECT id from profile where username = '$username'";
	  $id = mysqli_query($db, $query);
	  $id = $id->fetch_array();
	  $idno = intval($id[0]);
	  $_SESSION['id'] = $idno;
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if (isset($_POST['choice'])){
	// $response_1 = mysqli_real_escape_string($db, $_POST['response_1']);
	// $query = "INSERT INTO responses (id, response_1, response_2, response_3) 
  			  // VALUES(?, ?, ?, ?)";
	// $stmt = $db->prepare($query);
	// $test = "test";
	// $stmt->bind_param("isss", $_SESSION['id'], $response_1, $test, $test);
	// $stmt->execute();
	// mysqli_query($db, $query);
	
	if(isset($_POST['response_1'])){
		$_SESSION['response_1'] = $_POST['response_1'];
		if($_POST['response_1'] == "yes") header('location:sit2a.php');
		else if($_POST['response_1'] == "no") header('location:sit2b.php');
	}
	else if(isset($_POST['response_2a'])){
		$_SESSION['response_2a'] = $_POST['response_2a'];
		if($_POST['response_2a'] == "yes") header ('location:sit3a.php');
		else if($_POST['response_2a'] == "no") header ('location:sit3b.php');
	}
	else if(isset($_POST['response_2b'])){
		$_SESSION['response_2b'] = $_POST['response_2b'];
		if($_POST['response_2b'] == "yes") header ('location:sit3c.php');
		else if($_POST['response_2b'] == "no") header ('location:sit3d.php');
	}
	else if (isset($_POST['response_3a'])){
		$_SESSION['response_3a'] = $_POST['response_3a'];
		if($_POST['response_3a'] == "yes") header ('location:sit4a.php');
		else if($_POST['response_3a'] == "no") header ('location:sit4b.php');
	}
	else if (isset($_POST['response_3b'])){
		$_SESSION['response_3b'] = $_POST['response_3b'];
		if($_POST['response_3b'] == "yes") header ('location:sit4c.php');
		else if($_POST['response_3b'] == "no") header ('location:sit4d.php');
	}
	else if (isset($_POST['response_3c'])){
		$_SESSION['response_3c'] = $_POST['response_3c'];
		if($_POST['response_3c'] == "yes") header ('location:sit4e.php');
		else if($_POST['response_3c'] == "no") header ('location:sit4f.php');
	}
	else if (isset($_POST['response_3d'])){
		$_SESSION['response_3d'] = $_POST['response_3d'];
		if($_POST['response_3d'] == "yes") header ('location:sit4g.php');
		else if($_POST['response_3d'] == "no") header ('location:sit4h.php');
	}
}

?>