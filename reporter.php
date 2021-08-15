<?php

session_start();
$reporterId = $_SESSION["reporterId"];

$conn = new mysqli("localhost", "root", "", "newsportal");
$searchQuery = "SELECT * FROM reporter WHERE id='$reporterId';";
$result = $conn->query($searchQuery);

$row = $result->fetch_assoc();
echo $row['id'];
echo "<br>";
echo $row['username'];
echo "<br>";
echo $row['email'];
echo "<br>";
echo $row['category'];
echo "<br>";


?>