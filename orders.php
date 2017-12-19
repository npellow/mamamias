<?php

require_once('includes/ajax.php');
 ?>

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
           }
           else{
           echo   '<li><a href="orders">Orders</a></li>';}?>
           <li><a href="suggestions">Suggestions</a></li>
           <li><a href="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
           <div class="float-right pull-right">
           <?php
             if (isset($_SESSION['u_id'])) {
               echo "Hi, {$_SESSION['u_first']}";
             echo "<p id=\"loggedIn\"></p>";
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
<div>
<h1 id="orders">My Orders</h1>
  <?php
  $uemail =$_SESSION['u_email'];
  $sql = $conn2->prepare("SELECT 	user_email,TransactionNum,total FROM customerorders WHERE user_email=:uid");
  $sql->bindParam(':uid', $uemail);
  $result      = $sql->execute();
  $resultCheck = $sql->fetchAll();
  echo '<div class="container" id="content"><div id="divSize2" class="row row-centered pos">';
  $incment=0;
  foreach( $resultCheck as $row ) {
     $incment++;
      echo 'order# ';
      echo $incment.' ';
      echo $row['user_email']. ' ';
      echo $row['TransactionNum']. ' ';
      echo '$'.$row['total']. '.00';
      echo '</br>';
  }
echo '</div></div>';
  ?>



</div>

 <script>

 </script>
</body>
