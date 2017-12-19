<?php



try {
$conn2 = new PDO("mysql:host=localhost;dbname=orders;","root","");
$conn2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}   catch (Exception $e) {
    echo "Unable to connect to database to the login system database please create your own ";
    // echo $e-> getMessage();
    exit;
}

  try {
if (isset($_POST['confirmationNum'])){
    $user_email = $_POST['user'];
   $TransactionNum = $_POST['confirmationNum'];
   $total = $_POST['total'];
     // add own database with database my system
      $query = $conn2->prepare("INSERT INTO  customerorders (user_email,TransactionNum,total) VALUES (:user_email, :TransactionNum,:total)");
      $query->bindParam(':user_email', $user_email);
      $query->bindParam(':TransactionNum', $TransactionNum);
      $query->bindParam(':total', $total);
      $query->execute();

      echo "Form Submitted Succesfully";


    }}   catch (Exception $e1) {
      echo "Failed ";
      echo $e1-> getMessage();
      exit;
      }












 ?>
