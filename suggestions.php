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
		<script src="../customjs/userdefined.js"></script>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <!-- nav bar -->
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
      <h4>Do you have any suggestions for our page? Perhaps you would just like to ask us a question? If you have recently ordered from us, please enter the code that can
         be found at the bottom of the receipt and tell us how your pizza was!</h4>

			<div class="form-group">
			  <label for="example-text-input" class="col-2 col-form-label">Name:</label>
			  <div class="col-10">
			    <input  style="background: #faffbd" class="form-control" type="text"  name="user_name" value="<?php if(isset($_SESSION['u_id'])){ echo  $_SESSION['u_first']. " " .$_SESSION['u_last'];} ?>" name="first_name">
			  </div>
			</div>

			<div class="form-group">
			  <label for="example-email-input" class="col-2 col-form-label">Preferred Email:</label>
			  <div class="col-10">
			    <input style="background: #faffbd" class="form-control"  type="email"  name="email" value="<?php if(isset($_SESSION['u_id'])){ echo $_SESSION['u_email'];}?>" name="email">
			  </div>
			</div>

      <div class="form-group">
			  <label for="example-text-input" class="col-2 col-form-label">Receipt Code:</label>
			  <div class="col-10">
			    <input  style="background: #faffbd" class="form-control" type="text" value="" name="receiptcode">
			  </div>
			</div>

			<div class="form-group">
			  <label for="example-color-input" class="col-2 col-form-label">Comments:</label>
			  <div class="col-10">
			     <textarea style="background: #faffbd" class="form-control" id="exampleTextarea" rows="3" name="comments"></textarea>
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
				message= "";
				if (message === 'Success') {

    setTimeout(function() {
      window.location.reload(true);
    }, 1800000);

    //vars
    var div = document.createElement("div");
    var diva = document.createElement("a");

    //div
    div.innerHTML = " <strong>Success</strong> You are logged in";
    div.classList.add('alert');
    div.classList.add('alert-success');
    div.classList.add('alert-dismissable');
    //diva
    diva.innerHTML = 'x';
    diva.setAttribute('data-dismiss', "alert");
    diva.setAttribute('aria-labe', "close");
    diva.href = '#';
    diva.classList.add('close');
    //add vars to dom
    document.getElementById("mcon").appendChild(div);
    div.appendChild(diva);
    document.getElementById("loggedIn").innerHTML = "";
    div.id = "statusMess0";
    window.setTimeout(function() {
      $("#statusMess0").alert('close');
    }, 2000);



  }
				if (/Session/.test(window.location.href)) {
    //vars
    var divEr = document.createElement("div");
    var divaEr = document.createElement("a");
    //div
    divEr.innerHTML = " <strong>Session invalid</strong> Your Session is terminated";
    divEr.classList.add('alert');
    divEr.classList.add('alert-danger');
    divEr.classList.add('alert-dismissable');
    //diva
    divaEr.innerHTML = 'x';
    divaEr.setAttribute('data-dismiss', "alert");
    divaEr.setAttribute('aria-labe', "close");
    divaEr.href = '#';
    divaEr.classList.add('close');
    //add vars to dom
    document.getElementById("mcon").appendChild(divEr);
    divEr.appendChild(divaEr);
    divEr.id = "statusMess1";
    window.setTimeout(function() {
      $("#statusMess1").alert('close');
    }, 2000);

  }
		});
		</script>
</body>
</html>
