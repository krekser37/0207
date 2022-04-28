<?php

header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "zmjflmoy_kryuchkovae", "Kla21112009", "zmjflmoy_kryuchkovae");


if ($mysqli == false) {
    print("error");
  } else {
    //print("Соединение установлено успешно");
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = trim(mb_strtolower($_POST['email']));
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `Email` = '$email' "); //AND `password` = '$password'
    
    if ($result->num_rows !== 0) {
        print("exist");
      } else {
        $mysqli->query("INSERT INTO `users`(`frist_name`, `last_name`, `Email`, `Password`) VALUES ('$name', '$lastname', '$email', '$password')");
        print("ok");
    }
    //var_dump($result);
   
  }



//echo "Имя: $name<br> Фамилия: $lastname<br> E-mail: $email<br> Пароль: $password<br> ";

?>