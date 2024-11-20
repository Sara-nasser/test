<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];

    if (!empty($task_name) && !empty($user_id)) {
        $stmt = $conn->prepare("INSERT INTO tasks (task_name, description, user_id) VALUES (:task_name, :description, :user_id)");
        $stmt->bindParam(':task_name', $task_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        header("Location: tasks.php");
        exit();
    } else {
        echo "Please fill in the required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create New Task</h2>
    <form method="post" action="create_task.php">
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                <?php
                $stmt = $conn->query("SELECT id, name FROM users");
                while ($row = $stmt->fetch()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</body>
</html>