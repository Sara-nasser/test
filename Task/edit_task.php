<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من وجود معرف المهمة في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // جلب بيانات المهمة الحالية
    $result = $conn->query("SELECT * FROM tasks WHERE id = $id");
    $task = $result->fetch_assoc();
}

// تحديث بيانات المهمة بعد إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];

    // استعلام تحديث المهمة
    $conn->query("UPDATE tasks SET task_name = '$task_name', description = '$description' WHERE id = $id");

    // إعادة التوجيه إلى الصفحة الرئيسية بعد التعديل
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>update</title>
</head>
<body>
   
    <form method="post" action="">
        <label for="task_name">task</label>
        <input type="text" id="task_name" name="task_name" value="<?php echo $task['task_name']; ?>" required><br><br>
        
        <label for="description">description:</label>
        <textarea id="description" name="description" required><?php echo $task['description']; ?></textarea><br><br>
        
        <input type="submit" value="send">
    </form>
</body>
</html>