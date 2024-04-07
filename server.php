<?php
session_start();

// initializing variables
$username = "";
$password    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $number = mysqli_real_escape_string($db, $_POST['pnumber']);
  $date = mysqli_real_escape_string($db, $_POST['bdate']);
  $blood = mysqli_real_escape_string($db, $_POST['bgroup']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $address1 = mysqli_real_escape_string($db, $_POST['address1']);
  $Country = mysqli_real_escape_string($db, $_POST['country']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $region = mysqli_real_escape_string($db, $_POST['region']);
  $postalcode = mysqli_real_escape_string($db, $_POST['postalcode']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($number)) { array_push($errors, "Phone number is required"); }
  if (empty($date)) { array_push($errors, "Birthdate is required"); }
  if (empty($blood)) { array_push($errors, "Blood group is required"); }
  if (empty($gender)) { array_push($errors, "gender is required"); }
  if (empty($address)) { array_push($errors, "address is required"); }
  if (empty($address1)) { array_push($errors, "address1 is required"); }
  if (empty($Country)) { array_push($errors, "country is required"); }
  if (empty($city)) { array_push($errors, "city is required"); }
  if (empty($region)) { array_push($errors, "region is required"); }
  if (empty($postalcode)) { array_push($errors, "postalcode is required"); }
  


 

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE fullname='$fullname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fullname'] === $fullname) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fullname, email, password) 
  			  VALUES('$fullname', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['fullname'] = $fullname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// // LOGIN USER
// if (isset($_POST['login_user'])) {
//   $username = mysqli_real_escape_string($db, $_POST['fullname']);
//   $password = mysqli_real_escape_string($db, $_POST['password']);

//   if (empty($username)) {
//   	array_push($errors, "fullname is required");
//   }
//   if (empty($password)) {
//   	array_push($errors, "Password is required");
//   }

//   if (count($errors) == 0) {
//   	$password = md5($password);
//   	$query = "SELECT * FROM users WHERE fullname='$username' AND password='$password'";
//   	$results = mysqli_query($db, $query);
//   	if (mysqli_num_rows($results) == 1) {
//   	  $_SESSION['fullname'] = $username;
//   	  $_SESSION['success'] = "You are now logged in";
//   	  header('location: index.php');
//   	}else {
//   		array_push($errors, "Wrong fullname/password combination");
//   	}
//   }
// }

?>