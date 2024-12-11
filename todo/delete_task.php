<?php
session_start();

// 로그인 상태 확인
if (!isset($_SESSION['userid'])) {
    header("Location: index.php"); // 로그인되지 않은 경우, 로그인 페이지로 리다이렉트
    exit();
}

// 데이터베이스 연결
include('./db_conn.php');

// 할 일 삭제 처리
if (isset($_GET['id'])) {
    $taskId = (int) $_GET['id']; // 할 일 ID

    // 해당 ID의 할 일 삭제
    $sql = "DELETE FROM tasks WHERE id = $taskId AND userid = '{$_SESSION['userid']}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('할 일이 삭제되었습니다.');</script>";
    } else {
        echo "<script>alert('할 일 삭제 실패: " . mysqli_error($conn) . "');</script>";
    }
}

// 데이터베이스 연결 종료
mysqli_close($conn);

// 삭제 후 todo 페이지로 리다이렉트
echo "<meta http-equiv='refresh' content='0;URL=todo.php'>";
?>
