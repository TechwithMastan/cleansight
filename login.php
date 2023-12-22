<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include("connection.php");

include('server.php');
if (isset($_SESSION['user_name']) && isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] <= 1200)) {
    header("Location: admin.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your existing login logic here
    
    // Set session variables for logged-in user
    $_SESSION['user_name'] = $user_name; // Replace with your actual username variable
    $_SESSION['last_activity'] = time();

    // Redirect to admin page
    header("Location: admin.php");
    exit();
}
?>
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | CLEAN SIGHT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
          background-color: rgb(100, 136, 234);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height:100vh;
        }      
             
        .navbar-brand {
            font-size: 2rem;
            color: #FFF; 
            font-weight: bold;
            text-transform: uppercase;
        }
        .success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
        #header-nav {
            background-color: rgba(10,10,10,0.8);
            height: 70px;
            line-height: 70px;
            padding-top: 15px;
        }
        .header-link {
            color: #0c0b0b;
            margin-right: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
        }
        .success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
        }
        body {
	font-family: 'Montserrat', sans-serif;
}

.container {
	margin-top: 50px;
}

.form-wrapper {
	background-color: #fff;
	padding: 30px;
	border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
@media screen and (min-width: 992px) {
	.form-wrapper {
		margin-top: 80px;
	}
}

@media screen and (max-width: 767px) {
	.form-wrapper {
		padding: 20px;
	}
}
@media screen and (max-width: 767px) {
    #navbarNav .navbar-toggler-icon {
        color: #000 !important; /* Change this to the desired color */
    }
}
#header-1{
    position: fixed;
    z-index: 1000;
    top: 0px;
    right: 0px;
    left: 0px;
    color:black;
}
.container{
    margin-top: 100px;
}
        .header-link:hover {
            color: #83effd;
        }

.btn-primary {
	background-color: #e62721;
	border-color: #d81515;
}

.btn-primary:hover {
	background-color: #e44622;
	border-color: #C82400;
}

.register-link {
	color: #E53D00;
}

.register-link:hover {
	color: #C82400;
}

.fa-eye-slash {
	cursor: pointer;
}


        .password-container{
  width: 400px;
  position: relative;
}
.password-container input[type="password"],
.password-container input[type="text"]{
  width: 100%;
  padding: 12px 36px 12px 12px;
  box-sizing: border-box;
}
.fa-eye{
  position: absolute;
  top: 28%;
  right: 1%;
  cursor: pointer;
  color: lightgray;
}


    </style>
</head>
<body>
    <nav style="background-color: white; " class="navbar navbar-expand-lg navbar-dark  mb-3" id="header-1">
        <div class="container-fluid">
            <a href="#" style="color: rgb(79, 91, 146);" class="navbar-brand">CLEAN SIGHT</a>
            <button style="background-color:  rgb(79, 91, 146); color: white; " class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul  class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="HOME.php" style="color: rgb(79, 91, 146);" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" style="color: rgb(79, 91, 146);" class="nav-link">About us</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4 form-wrapper bg-light rounded-lg shadow-lg py-4 px-5">
                <h3 class="text-center mb-4">Welcome to CLEAN SIGHT</h3>
                <form  method="post" action="">
                <?php include('errors.php'); ?>
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username:</label>
                        <input type="text" class="form-control form-control-lg" id="username" name="user_name" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-eye" id="eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" name="login_user" class="btn btn-primary btn-block btn-lg" value="Login">Login</button>
                    </div>
                </form>
                <p class="text-center mt-2 mb-0">Don't have an account? <a href="register.php" class="register-link">Register here</a></p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
<script>

const passwordInput = document.querySelector("#password");
    const eyeIcon = document.querySelector("#eye");

    // Function to toggle password visibility
    eyeIcon.addEventListener("mouseover", function () {
        passwordInput.type = "text";
    });

    eyeIcon.addEventListener("mouseout", function () {
        passwordInput.type = "password";
    });
</script>
</body>
</html>                          