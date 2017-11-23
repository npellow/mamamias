<?php
if(_isset($_SESSION['u_id'])){
SESSION["last_time"]=time();
}
else{
  exit();
}
?>
