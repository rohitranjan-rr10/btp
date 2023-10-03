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
        <h2>Student Registration</h2>
        <form action="includes/signup.inc.php" method="POST">
            <div class="w3l-form-group">
                <label>Student Roll No:</label>
                <div class="group">
                    <input type="text" class="form-control" name="student_roll_no" placeholder="Enter your roll no." required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>First Name:</label>
                <div class="group">
                    <input type="text" class="form-control" name="student_fname" placeholder="Enter your first name" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Last Name:</label>
                <div class="group">
                    <input type="text" class="form-control" name="student_lname" placeholder="Enter your last name" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Mobile No:</label>
                <div class="group">
                    <input type="text" class="form-control" name="mobile_no" placeholder="Enter your mobile no." required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Department:</label>
                <div class="group">
                    <input type="text" class="form-control" name="department" placeholder="Enter your department" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Year of Admission:</label>
                <div class="group">
                    <input type="text" class="form-control" name="year_of_study" placeholder="Enter your year of admission" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <input type="password" class="form-control" name="pwd" placeholder="Enter your password" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>Confirm Password:</label>
                <div class="group">
                    <input type="password" class="form-control" name="confirmpwd" placeholder="Re-enter your password" required="required" />
                </div>
            </div>
            <button type="submit" name="signup-submit">Register</button>
        </form>
        <p class="w3l-register-p">Already a member?<a href="index.php" class="register"> Login</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"></p>
    </footer>
</body>

</html>