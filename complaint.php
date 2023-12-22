<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include("connection.php");
include('server.php');

if (isset($_POST['complaint_form'])) {
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $status = "incomplete";
    $postcode= $_COOKIE['zipcode'];

    if ($_FILES["photo"]["error"] !== 0) {
        echo "<script>alert('Error uploading the file.');</script>";
    } else {
        $fileName = $_FILES["photo"]["name"];
        $fileSize = $_FILES["photo"]["size"];
        $tmpName = $_FILES["photo"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension');</script>";
        } else if ($fileSize > 10000000) {
            echo "<script>alert('Image Size is too Large');</script>";
        } else {
            $uploadDirectory = 'img/';

            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, $uploadDirectory . $newImageName);

            $query = "INSERT INTO complaints(details,photo,status,postcode) VALUES ('$details','$newImageName','$status','$postcode')";
            mysqli_query($conn, $query);

            echo "<script>alert('Complaint filed successfully');</script>";
            header("Location:confirmation.php");
            
        }
    }
}

            
             
          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Complaint Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>
    <style>
     body {
    /* Adjust this value based on your navbar height */
    font-family: 'Montserrat', sans-serif;
    background-color: rgb(100, 136, 234);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

form {
    background-color: rgb(248, 246, 246);
    padding: 20px;
    border-radius: 10px;
    min-width: 390px;
}


        form label, form input, form textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            font-size: 20px;
        }
        form label {
            font-weight: bold;
        }
        
        form input, form textarea {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255,255,255, 0.7);
            color: black;
            font-size: 18px;
        }
        form input[type="submit"] {
            background-color: #4285F4;
            color: rgb(15, 13, 13);
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        form input[type="submit"]:hover {
            background-color: #3367D6;
        }
        form p {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
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
        #getLocationBtn {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        #getLocationBtn:hover {
            background-color: #0e5ce6;
        }

        #image-input {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }

        #camera-icon {
            font-size: 20px;
            color: black;
            cursor: pointer;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
            margin-left: 30px;
            display: block;
            background-image: none;
        }

        #camera-icon.photo-uploaded {
            background-image: none;
        }

        #camera-icon:hover {
            color: blue;
        }

        #camera-input {
            display: none;
           
        }

        #locationDetails {
            font-size: 16px;
            margin-top: 10px;
            
            box-shadow:1px 1px 3px rgb(67, 63, 63) ;
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
    </style>
</head>
<body>
    <nav style="background-color: white; box-shadow:1px 1px 10px rgb(67, 63, 63) ; " class="navbar navbar-expand-lg navbar-dark  mb-3" id="header-1">
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
                        <a href="HowToFillComplaint.php" style="color: rgb(79, 91, 146);" class="nav-link">How To Fill Complaint</a>
                    </li>
                    <li class="nav-item">
                        <a href="confirmation.php" style="color: rgb(79, 91, 146);" class="nav-link">confirmation page</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <form id="complaintForm" style="margin-top: 180px;" autocomplete="off" method="post" enctype="multipart/form-data">
        <button type="button" id="getLocationBtn">Get Location</button>
        <textarea id="locationDetails" name="details" rows="10" readonly required></textarea>
        <div id="image-input">
            <label for="camera-input" id="camera-icon">&#128247;Open Camera</label>
            <input type="file" accept="image/*;capture=camera" id="camera-input" name="photo" onchange="showPhoto()" required />
        </div>
        <div id="location-details"></div>
        <input type="submit" name="complaint_form" value="Submit">
    </form>
    <div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
         const form = document.getElementById("complaintForm");
        const button = document.getElementById("getLocationBtn");
        const locationDetailsTextarea = document.getElementById("locationDetails");
        const cameraIcon = document.getElementById("camera-icon");

        button.addEventListener("click", async (event) => {
            event.preventDefault(); // Prevent the default button behavior

            try {
                const permissionStatus = await navigator.permissions.query({ name: 'geolocation' });
                
                if (permissionStatus.state === 'granted') {
                    getLocation();
                } else if (permissionStatus.state === 'prompt') {
                    const result = await navigator.geolocation.getCurrentPosition(
                        position => {
                            getLocationDetails(position.coords);
                        },
                        error => {
                            console.error(`Error getting location: ${error.message}`);
                        }
                    );

                    if (result) {
                        getLocationDetails(result.coords);
                    }
                } else {
                    console.log('Geolocation permission is denied.');
                }
            } catch (error) {
                console.error('Error checking geolocation permission:', error);
            }
        });

        function getLocation() {
            navigator.geolocation.getCurrentPosition(
                position => {
                    getLocationDetails(position.coords);
                },
                error => {
                    console.error(`Error getting location: ${error.message}`);
                }
            );
        }

        function getLocationDetails(coords) {
            const { latitude, longitude } = coords;
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    console.log("Nominatim API Response:", data);

                    const formattedAddress = formatAddress(data.address);
                    const currentDateAndTime = getCurrentDateAndTime();

                    locationDetailsTextarea.value = `${formattedAddress}\nTime and Date: ${currentDateAndTime}`;
                })
                .catch(() => {
                    console.log("Error fetching data from API");
                });
        }

        function formatAddress(address) {
            const suburb = address.suburb || '';
            const county = address.county || '';
            const state_district = address.state_district || '';
            const state = address.state || '';
            const postcode = address.postcode || '';
            const country = address.country || '';
            
            
            document.cookie = "zipcode = " +postcode;


           
            return `${suburb}, ${county}, ${state_district}, ${state}, ${postcode}, ${country}`;
        }

        function getCurrentDateAndTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' };
            return now.toLocaleDateString('en-US', options);
        }

        function showPhoto() {
            var input = document.getElementById('camera-input');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                cameraIcon.style.backgroundImage = "none";
                cameraIcon.textContent = "Photo Selected";
                cameraIcon.classList.add("photo-uploaded");
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                cameraIcon.style.backgroundImage = "none";
                cameraIcon.textContent = "&#128247; Open camera";
                cameraIcon.classList.remove("photo-uploaded");
            }
        }
    </script>
</body>
</html>
