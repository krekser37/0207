<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "zmjflmoy_kryuchkovae", "Kla21112009", "zmjflmoy_kryuchkovae");

if ($mysqli == false) {
    print("error");
  } else {
    $email = trim(mb_strtolower($_POST['email']));
    $password = trim($_POST['password']);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `Email` = '$email'");
    
    $result = $result->fetch_assoc();
    
    
    if (password_verify($password, $result['Password'])) {
      echo "ok";
      $_SESSION['name'] = $result['name'];
      $_SESSION['lastname'] = $result['lastname'];
      $_SESSION['email'] = $result['email'];
      $_SESSION['id'] = $result['id'];
    } else {
      echo "user_not_found";
    }
  }
  ?>