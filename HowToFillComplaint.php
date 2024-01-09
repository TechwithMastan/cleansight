<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Filing Guide</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add any additional styling if needed -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>


    <style>
        body {
            background-color: #f8f6f6;
            font-family: 'Montserrat', sans-serif;
            padding: 20px;
        }

        h2 {
            color: rgb(79, 91, 146);
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }
        .container {
	margin-top: 50px;
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
.form-wrapper {
	background-color: #fff;
	padding: 30px;
	border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <nav style="background-color: white; box-shadow:1px 1px 10px rgb(67, 63, 63) ; " class="navbar navbar-expand-lg navbar-dark  mb-3" id="header-1">
        <div class="container-fluid">
            <a href="HOME.php" style="color: rgb(79, 91, 146);font-weight: bold;" class="navbar-brand">CLEAN SIGHT</a>
            <button style="background-color:  rgb(79, 91, 146); color: white; " class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span  class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul  class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="HOME.php" style="color: rgb(79, 91, 146);" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="complaint.php" style="color: rgb(79, 91, 146);" class="nav-link">Fill a Complaint</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <img style="display: block;margin-left: auto;margin-right: auto;width: 70%;margin-top: -20px;" src="logo.png">
        <h2>How to Fill a Complaint</h2>
        <p>Welcome to the complaint filing process. Follow these steps to submit your complaint:</p>

        <ol>
            <li><strong>Get Location:</strong> Click the "Get Location" button to automatically retrieve your current location. Make sure to grant permission if prompted.</br><img style="height: 40px;"  src="loc.png"> </li>
            
            <li><strong>Location Details:</strong> Your location details will be displayed in the text area below the button.</br><img style="height: 70px;" src="text.png" > </br> If the displayed location details is incorrect or not exact location please feel free to enter you exact location manually.</li>
            <li><strong>Upload Photo:</strong> Click on "Open Camera" to capture a photo or choose an existing image. The selected photo will be displayed next to the button. </br> <img src="cam.png" style="height: 35px;"> </br> When you clicked this button it will open the system camera. Please make sure that the picture should clear.</li>
            <li><strong>Submit:</strong> Once you have filled in the necessary information, click the "Submit" button to send your complaint. </br> <img src="submit.png" style="height: 35px;"></li>
        </ol>

        <p><strong>Note:</strong> Make sure to provide accurate and detailed information to help us address your complaint effectively.</p>

        <p>If you encounter any issues or have questions, feel free to contact our support team.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
