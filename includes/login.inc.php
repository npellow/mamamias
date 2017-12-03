<?php
//checks if user has a session
session_start();

if(!isset($_SESSION['logonCounter'])) {
$_SESSION['LogonCounter'] = 0;
$sessionCnt= (int) $_SESSION['LogonCounter'];

} else{
  $sessionCnt= (int) $_SESSION['LogonCounter'];
}

if (isset($_POST['submit'])) { //confirms post operation

    include 'dbh.inc.php'; //database file

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {

        header("Location: ../login?message=Invalid+Login");
phpAlert('hi');
        exit();
    } else {
        $sql = $conn->prepare("SELECT * FROM users WHERE  user_email=:uid");
        $sql->bindParam(':uid', $uid);
        $result      = $sql->execute();
        $resultCheck = $sql->fetch();
        if ($resultCheck < 1) {
            header("Location: ../login?message=Invalid+Password+OR+Username");
            exit();
        } else {

            if ($row = $resultCheck) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);


                if ($hashedPwdCheck == false) {
                 (int) $sessionCnt;
                  $sessionCnt++;
                  if( $sessionCnt <3) {
                     header("Location: ../login?message=The+Referenced+Account+is+Locked+Out");

                   }
                   $_SESSION['LogonCounter']=$sessionCnt;
                    header("Location: ../login?message=Invalid+Password+OR+Username"  .$sessionCnt);
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id']    = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_firstname'];
                    $_SESSION['u_last']  = $row['user_lastname'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid']   = $row['user_uid'];
                    $SESSION["last_time"] = time();
                     $SESSION["Message"]= 'Success';
                    header("Location: ../index?login=Success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../login?message=Invalid+Attempt+Unknown+error");
    exit();
} ?>
