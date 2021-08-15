<?php

session_start();

// $conn = new mysqli("localhost", "root", "", "newsportal");

// $searchQuery = "SELECT * FROM news where approved = 0;";
// $result = $conn->query($searchQuery);

// while ($row = $result->fetch_assoc()) {
//     echo $row['title'];
//     echo "<hr>";
//     echo $row['content'];
//     echo "<hr>";
//     echo $row['imagename'];
//     echo "<hr>";
// }

date_default_timezone_set("Asia/Dhaka");
$today = date("F j, Y");
echo $today;