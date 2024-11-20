<!-- <?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Users List</h2>
    <a href="create_user.php" class="btn btn-primary">Add User</a>
    <a href="tasks.php" class="btn btn-secondary">Tasks</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->query("SELECT * FROM users");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['role']}</td>
                    <td>
                        <a href='update_user.php?id={$row['id']}' class='btn btn-warning'>Update</a>
                        <a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>  -->


<?php

$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$users_result = $conn->query("SELECT * FROM users");


// $tasks_result = $conn->query("SELECT * FROM tasks");

  ?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>special to do app</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
   
    <a href="create_user.php" class="btn btn-primary"> Add User</a>
    <a href="tasks.php" class="btn btn-primary">  task</a>

    <table class="table">
        <tr>
            <th>name</th>
            <th>role</th>
           
        </tr>
        <?php while ($user = $users_result->fetch_assoc()): ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning">update</a>
                <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">delete</a>
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

<?php $conn->close(); ?> 