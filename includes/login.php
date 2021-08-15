<?php
session_start();
session_destroy();
session_start();

$conn = new mysqli("localhost", "root", "", "newsportal");

$email = $_POST['email'];
$password = $_POST['password'];



$searchQuery = "SELECT * FROM reporter WHERE email = '$email' AND password = '$password';";
$result = $conn->query($searchQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["reporterId"] = $row['id'];
    $_SESSION["reporterName"] = $row['username'];
    header("Location:../index.php");
    exit();
}

$searchQuery = "SELECT * FROM admin WHERE email = '$email' AND password = '$password';";
$result = $conn->query($searchQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["adminId"] = $row['id'];
    $_SESSION["adminName"] = $row['username'];

    header("Location:../index.php");
    exit();
} else {
    header("Location:../login.html");
    exit();
}