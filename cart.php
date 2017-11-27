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
    <link href="css/index.css" rel="stylesheet">
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
									 }?>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav bar -->

    <!-- start cart content -->
    <div class="container" id="content">
        <h3 id="items"></h3>
        <h3 id="items2"></h3>
        <h3 id="items3"></h3>
        <h3 id="items4"></h3>
        <h3 id="totals"></h3>
        <script>
            var name, name1, name2, name3 = "";
            var num1, num2, num3, num4, total = Number(name);

            name = localStorage.getItem("CheeseTotals");
            name1 = localStorage.getItem("PeppTotals");
            name2 = localStorage.getItem("vegTotals");
            name3 = localStorage.getItem("sausageTotals");
            if (!name == 0) {
                document.getElementById("items").innerHTML = "Total Cheese Pizza's is $" + name;
            }

            if (!name1 == 0) {
                document.getElementById("items2").innerHTML = "Total Pepperoni Pizza's is $" + name1;
            }
            if (!name2 == 0) {
                document.getElementById("items3").innerHTML = "Total Veggie Pizza's is $" + name2;
            }
            if (!name3 == 0) {
                document.getElementById("items4").innerHTML = "Total Sausage Pizza's is $" + name3;
            }

            var num1 = Number(name);
            var num2 = Number(name1);
            var num3 = Number(name2);
            var num4 = Number(name3);
            var total = num1 + num2 + num3 + num4;

            document.getElementById("totals").innerHTML = "The Total price is $" + total;
        </script>
    </div>

</body>

</html>
