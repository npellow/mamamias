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

                <a class="navbar-brand" href="index.php">Mama Mia's</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
  							<li><a href="menu.php">Menu</a></li>
									<?php if (!isset($_SESSION['u_id'])) {
									echo   "<li><a href=\"login.php\">Sign In</a></li>";
									}?>
                  <li><a href="suggestions.php">Suggestions</a></li>
                  <li><a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
									<div class="float-right pull-right">
									<?php
										if (isset($_SESSION['u_id'])) {
										echo "<p>You are logged in!</p>";

										echo '<form action="includes/logout.inc.php" method="POST">
											<button type="submit" name="submit" class="btn btn-default">Logout</button>
										</form>';
									}?>
									</div>
                </ul>

              </div>
            </div>
          </nav>
          <!-- end nav bar -->

          <!-- content div-->
          <div class="container" id="content">
              <div class="jumbotron">
                  <img class="img-responsive" src="images/logo.jpg" alt="Mama Mia logo">
              </div>
          </div>

    </body>
</html>
