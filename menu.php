<?php
	session_start();
	@ob_start();
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Mama Mia's Pizzeria</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="css/index.css" rel="stylesheet">
				<script src="customjs/userdefined.js"></script>
    </head>
    <body>

        <!-- nav bar -->

        <nav class="navbar navbar-default">
            <div class="container">
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

										echo '<form action="includes/logout.inc" method="POST">
											<button type="submit" name="submit" class="btn btn-default">Logout</button>
										</form>';
									 }
										?>
									</div>
                </ul>

              </div>
            </div>
          </nav>
          <!-- end nav bar -->


          <!-- start pizza menu
            four images, each one with a pop up modal after img tag
            modal shows info on pizza -->
   <div id="box" onclick="location.href='cart'"></div>

		 <div class="container text-center" id="content">
	 			<h1>Pizza Menu</h1>

	 			<div class="row">

	 				<!-- cheese pizza -->
	 						<div class="col-sm-3">
	 							<p><strong>Cheese</strong></p><br>
	 							<img class="img-circle img-responsive pizzaImg" data-toggle="modal" data-target="#pizza1" src="images/cheese.png" alt="Cheese Pizza">


	 						<!-- cheese pizze modal -->
	 						<div class="modal fade" id="pizza1" role="dialog">
	 						<div class="modal-dialog">

	 						<!-- modal content-->
	 						<div class="modal-content">
	 						<div class="modal-header">
	 								<button type="button" class="close" data-dismiss="modal">&times;</button>
	 								<h4><span class="glyphicon glyphicon-cutlery"></span>14" Cheese Pizza</h4>
	 								<p><h3>Five Cheeses with Tangy Tomato Sauce<br>and Pan Style Crust</h3>
	 								</p>
	 						</div>
	 						<div class="modal-body">
	 								<form role="form">
	 								<div class="form-group">
	 										<label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>$10 per pizza</label>
	 										<select id="cheeseNum" class="form-control">
	 												<option value="0">How many?</option>
	 												<option value="1">1</option>
	 												<option value="2">2</option>
	 												<option value="3">3</option>
	 												<option value="4">4</option>
	 												<option value="5">5</option>
	 												<option value="6">6</option>
	 												<option value="7">7</option>
	 												<option value="8">8</option>
	 												<option value="9">9</option>
	 												<option value="10">10</option>
	 										</select>
	 								</div>

	 								<h3>Total: $<label class="resultCheese" id="resultCheese"></label></h3>

	 								<button type="submit"  onclick="displayOnCartCheese()" class="btn btn-block">Add to Cart</button>
	 										<span class="glyphicon glyphicon-ok"></span>
	 								</button>
	 								</form>
	 						</div>
	 						<div class="modal-footer">
	 								<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
	 								<span class="glyphicon glyphicon-remove"></span> Cancel
	 								</button>

	 						</div>
	 						</div>
	 						</div>
	 						</div>
	 						</div>
	 						<!-- end modal for cheese pizza -->


	 						<!-- pepperoni pizza -->
	 						<div class="col-sm-3">
	 							<p><strong>Pepperoni</strong></p><br>
	 							<img class="img-circle img-responsive pizzaImg" data-toggle="modal" data-target="#pizza2" src="images/pepperoni.png" alt="Pepperoni Pizza">

	 						<!-- pepperoni modal -->
	 						<div class="modal fade" id="pizza2" role="dialog">
	 										<div class="modal-dialog">

	 										<!-- modal content-->
	 										<div class="modal-content">
	 												<div class="modal-header">
	 												<button type="button" class="close" data-dismiss="modal">&times;</button>
	 												<h4><span class="glyphicon glyphicon-cutlery"></span>14" Pepperoni Pizza</h4>
	 												<p><h3>Pepperoni with Hearty Tomato Sauce<br>and Pan Style Crust</h3>
	 												</p>
	 												</div>
	 												<div class="modal-body">
	 												<form role="form">
	 														<div class="form-group">
	 														<label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>$12 per pizza</label>

	 														<select id="pepNum" class="form-control">
	 																<option value="0">How many?</option>
	 																<option value="1">1</option>
	 																<option value="2">2</option>
	 																<option value="3">3</option>
	 																<option value="4">4</option>
	 																<option value="5">5</option>
	 																<option value="6">6</option>
	 																<option value="7">7</option>
	 																<option value="8">8</option>
	 																<option value="9">9</option>
	 																<option value="10">10</option>
	 														</select>
	 														</div>

	 														<h3>Total: $<label class="resultPep" id="Pepp"></label></h3>

	 														<button type="submit"  onclick="displayOnCartPepp()" class="btn btn-block">Add to Cart</button>
	 														<span class="glyphicon glyphicon-ok"></span>
	 														</button>
	 												</form>
	 												</div>
	 												<div class="modal-footer">
	 												<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
	 														<span class="glyphicon glyphicon-remove"></span> Cancel
	 												</button>

	 												</div>
	 										</div>
	 										</div>
	 								</div>

	 								<!-- end pepperoni modal -->
	 						</div>

	 						<!-- sausage pizza -->
	 						<div class="col-sm-3">
	 							<p><strong>Sausage</strong></p><br>
	 							<img class="img-circle img-responsive pizzaImg" data-toggle="modal" data-target="#pizza3" src="images/sausage.png" alt="Sausage Pizza">

	 						<!-- sausage pizza modal -->
	 						<div class="modal fade" id="pizza3" role="dialog">
	 										<div class="modal-dialog">

	 										<!-- modal content-->
	 										<div class="modal-content">
	 												<div class="modal-header">
	 												<button type="button" class="close" data-dismiss="modal">&times;</button>
	 												<h4><span class="glyphicon glyphicon-cutlery"></span>14" Sausage Pizza</h4>
	 												<p><h3>Sausage with Hearty Tomato Sauce<br>and Pan Style Crust</h3>
	 												</p>
	 												</div>
	 												<div class="modal-body">
	 												<form role="form">
	 														<div class="form-group">
	 														<label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>$12 per pizza</label>
	 														<select id="sausageNum" class="form-control">
	 																<option value="0">How many?</option>
	 																<option value="1">1</option>
	 																<option value="2">2</option>
	 																<option value="3">3</option>
	 																<option value="4">4</option>
	 																<option value="5">5</option>
	 																<option value="6">6</option>
	 																<option value="7">7</option>
	 																<option value="8">8</option>
	 																<option value="9">9</option>
	 																<option value="10">10</option>
	 														</select>
	 														</div>

	 														<h3>Total: $<label class="resultSausage" id="sausage"></label></h3>

	 														<button type="submit"   onclick="displayOnCartSausage()" class="btn btn-block">Add to Cart</button>
	 														<span class="glyphicon glyphicon-ok"></span>
	 														</button>
	 												</form>
	 												</div>
	 												<div class="modal-footer">
	 												<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
	 														<span class="glyphicon glyphicon-remove"></span> Cancel
	 												</button>

	 												</div>
	 										</div>
	 										</div>
	 								</div>
	 								<!-- end sausage modal -->
	 						</div>

	 						<!-- veggie pizza -->
	 						<div class="col-sm-3">
	 								<p><strong>Veggie</strong></p><br>
	 								<img class="img-circle img-responsive pizzaImg" data-toggle="modal" data-target="#pizza4" src="images/veggie.png" alt="Veggie Pizza">

	 						<!-- veggie modal -->
	 						<div class="modal fade" id="pizza4" role="dialog">
	 										<div class="modal-dialog">

	 										<!-- modal content-->
	 										<div class="modal-content">
	 												<div class="modal-header">
	 												<button type="button" class="close" data-dismiss="modal">&times;</button>
	 												<h4><span class="glyphicon glyphicon-cutlery"></span>14" Veggie Pizza</h4>
	 												<p><h3>Veggie with Tangy Tomato Sauce<br>and Pan Style Crust</h3>
	 												</p>
	 												</div>
	 												<div class="modal-body">
	 												<form role="form">
	 														<div class="form-group">
	 														<label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>$13 per pizza</label>
	 														<select id="vegNum" class="form-control">
	 																<option value="0">How many?</option>
	 																<option value="1">1</option>
	 																<option value="2">2</option>
	 																<option value="3">3</option>
	 																<option value="4">4</option>
	 																<option value="5">5</option>
	 																<option value="6">6</option>
	 																<option value="7">7</option>
	 																<option value="8">8</option>
	 																<option value="9">9</option>
	 																<option value="10">10</option>
	 														</select>
	 														</div>

	 														<h3>Total: $<label class="resultVeg" id="veg"></label></h3>

	 														<button type="submit"  onclick="displayOnCartVeg()" class="btn btn-block">Add to Cart</button>
	 														<span class="glyphicon glyphicon-ok"></span>
	 														</button>
	 												</form>
	 												</div>
	 												<div class="modal-footer">
	 												<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
	 														<span class="glyphicon glyphicon-remove"></span> Cancel
	 												</button>

	 												</div>
	 										</div>
	 										</div>
	 								</div>
	 								<!-- end veggie modal -->
	 					</div>


	 	</div>

          <script src="customjs/menu.js"></script>
					<script>
					$(document).ready(function(){
		  var text
			var name = Number(localStorage.getItem("CheeseTotals"));
			var name1 = Number(localStorage.getItem("PeppTotals"));
			var name2 = Number(localStorage.getItem("vegTotals"));
			var name3 = Number(localStorage.getItem("sausageTotals"));

			var total = Number(name) + Number(name1) + Number(name2) + Number(name3);

			if (!total == 0) {
					text = document.getElementById("box");
				  text.innerHTML = "Total Amount Due: $" + total;



			}


    });

		$("#box").hover(function(){
			 $('[data-toggle="tooltip"]').tooltip();
		        $(this).css("color", "#FF5733");
		        }, function(){
		        $(this).css("color", "#FFC300");
		    });





					</script>




    </body>
</html>
