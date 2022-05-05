<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "zmjflmoy_kryuchkovae", "Kla21112009", "zmjflmoy_kryuchkovae");

if ($mysqli == false) {
    print("error");
  } else {
    $email = trim(mb_strtolower($_POST['email']));
    $password = trim($_POST['password']);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    /* echo $result; */
    $result = $result->fetch_assoc();
    /* echo $result; */
    
    if (password_verify($password, $result['password'])) {
      echo "ok";
      $_SESSION['name'] = $result['name'];
      $_SESSION['lastname'] = $result['lastname'];
      $_SESSION['email'] = $result['email'];
      $_SESSION['id'] = $result['id']; 
    } else {
      echo "user_not_found";
      echo $_SESSION['name'];
      echo $_SESSION['lastname'];
      echo $_SESSION['email'];
      echo $_SESSION['id'];
    }
  }
  ?>