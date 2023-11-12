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
</head>

<body>
	<div class="inner-page-banner" id="home">
		<header>
			<div class="container agile-banner_nav">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<h1><a class="navbar-brand" href="services.php">IIT PATNA<span class="display"></span></a></h1>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="services.php">Hostels</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="message_user.php">Fee Payment</a>
							</li>
							<li class="nav-item active">
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
			<h2 class="heading mb-sm-5 mb-4">Contact Us</h2>
			<div class="mail_grid_w3l">
				<form action="contact.php" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel_name" placeholder="Hostel Name" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="rol_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']; ?>" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="subject" placeholder="Subject" required="">
							</div>
							<div class="contact-fields-w3ls">
								<textarea name="message" placeholder="Message..." required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Submit">
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
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$hostel_name = $_POST['hostel_name'];
	$query7 = "SELECT * FROM Hostel WHERE Hostel_name = '$hostel_name'";
	$result7 = mysqli_query($conn, $query7);
	$row7 = mysqli_fetch_assoc($result7);
	$hostel_id = $row7['Hostel_id'];
	$query6 = "SELECT * FROM Hostel_Manager WHERE Hostel_id = '$hostel_id'";
	$result6 = mysqli_query($conn, $query6);
	$row6 = mysqli_fetch_assoc($result6);
	$hos_man_user = $row6['Hostel_man_id'];
	$roll = $_SESSION['roll'];
	$today_date =  date("Y-m-d");
	$time = date("h:i A", strtotime("+3 hours 30 minutes"));

	$query = "INSERT INTO Message (sender_id,receiver_id,hostel_id,subject_h,message,msg_date,msg_time) VALUES ('$roll','$hos_man_user','$hostel_id','$subject','$message','$today_date','$time')";
	$result = mysqli_query($conn, $query);

	if ($result) {
		echo "<script type='text/javascript'>alert('Message sent Successfully!')</script>";
	} else {
		echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
	}
}
?>