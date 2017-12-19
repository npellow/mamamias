<?php

try {
   // add own database with database my system
    $conn = new PDO("mysql:host=localhost;dbname=login_system;","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}   catch (Exception $e) {
    echo "Unable to connect to database to the login system database please create your own ";
    // echo $e-> getMessage();
    exit;
}


function test_connection() {
      try {
       // add own database with database my system
        $conn2 = new PDO("mysql:host=usercreation;dbname=testdb;","root","");
        $conn2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $testquery= $conn->prepare('SELECT * FROM testrecords');
        $testquery->execute();
        while ($row = $testquery->fetch(PDO::FETCH_ASSOC))
        {
            echo $row['tags'];
        }


    }   catch (Exception $e) {
        echo "Failed ";
        echo $e-> getMessage();
        exit;
    }

}





?>
