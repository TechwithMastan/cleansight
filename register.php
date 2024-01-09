<?php 
session_start();

   include("connection.php");
  
   include('server.php');
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register | Clean Sight</title>
    <!-- Meta viewport tag for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Google Font - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: rgb(100, 136, 234);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
    

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
            background-color: rgba(10, 10, 10, 0.8);
            height: 70px;
            line-height: 70px;
            padding-top: 15px;
        }
        .header-link {
            color: #FFF;
            margin-right: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-link:hover {
          
			color: #ff8c00;
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
  top: 31%;
  right: 1%;
  cursor: pointer;
  color: lightgray;
}
#header-1{
    position: fixed;
    z-index: 1000;
    top: 0px;
    right: 0px;
    left: 0px;

}
.container{
    margin-top: 100px;
}
#reg-btn{
    background-color: #007bff;
    border-color: #007bff;
}
#reg-btn:hover{
    background-color: rgb(0,123,255, .8);
}

		
    </style>
</head>
<body>
    <nav style="background-color: white;box-shadow:1px 1px 10px rgb(67, 63, 63) ; " class="navbar navbar-expand-lg navbar-dark  mb-3" id="header-1">
        <div class="container-fluid">
            <a href="#" style="color: rgb(79, 91, 146);" class="navbar-brand">CLEAN SIGHT</a>
            <button style="background-color:  rgb(79, 91, 146); color: white; " class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul  class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="HOME.php" style="color: rgb(79, 91, 146);" class="nav-link">Home</a>
                   
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4 form-wrapper">
            <h3 class="text-center mb-4">Register for Clean Sight</h3>
            <form  method="post" action="" id="register_form">
                <?php include('errors.php'); ?>
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user"></i>
                        OfficeId
                    </label>
                    <input type="text" class="form-control form-control-lg" id="username" name="user_name" placeholder="Enter your OfficeID" required>
                </div>
                <div class="form-group">
                    <label for="zipcode">
                        <i class="fas fa-user"></i>
                        ZIP-CODE
                    </label>
                    <input type="text" class="form-control form-control-lg" id="zipcode" name="zipcode" placeholder="Enter your ZIP-CODE" required>
                </div>
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password" required>
						
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" id="togglePassword" style="cursor: pointer;">
								<i class="fa-solid fa-eye" id="eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">
                        <i class="fas fa-lock"></i>
                        Confirm Password
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" id="toggleConfirmPassword" style="cursor: pointer;">
								<i class="fa-solid fa-eye" id="confirm_eye"></i>
                            </span>
                        </div>
                    </div>
                    <p id="password_error" class="text-danger"></p>
                </div>
                <div class="form-group mt-4">
                    
                    <button type="submit" name="reg_user" id="reg-btn" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>
            </form>
            <p class="text-center mt-2 mb-0">Already have an account? <a href="login.php" class="login-link">Login here</a></p>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="jquery-3.2.1.min.js"></script>

<script>

const passwordInput = document.querySelector("#password");
    const confirmPasswordInput = document.querySelector("#confirm_password");
    const eyeIcon = document.querySelector("#eye");

    // Function to toggle password visibility for the password field
    eyeIcon.addEventListener("mouseover", function () {
        passwordInput.type = "text";
    });

    eyeIcon.addEventListener("mouseout", function () {
        passwordInput.type = "password";
    });

    // Function to toggle confirm password visibility for the confirm password field
    const confirmEyeIcon = document.querySelector("#confirm_eye");

    confirmEyeIcon.addEventListener("mouseover", function () {
        confirmPasswordInput.type = "text";
    });

    confirmEyeIcon.addEventListener("mouseout", function () {
        confirmPasswordInput.type = "password";
    });
</script>

</body>
</html>
