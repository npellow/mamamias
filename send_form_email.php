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

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pellowj@aol.com";
    $email_subject = "Email Suggestion";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    } 
 
    // validation expected data exists
    if(!isset($_POST['user_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }    
 
    $user_name = $_POST['user_name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";

    $string_exp = "/^[A-Za-z .'-]+$/";
    
    if(!preg_match($string_exp,$user_name)) {
        $error_message .= 'The name you entered does not appear to be valid.<br />';
    }

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
 
    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
    
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
    $email_message = "Form details below.\n\n";
      
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }    
 
    $email_message .= "Name: ".clean_string($user_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

    <div class="container" id="content"> 
        <h1>Thank you for contacting us. We will be in touch with you very soon.</h1>
    </div>
<?php
 
}
