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

        header("Location: ../login?message=Invalid+Login");
phpAlert('hi');
        exit();
    } else {
        $sql = $conn->prepare("SELECT * FROM users WHERE  user_email=:uid");
        $sql->bindParam(':uid', $uid);
        $result = $sql->execute();
        $resultCheck = $sql->fetch();
        if ($resultCheck < 1) {
            header("Location: ../login?message=Invalid+Password+OR+Username");
            exit();
        } else {
            if ($row = $resultCheck) {
                //De-hashing the password
                 $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../login?message=Invalid+Password+OR+Username");



                    $sql2 = "UPDATE users SET attempts=:num WHERE id=:id ";
                     $sql->bindParam(':id', $uid);
                      $sql->bindParam(':num', +1);
      // Prepare statement
      $stmt = $conn->prepare($sql2);

      // execute the query
      $stmt->execute();

      // echo a message to say the UPDATE succeeded
      echo $stmt->rowCount();

                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id']    = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_firstname'];
                    $_SESSION['u_last']  = $row['user_lastname'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid']   = $row['user_uid'];
                    $_SESSION['last_time']  = time();
                    $_SESSION['Message']  = 'Success';
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
