<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "zmjflmoy_kryuchkovae", "Kla21112009", "zmjflmoy_kryuchkovae");

if ($mysqli == false) {
    print("error");
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result1 = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'"); 
    $result2 = $mysqli->query("SELECT * FROM `users` WHERE `password` = '$password'"); 
    if ($result1->num_rows !== 0 && $result2->num_rows !== 0) {
        print("exist");
      } else {
        $mysqli->query("INSERT INTO `users`(`Email`, `Password`) VALUES ('$email', '$password')");
        print("ok");
    }
    //var_dump($result);
   
  }



//$email = $_POST['email'];
//$password = $_POST['password'];

//echo  "E-mail: $email<br> Пароль: $password<br> ";

?>