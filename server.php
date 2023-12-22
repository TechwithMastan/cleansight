<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include("connection.php");
$errors = array(); 
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user_name)) { array_push($errors, "OfficeID is required"); }
  if (empty($zipcode)) { array_push($errors, "zip_code is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $confirm_password) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same user_name and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$user_name' OR zipcode='$zipcode' OR email='$email'  LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $user_name) {
      array_push($errors, "OfficeID already exists");
    }
    if ($user['zipcode'] === $zipcode) {
        array_push($errors, "zipcode already exists");
      }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  //encrypt the password before saving in the database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (user_name, zipcode, email, password) VALUES ('$user_name', '$zipcode', '$email', '$hashed_password')";
  
  mysqli_query($conn,$query);
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($user_name)) {
    array_push($errors, "OfficeID is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE user_name='$user_name'";
    $results = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['success'] = "You are now logged in";
        header('location: admin.php');
        exit(); // Ensure that script stops after redirect
      } else {
        array_push($errors, "Wrong password");
      }
    } else {
      array_push($errors, "Wrong OfficeID");
    }
  }
}
?>