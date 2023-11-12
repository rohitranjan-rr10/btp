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
					<h1><a class="navbar-brand" href="allocate_room.php">IIT PATNA<span class="display"></span></a></h1>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="allocate_room.php">Allocate Room</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="message_hostel_manager.php">Inbox</a>
							</li>
							<li class="dropdown nav-item active">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li>
										<a href="allocated_rooms.php">Allocated Rooms</a>
									</li>
									<li>
										<a href="empty_rooms.php">Empty Rooms</a>
									</li>
									<li>
										<a href="vacate_rooms.php">Vacate Rooms</a>
									</li>
									<li>
										<a href="warden_room_change.php">Room Change Request</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact_manager.php">Contact</a>
							</li>
							<li class="dropdown nav-item">
								<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li>
										<a href="admin/manager_profile.php">My Profile</a>
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
	<div class="py-3"></div>
	<section class="contact py-5">
		<div class="container">
			<div class="mail_grid_w3l">
				<form action="empty_rooms.php" method="post">
					<div class="row">
						<div class="col-md-9">
							<input type="text" placeholder="Search by Room Number" name="search_box">
						</div>
						<div class="col-md-3">
							<input type="submit" value="Search" name="search"></input>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php
	if (isset($_POST['search'])) {
		$search_box = $_POST['search_box'];
		$hostel_id = $_SESSION['hostel_id'];
		$query_search = "SELECT * FROM Room WHERE Room_No like '$search_box%' and Hostel_id = '$hostel_id' and Allocated = '0'";
		$result_search = mysqli_query($conn, $query_search);
		$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
		$result6 = mysqli_query($conn, $query6);
		$row6 = mysqli_fetch_assoc($result6);
		$hostel_name = $row6['Hostel_name'];
	?>
		<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Hostel Name</th>
						<th>Room Number</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (mysqli_num_rows($result_search) == 0) {
						echo '<tr><td colspan="4">No details found</td></tr>';
					} else {
						while ($row_search = mysqli_fetch_assoc($result_search)) {

							echo "<tr><td>{$hostel_name}</td><td>{$row_search['Room_No']}</td></tr>\n";
						}
					}
					?>
				</tbody>
			</table>
		</div>
	<?php
	}
	?>

	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Empty Rooms </h2>
		<?php
		$hostel_id = $_SESSION['hostel_id'];
		$query1 = "SELECT * FROM Room where Hostel_id = '$hostel_id' and Allocated = '0'";
		$result1 = mysqli_query($conn, $query1);
		$query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$hostel_id'";
		$result6 = mysqli_query($conn, $query6);
		$row6 = mysqli_fetch_assoc($result6);
		$hostel_name = $row6['Hostel_name'];
		?>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>Hostel Name</th>
					<th>Room Number</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (mysqli_num_rows($result1) == 0) {
					echo '<tr><td colspan="4">No details found</td></tr>';
				} else {
					while ($row1 = mysqli_fetch_assoc($result1)) {
						echo "<tr><td>{$hostel_name}</td><td>{$row1['Room_No']}</td></tr>\n";
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="py-3"></div>

	<footer class="py-5">
		<div class="container py-md-5">
			<div class="footer-logo mb-5 text-center">
				<a class="navbar-brand" href="https://www.iitp.ac.in/index.php" target="_blank">IIT<span class="display">PATNA</span></a>
			</div>
			<div class="footer-grid">
				<div class="list-footer">
					<ul class="footer-nav text-center">
						<li>
							<a href="allocate_room.php">Allocate</a>
						</li>
						<li>
							<a href="contact_manager.php">Contact</a>
						</li>
						<li>
							<a href="admin/manager_profile.php">Profile</a>
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