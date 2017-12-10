<?php
	session_start();
	@ob_start();


         if (isset($_SESSION['u_id'])) {
            echo '<script type="text/javascript"> var msg = "'.$_SESSION['u_first'].'";</script>';

        } else {
          echo '<script type="text/javascript"> var msg = "";</script>';
        }
?>

<script type="text/javascript"> var msg = "";
</script>
<!DOCTYPE HTML>

<html>

<head>
    <title>Mama Mia's Pizzeria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/index.css" rel="stylesheet">
    <script src="customjs/menu.js"></script>

</head>

<body>

    <!-- nav bar -->
		<!-- nav bar -->
		<nav class="navbar navbar-default">
				<div class="container" id="mcon">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index">Mama Mia's</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
						<li><a href="menu">Menu</a></li>
							<?php if (!isset($_SESSION['u_id'])) {
							echo   "<li><a href=\"login\">Sign In</a></li>";
							}?>
							<li><a href="suggestions">Suggestions</a></li>
							<li><a href="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
							<div class="float-right pull-right">
							<?php
								if (isset($_SESSION['u_id'])) {
									echo "Hi, {$_SESSION['u_first']}";
								echo "<p id=\"loggedIn\">You are logged in!</p>";
								echo '<form action="includes/logout.inc" method="POST">
									<button type="submit" name="submit" class="btn btn-default">Logout</button>
								</form>';
							}?>
							</div>
						</ul>

					</div>
				</div>
			</nav>
    <!-- end nav bar -->

    <!-- start cart content -->
    <div class="container text-center" id="content">

        <div id="div1">
          <h2 style="font-weight: bold; text-decoration: underline;" id="totalhd" >Totals for Pizza</h2>
            <h3 id="items"></h3>
            <h3 id="items2"></h3>
            <h3 id="items3"></h3>
            <h3 id="items4"></h3>
            <h3 id="totals" style="font-weight: bold;"></h3>
            <h3 id="cancel"></h3>
            <br>
            <button class="btn-success  btn-lg" type="button" id="my-btn" onclick="payment()">Buy</button>
            <button class="btn-danger  btn-lg" type="submit" onclick="removeItems()" id="my-btn2">Cancel</button>
        </div>


        <div id="my-div">
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="center-block panel panel-default credit-card-box" id="cardinfo" style="display: none;">
                <div class="panel-heading display-table">
                    <div class="row display-tr">
                        <h3 class="panel-title display-td">Payment Details</h3>
                        <div class="display-td">
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block" type="button" id="paybutton" onclick="orderComplete()">pay</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->


        </div>



    </div>
    </div>

    </div>
    </div>




    <script>
        var cardinfo = document.getElementById("cardinfo");
        cardinfo.style.display = "none";
        var name, name1, name2, name3 = 0;
        var num1, num2, num3, num4, total = 0;
        var successButton = document.getElementById("my-btn");
        var dangerButton = document.getElementById("my-btn2");

        successButton.style.display = "none";
        dangerButton.style.display = "none";

        name = Number(localStorage.getItem("CheeseTotals"));
        name1 = Number(localStorage.getItem("PeppTotals"));
        name2 = Number(localStorage.getItem("vegTotals"));
        name3 = Number(localStorage.getItem("sausageTotals"));

        if (!parseInt(name) === 0 || !parseInt(name1) === 0 || !parseInt(name2) === 0 || !parseInt(name3) === 0) {
            document.getElementById("items").innerHTML = "<strong>Nothing has been added to the cart</strong>";
            localStorage.setItem("message", "Items removed");

        } else {

        }

        // show pizza totals
        if (parseInt(name) === 0) {} else {
            document.getElementById("items").innerHTML = "Cheese Pizza Total: $" + name;
        }

        if (parseInt(name1) === 0) {

        } else {
            document.getElementById("items2").innerHTML = "Pepperoni Pizza Total: $" + name1;
        }
        if (parseInt(name2) === 0) {

        } else {
            document.getElementById("items3").innerHTML = "Veggie Pizza Total: $" + name2;
        }
        if (parseInt(name3) === 0) {

        } else {
            document.getElementById("items4").innerHTML = "Sausage Pizza Total: $" + name3;
        }

        //show total due
        total = Number(name) + Number(name1) + Number(name2) + Number(name3);

        if (!total == 0) {
            document.getElementById("totals").innerHTML = "Total Amount Due: $" + total;
            successButton.style.display = "inline";
            dangerButton.style.display = "inline";
            localStorage.setItem("total", total);
        }

        // cancel button
        function removeItems() {
            localStorage.clear();
            $('#items').hide();
            $('#items2').hide();
            $('#items3').hide();
            $('#items4').hide();
            $('#totals').hide();
            $('#my-btn').hide();
            $('#my-btn2').hide();
            document.getElementById("cancel").innerHTML = "Items Removed Successfully";
						setTimeout(function () { if (self.name != 'refreshed'){ self.name = 'refreshed'; self.location.reload(true); } else { self.name = ''; } }, 3000);
        }

        //payment
        function payment() {
            var myElement = document.getElementById('my-div');
            var pageWidth = window.innerWidth,
                pageHeight = window.innerHeight,
                myElementWidth = myElement.offsetWidth,
                myElementHeight = myElement.offsetHeight;
            myElement.style.top = (pageHeight / 2) - (myElementHeight / 2) + "px";
            myElement.style.left = (pageWidth / 2) - (myElementWidth / 2) + "px";
            var cardinfo = document.getElementById("cardinfo");
            cardinfo.style.display = "inline-grid";
            var paybutton = document.getElementById("paybutton");
            var total = Number(localStorage.getItem("total"));
            paybutton.innerHTML = "Pay $" + total;
            $(document).ready(function() {

                $("#div1").remove();

            });

        }

        function orderComplete() {

            // thank you for your order message
            $(document).ready(function() {

                $("#my-div").remove();

                $('body').append('<div id="div4" class="text-center"><h2>'+ msg+' Thank you for your order!<br> Your pizza will be ready for pickup in roughly 30 minutes!<br><br></h2></div>');
                $('body').append('<div id="div4" class="text-center"><h3>Once you have picked up your order, and care to leave a comment on how your pizza was,<br>click on the suggestions tab and enter your receipt code that can be found at the bottom of your receipt</h3></div>');

                var top = ($(window).height() - $(this).outerHeight()) / 2;
                var left = ($(window).width() - $(this).outerWidth()) / 2;
                localStorage.clear();

            });




        }

				if(localStorage.length===0){
				document.getElementById("totalhd").style.display = "none";
				}

				
    </script>
</body>

</html>
