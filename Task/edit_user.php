<?php
$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $id = $_POST['id'];

    $conn->query("UPDATE users SET name='$name', role='$role' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title> update</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
        <input type="text" name="role" value="<?= $user['role'] ?>" required>
        <button type="submit">send </button>
    </form>
</body>
</html>
<?php $conn->close(); ?>