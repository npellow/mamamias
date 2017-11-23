<?php
	session_start();
	@ob_start();
	include("includes/functions.php");
	session_timeout();
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
		<script src="../customjs/userdefined.js"></script>
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
                    <li><a href="cart">

                      <i class="glyphicon glyphicon-shopping-cart"></i></a></li>
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

    <!-- start page content -->
    <div class="container" id="content">

    <form name="contactform" method="post" action="send_form_email.php">





			<div class="form-group row">
			  <label for="example-text-input" class="col-2 col-form-label"> Name:</label>
			  <div class="col-10">
			    <input class="form-control" type="text" value="<?php if(isset($_SESSION['u_id'])){ echo  $_SESSION['u_first']. " " .$_SESSION['u_last'];} ?>" name="name">
			  </div>
			</div>
			<div class="form-group row">

			  <label for="example-email-input" class="col-2 col-form-label">Preferred Email:</label>
			  <div class="col-10">
			    <input class="form-control" type="email" value="<?php if(isset($_SESSION['u_id'])){ echo $_SESSION['u_email'];}?>" name="email">
			  </div>
			</div>

			<div class="form-group row">
			  <label for="example-color-input" class="col-2 col-form-label">Comments:</label>
			  <div class="col-10">
			     <textarea class="form-control" id="exampleTextarea" rows="3" name="comments"></textarea>
			  </div>
			</div>


                    <input type="submit" value="Send Email"  class="btn btn-primary">
                </td>
            </tr>
        </table>
			</div >
    </form>

    </div>

		<script>
		$(document).ready(function()
			{
				message= "<?php echo  $_SESSION['Message']; ?>";
				successMessage(message);
				errorMessage(message);
		});
		</script>
</body>
</html>
