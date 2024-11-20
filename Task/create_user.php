<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $role = $_POST['role'];

    if (!empty($name) && !empty($role)) {
        $stmt = $conn->prepare("INSERT INTO users (name, role) VALUES (:name, :role)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        header("Location: index.php");
        exit();
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create New User</h2>
    <form method="post" action="create_user.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</body>
</html>