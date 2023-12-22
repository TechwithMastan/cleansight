<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include("connection.php");
include('server.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Confirmation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
            color: #FFF;
            font-weight: bold;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav style="background-color: white; box-shadow:1px 1px 10px rgb(67, 63, 63) ; " class="navbar navbar-expand-lg navbar-dark  mb-3"
        id="header-1">
        <div class="container-fluid">
            <a href="#" style="color: rgb(79, 91, 146);" class="navbar-brand">CLEAN SIGHT</a>
            <button style="background-color: rgb(79, 91, 146); color: white; " class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="HOME.php" style="color: rgb(79, 91, 146);" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="HowToFillComplaint.php" style="color: rgb(79, 91, 146);"
                            class="nav-link">How To Fill Complaint</a>
                    </li>
                    <li class="nav-item">
                        <a href="complaint.php" style="color: rgb(79, 91, 146);" class="nav-link">complaint page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="move">
        <div class="moving-text"><strong>NOTE:</strong>Please remember or note your S.NO to check the status</div>
    </div>
    <div style="margin-top:130px;">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><strong>S.NO</strong></td>
                <td><strong>Location Details</strong></td>
                <td><strong>Image</strong></td>
                <td><strong>Status</strong></td>
            </tr>

            <?php
            $i = 1;
            $rows = mysqli_query($conn, "SELECT * FROM complaints");
            ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["details"]; ?></td>
                    <td><img src="img/<?php echo $row['photo']; ?>" alt=""></td>
                    <td><?php echo $row["status"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
