<?php
require 'includes/config.inc.php';
include "dbcon.php";
if (isset($_POST['submit'])) {
    $productId = $_POST['id'];
} else {
    $productId = '';
}

$SQL_getPr = "SELECT * FROM `products` WHERE `id`='$productId'";
$res_getPr = mysqli_query($con, $SQL_getPr) or die("MySql Query Error" . mysqli_error($con));
$row_getPr = mysqli_fetch_assoc($res_getPr);
$price = $row_getPr['price'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IIT Patna - SMS</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .credit-card-box {
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            box-shadow: 3px 3px 5px #888888;
            background-color: #fff;
        }

        .credit-card-box .panel-title {
            text-align: center;
            color: #333;
            font-weight: bold;
        }

        .credit-card-box .panel-body {
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        #payBtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }

        .payment-status {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card credit-card-box">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title" style="text-transform: uppercase; font-weight: bold;">
                        Payment Details
                    </h3>
                    <div class="ml-auto">
                        <img class="img-fluid" src="./stripe.png" style="max-width: 100px;">
                    </div>
                </div>

                <div class="card-body">
                    <div class="payment-status" style="color: red;"></div>
                    <form role="form" action="stripe_payment.php" method="POST" name="cardpayment" id="payment-form">
                        <input type="hidden" name="productId" value="<?php echo $productId; ?>" />
                        <div class="form-group">
                            <label for="holdername">CARD HOLDER NAME</label>
                            <input type="text" class="form-control" name="holdername" placeholder="Enter Card Holder Name" autofocus required id="name" />
                        </div>
                        <div class="form-group">
                            <label for="roll">ROLL NO</label>
                            <input type="text" class="form-control" name="roll" placeholder="Roll" id="roll" value="<?php echo $_SESSION['roll']; ?>" required="" />
                        </div>
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="card_number">CARD NUMBER</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="card_exp_month">MONTH</label>
                                    <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
                                        <option>Month</option>
                                        <option value="01">01 ( JAN )</option>
                                        <option value="02">02 ( FEB )</option>
                                        <option value="03">03 ( MAR )</option>
                                        <option value="04">04 ( APR )</option>
                                        <option value="05">05 ( MAY )</option>
                                        <option value="06">06 ( JUN )</option>
                                        <option value="07">07 ( JUL )</option>
                                        <option value="08">08 ( AUG )</option>
                                        <option value="09">09 ( SEP )</option>
                                        <option value="10">10 ( OCT )</option>
                                        <option value="11">11 ( NOV )</option>
                                        <option value="12">12 ( DEC )</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="card_exp_year">YEAR</label>
                                    <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year" required>
                                        <option>Year</option>
                                        <option value="20">2020</option>
                                        <option value="21">2021</option>
                                        <option value="22">2022</option>
                                        <option value="23">2023</option>
                                        <option value="24">2024</option>
                                        <option value="25">2025</option>
                                        <option value="26">2026</option>
                                        <option value="27">2027</option>
                                        <option value="28">2028</option>
                                        <option value="29">2029</option>
                                        <option value="30">2030</option>
                                        <option value="31">2031</option>
                                        <option value="32">2032</option>
                                        <option value="33">2033</option>
                                        <option value="34">2034</option>
                                        <option value="35">2035</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="card_cvc">CV CODE</label>
                                    <input type="password" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
                                </div>
                            </div>
                        </div>
                        <div class="py-2"></div>
                        <button class="btn btn-success btn-lg btn-block" type="submit" id="payBtn">Pay Now (₹<?php echo $price; ?>)</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('pk_test_51NyyqhCOcxx7Yq8BenSdb0aKKL3qU19hsmOykTMPcZrSeCxyfrghfEtQabXuotMEKKdWQltq1amkyV7bmn51C3rC00xtrtYsgc');

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#payBtn').removeAttr("disabled");
            $(".payment-status").html('<p>' + response.error.message + '</p>');
        } else {
            var form$ = $("#payment-form");
            var token = response.id;
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }
    $(document).ready(function() {
        $("#payment-form").submit(function() {
            $('#payBtn').attr("disabled", "disabled");
            Stripe.createToken({
                number: $('#card_number').val(),
                exp_month: $('#card_exp_month').val(),
                exp_year: $('#card_exp_year').val(),
                cvc: $('#card_cvc').val()
            }, stripeResponseHandler);
            return false;
        });
    });
</script>

</html>