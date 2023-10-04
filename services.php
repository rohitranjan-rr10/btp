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
					<h1><a class="navbar-brand" href="home.php">IIT PATNA<span class="display"></span></a></h1>
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
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="message_user.php">Message Received</a>
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
	<section class="services py-5">
		<div class="container py-lg-5 py-3">
			<h2 class="heading text-capitalize mb-sm-5 mb-4">List of Hostels</h2>
			<div class="row service-grids">
				<div class="col-lg-4 col-md-6 service-grid1">
					<a href="application_form.php?id=Kalam">
						<h3 style="color: #f43f5e;">APJ Kalam Hostel</h3>
					</a>
					<div class="row">
						<div class="col-md-9 col-10">
							<p>This residential facility is specifically designated for male students in their third and fourth years of study. It offers a unique living environment tailored to the needs and preferences of these upperclassmen, providing them with a dedicated space to enhance their academic and personal experiences during this stage of their education.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mt-md-0 mt-5 service-grid1">
					<a href="application_form.php?id=Raman">
						<h3 style="color: #22c55e;">C V Raman Hostel</h3>
					</a>
					<div class="row">
						<div class="col-md-9 col-10">
							<p>This is a specialized hostel facility designed exclusively for second-year male students. It is intended to create a supportive and conducive living environment specifically tailored to the needs and requirements of students in their second year of study, offering a unique experience to enhance their academic and personal growth during this phase of their education.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mt-lg-0 mt-5 service-grid1">
					<a href="application_form.php?id=Aryabhatta">
						<h3 style="color: #eab308;">Aryabhatta Hostel</h3>
					</a>
					<div class="row">
						<div class="col-md-9 col-10">
							<p>This inviting boys' hostel has been purposefully designed to accommodate and support first-year freshman students. Its design and amenities are tailored to meet the unique needs and requirements of students entering their initial year of higher education. This dedicated living space aims to provide a warm and supportive environment to help these freshmen transition smoothly into their college experience.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mt-5 service-grid1">
					<a href="application_form.php?id=Asima">
						<h3 style="color: #3b82f6;">Asima Hostel</h3>
					</a>
					<div class="row">
						<div class="col-md-9 col-10">
							<p>This inviting girls' hostel is open to students of all academic years. Its inclusive atmosphere provides a warm and welcoming environment for female students, regardless of their year of study. This inclusive approach fosters a sense of community and allows students from various academic backgrounds to interact, share experiences, and support one another throughout their college journey.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="banner-bottom">
		<div class="container-fluid">
			<div class="banner_bottom_agile_grids">
				<div class="row wthree_banner_bottom_right_grids pr-sm-3">
					<div class="col-lg-3 col-sm-6 banner_bottom_right_grid">
						<div class="view view-tenth">
							<div class="agile_text_box">
								<i class="fas fa-bed" aria-hidden="true"></i>
								<h3>Apply for</h3>
								<p style="color: white;">APJ Kalam Hostel</p>
							</div>
							<div class="mask" style="width: 100%; height: 100%; overflow: hidden;">
								<a href="application_form.php?id=Kalam" style="display: block; width: 100%; height: 100%;">
									<img src="web_home/images/s1.jpg" style="object-fit: cover; width: 100%; height: 100%;" alt="Kalam" />
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mt-sm-0 mt-3 banner_bottom_right_grid">
						<div class="view view1 view-tenth">
							<div class="agile_text_box">
								<i class="fas fa-bed" aria-hidden="true"></i>
								<h3>Apply for</h3>
								<p style="color: white;">C V Raman Hostel</p>
							</div>
							<div class="mask" style="width: 100%; height: 100%; overflow: hidden;">
								<a href="application_form.php?id=Raman" style="display: block; width: 100%; height: 100%;">
									<img src="web_home/images/s2.jpg" style="object-fit: cover; width: 100%; height: 100%;" alt="Raman" />
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
						<div class="view view2 view-tenth">
							<div class="agile_text_box">
								<i class="fas fa-bed" aria-hidden="true"></i>
								<h3>Apply for</h3>
								<p style="color: white;">Aryabhatta Hostel</p>
							</div>
							<div class="mask" style="width: 100%; height: 100%; overflow: hidden;">
								<a href="application_form.php?id=Aryabhatta" style="display: block; width: 100%; height: 100%;">
									<img src="web_home/images/s3.jpg" style="object-fit: cover; width: 100%; height: 100%;" alt="Aryabhatta" />
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
						<div class="view view3 view-tenth">
							<div class="agile_text_box">
								<i class="fas fa-bed" aria-hidden="true"></i>
								<h3>Apply for</h3>
								<p style="color: white;">Asima Hostel</p>
							</div>
							<div class="mask" style="width: 100%; height: 100%; overflow: hidden;">
								<a href="application_form.php?id=Asima" style="display: block; width: 100%; height: 100%;">
									<img src="web_home/images/s4.jpg" style="object-fit: cover; width: 100%; height: 100%;" alt="Asima" />
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="py-5">
	</div>
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
	<script src="web_home/js/snap.svg-min.js"></script>
	<script src="web_home/js/main.js"></script>
	<script defer src="web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
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