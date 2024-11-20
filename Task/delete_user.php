<?php
$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE id = $id");
}

header("Location: index.php");
exit();
?>