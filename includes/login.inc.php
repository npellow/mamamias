<?php
//checks if user has a session
session_start();

if (isset($_POST['submit'])) { //confirms post operation

    include 'dbh.inc.php'; //database file

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index?invalid+Login");
        exit();
    } else {
        $sql = $conn->prepare("SELECT * FROM users WHERE  user_email=:uid");
        $sql->bindParam(':uid', $uid);
        $result      = $sql->execute();
        $resultCheck = $sql->fetch();
        if ($resultCheck < 1) {
            header("Location: ../index?Invalid+Password+OR+Username");
            exit();
        } else {
            if ($row = $resultCheck) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index?login=Invalid+Password+OR+Username");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id']    = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last']  = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid']   = $row['user_uid'];
                    header("Location: ../index?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index?login=Unknown+error");
    exit();
} ?>
