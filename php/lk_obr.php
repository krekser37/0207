<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "zmjflmoy_kryuchkovae", "Kla21112009", "zmjflmoy_kryuchkovae");


if ($mysqli == false) {
  print("error");
} else {
$inputValue = $_POST['value'];
$item = $_POST['item'];
$id = $_SESSION['id'];
$mysqli->query("UPDATE `users` SET `name`=[value-2],`lastname`=[value-3],`Email`=[value-4],`Password`=[value-5] WHERE 1");

}