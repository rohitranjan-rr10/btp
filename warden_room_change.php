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
                    <h1><a class="navbar-brand" href="home_manager.php">IIT PATNA<span class="display"></span></a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="home_manager.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="allocate_room.php">Allocate Room</a>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li>
                                        <a href="allocated_rooms.php">Allocated Rooms</a>
                                    </li>
                                    <li>
                                        <a href="message_hostel_manager.php">Inbox</a>
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
    <div class="py-5"></div>
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4"> Room Change Request </h2>
        <?php
        $id_hostel = $_SESSION['hostel_id'];
        $query1 = "SELECT * FROM room_change where hostel_id = '$id_hostel' and Application_status = '0'";
        $result1 = mysqli_query($conn, $query1);

        $query6 = "SELECT * FROM Hostel WHERE Hostel_id = '$id_hostel'";
        $result6 = mysqli_query($conn, $query6);
        $row6 = mysqli_fetch_assoc($result6);
        $hostel_name = $row6['Hostel_name'];

        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Old Room</th>
                    <th>New Room</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result1) == 0) {
                    echo '<tr><td colspan="4">No Pending Request</td></tr>';
                } else {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $student_id = $row1['sender_id'];
                        $query7 = "SELECT * FROM Student WHERE Student_id = '$student_id'";
                        $result7 = mysqli_query($conn, $query7);
                        $row7 = mysqli_fetch_assoc($result7);
                        $student_name = $row7['Fname'] . " " . $row7['Lname'];
                        $ancient = $row1['old_room'];
                        $latest = $row1['new_room'];

                        echo "<tr>
                                <td>{$student_name}</td>
                                <td>{$row1['sender_id']}</td>
                                <td>{$row1['old_room']}</td>
                                <td>{$row1['new_room']}</td>
                                <td>
                                        <div class='container'>
                                            <div class='mail_grid_w3l'>
                                                <form action='warden_room_change.php' method='post'>
                                                    <div class='row'>
                                                        <input type='hidden' name='application_id' value='{$row1['rqst_id']}'>
                                                        <input type='submit' value='Accept' name='submit' style='outline: none; padding: 12px 40px; font-size: 13px; color: #fff; font-weight: 600; background: green; border: none; border-radius: 6px;'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                        <div class='container'>
                                            <div class='mail_grid_w3l'>
                                                <form action='warden_room_change.php' method='post'>
                                                    <div class='row'>
                                                        <input type='hidden' name='application_id' value='{$row1['rqst_id']}'>
                                                        <input type='submit' value='Reject' name='submit' style='outline: none; padding: 12px 40px; font-size: 13px; color: #fff; font-weight: 600; background: #e11d48; border: none; border-radius: 6px;'>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </td>
                            </tr>\n";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $application_id = $_POST['application_id'];

        if ($_POST['submit'] == 'Reject') {
            $query12345 = "UPDATE room_change SET application_status = 1 WHERE rqst_id = $application_id";
            // Execute the query
            if (mysqli_query($conn, $query12345)) {
                echo "<script type='text/javascript'>alert('Request Rejected')</script>";
            }
        } elseif ($_POST['submit'] == 'Accept') {
            $query33 = "UPDATE room_change SET application_status = 1 WHERE rqst_id = $application_id";

            // Update the Allocated status in the room table
            $query22 = "UPDATE room
                   SET Allocated = 0
                   WHERE Hostel_id = $id_hostel AND Room_No = $ancient";

            $query38 = "UPDATE room
                   SET Allocated = 1
                   WHERE Hostel_id = $id_hostel AND Room_No = $latest";

            $queryGetRoomId = "SELECT Room_id FROM room WHERE Hostel_id = '$id_hostel' AND Room_No = '$latest'";
            $resultGetRoomId = mysqli_query($conn, $queryGetRoomId);

            if ($resultGetRoomId) {
                $rowGetRoomId = mysqli_fetch_assoc($resultGetRoomId);
                $new_room_id = $rowGetRoomId['Room_id'];
            }

            $query98 = "UPDATE student
                   SET Room_id = $new_room_id
                   WHERE Student_id = '$student_id'";

            $query78 = "UPDATE application
            SET Room_No = $latest
            WHERE Student_id = '$student_id'";

            if (mysqli_query($conn, $query33) && mysqli_query($conn, $query22) && mysqli_query($conn, $query38)&& mysqli_query($conn, $query98) && mysqli_query($conn, $query78)) {
                echo "<script type='text/javascript'>alert('Request Accepted')</script>";
            } else {
                echo "Error updating allocation status: " . mysqli_error($conn);
            }
        }
    }

    // You can add code to handle other actions like "Accept" if needed

    ?>

    <div class="py-5"></div>
    <footer class="py-5">
        <div class="container py-md-5">
            <div class="footer-logo mb-5 text-center">
                <a class="navbar-brand" href="https://www.iitp.ac.in/index.php" target="_blank">IIT<span class="display">PATNA</span></a>
            </div>
            <div class="footer-grid">
                <div class="list-footer">
                    <ul class="footer-nav text-center">
                        <li>
                            <a href="home_manager.php">Home</a>
                        </li>
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