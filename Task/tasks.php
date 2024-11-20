<?php
$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$tasks_result = $conn->query("SELECT * FROM tasks");
?>



<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>special to do app</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
   

    <a href="create_task.php" class="btn btn-primary"> add task</a>

    <table class="table">
        <tr>
        <th>task</th>
        <th>description</th>
           
        </tr>
        <?php while ($task = $tasks_result->fetch_assoc()): ?>

        <tr>
        <td><?= $task['task_name'] ?></td>
        <td><?= $task['description'] ?></td>
            <td>
            <a href="edit_task.php?id=<?= $task['id'] ?>" class="btn btn-warning">update</a>
            <a href="delete_task.php?id=<?= $task['id'] ?>" class="btn btn-danger">delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<!-- <a href="create_task.php" class="btn btn-primary"> Add Task</a>
    <table class="table">
        <tr>
            <th>task</th>
            <th>description</th>
         
        </tr>
        <?php while ($task = $tasks_result->fetch_assoc()): ?>
        <tr>
            <td><?= $task['task_name'] ?></td>
            <td><?= $task['description'] ?></td>
            <!-- <td><?= $task['assigned_to'] ?></td> -->
            <td>
                <a href="edit_task.php?id=<?= $task['id'] ?>" class="btn btn-warning">update</a>
                <a href="delete_task.php?id=<?= $task['id'] ?>" class="btn btn-danger">delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html> -->
