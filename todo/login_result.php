<?php
$a = $_POST['email'];
$b = $_POST['passwd'];

// php, mysql 연동
include('./db_conn.php');

// SQL 쿼리 작성
$sql = "INSERT INTO user (email, passwd) VALUES ('$a', '$b')";

// 쿼리 실행
mysqli_query($conn, $sql);

// 연결 종료
mysqli_close($conn);

// 리다이렉트
header("Location: todo_main.html");
exit();
?>