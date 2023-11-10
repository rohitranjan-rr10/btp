<?php
require 'includes/config.inc.php';
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
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css">
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css">
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>

<body>
	<div class="inner-page-banner" id="home">
		<header>
			<div class="container agile-banner_nav">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<h1><a class="navbar-brand" href="home.php">IIT PATNA <span class="display"></span></a></h1>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="services.php">Hostels</a>
							</li>
							<li class="nav-item">
                                <a class="nav-link" href="fees.php">Fee Payment</a>
                            </li>
							<li class="nav-item">
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="message_user.php">Inbox</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="room_change.php">Room Change</a>
							</li>
							<li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li>
										<a href="profile.php">My Profile</a>
									</li>
									<li>
										<a href="includes/logout.inc.php">Logout</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
	</div>
	<section class="contact py-5">
		<div class="container">
			<h2 class="heading mb-sm-5 mb-4"> Application Form </h2>
			<div class="mail_grid_w3l">
				<form action="application_form.php?id=<?php echo $_GET['id'] ?>" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="Name" placeholder="Name" value="<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll'] ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel" placeholder="Hostel" value="<?php echo $_GET['id'] ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="pwd" placeholder="Password" required="">
							</div>
							<div class="contact-fields-w3ls">
								<textarea name="Message" placeholder="Message..."></textarea>
							</div>
							<input type="submit" name="submit" value="Click to Apply">
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<footer class="py-5">
		<div class="container py-md-5">
			<div class="footer-logo mb-5 text-center">
				<a class="navbar-brand" href="https://www.iitp.ac.in/index.php" target="_blank">IIT<span class="display">PATNA</span></a>
			</div>
			<div class="footer-grid">
				<div class="list-footer">
					<ul class="footer-nav text-center">
						<li>
							<a href="home.php">Home</a>
						</li>
						<li>
							<a href="services.php">Hostels</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
						<li>
							<a href="profile.php">Profile</a>
						</li>
					</ul>
				</div>
				<p class="py-5" style="color: white; margin: 20px;">Nestled along the banks of the sacred Ganges River, IIT Patna stands as a testament to where innovation and excellence converge. Emerging from the historic city of Patna, this institution of higher learning has become a beacon of education and research, paving the way for a brighter future. With its state-of-the-art facilities and a dedicated faculty, IIT Patna is a place where students and scholars from across the country come together to unlock the secrets of science, technology, and engineering. From cutting-edge classrooms to advanced laboratories, it is a hub of intellectual growth and creativity. In the heart of Bihar, IIT Patna is not just an institution; it's a symbol of progress, innovation, and determination. With a commitment to excellence, it is shaping the future of India's technological landscape, one student at a time. At IIT Patna, dreams take flight, and ideas transform into reality, propelling both individuals and the nation towards a brighter tomorrow.</p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script>
	<script src="web_home/js/jquery.waypoints.min.js"></script>
	<script src="web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
	$roll = $_SESSION['roll'];
	$password = $_POST['pwd'];
	$hostel = $_GET['id'];
	$message = $_POST['Message'];
	$query_imp = "SELECT * FROM Student WHERE Student_id = '$roll'";
	$result_imp = mysqli_query($conn, $query_imp);
	$row_imp = mysqli_fetch_assoc($result_imp);
	$room_id = $row_imp['Room_id'];

	if (is_null($room_id)) {
		$query_imp2 = "SELECT * FROM Application WHERE Student_id = '$roll'";
		$result_imp2 = mysqli_query($conn, $query_imp2);

		if (mysqli_num_rows($result_imp2) == 0) {
			$query = "SELECT * FROM Student WHERE Student_id = '$roll'";
			$result = mysqli_query($conn, $query);

			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['Pwd']);

				if ($pwdCheck == false) {
					echo "<script type='text/javascript'>alert('Incorrect Password!!')</script>";
				} else if ($pwdCheck == true) {
					$query2 = "SELECT * FROM Hostel WHERE Hostel_name = '$hostel'";
					$result2 = mysqli_query($conn, $query2);
					$row2 = mysqli_fetch_assoc($result2);
					$hostel_id = $row2['Hostel_id'];
					$query3 = "INSERT INTO Application (Student_id,Hostel_id,Application_status,Message) VALUES ('$roll','$hostel_id',true,'$message')";
					$result3 = mysqli_query($conn, $query3);

					if ($result3) {
						echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
					}
				}
			}
		} else {
			echo "<script type='text/javascript'>alert('You have Already applied for a Room')</script>";
		}
	} else {
		echo "<script type='text/javascript'>alert('You have Already been alloted a Room')</script>";
	}
}
?>