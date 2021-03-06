<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';
    $first = $_POST['first'];
    $last  = $_POST['last'];
    $email = $_POST['email'];
    $pwd   = $_POST['pwd'];

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($pwd)) {

        header("Location: ../login?message=Signup+is+Invalid+the+Fields+are+Empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {

            header("Location: ../login?message=Signup+has+Invalid+Input");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

								header("Location: ../login?message=Signup+has+invalid+Email");
                exit();
            } else {

                $sql = $conn->prepare("SELECT * FROM users WHERE user_email=:ueml");
                $sql->bindParam(':ueml', $email);
                $result      = $sql->execute();
                $resultCheck = $sql->fetch();

                if ($resultCheck > 0) {
                    header("Location: ../login?message=Signup+Invalid+a+user+email+exists+already");
                    exit();
                } else {
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql  = $conn->prepare("INSERT INTO users (user_firstname, user_lastname, user_email, user_pwd) VALUES (:first, :last, :email, :hashedPwd)");
                    $sql->bindParam(':first', $first);
                    $sql->bindParam(':last', $last);
                    $sql->bindParam(':email', $email);
                    $sql->bindParam(':hashedPwd', $hashedPwd);
                    $sql->execute();
                    header("Location: ../login?signup=Success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../signup");
    exit();
}
