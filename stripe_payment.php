<?php
require 'includes/config.inc.php';
include "dbcon.php";
$payment_id = $statusMsg = '';
$ordStatus = 'error';
$id = '';

if (!empty($_POST['stripeToken'])) {

	$token = $_POST['stripeToken'];
	$name = $_POST['holdername'];
	$email = $_POST['email'];
	$roll = $_POST['roll'];
	$card_no = $_POST['card_number'];
	$card_cvc = $_POST['card_cvc'];
	$card_exp_month = $_POST['card_exp_month'];
	$card_exp_year = $_POST['card_exp_year'];

	$productId = $_POST['productId'];

	$SQL_getPr = "SELECT * FROM `products` WHERE `id`='$productId'";
	$res_getPr = mysqli_query($con, $SQL_getPr) or die("MySql Query Error" . mysqli_error($con));
	$row_getPr = mysqli_fetch_assoc($res_getPr);
	$price = $row_getPr['price'];
	$pr_desc = $row_getPr['name'];

	$productCode = $row_getPr['code'];
	$SQL_getItemNumber = "SELECT `id` FROM `products` WHERE `code`='$productCode'";
	$res_getItemNumber = mysqli_query($con, $SQL_getItemNumber) or die("MySql Query Error" . mysqli_error($con));
	$row_getItemNumber = mysqli_fetch_assoc($res_getItemNumber);
	$itemNumber = $row_getItemNumber['id'];

	require_once('stripe-php/init.php');

	$stripe = array(
		"SecretKey" => "sk_test_51NyyqhCOcxx7Yq8B9V7ivAtd8QSp8zyTtMKcISPbdzVZ7rEf92NYdziiduEDOSCZmtxVrnzO52nyRu4ntOk2ZTa200GFFfJgPY",
		"PublishableKey" => "pk_test_51NyyqhCOcxx7Yq8BenSdb0aKKL3qU19hsmOykTMPcZrSeCxyfrghfEtQabXuotMEKKdWQltq1amkyV7bmn51C3rC00xtrtYsgc"
	);

	\Stripe\Stripe::setApiKey($stripe['SecretKey']);

	$customer = \Stripe\Customer::create(array(
		'email' => $email,
		'source'  => $token,
		'name' => $name,
		'description' => $pr_desc
	));

	$orderID = strtoupper(str_replace('.', '', uniqid('', true)));

	$itemPrice = ($price * 100);
	$currency = "INR";
	$itemName = $row_getPr['name'];

	$charge = \Stripe\Charge::create(array(
		'customer' => $customer->id,
		'amount'   => $itemPrice,
		'currency' => $currency,
		'description' => $itemName,
		'metadata' => array(
			'order_id' => $orderID
		)
	));

	$chargeJson = $charge->jsonSerialize();

	if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {

		$transactionID = $chargeJson['balance_transaction'];
		$paidAmount = $chargeJson['amount'];
		$paidCurrency = $chargeJson['currency'];
		$payment_status = $chargeJson['status'];
		$payment_date = date("Y-m-d H:i:s");
		$dt_tm = date('Y-m-d H:i:s');

		$sql = "INSERT INTO `orders`(`name`,`email`,`card_number`,`card_exp_month`,`card_exp_year`,`item_name`,`item_number`,`item_price`,`item_price_currency`,`paid_amount`,`paid_amount_currency`,`txn_id`,`payment_status`,`created`,`modified`,`roll`) VALUES ('$name','$email','$card_no','$card_exp_month','$card_exp_year','$itemName','$itemNumber','$itemPrice','$currency','$paidAmount','$paidCurrency','$transactionID','$payment_status','$dt_tm','$dt_tm', '$roll')";
		mysqli_query($con, $sql) or die("Mysql Error Stripe-Charge(SQL)" . mysqli_error($con));

		if ($itemNumber == 1) {
			$studentId = $roll;
			$updateStudentQuery = "UPDATE student SET acad_fees = 1 WHERE Student_id = '$studentId'";
			mysqli_query($con, $updateStudentQuery) or die("Mysql Error Update Student Table" . mysqli_error($con));
		}

		if ($itemNumber == 2) {
			$studentId = $roll;
			$updateStudentQuery = "UPDATE student SET hostel_fees = 1 WHERE Student_id = '$studentId'";
			mysqli_query($con, $updateStudentQuery) or die("Mysql Error Update Student Table" . mysqli_error($con));
		}

		if ($itemNumber == 3) {
			$studentId = $roll;
			$updateStudentQuery = "UPDATE student SET mess_fees = 1 WHERE Student_id = '$studentId'";
			mysqli_query($con, $updateStudentQuery) or die("Mysql Error Update Student Table" . mysqli_error($con));
		}

		$sql_g = "SELECT * FROM `orders`";
		$res_g = mysqli_query($con, $sql_g) or die("Mysql Error Stripe-Charge(SQL2)" . mysqli_error($con));
		while ($row_g = mysqli_fetch_assoc($res_g)) {
			$id = $row_g['id'];
		}

		if ($payment_status == 'succeeded') {
			$ordStatus = 'success';
			$statusMsg = 'Your Payment has been Successful!';
		} else {
			$statusMsg = "Your Payment has Failed!";
		}
	} else {
		$statusMsg = "Transaction has been failed!";
	}
} else {
	$statusMsg = "Error on form submission.";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>IIT Patna - SMS</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/stripe.css">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
			margin: 0;
			padding: 0;
		}

		.container {
			padding: 20px;
		}

		.status {
			text-align: center;
			margin-top: 20px;
			padding: 20px;
			background: #f8f8f8;
			border-radius: 5px;
		}

		.success {
			color: #000;
		}

		.error {
			color: #F44336;
		}

		.heading {
			font-size: 24px;
		}

		.heading,
		p {
			margin: 10px 0;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 10px 0;
		}

		table,
		th,
		td {
			border: 1px solid #ddd;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		.btn-continue {
			display: inline-block;
			background: #4CAF50;
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			border-radius: 5px;
			font-weight: bold;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="status">
			<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
			<div class="py-5"></div>
			<h4 class="heading">Payment Information</h4>
			<table>
				<tr>
					<th>Reference ID</th>
					<td><?php echo $id; ?></td>
				</tr>
				<tr>
					<th>Roll</th>
					<td><?php echo $roll; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $email; ?></td>
				</tr>
				<tr>
					<th>Transaction ID</th>
					<td><?php echo $transactionID; ?></td>
				</tr>
				<tr>
					<th>Paid Amount</th>
					<td>₹<?php echo $price; ?>.00</td>
				</tr>
				<tr>
					<th>Payment Status</th>
					<td><?php echo $payment_status; ?></td>
				</tr>
			</table>
			<div class="py-5"></div>
			<h4 class="heading">Product Information</h4>
			<table>
				<tr>
					<th>Name</th>
					<td><?php echo $itemName; ?></td>
				</tr>
				<tr>
					<th>Price</th>
					<td>₹<?php echo $price; ?>.00</td>
				</tr>
			</table>
		</div>
		<a href="fees.php" class="btn-continue">Back to Home</a>
	</div>
</body>

</html>