<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// 데이터베이스 연결
include('./db_conn.php');

// POST 데이터 받기
$task_id = $_POST['task_id'];
$user_id = $_SESSION['user_id'];

// 상태 업데이트 쿼리
$sql = "UPDATE todo SET status = 'completed', completed_at = NOW() WHERE id = '$task_id' AND user_id = '$user_id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('할 일이 완료되었습니다.');</script>";
} else {
    echo "<script>alert('완료 처리 실패: " . mysqli_error($conn) . "');</script>";
}

mysqli_close($conn);
echo "<meta http-equiv='refresh' content='0;URL=todo.php'>";
