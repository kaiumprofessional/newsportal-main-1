<?php

session_start();

$conn = new mysqli("localhost", "root", "", "newsportal");


if (isset($_GET['approveid'])) {
    echo "approveID selected";
    $id = $_GET['approveid'];
    $updateQuery = "UPDATE news SET approved = 1 WHERE id = $id;";
    $result = $conn->query($updateQuery);
} elseif (isset($_GET['deleteid'])) {
    echo "deleteID selected";
    $id = $_GET['deleteid'];
    $deleteQuery = "DELETE FROM news WHERE id = $id;";
    $result = $conn->query($deleteQuery);
}

header("Location: ../admin.php");
