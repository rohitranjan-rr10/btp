<?php
// Enter your Host, username, password, database below.
$con = mysqli_connect("127.0.0.1:3307","root","","sms");
if(!$con){
	die("Connection Error !!".mysqli_connect_error());
}
 ?>