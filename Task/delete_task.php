<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "my_projectt");

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من وجود معرف المهمة في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // تنفيذ جملة الحذف
    $conn->query("DELETE FROM tasks WHERE id = $id");

    // إعادة التوجيه إلى الصفحة الرئيسية بعد الحذف
    header("Location: index.php");
    exit();
}
?>