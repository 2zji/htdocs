<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// 데이터베이스 연결
include('./db_conn.php');

// POST 데이터 받기
$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

// 데이터 삽입
$title = mysqli_real_escape_string($conn, $title);
$description = mysqli_real_escape_string($conn, $description);

$sql = "INSERT INTO tasks (userid, title, description) VALUES ('$user_id', '$title', '$description')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('할 일이 추가되었습니다.');</script>";
} else {
    echo "<script>alert('추가 실패: " . mysqli_error($conn) . "');</script>";
}

mysqli_close($conn);
echo "<meta http-equiv='refresh' content='0;URL=todo.php'>";
?>