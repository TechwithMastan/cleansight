<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");
include('server.php');

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1200)) {
    // Session expired after 20 minutes (1200 seconds)
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: login.php"); // Redirect to login page
    exit();
}

$_SESSION['last_activity'] = time(); // Update last activity timestamp

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['complaint_id']) && isset($_POST['new_status'])) {
        $complaintId = $_POST['complaint_id'];
        $newStatus = $_POST['new_status'];

        $updateQuery = "UPDATE complaints SET status = '$newStatus' WHERE id = $complaintId";
        mysqli_query($conn, $updateQuery);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>
    <style>
        @keyframes moveText {
            0% {
                transform: translateX(101%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .move {
            margin-top: 50px;
            background-color: rgb(58, 183, 241);
            height: 70px;
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            z-index: 100;
            padding-top: 15px;
        }

        .moving-text {
            top: 50px;
            animation: moveText 15s linear infinite;
            margin-top: 12px;
            padding-left: 10px;
            font-size: 20px;
            color: white;
            cursor: pointer;
            width: 130%;
        }

        .moving-text:hover {
            animation-play-state: paused;
        }

        #header-nav {
            background-color: rgba(10, 10, 10, 0.8);
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

        .about1 {
            text-decoration: none;
            color: aqua;
            padding-top: 17px;
            cursor: pointer;
            margin-right: 20px;
            transition: color 0.5s;
        }

        .about1:hover {
            color: white;
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
                color: #000 !important;
                /* Change this to the desired color */
            }
        }

        #header-1 {
            position: fixed;
            z-index: 1000;
            top: 0px;
            right: 0px;
            left: 0px;
            color: black;
        }

        .container {
            margin-top: 100px;
        }

        .header-link:hover {
            color: #83effd;
        }

        .navbar-brand {
            font-size: 2rem;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .userlogo {
            width: 12pxpx;
            border-radius: 38px;
            height: 25px;
            margin-right: 5px;
            margin-top: 15px;
            background-color: white;
        }

        #logo {
            display: flex;
            flex-direction: row;
        }

        .logo1 {
            display: flex;
            flex-direction: row;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Adjust the margin as needed */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 100%; /* Set a maximum width for the images */
            height: auto;
        }
    </style>7
    <title>Admin</title>
</head>

<body>
    <nav style="background-color: white; box-shadow:1px 1px 10px rgb(67, 63, 63) ; " class="navbar navbar-expand-lg navbar-dark  mb-3" id="header-1">
        <div class="container-fluid">
            <a href="#" style="color: rgb(79, 91, 146);" class="navbar-brand">CLEAN SIGHT</a>

            <button style="background-color: rgb(79, 91, 146); color: white; " class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="logo">
                    <a href="profile.php" style="color: rgb(79, 91, 146);" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="HOME.php" style="color: rgb(79, 91, 146);" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutus.php" style="color: rgb(79, 91, 146);" class="nav-link">About Website</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="move">
        <div class="moving-text"><strong>NOTE:</strong>Please remember or note you S.NO to check the status</div>
    </div>
    <div style="margin-top:130px;">
        <table style="background-color:white;" border=1 cellspacing=0 cellpadding=10>
            <tr>
                <td><strong>S.NO</strong></td>
                <td><strong>Location Details</strong></td>
                <td><strong>Image</strong></td>
                <td><strong>Status</strong></td>
            </tr>

            <?php
            $i = 1;
            $username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
            $user_zipcode_result = mysqli_query($conn, "SELECT zipcode FROM users WHERE user_name = '$username'");
            $user_zipcode_row = mysqli_fetch_assoc($user_zipcode_result);
            
            if ($user_zipcode_row) {
                // Check if the query returned any results
                $user_zipcode = $user_zipcode_row['zipcode'];
            
                // The rest of your code using $user_zipcode goes here
            } else {
                // Handle the case where the query did not return any results
                // For example, set a default value or display an error message
                $user_zipcode = 'default_value'; // Replace with an appropriate default value
            }

            $rows = mysqli_query($conn, "SELECT * FROM complaints WHERE status = 'incomplete' AND postcode = '$user_zipcode'");
            ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["details"]; ?></td>
                    <td><img src="img/<?php echo $row['photo']; ?>" alt=""></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">
                            <select name="new_status">
                                <option value="incomplete" selected>Incomplete</option>
                                <option value="completed">completed</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
