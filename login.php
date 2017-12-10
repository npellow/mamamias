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


          <!-- start login/sign up section -->
          <div class="container" id="content">
                <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                        <li><a data-toggle="tab" href="#signup">Sign Up</a></li>
                      </ul>

                      <div class="tab-content">

                        <!-- login form -->

                        <div id="login" class="tab-pane fade in active">
                          <h3>Login</h3>
                          <form action="includes/login.inc" method="POST">
                            <div class="form-group">
                              <label for="email" >Email address:</label>
                              <input type="text" style="background: #faffbd"  name="uid" class="form-control"  >
                            </div>
                            <div class="form-group">
                              <label for="pwd">Password:</label>
                              <input type="password"  style="background: #faffbd" name="pwd" class="form-control" >
                            </div>
                            <div class="checkbox">
                              <label><input type="checkbox"> Remember me</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-default"  >Login</button>
                          </form>
                        </div>
                        <!-- end login form -->

                        <!-- sign up form -->
                        <div id="signup" class="tab-pane fade">
                          <h3>Sign Up</h3>
                          <form action="includes/signup.inc" method="POST">
                            <div class="form-group">
                              <label for="fname">First name:</label>
                              <input type="text" style="background: #faffbd"  name="first" class="form-control" id="fname">
                            </div>
                            <div class="form-group">
                              <label for="lname">Last name:</label>
                              <input type="text" style="background: #faffbd"  name="last" class="form-control" id="lname">
                            </div>
                            <div class="form-group">
                              <label for="email">Email address:</label>
                              <input type="email" style="background: #faffbd"  name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Password:</label>
                              <input type="password" style="background: #faffbd"  name="pwd" class="form-control" id="pwd">
                            </div>
                            <div class="checkbox">
                              <label><input type="checkbox"> Remember me</label>
                            </div>
                            <button type="submit"  name="submit" class="btn btn-default">Submit</button>
                          </form>
                        </div>
                        <!-- end sign up form -->
                      </div>


          </div>
<script>

$(document).ready(function() {
	if (/Invalid/.test(window.location.href)){
		//vars
	var div = document.createElement("div");
	var diva = document.createElement("a");

//div
	var errorMess= new URL(window.location.href).searchParams.get("message");

	div.innerHTML = " <b>Login Failed: <i>"+errorMess+"</i></b> Please login again, we could not verify your account";
	div.classList.add('alert');
	div.classList.add('alert-danger');
	div.classList.add('alert-dismissable');
	div.id = "status";

//diva
	diva.innerHTML ='x';
	diva.setAttribute('data-dismiss',"alert");
	diva.setAttribute('aria-labe',"close");
	diva.href='#';
	diva.classList.add('close');
//add vars to dom
	document.getElementById("mcon").appendChild(div);
	div.appendChild(diva);
}
/*else if (/Success/.test(window.location.href)) {

 	 //alert(" Login Success");
 }*/


});

if (/Success/.test(window.location.href)){

						setTimeout(function() {
								window.location.reload(true);
							}, 180000);

							//vars
						var div = document.createElement("div");
						var diva = document.createElement("a");

					//div
						div.innerHTML = " <strong>Success</strong> You are registered please login";
						div.classList.add('alert');
						div.classList.add('alert-success');
						div.classList.add('alert-dismissable');
           	//diva
						diva.innerHTML ='x';
						diva.setAttribute('data-dismiss',"alert");
						diva.setAttribute('aria-labe',"close");
						diva.href='#';
						diva.classList.add('close');
					//add vars to dom
						document.getElementById("mcon").appendChild(div);
						div.appendChild(diva);
						document.getElementById("loggedIn").innerHTML="";
						div.id="statusMess3";
						window.setTimeout(function () {
						$("#statusMess3").alert('close'); }, 2000);


					}
</script>

    </body>
</html>
