<?php
function session_timeout(){
if(isset($_SESSION['u_id']))
{
if(time()- $_SESSION["last_time"]<3000)
{
session_unset();
session_destroy();
$_SESSION['Message']='Session Timeout';

header('Location: index?login=Session+timed+out');
      exit();
}
}
}
?>
