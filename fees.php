<?php
require 'includes/config.inc.php';
include "dbcon.php";
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
                    <h1><a class="navbar-brand" href="services.php">IIT PATNA<span class="display"></span></a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="services.php">Hostels</a>
                            </li>
                            <li class="nav-item active">
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
    <section class="services py-5">
        <div class="container py-lg-5 py-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-4">Fees Payment</h2>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `products`";
                    $res = mysqli_query($con, $sql) or die("MySql Query Error" . mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($res)) {
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productId = $row['id'];

                        // Check if the corresponding fee is paid for the current student
                        $feeType = strtolower(str_replace(' ', '_', $productName));
                        $studentRoll = $_SESSION['roll'];

                        $checkPaymentQuery = "SELECT $feeType FROM student WHERE student_id = '$studentRoll'";
                        $checkPaymentResult = mysqli_query($con, $checkPaymentQuery) or die("MySql Query Error" . mysqli_error($con));
                        $paymentRow = mysqli_fetch_assoc($checkPaymentResult);
                        $feePaid = $paymentRow[$feeType];

                        // Disable the button if the fee is paid
                        $buttonDisabled = $feePaid == 1 ? 'disabled' : '';
                        $buttonText = $feePaid == 1 ? 'Payment Done' : 'Pay Now';
                        $buttonColor = $feePaid == 1 ? 'btn-success' : 'btn-primary';

                    ?>
                        <tr>
                            <td><?php echo $productName; ?></td>
                            <td>₹<?php echo $productPrice; ?></td>
                            <td>
                                <form method="post" action="stripe_form.php">
                                    <input type="hidden" name="id" value="<?php echo $productId; ?>" />
                                    <button type="submit" class="btn btn-sm <?php echo $buttonColor; ?>" name="submit" <?php echo $buttonDisabled; ?>>
                                        <?php echo $buttonText; ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
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