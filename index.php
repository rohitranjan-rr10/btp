<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IIT Patna - SMS</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
    <h1>Student Management System</h1>
    <div class="w3l-login-form">
        <h2>Student Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="w3l-form-group">
                <label>Student Roll No:</label>
                <div class="group">
                    <input type="text" class="form-control" name="student_roll_no" placeholder="Enter your roll no." required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <input type="password" class="form-control" name="pwd" placeholder="Enter your password" required="required" />
                </div>
            </div>
            <button type="submit" name="login-submit">Login</button>
        </form>
        <p class="w3l-register-p">Login as <a href="login-hostel_manager.php" class="register">Admin</a></p>
        <p class="w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>
    </div>
</body>

</html>