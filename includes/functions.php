<?php
function session_timeout(){

if(isset($_SESSION['u_id']))
{


if(time()- $_SESSION["last_time"]>2)
{

session_unset();
session_destroy();
$_SESSION['Message']='Session Timeout';
echo $_SESSION['Message'];
header('Location: index?login=Session+timed+out');
      exit();
}
}
}
?>
