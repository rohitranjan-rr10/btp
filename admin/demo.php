<?php
require '../includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IIT Patna - SMS</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="../web_profile/js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../web_profile/js/sliding.form.js"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #000;
            color: #fff;
            text-align: center;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left,
        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
        }

        .container {
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 400px;
        }

        .form-container h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container input[type="submit"] {
            background-color: #737373;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-left">
            <h1><a href="admin_home.php">IIT PATNA</a></h1>
        </div>
        <div class="navbar-right">
            <a href="create_hm.php">
                <p>Manage Warden</p>
            </a>
            <a href="students.php">
                <p>Students</p>
            </a>
            <a href="admin_fees.php">
                <p>Fees status</p>
            </a>
            <a href="../includes/logout.inc.php" class="nav-link">
                <p>Logout</p>
            </a>
        </div>
    </div>




    <div class="container">
        <div class="form-container">
            <form action="../includes/hm_signup.php" method="POST">
                <h2>Appoint Warden</h2>
                <input type="text" name="hm_uname" placeholder="Username" required>
                <input type="text" name "hm_fname" placeholder="First Name" required>
                <input type="text" name="hm_lname" placeholder="Last Name" required>
                <input type="text" name="hm_mobile" placeholder="Mobile No" required>
                <input type="text" name="hostel_name" placeholder="Hostel Name" required>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="password" name="pass" placeholder="Warden's Password" required>
                <input type="password" name="confpass" placeholder="Confirm Warden's Password" required>
                <input type="submit" name="hm_signup_submit" value="Appoint">
            </form>
        </div>

        <div class="form-container">
            <form action="../includes/hm_remove.php" method="POST">
                <h2>Remove Warden</h2>
                <input type="text" name="hm_uname" placeholder="Username" required>
                <input type="text" name="hostel_name" placeholder="Hostel Name" required>
                <input type="password" name="pass" placeholder="Admin Password" required>
                <input type="submit" name="hm_remove_submit" value="Remove">
            </form>
        </div>
    </div>
</body>

</html>