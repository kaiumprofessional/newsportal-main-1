<?php

session_start();

$conn = new mysqli("localhost", "root", "", "newsportal");

$username = $_POST['username'];
$email = $_POST['email'];
$category = $_POST['category'];
$password = $_POST['password'];

$searchQuery = "SELECT * FROM reporter WHERE email = '$email';";
$result = $conn->query($searchQuery);

if ($result->num_rows > 0) {
    header("Location:../signup.html");
    exit();
} else {
    $insertQuery =
        "INSERT INTO 
        reporter(username,email,category,password) 
        VALUES('$username','$email','$category','$password');";
    $conn->query($insertQuery);
    header("Location:../login.html");
    exit();
}
