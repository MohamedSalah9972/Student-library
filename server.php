<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['rgstr'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if ($password_1 != $password_2) {
	   array_push($errors, "The two passwords do not match");
  }
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] == $email) {
      array_push($errors, "email already exists");
    }
    if($user['phone'] == $phone){
      array_push($errors, "phone already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1); //encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, phone, role) 
  			  VALUES('$username', '$email', '$password', '$phone', '$role')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['role'] = $role;
  	if($role == 'admin')
      	header('location: adminpage.php');
    else 
      	header('location: studentpage.php');
  }
  else{
    $_SESSION['success'] = "Wrong";
    $_SESSION['error'] = $errors;
    $_SESSION['state'] = 'register';

    header('location: logout.php');
  }
}

// LOGIN
if (isset($_POST['loginUser'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['role'] = $role;
      if(isset($_POST['Remember'])){
        setcookie('password',$password,time()+7000);
        setcookie('username',$username,time()+7000);
        setcookie('role',$role,time()+7000);
     }
      if($role == 'admin')
      	header('location: adminpage.php');
      else 
      	header('location: studentpage.php');

    }else {
      array_push($errors, "Username, Password or role is wrong!");
      $_SESSION['success'] = "Wrong";
      $_SESSION['error'] = $errors;
      $_SESSION['state'] = 'login';

      header('location: logout.php');
    }

  }else {
    $_SESSION['success'] = "Wrong";
    $_SESSION['state'] = 'login';
    $_SESSION['error'] = $errors;
    header('location: logout.php');

  }
}


?>