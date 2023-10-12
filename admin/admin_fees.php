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
	<link href="../web_home/css_home/slider.css" type="text/css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="../web_home/css_home/bootstrap.css">
	<link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css">
	<link rel="stylesheet" href="../web_home/css_home/flexslider.css" type="text/css" media="screen" property="" />
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.paid {
			color: green;
		}

		.not-paid {
			color: red;
		}
	</style>
</head>

<body>
	<div class="inner-page-banner" id="home">
		<header>
			<div class="container agile-banner_nav">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<h1><a class="navbar-brand" href="admin_home.php">IIT PATNA<span class="display"></span></a></h1>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="admin_home.php">Home<span class="sr-only">(current)</span></a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="create_hm.php">Manage Warden</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="students.php">Students</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="admin_fees.php">Fees status</a>
							</li>
							<li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li>
										<a href="admin_profile.php">My Profile</a>
									</li>
									<li>
										<a href="../includes/logout.inc.php">Logout</a>
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
			<h2 class="heading text-capitalize mb-sm-5 mb-4">Fees status</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Roll No</th>
						<th>Name</th>
						<th>Academic Fees</th>
						<th>Hostel Fees</th>
						<th>Mess Fees</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT Student_id, CONCAT(Fname, ' ', Lname) AS Name, acad_fees, hostel_fees, mess_fees FROM Student";
					$result = mysqli_query($conn, $query);

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$studentID = $row['Student_id'];
							$name = $row['Name'];
							$acadFees = $row['acad_fees'] == 1 ? '<span class="paid"><b>Paid</b></span>' : '<span class="not-paid"><b>Not Paid</b></span>';
							$hostelFees = $row['hostel_fees'] == 1 ? '<span class="paid"><b>Paid</b></span>' : '<span class="not-paid"><b>Not Paid</b></span>';
							$messFees = $row['mess_fees'] == 1 ? '<span class="paid"><b>Paid</b></span>' : '<span class="not-paid"><b>Not Paid</b></span>';

							echo "<tr>
                                <td>$studentID</td>
                                <td>$name</td>
                                <td>$acadFees</td>
                                <td>$hostelFees</td>
                                <td>$messFees</td>
                            </tr>";
						}
					} else {
						echo '<tr><td colspan="5">No student records found</td></tr>';
					}
					?>
				</tbody>
			</table>
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
							<a href="admin_home.php">Home</a>
						</li>
						<li>
							<a href="create_hm.php">Manage Warden</a>
						</li>
						<li>
							<a href="students.php">Students</a>
						</li>

						<li>
							<a href="admin_fees.php">Fees status</a>
						</li>
						<li>
							<a href="admin_profile.php">Profile</a>
						</li>
					</ul>
				</div>
				<p class="py-5" style="color: white; margin: 20px;">Nestled along the banks of the sacred Ganges River, IIT Patna stands as a testament to where innovation and excellence converge. Emerging from the historic city of Patna, this institution of higher learning has become a beacon of education and research, paving the way for a brighter future. With its state-of-the-art facilities and a dedicated faculty, IIT Patna is a place where students and scholars from across the country come together to unlock the secrets of science, technology, and engineering. From cutting-edge classrooms to advanced laboratories, it is a hub of intellectual growth and creativity. In the heart of Bihar, IIT Patna is not just an institution; it's a symbol of progress, innovation, and determination. With a commitment to excellence, it is shaping the future of India's technological landscape, one student at a time. At IIT Patna, dreams take flight, and ideas transform into reality, propelling both individuals and the nation towards a brighter tomorrow.</p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../web_home/js/bootstrap.js"></script>
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